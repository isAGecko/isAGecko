<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "departemen".
 *
 * @property int $ID_DEPARTEMEN
 * @property string $ID_PEGAWAI
 * @property string $NAMA_DEPARTEMEN
 *
 * @property Pegawai $pEGAWAI
 * @property Pegawai[] $pegawais
 */
class Departemen extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'departemen';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID_DEPARTEMEN'], 'required'],
            [['ID_DEPARTEMEN'], 'integer'],
            [['ID_PEGAWAI'], 'string', 'max' => 11],
            [['NAMA_DEPARTEMEN'],'required', 'string', 'max' => 225],
            [['ID_DEPARTEMEN'], 'unique'],
            [['ID_PEGAWAI'], 'exist', 'skipOnError' => true, 'targetClass' => Pegawai::className(), 'targetAttribute' => ['ID_PEGAWAI' => 'ID_PEGAWAI']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID_DEPARTEMEN' => 'Id Departemen',
            'ID_PEGAWAI' => 'Id Pegawai',
            'NAMA_DEPARTEMEN' => 'Nama Departemen',
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
        return $this->hasMany(Pegawai::className(), ['ID_DEPARTEMEN' => 'ID_DEPARTEMEN']);
    }
}
