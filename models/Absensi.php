<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "absensi".
 *
 * @property int $ID_ABSENSI
 * @property string $ID_PEGAWAI
 * @property int $POINT_ABSEN
 * @property string $TANGGAL
 * @property string $JAM
 * @property string $DESKRIPSI
 * @property string $TERLAMBAT
 * @property string $FOTO
 *
 * @property Pegawai $pEGAWAI
 */
class Absensi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'absensi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['POINT_ABSEN'], 'integer'],
            [['TANGGAL', 'JAM', 'TERLAMBAT'], 'safe'],
            [['DESKRIPSI'], 'required'],
            [['ID_PEGAWAI'], 'string', 'max' => 11],
            [['DESKRIPSI'], 'string', 'max' => 10000],
            [['FOTO'], 'string', 'max' => 225],
            [['ID_PEGAWAI'], 'exist', 'skipOnError' => true, 'targetClass' => Pegawai::className(), 'targetAttribute' => ['ID_PEGAWAI' => 'ID_PEGAWAI']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID_ABSENSI' => 'Id Absensi',
            'ID_PEGAWAI' => 'Id Pegawai',
            'POINT_ABSEN' => 'Point Absen',
            'TANGGAL' => 'Tanggal',
            'JAM' => 'Jam',
            'DESKRIPSI' => 'Deskripsi',
            'TERLAMBAT' => 'Terlambat',
            'FOTO' => 'Foto',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPEGAWAI()
    {
        return $this->hasOne(Pegawai::className(), ['ID_PEGAWAI' => 'ID_PEGAWAI']);
    }
}
