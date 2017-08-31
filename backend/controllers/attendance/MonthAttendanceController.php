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

namespace backend\controllers\attendance;

use backend\models\AtdLate;
use backend\models\AtdMonthAttendance;
use backend\models\AtdRecord;
use backend\models\ViewInfo;
use backend\models\AtdLeaveEarly;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * MonthAttendanceController implements the CRUD actions for AtdMonthAttendance model.
 */
class MonthAttendanceController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all AtdMonthAttendance models.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $person_result = [];

        try {
            $info = ViewInfo::getInfoById(Yii::$app->user->identity->id);
            $person_result = AtdMonthAttendance::getOneMonthRecord($info[0]['uid'], date('Y-m', strtotime('-1 month')));
            if (!empty($person_result)) {
                print_r($person_result);
            } else {
                echo 'no results!';
            }
        } catch (Exception $e) {
            throw new Exception('Error Request in Person result', $e);
        }
    }

    /*
     *calculate number of attendance number
     *@return mix
     *
     */
    public function actionMonth()
    {
        $time = ['1' => 'morning', '2' => 'afternoon'];
        $verify = ['machine' => 1, 'apply' => 2];
        $date = date('Y-m', strtotime('-1 month'));
        $days_num = date('t', strtotime($date));
        $atd_num = [];

        try {
            // get all user attendance
            $all_result = AtdMonthAttendance::getAllMonthRecord($date);
            if (!empty($all_result)) {
                return $this->render('month',['all_result' => $all_result]);
            } else { // calculate all user attendance
                $info = ViewInfo::getAllUser();
                //reset normal attendance number for everyone
                foreach ($info as $key => $each_person) {
                    foreach ($time as $time_key => $each_time) {
                        $atd_num[$each_time] = 0;
                    }
                    // calculate form the first day to last day attendance
                    for ($each_date = 1; $each_date <= $days_num; ++$each_date) {
                        foreach ($time as $time_key => $each_time) {
                            foreach ($verify as $verify_value) {
                                $record_result = AtdRecord::getHistoryRecord($each_person['ccid'], $date.'-'.$each_date, $verify_value, $each_time);
                                // Attendance machine in and out normal
                                if ($record_result[$each_time.'_in'] > 0 && $record_result[$each_time.'_out'] > 0) {
                                    $atd_num[$each_time] += 1;
                                }
                            }
                        }
                    }
                    foreach ($time as $time_key => $each_time) {
                        // get number of late
                        $late = AtdLate::getOneLateNum($each_person['uid'], $time_key);
                        // get number of early leave
                        $early_leave = AtdLeaveEarly::getOneEarlyNum($each_person['uid'], $time_key);
                        $info[$key][$each_time.'_in'] = $atd_num[$each_time];
                        $info[$key][$each_time.'_late'] = $late[0]['late_num'];
                        $info[$key][$each_time.'_early'] = $early_leave[0]['early_num'];
                        $info[$key]['date'] = $date.'-01';
                    }
                }
                //store all the results
                foreach ($info as $person) {
                    $AtdMonth= new AtdMonthAttendance();
                    $AtdMonth->storeAll($person);
                }
                return $this->redirect(['month']); 
            }
        } catch (Exception $e) {
            throw new Exception('Error Request in Month result', $e);
        }
    }

    /**
     * Displays a single AtdMonthAttendance model.
     *
     * @param int $id
     *
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new AtdMonthAttendance model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     *
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AtdMonthAttendance();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->caid]);
        }

        return $this->render('create', [
                'model' => $model,
            ]);
    }

    /**
     * Updates an existing AtdMonthAttendance model.
     * If update is successful, the browser will be redirected to the 'view' page.
     *
     * @param int $id
     *
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->caid]);
        }

        return $this->render('update', [
                'model' => $model,
            ]);
    }

    /**
     * Deletes an existing AtdMonthAttendance model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     *
     * @param int $id
     *
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AtdMonthAttendance model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param int $id
     *
     * @throws NotFoundHttpException if the model cannot be found
     *
     * @return AtdMonthAttendance the loaded model
     */
    protected function findModel($id)
    {
        if (($model = AtdMonthAttendance::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
