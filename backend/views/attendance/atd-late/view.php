<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\AtdLate */

$this->title = $model->lid;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Apply Late'), 'url' => ['create']];
$this->params['breadcrumbs'][] = $this->title;
$this->registerCssFile('@web/css/attendance/check-in-today/info.css', ['depends' => ['backend\assets\BackendAsset']]);
?>
<div style="width:50%;height:80%;">
    <div class="panel panel-orange">
        <div class="panel-heading">
            <?php echo Yii::t('backend', 'Apply Late') ?>
        </div>
        <div class="panel-body pan">
            <div class="atd-late-view">
                <p>
                    <?php echo Html::a(Yii::t('backend', 'Update'), ['update', 'id' => $model->lid], ['class' => 'btn btn-primary']) ?>
                    <?php echo Html::a(Yii::t('backend', 'Cancel Apply'), ['delete', 'id' => $model->lid], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => Yii::t('backend', 'Are you sure you want to delete this item?'),
                            'method' => 'post',
                        ],
                    ]) ?>
                </p>
                <?php echo DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        // 'lid',
                        'uid',
                        'date',
                        'category',
                    ],
                ]) ?>
                <p>
                    <?php echo Html::a(Yii::t('backend', 'Apply'), ['index'], ['class' => 'btn btn-primary']) ?>
                </p>
            </div>
        </div>
    </div>
</div>
