<?php

use yii\helpers\Html;

// @var $this yii\web\View
// @var $model backend\models\AtdLeaveEarly

$this->title = $department.' '.Yii::t('backend', 'Real-time state', [
     'modelClass' => 'view info',
]);
// refresh every 60 seconds
$this->metaTags = ['<meta http-equiv="refresh" content="60">'];
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Real-time state')];
$this->params['breadcrumbs'][] = $this->title;
$this->registerCssFile('@web/css/attendance/check-in-today/info.css', ['depends' => ['backend\assets\BackendAsset']]);
$this->registerCssFile('@web/css/attendance/real-time/real-time.css', ['depends' => ['backend\assets\BackendAsset']]);
$content = '';
foreach ($station as $key => $value) {
    $content = $content.'$("#station'.$key.'").removeClass("not-used");';
    if ($value['checkin'] === 1) {
        $content = $content.'$("#station'.$key.'").addClass("success");';
    } else {
        $content = $content.'$("#station'.$key.'").addClass("danger");';
    }
    $content = $content.'$("#station'.$key.'").html("'.$value['ccid'].'<br>'.$value['real_name'].'");';
}
$this->registerJs($content);
?>

<div style="width:90%;height:100%;padding-left:10%">
    <div class="panel panel-blue" >
        <div class="panel-heading" style="height:6%;font-size:35px">
            <?php echo  $department.' '.Yii::t('backend', 'Real-time state'); ?>
        </div>
        <table class="real-time-table">
            <tbody class="real-time-tbody">
                <tr class="real-time-tr">
                    <td id="station1" class="not-used real-time-td">未使用</td>
                    <td id="station2" class="not-used real-time-td">未使用</td>
                    <td id="station3" class="not-used real-time-td">未使用</td>
                    <td id="station4" class="not-used real-time-td">未使用</td>
                </tr>
                <tr class="real-time-tr">
                    <td id="station5" class="not-used real-time-td">未使用</td>
                    <td id="station6" class="not-used real-time-td">未使用</td>
                    <td id="station7" class="not-used real-time-td">未使用</td>
                    <td id="station8" class="not-used real-time-td">未使用</td>
                </tr>
                <tr class="real-time-tr">
                    <td id="station9" class="not-used real-time-td">未使用</td>
                    <td id="station10" class="not-used real-time-td">未使用</td>
                    <td id="station11" class="not-used real-time-td">未使用</td>
                    <td id="station12" class="not-used real-time-td">未使用</td>
                </tr>
                <tr class="real-time-tr">
                    <td id="station13" class="not-used real-time-td">未使用</td>
                    <td id="station14" class="not-used real-time-td">未使用</td>
                    <td id="station15" class="not-used real-time-td">未使用</td>
                    <td id="station16" class="not-used real-time-td">未使用</td>
                </tr>
            </tbody>
        </table>
         </div>
    </div>
</div>
