<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pegawai".
 *
 * @property string $ID_PEGAWAI
 * @property int $ID_DEPARTEMEN
 * @property int $ID_POINT
 * @property string $NAMA_PEGAWAI
 * @property string $TANGGAL_LAHIR
 * @property string $ALAMAT
 * @property int $TAHUN_MASUK
 * @property string $NO_TELP
 *
 * @property Absensi[] $absensis
 * @property Departemen[] $departemens
 * @property Departemen $dEPARTEMEN
 * @property Point $pOINT
 */
class Pegawai extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pegawai';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID_PEGAWAI'], 'required'],
            [['ID_DEPARTEMEN', 'ID_POINT', 'TAHUN_MASUK'], 'integer'],
            [['TANGGAL_LAHIR'], 'safe'],
            [['ID_PEGAWAI'], 'string', 'max' => 11],
            [['NAMA_PEGAWAI'], 'string', 'max' => 225],
            [['ALAMAT'], 'string', 'max' => 1000],
            [['NO_TELP'], 'string', 'max' => 15],
            [['ID_PEGAWAI'], 'unique'],
            [['ID_DEPARTEMEN'], 'exist', 'skipOnError' => true, 'targetClass' => Departemen::className(), 'targetAttribute' => ['ID_DEPARTEMEN' => 'ID_DEPARTEMEN']],
            [['ID_POINT'], 'exist', 'skipOnError' => true, 'targetClass' => Point::className(), 'targetAttribute' => ['ID_POINT' => 'ID_POINT']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID_PEGAWAI' => 'Id Pegawai',
            'ID_DEPARTEMEN' => 'Id Departemen',
            'ID_POINT' => 'Id Point',
            'NAMA_PEGAWAI' => 'Nama Pegawai',
            'TANGGAL_LAHIR' => 'Tanggal Lahir',
            'ALAMAT' => 'Alamat',
            'TAHUN_MASUK' => 'Tahun Masuk',
            'NO_TELP' => 'No Telp',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAbsensis()
    {
        return $this->hasMany(Absensi::className(), ['ID_PEGAWAI' => 'ID_PEGAWAI']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartemens()
    {
        return $this->hasMany(Departemen::className(), ['ID_PEGAWAI' => 'ID_PEGAWAI']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDEPARTEMEN()
    {
        return $this->hasOne(Departemen::className(), ['ID_DEPARTEMEN' => 'ID_DEPARTEMEN']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPOINT()
    {
        return $this->hasOne(Point::className(), ['ID_POINT' => 'ID_POINT']);
    }
}
