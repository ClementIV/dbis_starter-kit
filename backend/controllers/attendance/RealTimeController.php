<?php

namespace backend\controllers\attendance;
use yii;
use backend\models\ViewInfo;
class RealTimeController extends \yii\web\Controller
{
    public function actionIndex($department)
    {
        // $info=ViewInfo::findAll(['checkin'=>1,]);
        $checkin_state = ViewInfo::getAllCheckin($department);
        $station = [];
        if(!empty($checkin_state))
        {
            switch ($department) {
                case '530':
                    foreach ($checkin_state as $key => $value) {
                        $station[$value['ccid']-100] = $value;
                    }
                    break;
                case '531':
                    foreach ($checkin_state as $key => $value) {
                        $station[$value['ccid']-219] = $value;
                    }
                    break;
                case '532':
                    foreach ($checkin_state as $key => $value) {
                        $station[$value['ccid']-336] = $value;
                    }
                break;
                default:
                    break;
            }
            return $this->render('index',['department'=>$department,'station'=>$station,'checkin_state'=>$checkin_state,]);
        } else {
            return $this->render('index',['department'=>$department]);

        }


    }

}
