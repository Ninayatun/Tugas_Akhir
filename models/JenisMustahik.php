<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jenis_mustahik".
 *
 * @property int $id_jenis_mustahik
 * @property string $nama
 */
class JenisMustahik extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jenis_mustahik';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama'], 'required'],
            [['nama'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_jenis_mustahik' => 'Id Jenis Mustahik',
            'nama' => 'Jenis Mustahik',
        ];
    }

    public static function getList()
    {
        return \yii\helpers\ArrayHelper::map(self::find()->all(), 'id_jenis_mustahik', 'nama');
    }
}
