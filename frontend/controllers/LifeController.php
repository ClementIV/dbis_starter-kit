<?php
namespace frontend\controllers;


use Yii;
use yii\web\Controller;


class LifeController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionSports()
    {
        return $this->render('sports');
    }

    public function actionEntertainment()
    {
        return $this->render('entertainment');
    }
}