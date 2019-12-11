<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pegawai".
 *
 * @property int $id_pegawai
 * @property int $id_point
 * @property int $id_jabatan
 * @property int $nama_pegawai
 * @property int $nomor_telp
 * @property int $alamat
 * @property int $email
 * @property int $gender
 * @property int $password
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
            [['id_pegawai', 'id_jabatan', 'nama_pegawai','nama', 'nomor_telp', 'alamat', 'email','role', 'gender', 'password'], 'required'],
            [['id_pegawai', 'id_point', 'nomor_telp'], 'integer'],
            [['nama_pegawai'], 'string', 'max' => 35],
            [['alamat'], 'string', 'max' => 50],
            [['id_jabatan'], 'string', 'max' => 50],
            [[ 'email'], 'email'],
            [['gender'], 'string', 'max' => 25],
            [['id_pegawai'], 'unique'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pegawai' => 'Id Pegawai',
            'id_point' => 'Id Point',
            'id_jabatan' => 'Id Jabatan',
            'nama_pegawai' => 'Nama Pegawai',
            'nomor_telp' => 'Nomor Telp',
            'alamat' => 'Alamat',
            'email' => 'Email',
            'gender' => 'Gender',
            'password' => 'Password',
        ];
    }
}
