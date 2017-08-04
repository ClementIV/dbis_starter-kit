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
        //传入当前人的id和当前日期
        AtdRecord::getRecordById(Yii::$app->user->identity->id);
        //$model = Yii::$app->user->identity->id;
        $model = date("Y-m-d");

        return $this->render('check-in-today',[
            'model' => $model
        ]);
    }
}
