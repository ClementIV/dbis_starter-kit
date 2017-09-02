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
use backend\models\AtdLeaveEarly;
use backend\models\AtdMonthAttendance;
use backend\models\AtdRecord;
use backend\models\ViewInfo;
use Yii;

class TodayCheckController extends \yii\web\Controller
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
        return $this->render('check-in-today', [
            'model' => $model[0],
            'rule' => $model[1],
            'info' => $info[0],
        ]);
    }

    // get Yesterday result
    // get The day before yesterday result
    // get Three days ago result
    // @var $history the history date
    // @var $time the category of morning and afternoon
    // @var $verify the source of record
    public function actionHistoryRecord()
    {
        $result = [];
        $history = [0 => date('Y-m-d', strtotime('-1 day')), 1 => date('Y-m-d', strtotime('-2 day')), 2 => date('Y-m-d', strtotime('-3 day')), 3 => date('Y-m-d', strtotime('-4 day'))];
        $time = ['1' => 'morning', '2' => 'afternoon'];
        $verify = ['machine' => 1, 'apply' => 2];

        try {
            $info = ViewInfo::getInfoById(Yii::$app->user->identity->id);
            foreach ($history as $each_date) {
                foreach ($time as $time_key => $each_time) {
                    $record_result = AtdRecord::getHistoryRecord($info[0]['ccid'], $each_date, $verify['machine'], $each_time);
                    // Attendance machine in and out normal
                    if ($record_result[$each_time.'_in'] > 0 && $record_result[$each_time.'_out'] > 0) {
                        $result[$each_date][$each_time] = 'Attendance in';
                    } else {
                        $result[$each_date][$each_time] = 'No Attendance';
                        $late = Atdlate::getLate($info[0]['uid'], $each_date, $time_key);
                        $early_leave = AtdleaveEarly::getEarlyLeaveRecord($info[0]['uid'], $each_date, $time_key);
                        //check late and early leave
                        if ($late > 0 || $early_leave > 0) {
                            if ($late > 0 && $early_leave > 0) {
                                $result[$each_date][$each_time] = 'Late and Leave early';
                            } elseif ($late > 0) {
                                $result[$each_date][$each_time] = 'Late';
                            } elseif ($early_leave > 0) {
                                $result[$each_date][$each_time] = 'Leave early';
                            }
                        }
                    }
                }
            }
            $person_result = AtdMonthAttendance::getOneMonthRecord($info[0]['uid'], date('Y-m', strtotime('-1 month')).'-01');
            if (empty($person_result)) {
                $person_result = 'No Result!';
            }

            return $this->render('history-record', ['result' => $result, 'person_result' => $person_result[0]]);
        } catch (Exception $e) {
            throw new Exception('History Exception!', $e);
        }
    }
}
