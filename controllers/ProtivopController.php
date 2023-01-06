<?php

namespace app\controllers;

use app\models\Protivop;
use app\models\ProtivopSearch;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProtivopController implements the CRUD actions for Protivop model.
 */
class ProtivopController extends Controller
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
     * Lists all Protivop models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ProtivopSearch();

        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Protivop model.
     * @param int $id_contr Id Contr
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_contr)
    {
        $pr = $this->findModel($id_contr);
        $prDataProvider=new ArrayDataProvider([
                'allModels' => $pr->getProtMeds1()->all(),
            ]
        );

        return $this->render('view', [
            'model' => $pr,
            'prDataProvider' => $prDataProvider,
        ]);
    }

    /**
     * Creates a new Protivop model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Protivop();

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
     * Updates an existing Protivop model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_contr Id Contr
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_contr)
    {
        $model = $this->findModel($id_contr);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Protivop model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_contr Id Contr
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_contr)
    {
        $this->findModel($id_contr)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Protivop model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_contr Id Contr
     * @return Protivop the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_contr)
    {
        if (($model = Protivop::findOne(['id_contr' => $id_contr])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
