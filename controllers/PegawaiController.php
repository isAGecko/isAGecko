<?php

namespace app\controllers;

use Yii;
use app\models\Pegawai;
use app\models\Jabatan;
use app\models\DB;
use app\models\PegawaiSearch;
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

        $jml_pegawai = count($dataPegawai);
        // $dataPegawai = $searchModel::find()->all();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'dataPegawai' => $dataPegawai,
            'jml_pegawai' => $jml_pegawai,
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

        $dataPegawai = Yii::$app->db->createCommand("SELECT * FROM jabatan")
                            ->queryAll();

        if($model->load(Yii::$app->request->post(), '')){
            // print_r(Yii::$app->request->post());
            $nama_pegawai = $_POST['Pegawai']['nama_pegawai'];
            $alamat = $_POST['Pegawai']['alamat'];
            $gender = $_POST['Pegawai']['gender'];
            $email = $_POST['Pegawai']['email'];
            $nomor_telp = $_POST['Pegawai']['nomor_telp'];
            $password = $_POST['Pegawai']['password'];
            $id_jabatan = $_POST['Pegawai']['id_jabatan'];
            $id_point = $_POST['Pegawai']['id_point'];
            // die();
            $model->nama_pegawai = $nama_pegawai;
            $model->alamat = $alamat;
            $model->gender = $gender;
            $model->email = $email;
            $model->nomor_telp = $nomor_telp;
            $model->password = $password;
            $model->id_jabatan = $id_jabatan;
            $model->id_point = $id_point;

            // $connection->createCommand()->insert('pegawai',
            //         [
            //             'name_pegawai' => $nama_pegawai,
            //             'alamat' => $alamat,
            //             'gender' => $gender,
            //             'email' => $email,
            //             'nomor_telp' => $nomor_telp,
            //             'password' => $password,
            //             'id_jabatan' => $id_jabatan,
            //             'id_point' => $id_point,
            //         ])
            // //         ->execute();
            // print_r(Yii::$app->request->post());

            Yii::$app->session->setFlash('Sukses','Data Berhasil di Tambahkan');

            $model->save(false);
            // var_dump($model->save(false));
            
            return $this->redirect(['pegawai/index']);
        }


        return $this->render('create', [
            'model' => $model,
            'dataPegawai' => $dataPegawai,
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
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_pegawai]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Pegawai model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
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
