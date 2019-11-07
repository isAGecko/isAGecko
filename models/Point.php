<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "point".
 *
 * @property int $ID_POINT
 * @property int $POINTS
 *
 * @property Pegawai[] $pegawais
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
            [['ID_POINT', 'POINTS'], 'integer'],
            [['ID_POINT'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID_POINT' => 'Id Point',
            'POINTS' => 'Points',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPegawais()
    {
        return $this->hasMany(Pegawai::className(), ['ID_POINT' => 'ID_POINT']);
    }
}
