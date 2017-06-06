<?php

namespace frontend\controllers;

use common\models\UserTeacher;
use frontend\models\search\UserTeacherSearch;
use yii;
use yii\db\Query;

class UserTeacherController extends \yii\web\Controller
{
    public function actionDelete()
    {
        return $this->render('delete');
    }

    public function actionIndex()
    {
        $searchModel = new UserTeacherSearch();
        $dataProvider = $searchModel->searchTeacherInfo(Yii::$app->request->queryParams);
       /* $dataProvider->sort = [
            'defaultOrder' => ['user_teacher.title' => SORT_ASC]
        ];*/
        return $this->render('index', ['dataProvider'=>$dataProvider]);
    }

    public function actionUpdate()
    {
        return $this->render('update');
    }

    public function actionView($id)
    {
        $searchModel = new UserTeacherSearch();
        $model = $searchModel->searchUserTeacherById($id);
        if (!$model) {
            throw new NotFoundHttpException;
        }
        return $this->render('view', ['model'=>$model]);
    }

}
