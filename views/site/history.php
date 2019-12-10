<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->title = 'History Absensi Anda';
use dosamigos\chartjs\ChartJs;
foreach($dataAbsensi as $data){
    $tanggal[]=$data['tanggal'];
    $point[]=$data['point'];
}
?>
<style>
    .wrap > .container {
    padding: 0px 0px 0px;
}
</style>
<div class="container">
    <div class="row">
    <div class="col-md-8">
        <?php
        if(empty($dataAbsensi)){
            $tanggal[]=0;
            $point[]=0;
            echo "<h2>"."Anda Belum Absen sama sekali"."</h2>";
        }else{
            $tanggal[]=$data['tanggal'];
            $point[]=$data['point'];
        ?>
        <?=
            ChartJs::widget([
                'type' => 'line',
                'options' => [
                    'height' => 250,
                    'width' => 400
                ],
                'data' => [
                    'labels' =>$tanggal,
                    'datasets' => [
                        [
                            'label' => "Grafik Nilai Point Absensi",
                            'backgroundColor' => "rgba(179,181,198,0.2)",
                            'borderColor' => "rgba(179,181,198,1)",
                            'pointBackgroundColor' => "rgba(179,181,198,1)",
                            'pointBorderColor' => "#fff",
                            'pointHoverBackgroundColor' => "#fff",
                            'pointHoverBorderColor' => "rgba(179,181,198,1)",
                            'data' => $point
                        ]
                    ]
                ]
            ]);
        }
    ?>
    </div>
    <div class="col-md-4">
    <table class="table table-hover">
        <thead style="background-color: #00a2e9; color: white;">
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
</div>