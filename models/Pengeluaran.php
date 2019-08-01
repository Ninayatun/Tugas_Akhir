<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pengeluaran".
 *
 * @property int $id
 * @property string $tanggal
 * @property int $total
 * @property string $keterangan
 */
class Pengeluaran extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pengeluaran';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tanggal', 'total', 'keterangan'], 'required'],
            [['tanggal'], 'safe'],
            [['total'], 'integer'],
            [['keterangan'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tanggal' => 'Tanggal',
            'total' => 'Total',
            'keterangan' => 'Keterangan',
        ];
    }
    
    public static function getTotalCount()
    {
        return static::find()
            ->select('SUM(total)')
            ->scalar();
    }
}
