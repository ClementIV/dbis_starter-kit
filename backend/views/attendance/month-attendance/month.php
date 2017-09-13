<?php


// @var $this yii\web\View
// @var $dataProvider yii\data\ActiveDataProvider
use yii\helpers\Html;
$this->title = Yii::t('backend', 'Last month\'s attendance');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'ministry of interior')];
$this->params['breadcrumbs'][] = $this->title;
$this->registerCssFile('@web/css/attendance/check-in-today/bootstrap.min.css', ['depends' => ['backend\assets\BackendAsset']]);
$this->registerCssFile('@web/css/attendance/check-in-today/info.css', ['depends' => ['backend\assets\BackendAsset']]);
$this->registerCssFile('@web/css/attendance/month/month.css', ['depends' => ['backend\assets\BackendAsset']]);
$this->registerJsFile('@web/js/attendance/check-in-today/plugins/bootstrap/bootstrap.min.js', ['depends' => ['backend\assets\BackendAsset']]);
$this->registerJsFile('@web/js/export.js', ['depends' => ['backend\assets\BackendAsset']]);
?>

<?php echo Html::button(

        'Export',

    [
        'onclick'=>'method1("month")',
    ]
    )?>
<?php $filter = ['caid','uid']; ?>

<div class="month-panel-body">
    <div class="panel panel-blue" style="border:1px solid #0a819c;" >
        <div class="panel-heading" style="height:6%;font-size:35px;text-align:center">
            <?php echo ' '.Yii::t('backend', $all_result[0]['atd_date']); ?>
        </div>
        <div>
        <table class="month-table col-md-12 col-sm-12" id="month">
            <thead>
                <tr class="month-tr">
                    <?php foreach ($all_result[0] as $each_key => $each_result): ?>
                        <?php if (!in_array($each_key, $filter, true)):?>
                        <th  class=" success month-th"><?php echo yii::t('backend',$each_key); ?></th>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tr>
            </thead>
            <tbody class="month-tbody">
                <?php foreach ($all_result as $person):?>
                <tr class="month-tr">
                    <?php foreach ($person as $each_key => $each_result): ?>
                        <?php if (!in_array($each_key, $filter, true)):?>
                            <td class="not-used month-td"><?php echo $each_result; ?></td>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    </div>
</div>
