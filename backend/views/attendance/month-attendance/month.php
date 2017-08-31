<?php

use yii\helpers\Html;

// @var $this yii\web\View
// @var $dataProvider yii\data\ActiveDataProvider

$this->title = Yii::t('backend', 'Atd Month Attendances');
$this->params['breadcrumbs'][] = $this->title;
$this->registerCssFile('@web/css/attendance/check-in-today/bootstrap.min.css', ['depends' => ['backend\assets\BackendAsset']]);
$this->registerCssFile('@web/css/attendance/check-in-today/info.css', ['depends' => ['backend\assets\BackendAsset']]);
$this->registerCssFile('@web/css/attendance/month/month.css', ['depends' => ['backend\assets\BackendAsset']]);
$this->registerJsFile('@web/js/attendance/check-in-today/plugins/bootstrap/bootstrap.min.js', ['depends' => ['backend\assets\BackendAsset']]);

?>
<div class="atd-month-attendance-index">


    <p>
        <?php echo Html::a(Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Atd Month Attendance',
]), ['create'], ['class' => 'btn btn-success']); ?>
    </p>
    <?php $filter = ['caid']; ?>
<div class="month-panel-body">
    <div class="panel panel-blue" style="border:1px solid #0a819c;" >
        <div class="panel-heading" style="height:6%;font-size:35px">
            <?php echo ' '.Yii::t('backend', 'month state'); ?>
        </div>
        <div>
        <table class="month-table col-md-12 col-sm-12">
            <thead>
                <tr class="month-tr">
                    <?php foreach ($all_result[0] as $each_key => $each_result): ?>
                        <?php if (!in_array($each_key, $filter, true)):?>
                        <th  class=" success month-th"><?php echo $each_key; ?></th>
                        <?php endif;?>
                    <?php endforeach;?>
                </tr>
            </thead>
            <tbody class="month-tbody">
                <?php foreach ($all_result as $person):?>
                <tr class="month-tr">
                    <?php foreach ($person as $each_key => $each_result): ?>
                        <?php if (!in_array($each_key, $filter, true)):?>
                            <td class="not-used month-td"><?php echo $each_result; ?></td>
                        <?php endif;?>
                    <?php endforeach;?>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    </div>
</div>
</div>
