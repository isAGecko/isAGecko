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
use Carbon\Carbon;


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
        return $this->render('index');
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
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
    public function actionEntry()
    {
        $model = new EntryForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // data yang valid diperoleh pada $model

            // lakukan sesuatu terhadap $model di sini ...

            return $this->render('entry-confirm', ['model' => $model]);
        } else {
            // menampilkan form pada halaman, ada atau tidaknya kegagalan validasi tidak masalah
            return $this->render('entry', ['model' => $model]);
        }
    }
    public function actionFormAbsensi()
    {
        //pengaturan waktu dan tanggal
        date_default_timezone_set('Asia/Jakarta');
        $dt = Carbon::now();
        $model=new Absensi();
        if($model->load(Yii::$app->request->post(), '')){
            $date2=date_create("19:00:00");
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
            //yang kedua adalah kantor
            $terlambat= $diff->h.":".$diff->i.":".$diff->s;
            $jarak=distance($latitude, $longitude, -7.045317, 112.430634, "K")*1000;
            //sampai sini pengaturan jaraknya gan
            $point=100;
            $foto='jaya.jpg';
            if($dt->isThursday()){
                Yii::$app->session->setFlash('Gagal','Hari Libur ini Bang');
                return $this->render('form-absensi', ['model' => $model]);
            }else if($jarak>100){
                Yii::$app->session->setFlash('Gagal','Hari Libur ini Bang');
                return $this->render('form-absensi', ['model' => $model]);
            }else{
                $model->id_pegawai=$nama_pegawai;
                $model->tanggal=$tanggal;
                $model->jam=$jam;
                $model->terlambat=$terlambat;
                $model->keterangan=$keterangan;
                $model->detail=$detail;
                $model->foto=$foto;
                $model->point=$point;
            }
        }
        return $this->render('form-absensi', ['model' => $model]);
    }
}
