<?php

namespace app\controllers;

use Yii;
use app\models\Pegawai;
use app\models\Jabatan;
use app\models\DB;
use app\models\PegawaiSearch;
use app\models\User;
use app\models\SignupForm;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Command;

/**
 * PegawaiController implements the CRUD actions for Pegawai model.
 */
class PegawaiController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Pegawai models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PegawaiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        $dataPegawai = Yii::$app->db->createCommand("SELECT * FROM pegawai a JOIN jabatan b ON a.id_jabatan = b.id_jabatan")
                            ->queryAll();
        $dataJabatan = Yii::$app->db->createCommand("SELECT * FROM jabatan")
                            ->queryAll();
        
        $dataAbsensi = Yii::$app->db->createCommand("SELECT * FROM `absensi` WHERE `tanggal`=CURRENT_DATE")
                            ->queryAll();
        $dataPoint = Yii::$app->db->createCommand("SELECT  ROUND(AVG(point),1) AS rata FROM absensi WHERE tanggal=CURRENT_DATE")
                            ->queryAll();
        $user=Yii::$app->user->identity->username;
        $login = Yii::$app->db->createCommand("SELECT nama from pegawai WHERE nama_pegawai='$user'")
                            ->queryAll();
        $jml_pegawai = count($dataPegawai);
        
        $jml_absensi = count($dataAbsensi);
        // $dataPegawai = $searchModel::find()->all();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'dataPegawai' => $dataPegawai,
            'dataPoint' => $dataPoint,
            'dataAbsensi' => $dataAbsensi,
            'jml_pegawai' => $jml_pegawai,
            'jml_absensi' => $jml_absensi,
            'dataJabatan' => $dataJabatan,
            'login' => $login,
        ]);
    }

    /**
     * Displays a single Pegawai model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Pegawai model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pegawai();

        $dataPegawai = Yii::$app->db->createCommand("SELECT * FROM pegawai")
                            ->queryAll();
        $dataJabatan = Yii::$app->db->createCommand("SELECT * FROM jabatan")
                            ->queryAll();


        if($model->load(Yii::$app->request->post(), '')){
            // print_r(Yii::$app->request->post());
            $nama_pegawai = $_POST['Pegawai']['nama_pegawai'];
            $nama = $_POST['Pegawai']['nama'];
            $alamat = $_POST['Pegawai']['alamat'];
            $gender = $_POST['Pegawai']['gender'];
            $email = $_POST['Pegawai']['email'];
            $nomor_telp = $_POST['Pegawai']['nomor_telp'];
            $password = $_POST['Pegawai']['password'];
            $id_jabatan = $_POST['Pegawai']['id_jabatan'];
            $role = $_POST['Pegawai']['role'];
            // die();
            $model->nama_pegawai = $nama_pegawai;
            $model->alamat = $alamat;
            $model->nama = $nama;
            $model->gender = $gender;
            $model->email = $email;
            $model->nomor_telp = $nomor_telp;
            $model->password = $password;
            $model->id_jabatan = $id_jabatan;
            $model->role = $role;
            Yii::$app->session->setFlash('Sukses','Data Berhasil di Tambahkan');
            $user = new User();
            $user->username = $nama_pegawai;
            $user->email = $email;
            $user->role = $role;
            $user->setPassword($password);
            $user->generateAuthKey();
            $user->save();
            $model->save(false);
            // var_dump($model->save(false));
            
            return $this->redirect(['pegawai/index']);
        }


        return $this->render('create', [
            'model' => $model,
            'dataPegawai' => $dataPegawai,
            'dataJabatan' => $dataJabatan,
        ]);
    }

    /**
     * Updates an existing Pegawai model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $dataJabatan = Yii::$app->db->createCommand("SELECT * FROM jabatan")
                            ->queryAll();
        $model = $this->findModel($id);
        
        $dataPegawai = Yii::$app->db->createCommand("SELECT * FROM pegawai a JOIN jabatan b ON a.id_jabatan = b.id_jabatan Where a.id_pegawai = $id")
                            ->queryAll();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['pegawai/index']);
        }

        return $this->render('update', [
            'model' => $model,
            'dataPegawai' => $dataPegawai,
            'dataJabatan' => $dataJabatan,
        ]);
    }

    /**
     * Deletes an existing Pegawai model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionHapus($id)
    {
        $this->findModel($id)->delete();
        
        return $this->redirect(['pegawai/index']);
    }

    /**
     * Finds the Pegawai model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pegawai the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pegawai::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
