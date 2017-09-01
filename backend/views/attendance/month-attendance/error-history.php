<?php
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\helpers\Html;
// @var $this yii\web\View
// @var $dataProvider yii\data\ActiveDataProvider

$this->title = Yii::t('backend', 'hitory month\'s attendance');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'ministry of interior')];
$this->params['breadcrumbs'][] = $this->title;
$this->registerCssFile('@web/css/attendance/check-in-today/bootstrap.min.css', ['depends' => ['backend\assets\BackendAsset']]);
$this->registerCssFile('@web/css/attendance/check-in-today/info.css', ['depends' => ['backend\assets\BackendAsset']]);
$this->registerCssFile('@web/css/attendance/month/month.css', ['depends' => ['backend\assets\BackendAsset']]);
$this->registerJsFile('@web/js/attendance/check-in-today/plugins/bootstrap/bootstrap.min.js', ['depends' => ['backend\assets\BackendAsset']]);

?>

<?php
    $filter = ['caid','uid'];
?>

<div class="month-panel-body">
    <div class="panel panel-blue" style="border:1px solid #0a819c;" >
        <div class="panel-heading" style="height:6%;font-size:35px;text-align:center">
            <?php echo Html::a('<i class="fa fa-angle-double-left"></i>',
                                Url::to(['history-month?date='.date('Y-m',strtotime($date.'-01 -1 month'))]),
                                [
                                 'class'=>'month-arrorw-left',
                                ]
                            );
            ?>
            <?php echo ' '.Yii::t('backend', $date); ?>
            <?php
                if($date < date('Y-m',strtotime(' -1 month'))){
                    echo Html::a('<i class="fa fa-angle-double-right"></i>',
                                    Url::to(['history-month?date='.date('Y-m',strtotime($date.'-01 +1 month'))]),
                                    [
                                     'class'=>'month-arrorw-right',
                                    ]
                                );
                }
            ?>
        </div>
        <div class="panel-body pan" >
            <div class="month-error">
            <?php echo Yii::t('backend','No result from this month to before!')?>
            </div>
        </div>
</div>
