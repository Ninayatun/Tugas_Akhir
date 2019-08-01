<?php

namespace app\models;

use Yii;
use yii\helpers\Html;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property int $id_muzaki
 * @property int $id_user_role
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password', 'id_muzaki', 'id_user_role'], 'required'],
            [['id_muzaki', 'id_user_role'], 'integer'],
            [['username', 'password'], 'string', 'max' => 255],
            [['token'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'id_muzaki' => 'Id Muzaki',
            'id_user_role' => 'Id User Role',
            'token' => 'Token',
        ];
    }

    public static function getFotoMuzaki($htmlOptions=[])
    {
        $query = Muzaki::find()
        ->andWhere(['id_muzaki' => Yii::$app->user->identity->id_muzaki])
        ->one();

        if ($query->foto != null) {
            return Html::img('@web/upload/img/' . $query->foto, $htmlOptions);
        } else {
            return Html::img('@web/upload/no-image.png' . $query->foto, $htmlOptions);
        }
    }
    
    public function getMuzaki()
    {
        return $this->hasOne(Muzaki::class, ['id_muzaki' => 'id_muzaki']);
    }

        public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $Type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return null;
    }

    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey; 
    }

    public static function findByUsername($username)
    {
        return self::findOne(['username' => $username]);
    }

    public function validatePassword($password) 
    {
        return Yii::$app->getSecurity()->validatePassword($password, $this->password);
        //return $password == $this->password;
    }

     public static function isAdmin()
    {
        if (Yii::$app->user->isGuest) {
            return false;
        }

        $model = User::findOne(['username' => Yii::$app->user->identity->username]);
        if ($model == null){
            return false;
        } elseif ($model->id_user_role == 1) {
            return true;
        }
        return false;
    }

    public static function isMuzaki()
    {
        if (Yii::$app->user->isGuest) {
            return false;
        }

        $model = User::findOne(['username' => Yii::$app->user->identity->username]);
        if ($model == null){
            return false;
        } elseif ($model->id_user_role == 2) {
            return true;
        }
        return false;
    }
}
