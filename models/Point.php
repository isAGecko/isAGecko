<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "point".
 *
 * @property int $id_point
 * @property int $id_pegawai
 * @property int $total_point
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
            [['id_pegawai', 'total_point'], 'required'],
            [[ 'total_point'], 'integer'],
            [['id_pegawai'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_point' => 'Id Point',
            'id_pegawai' => 'Id Pegawai',
            'total_point' => 'Total Point',
        ];
    }
}
