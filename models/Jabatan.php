<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jabatan".
 *
 * @property int $ID_JABATAN
 * @property string $ID_PEGAWAI
 * @property string $NAMA_JABATAN
 *
 * @property Pegawai $pEGAWAI
 * @property Pegawai[] $pegawais
 */
class Jabatan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jabatan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID_JABATAN'], 'required'],
            [['ID_JABATAN'], 'integer'],
            [['ID_PEGAWAI'], 'string', 'max' => 11],
            [['NAMA_JABATAN'], 'string', 'max' => 100],
            [['ID_JABATAN'], 'unique'],
            [['ID_PEGAWAI'], 'exist', 'skipOnError' => true, 'targetClass' => Pegawai::className(), 'targetAttribute' => ['ID_PEGAWAI' => 'ID_PEGAWAI']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID_JABATAN' => 'Id Jabatan',
            'ID_PEGAWAI' => 'Id Pegawai',
            'NAMA_JABATAN' => 'Nama Jabatan',
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
        return $this->hasMany(Pegawai::className(), ['ID_JABATAN' => 'ID_JABATAN']);
    }
}
