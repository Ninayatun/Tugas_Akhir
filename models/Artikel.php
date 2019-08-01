<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "artikel".
 *
 * @property int $id
 * @property string $tanggal
 * @property string $judul
 * @property string $isi
 * @property string $gambar
 */
class Artikel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'artikel';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tanggal', 'judul', 'isi'], 'required'],
            [['tanggal'], 'safe'],
            [['isi'], 'string'],
            [['judul'], 'string', 'max' => 255],
            [['gambar'], 'file', 'extensions' => 'png,jpg']
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
            'judul' => 'Judul',
            'isi' => 'Isi',
            'gambar' => '',
        ];
    }
}
