<?php

namespace backend\controllers;

use Yii;
use backend\models\ViewInfo;
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
        $info = ViewInfo::getInfoById(Yii::$app->user->identity->id);
        //print_r($info);
        return $this->render('check-in-today',[
            'model' => $model[0],
            'rule' => $model[1],
            'info' => $info[0],
        ]);
    }
}
