<?php

namespace app\controllers;

use app\models\Medicine;
use app\models\MedicineSearch;
use app\models\Naznachenie;
use app\models\NaznMed;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * MedicineController implements the CRUD actions for Medicine model.
 */
class MedicineController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Medicine models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new MedicineSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Medicine model.
     * @param int $id_med Id Med
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_med)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_med),
        ]);
    }

    /**
     * Creates a new Medicine model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Medicine();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // загружаем изображение и выполняем resize исходного изображения
            $model->upload = UploadedFile::getInstance($model, 'foto');
            if ($name = $model->uploadImage()) { // если изображение было загружено
                // сохраняем в БД имя файла изображения
                $model->foto = $name;
            }
            $model->save();
            return $this->redirect(['view', 'id_med' => $model->id_med]);
        }

//        if ($this->request->isPost) {
//            if ($model->load($this->request->post()) && $model->save()) {
//                return $this->redirect(['view', 'id_med' => $model->id_med]);
//            }
//        } else {
//            $model->loadDefaultValues();
//        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Medicine model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_med Id Med
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_med)
    {
        $model = $this->findModel($id_med);

        // старое изображение, которое надо удалить, если загружено новое
        $old = $model->foto;
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // загружаем изображение и выполняем resize исходного изображения
            $model->upload = UploadedFile::getInstance($model, 'foto');
            if ($new = $model->uploadImage()) { // если изображение было загружено
                // удаляем старое изображение
                if (!empty($old)) {
                    $model::removeImage($old);
                }
                // сохраняем в БД новое имя
                $model->foto = $new;
            } else { // оставляем старое изображение
                $model->foto = $old;
            }
            $model->save();
            return $this->redirect(['view', 'id_med' => $model->id_med]);
        }

//        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id_med' => $model->id_med]);
//        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Medicine model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_med Id Med
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_med)
    {
        $this->findModel($id_med)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Medicine model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_med Id Med
     * @return Medicine the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_med)
    {
        if (($model = Medicine::findOne(['id_med' => $id_med])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionSearch()
    {
        $searchModel = new MedicineSearch();
        $sea = Yii::$app->request->get('med-search');
        $sea = trim($sea);
        $query = Medicine::find()->where(['like', 'name', $sea]);
        $dataProvider = new ActiveDataProvider([
                'query' => $query,
                'pagination' => ['pageSize' => 5],
            ]
        );
        if ($sea != null && !empty($sea)) {
            return $this->render('index-list', compact('dataProvider', 'sea'));
        } else {
            return $this->render('/site/index');
        }
    }
    public function actionIndexList()
    {
        $searchModel = new MedicineSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index-list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


}
