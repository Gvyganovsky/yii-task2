<?php

namespace app\controllers;

use yii;
use app\models\Applications;
use app\models\ApplicationsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ApplicationsController implements the CRUD actions for Applications model.
 */
class ApplicationsController extends Controller
{
    public function beforeAction($action)
    {
        if ($action->id === 'create' ) {
            return true;
        }
            
        if (Yii::$app->user->isGuest) {
            $this->redirect(['/site/login']);
            return false;
        }
        return parent::beforeAction($action);
    }

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
     * Lists all Applications models.
     *
     * @return string
     */
    public function actionIndex()
    {
        // Получаем ID текущего пользователя
        $userId = Yii::$app->user->id;
    
        // Получаем заявки, принадлежащие текущему пользователю
        $applications = Applications::find()->where(['user_id' => $userId])->all(); 
    
        // Создаем экземпляр поисковой модели
        $searchModel = new ApplicationsSearch();
    
        // Передаем параметры запроса в поисковую модель
        $dataProvider = $searchModel->search($this->request->queryParams);
    
        // Возвращаем представление
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'applications' => $applications,
        ]);
    }

    /**
     * Displays a single Applications model.
     * @param int $id_application Id Application
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_application)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_application),
        ]);
    }

    /**
     * Creates a new Applications model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Applications();
    
        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                // Устанавливаем значение user_id перед сохранением
                $model->user_id = Yii::$app->user->id;
    
                if ($model->save()) {
                    return $this->redirect(['/applications/index']);
                }
            }
        } else {
            $model->loadDefaultValues();
        }
    
        return $this->render('create', [
            'model' => $model,
        ]);
    }
    

    /**
     * Updates an existing Applications model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_application Id Application
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_application)
    {
        $model = $this->findModel($id_application);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_application' => $model->id_application]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Applications model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_application Id Application
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_application)
    {
        $this->findModel($id_application)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Applications model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_application Id Application
     * @return Applications the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_application)
    {
        if (($model = Applications::findOne(['id_application' => $id_application])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
