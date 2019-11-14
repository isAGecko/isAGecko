<?php
namespace app\controllers;
use Yii;

class AbsensiController extends \yii\web\Controller
{
    public function actionIndex()
    {
        //Bagian Tanggal Absensi
        date_default_timezone_set('Asia/Jakarta');
        $date2=date_create("16:00:00");
        $date1=date_create(date('H:i:s'));
        $diff=date_diff($date2,$date1);
        // echo date_format($date1, 'H:i:s')."<br>";
        // echo date_format($date2, 'H:i:s')."<br>";
        //Jangan diganti kecuali Anda jaya
        $tanggal=date('Y/m/d');
        $jam=date("h:i:s");
        //$absensi = new Absensi();
        $ID_PEGAWAI='PEG1019001';
        $POINT_ABSEN='100';
        $TANGGAL=$tanggal;
        $JAM=$jam;
        $DESKRIPSI='augue mauris augue neque gravida';
        $TERLAMBAT=$diff->h.":".$diff->i.":".$diff->s;
        $FOTO='jaya.jpg';
        Yii::$app->db->createCommand()->insert('absensi', [
            'ID_PEGAWAI'=>'PEG1019001',
            'POINT_ABSEN'=>'100',
            'TANGGAL'=>$tanggal,
            'JAM'=>$jam,
            'DESKRIPSI'=>'augue mauris augue neque gravida',
            'TERLAMBAT'=>$diff->h.":".$diff->i.":".$diff->s,
            'FOTO'=>'jaya.jpg',
            
        ])->execute();
        

        return $this->render('index');
    }

}
