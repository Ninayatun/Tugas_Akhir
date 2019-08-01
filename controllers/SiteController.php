<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\User;
use app\models\Infaq;
use app\models\Zakat;
use app\models\Muzaki;
use yii\data\ActiveDataProvider;
use app\models\RegisterForm;
use yii\web\UploadedFile;
use app\models\ForgetPasswordForm;
use Mpdf\Mpdf;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->layout = 'main';

        if (User::isAdmin() || User::isMuzaki()) { 
             $provider = new ActiveDataProvider([
            'query' => \app\models\Artikel::find(),
            'pagination' =>[
              'pageSize' => 3
            ],
          ]);

            return $this->render('index', ['provider' => $provider]);

        } else {
            return $this->redirect(['site/login']);
        }
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    // public function actionContact()
    // {
    //     $model = new ContactForm();
    //     if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
    //         Yii::$app->session->setFlash('contactFormSubmitted');

    //         return $this->refresh();
    //     }
    //     return $this->render('contact', [
    //         'model' => $model,
    //     ]);
    // }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
           Yii::$app->mail->compose()
                ->setFrom('mahmudanurinayatun@gmail.com')
                ->setTo($model->email)
                ->setSubject($model->subject)
                ->setHtmlBody($model->body)
                ->send();
 
            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionTopnav()
    {
        return $this->render('topnav');
    }

    public function actionPenghasilan()
    {
        return $this->render('penghasilan');
    }

    public function actionMal()
    {
        return $this->render('mal');
    }

    public function actionPerdagangan()
    {
        return $this->render('perdagangan');
    }

    public function actionRekening()
    {
        return $this->render('rekening');
    }

    public function actionRegister()
    {
        //agar secara otomatis membuat sendiri
       $this->layout='main-login';
       //$model untuk layout register
       $model = new RegisterForm();

       if ($model->load(Yii::$app->request->post()) && $model->validate()) {

           $muzaki = new Muzaki();
           $muzaki->nama = $model->nama;
           $muzaki->alamat = $model->alamat;
           $muzaki->no_telepon = $model->no_telepon;
           $muzaki->email = $model->email;
           $foto = UploadedFile::getInstance($model, 'foto');
            // merubah nama filenya.
           $model->foto = time() . '_' . $foto->name;
            // lokasi simpan file.
           $foto->saveAs(Yii::$app->basePath . '/web/foto/' . $model->foto);

           $muzaki->save();

           $user = new User();
           $user->username = $model->username;
           $user->password = Yii::$app->getSecurity()->generatePasswordHash($model->password);
           $user->id_muzaki = $muzaki->id_muzaki;
           $user->id_user_role = 2;
           $user->token = Yii::$app->getSecurity()->generateRandomString( $length = 50 );
           if(!$user->save()){
            return print_r($user->getErrors());
           }

           return $this->redirect(['site/login']);
       }

       //untuk memunculkan form dari halaman register
       return $this->render('register', ['model'=>$model]);
    }

    public function actionForget()
  {
      $this->layout = 'main-login';
      $model = new ForgetPasswordForm();

      if ($model->load(Yii::$app->request->post()) && $model->validate()) {
          if (!$model->Email()) {
              Yii::$app->session->setFlash('Gagal', 'Email tidak ditemukan');
              return $this->refresh();
          }
          else
          {
              Yii::$app->session->setFlash('Berhasil', 'Cek Email Anda');
              return $this->redirect(['site/login']);
          }
      }
      return $this->render('forget', [
          'model' => $model,
      ]);
  }

  public function actionNewPassword($token)
    {
       $this->layout = 'main-login';
       $model = new NewPasswordForm();

       // Untuk mendapatkan token yang ada di tabel user yang dimana sudah di relasikan di anggota model
       $user = User::findOne(['token' => $token]);

       if ($user === null) {
           throw new NotFoundHttpException("Halaman tidak ditemukan", 404);
       }

       if ($model->load(Yii::$app->request->post()) && $model->validate()) 
       {
           $user->password = Yii::$app->getSecurity()->generatePasswordHash($model->new_password);
           $user->token = Yii::$app->getSecurity()->generateRandomString( $length = 50);

           $user->save();
           
           return $this->redirect(['site/login']);
       }

       return $this->render('newpassword', [
           'model' => $model,
       ]);
    }

    public function actionExportPdf()
    {
        $this->layout='exportpdf';
        $mpdf=new mPDF();
        $mpdf->WriteHTML($this->renderPartial('template'));
        $mpdf->Output('Data Pengeluaran.pdf', 'D');
        exit;
    }

    public function actionExportPdfKeuangan()
    {
        $this->layout='exportpdf';
        $mpdf=new mPDF();
        $mpdf->WriteHTML($this->renderPartial('templatekeuangan'));
        $mpdf->Output('Data Pengeluaran.pdf', 'D');
        exit;
    }
}
