<?php

$this->title = Yii::t('backend', 'History Record');
$this->registerCssFile('@web/css/attendance/check-in-today/history-record.css', ['depends' => ['backend\assets\BackendAsset']]);
$this->registerCssFile('@web/css/attendance/check-in-today/font-awesome.min.css', ['depends' => ['backend\assets\BackendAsset']]);
 // print_r($result);
?>
<body>
    <?php \yii\widgets\Pjax::begin(); ?>
    <div class="row">
        <div class="col-md-4">
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

    </div>
    <?php \yii\widgets\Pjax::end(); ?>
</body>
