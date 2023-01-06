<?php

namespace app\controllers;

use app\models\Vechestvo;
use app\models\VechestvoSearch;
use yii\data\ArrayDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * VechestvoController implements the CRUD actions for Vechestvo model.
 */
class VechestvoController extends Controller
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
     * Lists all Vechestvo models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new VechestvoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Vechestvo model.
     * @param int $id_ves Id Ves
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_ves)
    {
        $ves = $this->findModel($id_ves);
        $vesDataProvider=new ArrayDataProvider([
                'allModels' => $ves->getVechMeds1()->all(),
            ]
        );
        return $this->render('view', [
            'model' => $ves,
            'vesDataProvider' => $vesDataProvider,
        ]);
    }

    /**
     * Creates a new Vechestvo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Vechestvo();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_ves' => $model->id_ves]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Vechestvo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_ves Id Ves
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_ves)
    {
        $model = $this->findModel($id_ves);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_ves' => $model->id_ves]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Vechestvo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_ves Id Ves
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_ves)
    {
        $this->findModel($id_ves)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Vechestvo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_ves Id Ves
     * @return Vechestvo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_ves)
    {
        if (($model = Vechestvo::findOne(['id_ves' => $id_ves])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
