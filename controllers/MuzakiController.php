<?php

namespace app\controllers;

use Yii;
use app\models\Muzaki;
use app\models\MuzakiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\filters\AccessControl;
use app\models\User;

/**
 * MuzakiController implements the CRUD actions for Muzaki model.
 */
class MuzakiController extends Controller
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
     * Lists all Muzaki models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MuzakiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Muzaki model.
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
     * Creates a new Muzaki model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Muzaki();

        if ($model->load(Yii::$app->request->post()) && $model->validate())
       {
           //$imageName = $model->id_muzaki;
           // ambil file berkas dan file sampul yg ada di _from.
           $foto = UploadedFile::getInstance($model, 'foto');

           // merubah nama filenya.
           $model->foto = time() . '_' . $foto->name;
       
           // save data ke databases.
           $model->save(false);

           // lokasi simpan file.
           $foto->saveAs(Yii::$app->basePath . '/web/upload/' . $model->foto);

           // Menuju ke view id yang data dibuat.
           return $this->redirect(['view', 'id' => $model->id_muzaki]);
       }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Muzaki model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $foto_lama = $model->foto;

       if ($model->load(Yii::$app->request->post()) && $model->validate())
       {
           //$imageName = $model->id_muzaki;
           
           // Mengambil data baru di layout _from
           $foto = UploadedFile::getInstance($model, 'foto');

           // Jika ada data file yang dirubah maka data lama akan di hapus dan di ganti dengan data baru yang sudah diambil jika tidak ada data yang dirubah maka file akan langsung save data-data yang lama.
           if ($foto == null) {
               unlink(Yii::$app->basePath . '/web/upload/no-image.png');
               $model->foto = time() . '_' . $foto->name;
               $foto->saveAs(Yii::$app->basePath . '/web/upload/' . $model->foto);
           } elseif ($foto !== null) {
               unlink(Yii::$app->basePath . '/web/upload/' . $foto_lama);
               $model->foto = time() . '_' . $foto->name;
               $foto->saveAs(Yii::$app->basePath . '/web/upload/' . $model->foto);
           } else {
               $model->foto = $foto_lama;
           }
         
           // Simapan data ke databases
           $model->save(false);

           // Menuju ke view id yang data dibuat.
           return $this->redirect(['view', 'id' => $model->id_muzaki]);
       }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Muzaki model.
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
     * Finds the Muzaki model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Muzaki the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Muzaki::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionRiwayat()
    {
        return $this->render('riwayat');
        // return $this->render('riwayat', [
        //     'model' => $this->findModel($id),
        // ]);
    }
}
