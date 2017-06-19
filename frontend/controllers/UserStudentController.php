<?php

namespace frontend\controllers;
use common\models\UserStudent;
use yii;

class UserStudentController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionUpdate()
    {
        $model = new UserStudent();
        $model = UserStudent::findById(Yii::$app->user->id);
        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                // form inputs are valid, do something here
                return;
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }



}
