<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "infaq".
 *
 * @property int $id
 * @property string $tanggal
 * @property int $total
 */
class Infaq extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'infaq';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tanggal', 'total'], 'required'],
            [['tanggal'], 'safe'],
            [['total'], 'integer'],
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
        ];
    }

    public static function getTotalCount()
    {
        return static::find()
            ->select('SUM(total)')
            ->scalar();
    }

    public static function getCount()
    {
        return static::find()->count();
    }
}
