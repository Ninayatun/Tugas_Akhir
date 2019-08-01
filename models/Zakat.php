<?php

namespace app\models;

use Yii;
use yii\helpers\StringHelper;

/**
 * This is the model class for table "zakat".
 *
 * @property int $id
 * @property string $tanggal
 * @property int $id_muzaki
 * @property int $id_jenis_zakat
 * @property int $nominal
 * @property string $status
 * @property string $bukti_pembayaran
 */
class Zakat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'zakat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tanggal', 'id_muzaki', 'id_jenis_zakat', 'nominal', 'status'], 'required'],
            [['tanggal'], 'safe'],
            [['id_muzaki', 'id_jenis_zakat', 'nominal'], 'integer'],
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
            'id' => 'ID',
            'tanggal' => 'Tanggal',
            'id_muzaki' => 'Nama',
            'id_jenis_zakat' => 'Jenis Zakat',
            'nominal' => 'Nominal',
            'status' => 'Status',
            'bukti_pembayaran' => 'Bukti Pembayaran',
        ];
    }

    public static function getCount()
    {
        return static::find()->count();
    }

    public function getMuzaki()
    {
        return $this->hasOne(Muzaki::class, ['id_muzaki' => 'id_muzaki']);
    }

    public function getJenisZakat()
    {
        return $this->hasOne(JenisZakat::class, ['id_jenis_zakat' => 'id_jenis_zakat']);
    }

    public static function getNominalCount()
    {
        return static::find()
            ->select('SUM(nominal)')
            ->scalar();
    }

    public static function getListBulanGrafik()
    {
        $list = [];

        for ($i=1; $i <= 12 ; $i++) {
            $list[] = self::getBulanSingkat($i);
        }

        return $list;
    }
                            
    public static function getCountGrafik()
    {
        $list = [];
        for ($i = 1; $i <= 12; $i++) {
            if (strlen($i) == 1) $i = '0' . $i;
            $count = static::findCountGrafik($i);

            $list [] = (int)@$count->count();

        }

        return $list;
    }

    public static function findCountGrafik($bulan)
    {
        $tahun = date('Y');
        $lastDay = date("t", strtotime($tahun.'_'.$bulan));

        return static::find()->andWhere(['between','tanggal', "$tahun-$bulan-01", "$tahun-$bulan-$lastDay"]);
    }

    //===============================================================//

    //untuk mencari data zakat dengan jenis Fitrah
    public function findAllFitrah()
    {
        return Zakat::find()
            ->andWhere(['id_jenis_zakat' => 1])
            ->all();
    }

    //untuk menghitung jumlah data zakat dengan jenis Fitrah
    public function getFitrahCount()
    {
        return Zakat::find()
            ->andWhere(['id_jenis_zakat' => 1])
            ->count();
    }

    //untuk menghitung nominal pemasukan zakat dengan jenis Fitrah
    public function getNominalFitrahCount()
    {
        return Zakat::find()
            ->andWhere(['id_jenis_zakat' => 1])
            ->select('SUM(nominal)')
            ->scalar();
    }

    //===============================================================//

    //untuk mencari data zakat dengan jenis Penghasilan
    public function findAllPenghasilan()
    {
        return Zakat::find()
            ->andWhere(['id_jenis_zakat' => 2])
            ->all();
    }

    //untuk menghitung jumlah data zakat dengan jenis Penghasilan
    public function getPenghasilanCount()
    {
        return Zakat::find()
            ->andWhere(['id_jenis_zakat' => 2])
            ->count();
    }

    //untuk menghitung nominal pemasukan zakat dengan jenis Penghasilan
    public function getNominalPenghasilanCount()
    {
        return Zakat::find()
            ->andWhere(['id_jenis_zakat' => 2])
            ->select('SUM(nominal)')
            ->scalar();
    }

    //===============================================================//

    //untuk mencari data zakat dengan jenis Maal
    public function findAllMaal()
    {
        return Zakat::find()
            ->andWhere(['id_jenis_zakat' => 3])
            ->all();
    }

    //untuk menghitung jumlah data zakat dengan jenis Maal
    public function getMaalCount()
    {
        return Zakat::find()
            ->andWhere(['id_jenis_zakat' => 3])
            ->count();
    }

    //untuk menghitung nominal pemasukan zakat dengan jenis Maal
    public function getNominalMaalCount()
    {
        return Zakat::find()
            ->andWhere(['id_jenis_zakat' => 3])
            ->select('SUM(nominal)')
            ->scalar();
    }
}
