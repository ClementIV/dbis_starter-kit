<?php
use yii\helpers\Html;

$this->title = Yii::t('backend', 'History Record');
$this->registerCssFile('@web/css/attendance/check-in-today/history-record.css', ['depends' => ['backend\assets\BackendAsset']]);
$this->registerCssFile('@web/css/attendance/check-in-today/font-awesome.min.css', ['depends' => ['backend\assets\BackendAsset']]);
 // print_r($result);
?>
<?php $filter = ['real_name', 'atd_date', 'ccid', 'caid', 'atd_date', 'uid']; ?>
<body>
    <div class="row">
        <div class="col-md-4 col-sm-12">
            <ul class="timeline">
                    <?php foreach ($result as $timekey => $day): ?>
                        <!-- timeline time label -->
                        <li class="time-label">
                            <span class="bg-blue">
                                <?php echo $timekey; ?>
                            </span>
                        </li>

                        <?php foreach ($day as $category => $attendance):?>
                        <li>
                            <div class="timeline-item ">
                                <span class="history-icon">
                                    <i class="fa fa-clock-o"></i>
                                    <?php echo Yii::$app->formatter->asRelativeTime($timekey); ?>
                                </span>
                            <?php if ($attendance === 'No Attendance'):?>
                                <h3 class=" history-time history-no-attendance">
                            <?php elseif ($attendance === 'Late' || $attendance === 'Leave early'):?>
                                <h3 class=" history-time history-late">
                            <?php elseif ($attendance === 'Late and Leave early'):?>
                                <h3 class=" history-time history-late-leave-early">
                            <?php else:?>
                                <h3 class=" history-time history-attendance-in">
                            <?php endif; ?>
                                        <?php echo Yii::t('backend', $category); ?>
                                </h3>
                            <?php if ($attendance === 'No Attendance'):?>
                                <div class="history-no-attendance history-result no-attendance">
                            <?php elseif ($attendance === 'Late' || $attendance === 'Leave early'):?>
                                <div class="history-late history-result late">
                            <?php elseif ($attendance === 'Late and Leave early'):?>
                                <div class="history-late-leave-early history-result late-leave-early">
                            <?php else:?>
                                <div class="history-attendance-in history-result attendance-in">
                            <?php endif; ?>
                                    <dl>
                                        <dt><?php echo Yii::t('backend', $attendance); ?></dt>
                                    </dl>
                                </div>
                            </div>
                        </li>
                        <?php endforeach; ?>

                    <?php endforeach; ?>
                    <li>
                        <i class="fa fa-clock-o">
                        </i>
                    </li>
            </ul>
        </div>
        <div class= "col-md-6 col-md-offset-1 col-sm-12">
            <div class="history-person-head">
                <?php echo $person_result['atd_date'].' '.Yii::t('backend', 'History Record'); ?>
            </div>
            <div class="history-pan col-md-12 col-sm-12">
                <?php if (is_array($person_result)):?>
                    <div class="history-person-info">
                        <h2><?php echo $person_result['atd_date']; ?></h2>
                        <h3>
                            <span><?php echo Html::encode('CCID : '); echo $person_result['ccid']; ?></span>
                            <span><?php echo Yii::t('backend', 'real_name').' : '; echo $person_result['real_name']; ?></span>
                        </h3>
                    </div>
                    <div class="history-person-info col-md-12 col-sm-12">
                        <?php foreach ($person_result as $category => $result):?>
                            <?php if (!in_array($category, $filter, true)):?>
                            <div class="col-md-4 history-in col-sm-6">
                                <span ><?php echo Yii::t('backend', $category); ?></span>
                                <h2>
                                    <strong><?php echo $result; ?></strong>
                                    <span><?php echo Yii::t('backend', 'times'); ?></span>
                                </h2>
                            </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php else:?>
                    <div class="history-no-result">
                        <div class="history-in">
                            <h2>
                                 <i class="fa fa-exclamation-triangle ">
                                <?php echo Yii::t('backend', 'No result from this month!');?>
                                </i>
                            </h2>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
