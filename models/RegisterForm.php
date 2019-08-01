<?php

namespace app\models;

use Yii;
use yii\base\Model;

class RegisterForm extends Model
{
   //deklarasi dari form register
   public $username;
   public $password;
   public $nama;
   public $alamat;
   public $no_telepon;
   public $email;
   public $foto;
   public $verifyCode;

   public function rules()
   {
       return [
           [['username', 'password', 'nama', 'alamat', 'no_telepon', 'email'], 'required'],
           [['password'], 'string', 'min'=>6],
           //yang boleh masuk hanya nomor 0-9
           [['no_telepon'], 'match', 'pattern'=>'/^[0-9]\w*$/i', 'message'=>'Hanya nomor dari 0 sampai 9'],
           //Target class uniq yg ada di anggota, emailnya tidak boleh sama
           [['email'], 'unique', 'targetClass'=>'\app\models\Muzaki'],
           [['foto'], 'file', 'extensions' => 'png,jpg'],
           ['verifyCode', 'captcha'],
       ];
   }
}