<?php

namespace app\controllers;

use app\models\CursosForm;
use app\models\cursoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * CursoController implements the CRUD actions for CursosForm model.
 */
class CursoController extends Controller
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
     * Lists all CursosForm models.
     * @return mixed
     */
    public function actionIndex()
    {

        if(Yii::$app->session->get('userStatus') == false){
            return $this->redirect(['site/login']);
        }
        
        if(strtoupper(Yii::$app->session->get('userRol'))!=strtoupper("Administrador")){
            return $this->redirect(['site/index']);
        }

        $searchModel = new cursoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CursosForm model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if(Yii::$app->session->get('userStatus') == false){
            return $this->redirect(['site/login']);
        }
        
        if(strtoupper(Yii::$app->session->get('userRol'))!=strtoupper("Administrador")){
            return $this->redirect(['site/index']);
        }

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new CursosForm model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->session->get('userStatus') == false){
            return $this->redirect(['site/login']);
        }
        
        if(strtoupper(Yii::$app->session->get('userRol'))!=strtoupper("Administrador")){
            return $this->redirect(['site/index']);
        }

        $model = new CursosForm();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing CursosForm model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {

        if(Yii::$app->session->get('userStatus') == false){
            return $this->redirect(['site/login']);
        }
        
        if(strtoupper(Yii::$app->session->get('userRol'))!=strtoupper("Administrador")){
            return $this->redirect(['site/index']);
        }

        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing CursosForm model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CursosForm model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return CursosForm the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CursosForm::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
