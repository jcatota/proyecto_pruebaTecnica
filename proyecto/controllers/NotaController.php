<?php

namespace app\controllers;

use app\models\NotasForm;
use app\models\notaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * NotaController implements the CRUD actions for NotasForm model.
 */
class NotaController extends Controller
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
     * Lists all NotasForm models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->session->get('userStatus') == false){
            return $this->redirect(['site/login']);
        }
        
        if(strtoupper(Yii::$app->session->get('userRol'))!=strtoupper("profesor")){
            return $this->redirect(['site/index']);
        }

        $searchModel = new notaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all NotasForm models.
     * @return mixed
     */
    public function actionEstudiante()
    {
        if(Yii::$app->session->get('userStatus') == false){
            return $this->redirect(['site/login']);
        }
        
        if(strtoupper(Yii::$app->session->get('userRol'))!=strtoupper("estudiante") 
        ){
            return $this->redirect(['site/index']);
        }

        $searchModel = new notaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('estudiante', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single NotasForm model.
     * @param int $contenidos_id Contenidos ID
     * @param int $usuarios_cursos_usuarios_id Usuarios Cursos Usuarios ID
     * @param int $usuarios_cursos_cursos_id Usuarios Cursos Cursos ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($contenidos_id, $usuarios_cursos_usuarios_id, $usuarios_cursos_cursos_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($contenidos_id, $usuarios_cursos_usuarios_id, $usuarios_cursos_cursos_id),
        ]);
    }

    /**
     * Creates a new NotasForm model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new NotasForm();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'contenidos_id' => $model->contenidos_id, 'usuarios_cursos_usuarios_id' => $model->usuarios_cursos_usuarios_id, 'usuarios_cursos_cursos_id' => $model->usuarios_cursos_cursos_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing NotasForm model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $contenidos_id Contenidos ID
     * @param int $usuarios_cursos_usuarios_id Usuarios Cursos Usuarios ID
     * @param int $usuarios_cursos_cursos_id Usuarios Cursos Cursos ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($contenidos_id, $usuarios_cursos_usuarios_id, $usuarios_cursos_cursos_id)
    {
        $model = $this->findModel($contenidos_id, $usuarios_cursos_usuarios_id, $usuarios_cursos_cursos_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'contenidos_id' => $model->contenidos_id, 'usuarios_cursos_usuarios_id' => $model->usuarios_cursos_usuarios_id, 'usuarios_cursos_cursos_id' => $model->usuarios_cursos_cursos_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing NotasForm model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $contenidos_id Contenidos ID
     * @param int $usuarios_cursos_usuarios_id Usuarios Cursos Usuarios ID
     * @param int $usuarios_cursos_cursos_id Usuarios Cursos Cursos ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($contenidos_id, $usuarios_cursos_usuarios_id, $usuarios_cursos_cursos_id)
    {
        $this->findModel($contenidos_id, $usuarios_cursos_usuarios_id, $usuarios_cursos_cursos_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the NotasForm model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $contenidos_id Contenidos ID
     * @param int $usuarios_cursos_usuarios_id Usuarios Cursos Usuarios ID
     * @param int $usuarios_cursos_cursos_id Usuarios Cursos Cursos ID
     * @return NotasForm the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($contenidos_id, $usuarios_cursos_usuarios_id, $usuarios_cursos_cursos_id)
    {
        if (($model = NotasForm::findOne(['contenidos_id' => $contenidos_id, 'usuarios_cursos_usuarios_id' => $usuarios_cursos_usuarios_id, 'usuarios_cursos_cursos_id' => $usuarios_cursos_cursos_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
