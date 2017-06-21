<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Project */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Projects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-sm-6">
        <!-- Minimal slider -->
        <div class="image-container">
            <img src="<?php if(!empty($model['thumbnail_base_url']))
                echo $model['thumbnail_base_url'] . '/' . $model['thumbnail_path'];
            else
                echo '#'?>" alt="">
        </div>

        <!-- end minimal slider -->
    </div><!-- end col -->

    <div class="col-md-6">
        <div class="case__info">
            <h3 class="heading-helper"><?php echo $model['name']; ?></h3>
            <ul class="list list--definition">
                <li class="list__item"><span class="list__item-head">项目名称:</span> <?php echo $model['name']; ?></li>
                <li class="list__item"><span class="list__item-head">指导教师</span> <?php echo $model->teacher->name; ?></li>
                <li class="list__item"><span class="list__item-head">起止日期:</span>
                    <?php echo Yii::$app->formatter->asDatetime($model['startdate'],'YYYY年m月d日').'-'.Yii::$app->formatter->asDatetime($model['enddate'], 'YYYY年m月d日') ?>
                </li>
                <li class="list__item"><span class="list__item-head">在线展示:</span><a href="<?php echo $model['displayurl']; ?>">DeepOcean</a> </li>
            </ul>

            <div class="clearfix visible-sm"></div>
        </div>
    </div><!-- end col -->
</div><!-- end row -->

<div class="tabs tabs--minimal devider--middle">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs">
        <li class="active"><a href="#one" data-toggle="tab">项目简介</a></li>
        <li><a href="#two" data-toggle="tab">发表论文</a></li>
        <li><a href="#three" data-toggle="tab">申请专利</a></li>
        <li><a href="#four" data-toggle="tab">软件著作权</a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane active" id="one">
            <?php echo $model['introduction']; ?>
        </div>
        <div class="tab-pane" id="two">
            <?php echo $model['paper']; ?>
        </div>
        <div class="tab-pane" id="three">
            <?php echo $model['patent']; ?>
        </div>
        <div class="tab-pane" id="four">

            <div class="table-responsive">
                <!-- Wide table with range of cols -->
                <table class="table table-bordered table--wide table-present">
                    <colgroup class="col-sm-width">
                    </colgroup><colgroup class="col-sm-width">
                    </colgroup><colgroup class="col-sm-width">
                    </colgroup><colgroup class="col-sm-width">
                    </colgroup><colgroup class="col-sm-width">
                    </colgroup><colgroup class="col-sm-width">

                    </colgroup><thead>
                    <tr>
                        <th>编号</th>
                        <th>著作权名称</th>
                        <th>作者</th>
                        <th>完成日</th>
                        <th>登记号</th>
                        <th>附件下载</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($software as $model): ?>
                        <tr>
                            <td><?php echo $model->softid?></td>
                            <td><?php echo $model->name?></td>
                            <td><?php echo $model->author?></td>
                            <td><?php echo substr($model->finishtime,0,10)?></td>
                            <td class="table__wait"><i class="fa fa-spinner"></i><?php echo  $model->regisnumber?></td>
                            <td>
                                <?php if (!$model->itemAttachments==null): ?>
                                    <ul id="item-attachments">
                                        <?php foreach ($model->itemAttachments as $attachment): ?>
                                            <li>
                                                <?php echo \yii\helpers\Html::a(
                                                    $attachment->name,
                                                    ['../article/attachment-download', 'id' => $attachment->id])
                                                ?>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>

<!--                    <tr>-->
<!--                        <td>100032993</td>-->
<!--                        <td>05/14/2015</td>-->
<!--                        <td>John Stewart</td>-->
<!--                        <td>$ 2 199.00</td>-->
<!--                        <td class="table__wait"><i class="fa fa-spinner"></i> Pending</td>-->
<!--                        <td><a class="btn btn-primary btn-sm" href="#">View Order</a></td>-->
<!--                    </tr>-->
                    </tbody>
                </table>
            </div>


        </div>
    </div>
</div>

