<?php

namespace app\controllers;

use Yii;
use app\models\Shadaqah;
use app\models\ShadaqahSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use app\models\User;
use yii\filters\AccessControl;
use Mpdf\Mpdf;

/**
 * ShadaqahController implements the CRUD actions for Shadaqah model.
 */
class ShadaqahController extends Controller
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
                       'actions' => ['view', 'update'],
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
     * Lists all Shadaqah models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ShadaqahSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Shadaqah model.
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
     * Creates a new Shadaqah model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Shadaqah();

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

           Yii::$app->session->setFlash('success', 'Berhasil menambahkan Shadaqah');
           // Menuju ke view id yang data dibuat.
           return $this->redirect(['view', 'id' => $model->id_shadaqah]);
       }

       
   } elseif (User::isAdmin()) {
    if ($model->load(Yii::$app->request->post()) && $model->save()) {
        Yii::$app->session->setFlash('success', 'Berhasil menambahkan Shadaqah');
            return $this->redirect(['view', 'id' => $model->id_shadaqah]);
        }

   }

       
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Shadaqah model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_shadaqah]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Shadaqah model.
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
     * Finds the Shadaqah model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Shadaqah the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Shadaqah::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionExportPdf()
    {
        $this->layout='exportpdf';
        $model = Shadaqah::find()->All();
        $mpdf=new mPDF();
        $mpdf->WriteHTML($this->renderPartial('template',['model'=>$model]));
        $mpdf->Output('Data Shadaqah.pdf', 'D');
        exit;
    }
}
