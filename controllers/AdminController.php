<?php

namespace app\controllers;

use yii;
use app\models\RegForm;
use app\models\Users;
use app\models\UsersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UsersController implements the CRUD actions for Users model.
 */
class AdminController extends Controller
{
    public function beforeAction($action) {
        if (Yii::$app->user->isGuest || Yii::$app->user->identity->admin != 1) {
            $this->redirect(['/site/login']);
            return false;
        }
        return true;
    }

    public function actionIndex()
    {
        $searchModel = new UsersSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
}
