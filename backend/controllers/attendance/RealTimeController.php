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

use backend\models\ViewInfo;

class RealTimeController extends \yii\web\Controller
{
    // return all attendance users checkin state
    // 530 begin with 101 the station number is 'ccid'-100
    // 531 begin with 220 the station number is 'ccid'-100
    // 532 begin with 337 the station number is 'ccid'-336
    public function actionIndex($department)
    {
        $subtrahend = ['530' => 100, '531' => 219, '532' => 336];
        if (array_key_exists($department, $subtrahend)) {
            $checkin_state = ViewInfo::getAllCheckin($department);
            $station = [];
            foreach ($checkin_state as $key => $value) {
                $station[$value['ccid'] - $subtrahend[$department]] = $value;
            }

            return $this->render('index', ['department' => $department, 'station' => $station, 'checkin_state' => $checkin_state]);
        }

        return $this->render('error-department', ['department' => $department]);
    }
}
