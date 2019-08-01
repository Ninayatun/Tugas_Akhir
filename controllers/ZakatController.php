<?php

namespace app\controllers;

use Yii;
use app\models\Zakat;
use app\models\User;
use app\models\Muzaki;
use app\models\ZakatSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use Mpdf\Mpdf;
use yii\filters\AccessControl;
use app\models\EmailNotifForm;


/**
 * ZakatController implements the CRUD actions for Zakat model.
 */
class ZakatController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
          'access' => [
               'class' => AccessControl::className(),
               'only' => ['logout', 'index'],
               'rules' => [
                   [
                       'actions' => ['view','create','index', 'update'],
                       'allow' => true,
                       'roles' => ['@'],
                       'matchCallback' => function() {
                        return User::isAdmin();
                       }
                   ],
                   [
                       'actions' => ['index'],
                       'allow' => false,
                       'roles' => ['@'],
                       'matchCallback' => function() {
                        return User::isMuzaki();
                       }
                   ],
               ],
           ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Zakat models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ZakatSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Zakat model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Zakat model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
   {
       $model = new Zakat();

       if (User::isMuzaki()) { 
        $model->id_muzaki = Yii::$app->user->identity->id_muzaki;
        $model->status = '1';

       if ($model->load(Yii::$app->request->post()) && $model->validate())
       {
           //$imageName = $model->id_muzaki;
           // ambil file berkas dan file sampul yg ada di _from.
           $bukti_pembayaran = UploadedFile::getInstance($model, 'bukti_pembayaran');

           // merubah nama filenya.
           $model->bukti_pembayaran = time() . '_' . $bukti_pembayaran->name;
       
           // save data ke databases.
           $model->save(false);

           // lokasi simpan file.
           $bukti_pembayaran->saveAs(Yii::$app->basePath . '/web/upload/' . $model->bukti_pembayaran);

           Yii::$app->session->setFlash('success', 'Berhasil menambahkan Zakat');
           // Menuju ke view id yang data dibuat.
           return $this->redirect(['view', 'id' => $model->id]);
       }

       
   } elseif (User::isAdmin()) {
    if ($model->load(Yii::$app->request->post()) && $model->save()) {
        Yii::$app->session->setFlash('success', 'Berhasil menambahkan Zakat');
            return $this->redirect(['view', 'id' => $model->id]);
        }

   }

   return $this->render('create', [
           'model' => $model,
       ]);
 }

    /**
     * Updates an existing Zakat model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
   {
       $model = $this->findModel($id);

       // Mengambi data lama di databases
       $bukti_pembayaran_lama = $model->bukti_pembayaran;
       
       if ($model->load(Yii::$app->request->post()) && $model->validate())
       {
           //$imageName = $model->id_muzaki;
           
           // Mengambil data baru di layout _from
           $bukti_pembayaran = UploadedFile::getInstance($model, 'bukti_pembayaran');

           // Jika ada data file yang dirubah maka data lama akan di hapus dan di ganti dengan data baru yang sudah diambil jika tidak ada data yang dirubah maka file akan langsung save data-data yang lama.
           if ($bukti_pembayaran !== null) {
               unlink(Yii::$app->basePath . '/web/upload/' . $bukti_pembayaran_lama);
               $model->bukti_pembayaran = 'lalalal_' . $bukti_pembayaran->name;
               $bukti_pembayaran->saveAs(Yii::$app->basePath . '/web/upload/' . $model->bukti_pembayaran);
           } else {
               $model->bukti_pembayaran = $bukti_pembayaran_lama;
           }

           Yii::$app->mail->compose('@app/template/pemberitahuan',['model' => $model])
               ->setFrom('mahmudanurinayatun@gmail.com')
               ->setTo($model->muzaki->email)
               ->setSubject('Pemberitahuan')
               ->send();
         
           // Simapan data ke databases
           $model->save(false);

           // Menuju ke view id yang data dibuat.
           return $this->redirect(['view', 'id' => $model->id]);
       }

       return $this->render('update', [
           'model' => $model,
       ]);
   }

    /**
     * Deletes an existing Zakat model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Zakat model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Zakat the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Zakat::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionLaporan()
    {
        return $this->render('laporan');
    }

    public function actionExportPdfFitrah()
    {
        $this->layout='exportpdf';
        $model = Zakat::findAllFitrah();
        $mpdf=new mPDF();
        $mpdf->WriteHTML($this->renderPartial('templatefitrah',['model'=>$model]));
        $mpdf->Output('Data Zakat Fitrah.pdf', 'D');
        exit;
    }

    public function actionExportPdfPenghasilan()
    {
        $this->layout='exportpdf';
        $model = Zakat::findAllPenghasilan();
        $mpdf=new mPDF();
        $mpdf->WriteHTML($this->renderPartial('templatepenghasilan',['model'=>$model]));
        $mpdf->Output('Data Zakat Penghasilan.pdf', 'D');
        exit;
    }

    public function actionExportPdfMaal()
    {
        $this->layout='exportpdf';
        $model = Zakat::findAllMaal();
        $mpdf=new mPDF();
        $mpdf->WriteHTML($this->renderPartial('templatemaal',['model'=>$model]));
        $mpdf->Output('Data Zakat Maal.pdf', 'D');
        exit;
    }

    public function actionExportPdf()
    {
        $this->layout='exportpdf';
        $model = Zakat::find()->All();
        $mpdf=new mPDF();
        $mpdf->WriteHTML($this->renderPartial('template',['model'=>$model]));
        $mpdf->Output('Data Zakat.pdf', 'D');
        exit;
    }

    public function actionNotif()
    {
        $model = new EmailNotifForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
           Yii::$app->mail->compose()
                ->setFrom('mahmudanurinayatun@gmail.com')
                ->setTo($model->email)
                ->setSubject($model->subject)
                ->setHtmlBody($model->isi)
                ->send();
 
            return $this->refresh();
        } else {
            return $this->render('notif', [
                'model' => $model,
            ]);
        }
    }
}
