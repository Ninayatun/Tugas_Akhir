<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "muzaki".
 *
 * @property int $id_muzaki
 * @property int $id_user
 * @property string $nama
 * @property string $alamat
 * @property string $no_telepon
 * @property string $email
 * @property string $foto
 */
class Muzaki extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'muzaki';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'alamat', 'no_telepon', 'email'], 'required'],
            [['nama', 'alamat', 'no_telepon', 'email'], 'string', 'max' => 255],
            [['foto'], 'file', 'extensions' => 'png,jpg']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_muzaki' => 'Id Muzaki',
            'nama' => 'Nama',
            'alamat' => 'Alamat',
            'no_telepon' => 'No Telepon',
            'email' => 'Email',
            'foto' => 'Foto',
        ];
    }

    public static function getList()
    {
        return \yii\helpers\ArrayHelper::map(self::find()->all(), 'id_muzaki', 'nama', 'id_muzaki');
    }

    public static function getCount()
    {
        return static::find()->count();
    }

    public function findAllZakat()
    {
        return Zakat::find()
            ->andWhere(['id_muzaki' => $this->id_muzaki])
            ->all();
    }

    public function findAllShadaqah()
    {
        return Shadaqah::find()
            ->andWhere(['id_muzaki' => $this->id_muzaki])
            ->all();
    }

}
