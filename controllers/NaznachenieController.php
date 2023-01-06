<?php

namespace app\controllers;

use app\models\Medicine;
use app\models\Naznachenie;
use app\models\NaznachenieSearch;
use Yii;
use yii\data\ArrayDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * NaznachenieController implements the CRUD actions for Naznachenie model.
 */
class NaznachenieController extends Controller
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
     * Lists all Naznachenie models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new NaznachenieSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);


        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Naznachenie model.
     * @param int $id_nazn Id Nazn
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_nazn)
    {
        $nazn = $this->findModel($id_nazn);
        $naznDataProvider = new ArrayDataProvider([
                'allModels' => $nazn->getNaznMeds1()->all(),
            ]
        );
        return $this->render('view', [
            'model' => $nazn,
            'naznDataProvider' => $naznDataProvider,

        ]);
    }

    /**
     * Creates a new Naznachenie model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Naznachenie();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['index']);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Naznachenie model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_nazn Id Nazn
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_nazn)
    {
        $model = $this->findModel($id_nazn);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Naznachenie model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_nazn Id Nazn
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_nazn)
    {
        $this->findModel($id_nazn)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Naznachenie model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_nazn Id Nazn
     * @return Naznachenie the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_nazn)
    {
        if (($model = Naznachenie::findOne(['id_nazn' => $id_nazn])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionIndList()
    {
        $searchModel = new NaznachenieSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('ind-list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

}
