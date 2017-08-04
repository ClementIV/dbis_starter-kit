<?php

namespace backend\controllers;
use Yii;
use backend\models\AtdRecord;

class AttendanceController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionCheckInToday()
    {
        $model = AtdRecord::getRecordById(Yii::$app->user->identity->id);

        return $this->render('check-in-today',[
            'model' => $model
        ]);
    }
}
