<?php

/*
 * This file is part of PHP CS Fixer.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *     Dariusz Rumiński <dariusz.ruminski@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace install\controllers;

use common\models\LoginForm;
use install\models\CheckEnv;
use install\models\CreateDatabase;
use install\models\NewDB;
use Yii;
use yii\base\Exception;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\Controller;

/**
 * Site controller.
 */
class SiteController extends Controller
{
    public function getCount()
    {
        return $this->count;
    }

    public function actionForm()
    {
        $model = new CreateDatabase();

        return $this->render('form', ['model' => $model]);
    }

    public function actionNewDb()
    {
        $model = new NewDB();
        if ($model->Overwrite) {
        } else {
            return $this->render('new-db', ['model' => $model]);
        }
    }

    /*
     @check php
     @get OS and free space
    */
    public function actionCongratulation()
    {
        if (!file_exists('lock.lock')) {
            fopen('lock.lock', 'x');

            return $this->render('congratulation');
        }

        return $this->redirect(yii::getAlias('@frontendUrl'));
    }

    public function actionCheckEnv()
    {
        // return $this->goHome();
        if (file_exists('lock.lock')) {
            return $this->redirect(yii::getAlias('@frontendUrl'));
        }
        $model = new CheckEnv();
        $result = 'defeat!';
        if ($model->checkPHP()) {
            $result = PHP_VERSION;
        }

        return $this->render('check-env', ['phpve' => $result, 'os' => $model->getOS(), 'space' => $model->getFreeSpace()]);
    }

    /*
     @1 check dbserver connnected
     @2 create a new db if it is not exists
     @3 overwrite or  append the old db
    */
    public function actionInstall()
    {
        if (file_exists('lock.lock')) {
            return $this->redirect(yii::getAlias('@frontendUrl'));
        }
        //echo Html::encode($this->render('install'));
        $this->redirect(['congratulation']);
    }

    public function actionDatabase()
    {
        if (file_exists('lock.lock')) {
            return $this->redirect(yii::getAlias('@frontendUrl'));
        }
        $model = new CreateDatabase();
        // $model->load(Yii::$app->request->post());
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $check = $model->checkConnect();
            if ($check['isConnect']) {
                try {
                    $model->CreateDB();
                    echo  $this->render('install');
                    $model->ImportData();
                    $model->ChangeConfig();
                    echo '<script> window.location.assign("'.Url::to(['congratulation'], true).'")</script>';

                    return;
                } catch (Exception $e) {
                    throw new Exception('Error Processing Request', $e);
                }
            } else {
                //这里要求就是要提示错误信息。
                return $this->render('database', ['model' => $model, 'message' => 'Check your user name and password!']);
                //  return $this->goHome();
            }
        } else {
            return $this->render('database', ['model' => $model, 'message' => '']);
        }
    }

    public function actionTest($td)
    {
        for ($i = 0; $i < 10; $i = $i + 1) {
            if (($i % 5) === 0) {
                echo $this->render(['test', 'i' => $i]);
            }
        }

        return  $this->render('test', ['i' => $i]);
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
        'error' => [
          'class' => 'yii\web\ErrorAction',
        ],
      ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        if (file_exists('lock.lock')) {
            return $this->redirect(yii::getAlias('@frontendUrl'));
        }

        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
            //return $this->render('index');
        }
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        return $this->render('login', [
          'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
