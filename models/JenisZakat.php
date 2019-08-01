<?php

namespace app\models;

use Yii;
use yii\helpers\StringHelper;

/**
 * This is the model class for table "jenis_zakat".
 *
 * @property int $id_jenis_zakat
 * @property string $nama
 */
class JenisZakat extends \yii\db\ActiveRecord
{

    public static function getList()
    {
        return \yii\helpers\ArrayHelper::map(self::find()->all(), 'id_jenis_zakat', 'nama');
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jenis_zakat';
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
            'id_jenis_zakat' => 'Id Jenis Zakat',
            'nama' => 'Nama',
        ];
    }

    public function getManyZakat()
    {
        return $this->hasMany(Zakat::class, ['id_jenis_zakat' => 'id_jenis_zakat']);
    }

    public static function getGrafikList()
    {
        $data = [];
        foreach (static::find()->all() as $jenis_zakat) {
            $data[] = [StringHelper::truncate($jenis_zakat->nama, 20), (int) $jenis_zakat->getManyZakat()->count()];
        }
        return $data;
    }
}
