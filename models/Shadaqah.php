<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "shadaqah".
 *
 * @property int $id_shadaqah
 * @property string $tanggal
 * @property int $id_muzaki
 * @property int $jumlah_shadaqah
 * @property string $status
 * @property string $bukti_pembayaran
 */
class Shadaqah extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'shadaqah';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tanggal', 'id_muzaki', 'jumlah_shadaqah', 'status'], 'required'],
            [['tanggal'], 'safe'],
            [['id_muzaki', 'jumlah_shadaqah'], 'integer'],
            [['status'], 'string', 'max' => 255],
            [['bukti_pembayaran'], 'file', 'extensions' => 'png,jpg']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_shadaqah' => 'Id Shadaqah',
            'tanggal' => 'Tanggal',
            'id_muzaki' => 'Nama',
            'jumlah_shadaqah' => 'Jumlah Shadaqah',
            'status' => 'Status',
            'bukti_pembayaran' => 'Bukti Pembayaran',
        ];
    }

    public function getMuzaki()
    {
        return $this->hasOne(Muzaki::class, ['id_muzaki' => 'id_muzaki']);
    }

    public static function getTotalCount()
    {
        return static::find()
            ->select('SUM(jumlah_shadaqah)')
            ->scalar();
    }

    public static function getCount()
    {
        return static::find()->count();
    }
}
