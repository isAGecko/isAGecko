<?php

namespace app\controllers;

use app\models\Absensi;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\EntryForm;
use app\models\Point;
use app\models\SignupForm;
use Carbon\Carbon;
use yii\db\Command;


class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
        }
        $user=Yii::$app->user->identity->username;
        $rows = (new \yii\db\Query())
            ->select(['*'])
            ->from('absensi')
            ->where(['id_pegawai' => $user])
            ->limit(1)
            ->orderBy('id_absensi DESC')
            ->all();
        return $this->render('index',compact('rows'));
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }
    public function actionSignup() {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
                    'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
    public function actionFormAbsensi()
    {
        //pengaturan waktu dan tanggal
        date_default_timezone_set('Asia/Jakarta');
        $dt = Carbon::now();
        $model=new Absensi();
        if($model->load(Yii::$app->request->post(), '')){
            $date2=date_create("08:00:00");
            $date1=date_create(date('H:i:s'));
            $diff=date_diff($date2,$date1);
            //sampai sini ya pengaturan waktunya
            $nama_pegawai = Yii::$app->request->post('nama_pegawai');
            $detail = Yii::$app->request->post('detail');
            $keterangan=$_POST['Absensi']['keterangan'];
            $jam = Yii::$app->request->post('jam');
            $tanggal = Yii::$app->request->post('tanggal');
            $latitude = Yii::$app->request->post('lat');
            $longitude = Yii::$app->request->post('long');
            //pengaturan jarak dengan rumus lat long
            function distance($lat1, $lon1, $lat2, $lon2, $unit) {
            $theta = $lon1 - $lon2;
            $dist = sin(deg2rad($lat1))  *sin(deg2rad($lat2)) +  cos(deg2rad($lat1))  *cos(deg2rad($lat2)) * cos(deg2rad($theta));
            $dist = acos($dist);
            $dist = rad2deg($dist);
            $miles = $dist * 60 * 1.1515;
            $unit = strtoupper($unit);
            if ($unit == "K") {
                return ($miles * 1.609344);
            } else if ($unit == "N") {
                return ($miles * 0.8684);
            } else {
                    return $miles;
                }
            }
            $point=0;
            //yang kedua adalah kantor
            $terlambat= $diff->h.":".$diff->i.":".$diff->s;
            $jarak=distance($latitude, $longitude, -7.150996, 110.140281, "K")*1000;
            //sampai sini pengaturan jaraknya gan
            if($diff->h>=2){
                $point=50;
            }elseif($diff->h>=1){
                $point=75;
            }elseif($diff->h<1){
                $point=100;
            }
            $points=new Point();
            $cekPoint = Yii::$app->db->createCommand("SELECT id_pegawai,total_point FROM point WHERE id_pegawai='$nama_pegawai'")
            ->queryAll();
            if(!empty($cekPoint[0]['total_point'])){
                $point_sekarang=$cekPoint[0]['total_point'];
                $total_point=$point_sekarang+$point;
            }else{
                $point_sekarang=0;
                $total_point=$point_sekarang+$point;
            }
            if(!empty($cekPoint)){
                $insertPoint = Yii::$app->db->createCommand()
                ->update('point', ['total_point' => $total_point], ['id_pegawai'=>$nama_pegawai])
                ->execute();
            }else{
                $points->id_pegawai=$nama_pegawai;
                $points->total_point=$point;
                $points->save();
            }            
            $points->id_pegawai=$nama_pegawai;
            $points->total_point=$point;
            $points->save();
            $foto='jaya.jpg';
            $hariini=date('Y-m-d');
            $rows = Yii::$app->db->createCommand("SELECT id_pegawai,tanggal FROM absensi WHERE id_pegawai='$nama_pegawai' && tanggal='$hariini'")
            ->queryAll();
            if($dt->isWednesday()){
                Yii::$app->session->setFlash('Gagal','Hari Libur ini Bang');
                return $this->render('form-absensi', ['model' => $model]);
            }else if($jarak>100){
                Yii::$app->session->setFlash('Gagal','Kejauhan lah Bang');
                return $this->render('form-absensi', ['model' => $model]);
            }else if(!empty($rows)){
                Yii::$app->session->setFlash('Gagal','Udah Absen Lohh');
                return $this->render('form-absensi', ['model' => $model]);
            }
            else{
                $output_file="img/foto_absen/".$nama_pegawai.$tanggal.".png";
                $base64_string=Yii::$app->request->post('canvasImg');
                file_put_contents($output_file, file_get_contents($base64_string));
                $model->id_pegawai=$nama_pegawai;
                $model->tanggal=$tanggal;
                $model->jam=$jam;
                $model->terlambat=$terlambat;
                $model->keterangan=$keterangan;
                $model->detail=$detail;
                $model->foto=$nama_pegawai.$tanggal.".png";
                $model->point=$point;
                $model->save();
                Yii::$app->session->setFlash('Sukses','Anda Sukses Absen Hari ini');
                return $this->render('form-absensi', ['model' => $model]);
            }
        }
        return $this->render('form-absensi', ['model' => $model]);
    }
    public function actionHistory(){
        if (Yii::$app->user->isGuest) {
            $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
        }
        $nama_pegawai=Yii::$app->user->identity->username;
        $dataAbsensi = Yii::$app->db->createCommand("SELECT * FROM absensi WHERE id_pegawai='$nama_pegawai'")
            ->queryAll();
        return $this->render('history',['dataAbsensi'=>$dataAbsensi]);
    }
}
