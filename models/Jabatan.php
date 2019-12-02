<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jabatan".
 *
 * @property int $id_jabatan
 * @property string $nama_jabatan
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
            [['id_jabatan', 'nama_jabatan'], 'required'],
            [['id_jabatan'], 'integer'],
            [['nama_jabatan'], 'string', 'max' => 25],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_jabatan' => 'Id Jabatan',
            'nama_jabatan' => 'Nama Jabatan',
        ];
    }
}
