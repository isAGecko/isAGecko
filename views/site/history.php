<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->title = 'History Absensi Anda';
?>
<style>
    .wrap > .container {
    padding: 0px 0px 0px;
}
</style>
<div class="row">
    <div class="col-md-8">

    </div>
    <div class="col-md-4">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th>Point</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($dataAbsensi as $rows){
                if($rows['keterangan']==0){
                    $keterangan='Masuk';
                }else{
                    $keterangan='Izin';
                }
            ?>
            <tr>
                <td><?php echo $rows['tanggal']?></td>
                <td><?php echo $keterangan?></td>
                <td><?php echo $rows['point']?></td>
            </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
