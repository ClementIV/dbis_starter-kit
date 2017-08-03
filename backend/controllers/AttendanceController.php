<?php

namespace backend\controllers;

class AttendanceController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionCheckInToday()
    {
        return $this->render('check-in-today');
    }
}
