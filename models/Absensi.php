<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "absensi".
 *
 * @property int $ID_ABSENSI
 * @property string $ID_PEGAWAI
 * @property string $TANGGAL
 * @property string $JAM
 * @property string $TERLAMBAT
 * @property string $KETERANGAN
 * @property string $DETAIL
 * @property string $FOTO
 * @property int $POINT
 *
 * @property Pegawai $pEGAWAI
 * @property Pegawai[] $pegawais
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
            [['ID_ABSENSI'], 'required'],
            [['ID_ABSENSI', 'POINT'], 'integer'],
            [['TANGGAL', 'JAM', 'TERLAMBAT'], 'safe'],
            [['ID_PEGAWAI'], 'string', 'max' => 11],
            [['KETERANGAN', 'DETAIL'], 'string', 'max' => 1000],
            [['FOTO'], 'string', 'max' => 100],
            [['ID_ABSENSI'], 'unique'],
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
            'TANGGAL' => 'Tanggal',
            'JAM' => 'Jam',
            'TERLAMBAT' => 'Terlambat',
            'KETERANGAN' => 'Keterangan',
            'DETAIL' => 'Detail',
            'FOTO' => 'Foto',
            'POINT' => 'Point',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPEGAWAI()
    {
        return $this->hasOne(Pegawai::className(), ['ID_PEGAWAI' => 'ID_PEGAWAI']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPegawais()
    {
        return $this->hasMany(Pegawai::className(), ['ID_ABSENSI' => 'ID_ABSENSI']);
    }
}
