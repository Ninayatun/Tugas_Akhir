<?php

namespace app\controllers;

use Yii;
use app\models\Artikel;
use app\models\ArtikelSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ArtikelController implements the CRUD actions for Artikel model.
 */
class ArtikelController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Artikel models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ArtikelSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Artikel model.
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
     * Creates a new Artikel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Artikel();

        if ($model->load(Yii::$app->request->post()) && $model->validate())
       {
           //$imageName = $model->id_muzaki;
           // ambil file berkas dan file sampul yg ada di _from.
           $gambar = UploadedFile::getInstance($model, 'gambar');

           // merubah nama filenya.
           $model->gambar = time() . '_' . $gambar->name;
       
           // save data ke databases.
           $model->save(false);

           // lokasi simpan file.
           $gambar->saveAs(Yii::$app->basePath . '/web/upload/' . $model->gambar);

           Yii::$app->session->setFlash('success', 'Berhasil menambahkan Artikel');
           // Menuju ke view id yang data dibuat.
           return $this->redirect(['view', 'id' => $model->id]);
       }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Artikel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $gambar_lama = $model->gambar;
       
       if ($model->load(Yii::$app->request->post()) && $model->validate())
       {
           //$imageName = $model->id_muzaki;
           
           // Mengambil data baru di layout _from
           $gambar = UploadedFile::getInstance($model, 'gambar');

           // Jika ada data file yang dirubah maka data lama akan di hapus dan di ganti dengan data baru yang sudah diambil jika tidak ada data yang dirubah maka file akan langsung save data-data yang lama.
           if ($gambar !== null) {
               unlink(Yii::$app->basePath . '/web/upload/' . $gambar_lama);
               $model->gambar = 'lalalal_' . $gambar->name;
               $gambar->saveAs(Yii::$app->basePath . '/web/upload/' . $model->gambar);
           } else {
               $model->gambar = $gambar_lama;
           }
         
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
     * Deletes an existing Artikel model.
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
     * Finds the Artikel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Artikel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Artikel::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
