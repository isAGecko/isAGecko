<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "point".
 *
 * @property int $ID_POINT
 * @property string $ID_PEGAWAI
 * @property int $TOTAL_POINT
 *
 * @property Pegawai[] $pegawais
 * @property Pegawai $pEGAWAI
 */
class Point extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'point';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID_POINT'], 'required'],
            [['ID_POINT', 'TOTAL_POINT'], 'integer'],
            [['ID_PEGAWAI'], 'string', 'max' => 11],
            [['ID_POINT'], 'unique'],
            [['ID_PEGAWAI'], 'exist', 'skipOnError' => true, 'targetClass' => Pegawai::className(), 'targetAttribute' => ['ID_PEGAWAI' => 'ID_PEGAWAI']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID_POINT' => 'Id Point',
            'ID_PEGAWAI' => 'Id Pegawai',
            'TOTAL_POINT' => 'Total Point',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPegawais()
    {
        return $this->hasMany(Pegawai::className(), ['ID_POINT' => 'ID_POINT']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPEGAWAI()
    {
        return $this->hasOne(Pegawai::className(), ['ID_PEGAWAI' => 'ID_PEGAWAI']);
    }
}
