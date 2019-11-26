<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "absensi".
 *
 * @property int $id_absensi
 * @property string $id_pegawai
 * @property string $tanggal
 * @property string $jam
 * @property string $terlambat
 * @property string $keterangan
 * @property string $detail
 * @property string $foto
 * @property int $point
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
            [['id_pegawai', 'tanggal', 'jam', 'terlambat', 'keterangan', 'foto', 'point'], 'required'],
            [['tanggal', 'jam', 'terlambat'], 'safe'],
            [['point'], 'integer'],
            [['id_pegawai'], 'string', 'max' => 20],
            [['keterangan', 'foto'], 'string', 'max' => 100],
            [['detail'], 'string', 'max' => 6500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_absensi' => 'Id Absensi',
            'id_pegawai' => 'Id Pegawai',
            'tanggal' => 'Tanggal',
            'jam' => 'Jam',
            'terlambat' => 'Terlambat',
            'keterangan' => '',
            'detail' => '',
            'foto' => 'Foto',
            'point' => 'Point',
        ];
    }
}
