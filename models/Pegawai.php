<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pegawai".
 *
 * @property string $ID_PEGAWAI
 * @property int $ID_POINT
 * @property int $ID_JABATAN
 * @property int $ID_ABSENSI
 * @property string $NAMA_PEGAWAI
 * @property string $NOMOR_TELP
 * @property string $ALAMAT
 * @property string $EMAIL
 * @property string $GENDER
 * @property string $PASSWORD
 *
 * @property Absensi[] $absensis
 * @property Jabatan[] $jabatans
 * @property Jabatan $jABATAN
 * @property Absensi $aBSENSI
 * @property Point $pOINT
 * @property Point[] $points
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
            [['ID_POINT', 'ID_JABATAN', 'ID_ABSENSI'], 'integer'],
            [['ID_PEGAWAI'], 'string', 'max' => 11],
            [['NAMA_PEGAWAI', 'ALAMAT', 'EMAIL', 'GENDER', 'PASSWORD'], 'string', 'max' => 100],
            [['NOMOR_TELP'], 'string', 'max' => 12],
            [['ID_PEGAWAI'], 'unique'],
            [['ID_JABATAN'], 'exist', 'skipOnError' => true, 'targetClass' => Jabatan::className(), 'targetAttribute' => ['ID_JABATAN' => 'ID_JABATAN']],
            [['ID_ABSENSI'], 'exist', 'skipOnError' => true, 'targetClass' => Absensi::className(), 'targetAttribute' => ['ID_ABSENSI' => 'ID_ABSENSI']],
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
            'ID_POINT' => 'Id Point',
            'ID_JABATAN' => 'Id Jabatan',
            'ID_ABSENSI' => 'Id Absensi',
            'NAMA_PEGAWAI' => 'Nama Pegawai',
            'NOMOR_TELP' => 'Nomor Telp',
            'ALAMAT' => 'Alamat',
            'EMAIL' => 'Email',
            'GENDER' => 'Gender',
            'PASSWORD' => 'Password',
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
    public function getJabatans()
    {
        return $this->hasMany(Jabatan::className(), ['ID_PEGAWAI' => 'ID_PEGAWAI']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJABATAN()
    {
        return $this->hasOne(Jabatan::className(), ['ID_JABATAN' => 'ID_JABATAN']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getABSENSI()
    {
        return $this->hasOne(Absensi::className(), ['ID_ABSENSI' => 'ID_ABSENSI']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPOINT()
    {
        return $this->hasOne(Point::className(), ['ID_POINT' => 'ID_POINT']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPoints()
    {
        return $this->hasMany(Point::className(), ['ID_PEGAWAI' => 'ID_PEGAWAI']);
    }
}
