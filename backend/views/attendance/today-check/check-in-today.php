<?php
use backend\assets\BackendAsset;

$this->title = Yii::t('backend', 'Today Check');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Today Check')];
$bundle = BackendAsset::register($this);
?>
    <?php
BackendAsset::register($this);
//css定义一样
$this->registerCssFile('@web/css/attendance/check-in-today/theme-default1.css', ['depends' => ['backend\assets\BackendAsset']]);
$this->registerCssFile('@web/css/attendance/check-in-today/font-awesome.min.css', ['depends' => ['backend\assets\BackendAsset']]);
$this->registerCssFile('@web/css/attendance/check-in-today/bootstrap.min.css', ['depends' => ['backend\assets\BackendAsset']]);
$this->registerCssFile('@web/css/attendance/check-in-today/main.css', ['depends' => ['backend\assets\BackendAsset']]);
$this->registerCssFile('@web/css/attendance/check-in-today/info.css', ['depends' => ['backend\assets\BackendAsset']]);

//$this->registerJsFile('@web/js/attendance/check-in-today/plugins/jquery/jquery.min.js',['depends'=>['backend\assets\BackendAsset']]);
$this->registerJsFile('@web/js/attendance/check-in-today/plugins/bootstrap/bootstrap.min.js', ['depends' => ['backend\assets\BackendAsset']]);
$this->registerJsFile('@web/js/attendance/check-in-today/plugins/icheck/icheck.min.js', ['depends' => ['backend\assets\BackendAsset']]);
$this->registerJsFile('@web/js/attendance/check-in-today/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js', ['depends' => ['backend\assets\BackendAsset']]);
$this->registerJsFile('@web/js/attendance/check-in-today/plugins/bootstrap/bootstrap-datepicker.js', ['depends' => ['backend\assets\BackendAsset']]);
$this->registerJsFile('@web/js/attendance/check-in-today/plugins/owl/owl.carousel.min.js', ['depends' => ['backend\assets\BackendAsset']]);
$this->registerJsFile('@web/js/attendance/check-in-today/plugins.js', ['depends' => ['backend\assets\BackendAsset']]);
$this->registerJsFile('@web/js/attendance/check-in-today/actions.js', ['depends' => ['backend\assets\BackendAsset']]);
?>
<?php
    $str_check = '<div style="margin-top: 80px;">
                        <div style="float: left;font-size:25px;" >
                            已签到
                        </div>
                        <i class="fa fa-check-square-o check"></i>
                        </div>';
    $str_not_check = '<div style="margin-top: 80px;">
                        <div style="float: left; font-size:25px;">
                            未签到
                        </div>
                        <i class="fa fa-window-close-o window-close"></i>
                    </div>';
?>

<body>

    <div class="row">
        <div class="col-sm-12 col-md-3 ">
            <div class="col-sm-12 col-md-11 col-md-offset-1 ">
                <div class="widget widget-info widget-padding-sm">
                    <div class="widget-big-int plugin-clock">00:00</div>
                    <div class="widget-buttons">
                        <div class="widget-title plugin-date">Loading...</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-7">
                <div class="widget widget-info widget-padding-sm">
                    <h2 class="info-head">今日签到</h2>
                    <h3 class="info-tip">美好的一天从按时签到开始<br></h3>
                </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-3">
            <div class="col-sm-12 col-md-11 col-md-offset-1">
                <div class="single-member effect-3 info-color">
                    <div class="member-info">
                        <h2 style="font-size: 24px;color: #ffffff; font-weight: bold;  text-transform: uppercase; text-align: center;">用户信息</h2>
                        <hr style="margin-bottom: 0px;">
                    </div>
                    <div class=" member-image ">
                        <img src="<?php echo Yii::$app->user->identity->userProfile->getAvatar($this->assetManager->getAssetUrl($bundle, 'img/anonymous.jpg')); ?>" alt="Member">
                    </div>
                    <div class="more-info" style="margin-top:-10px;margin-left: 15px;margin-right:15px">
                        <h3 style="color:#ffffff;font-weight: bold; text-align:center;">个人考勤信息</h3>
                        <div class="info-self">
                            <h4>当前状态：
                                        <?php
                                            if ($info['checkin'] != 0) {
                                                echo Yii::t('backend', 'Checkin').' <i class="fa fa-check-square" style="color:green;"></i>';
                                            } else {
                                                echo Yii::t('backend', 'Checkout').' <i class="fa fa-window-close" style="color:blue;"></i>';
                                            }
                                        ?>
                                    </h4>
                            <h4>用户id：<?php echo $info['uid']; ?></h4>
                            <h4>真实姓名：<?php echo $info['real_name']; ?></h4>
                            <h4>工位号：<?php echo $info['ccid']; ?></h4>
                            <h4>部门：<?php echo $info['deptname']; ?></h4>
                            <h4>邮箱：<?php echo $info['email']; ?></h4>
                        </div>
                        <div class="social-touch" style="align:center;">
                            <a class="" href="#"></a>
                        </div>
                    </div>
                    <div class="more-info" style="margin-top:20px">
                        <h4 style="color:#ffffff;font-weight: bold; text-align:center;">DBIS, Nankai University</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-md-7 ">
            <div id="sum_box">
                <div class="col-sm-6 col-md-6 ">
                    <div class="panel profit db mbm">
                        <div class="panel-body">
                            <h4 class="value">
                                <span>
                                    <?php echo $rule['morning_begin'].'-'.$rule['morning_in']; ?>
                                    <i class="fa fa-sign-in" style="font-size:55px;float:right;margin-top:10px;"></i>
                                    </span>
                            </h4>
                            <?php
                                if ($model[0] > 0) {
                                    echo $str_check;
                                } else {
                                    echo $str_not_check;
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="panel income db mbm">
                        <div class="panel-body">
                            <h4 class="value">
                                <span><?php echo $rule['morning_out'].'-'.$rule['morning_end']; ?>
                                    <i class="fa fa-sign-out" style="font-size:55px;float:right;margin-top:10px;"></i>
                                    </span>
                            </h4>
                            <?php
                                if ($model[1] > 0) {
                                    echo $str_check;
                                } else {
                                    echo $str_not_check;
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="panel task db mbm">
                        <div class="panel-body">
                            <h4 class="value">
                                <span>
                                    <?php echo $rule['afternoon_begin'].'-'.$rule['afternoon_in']; ?>
                                    <i class="fa fa-sign-in" style="font-size:55px;float:right;margin-top:10px;"></i>
                                    </span>
                                </h4>
                            <?php
                                if ($model[2] > 0) {
                                    echo $str_check;
                                } else {
                                    echo $str_not_check;
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="panel visit db mbm">
                        <div class="panel-body">
                            <h4 class="value">
                                <span>
                                    <?php echo $rule['afternoon_out'].'-'.$rule['afternoon_end']; ?>
                                    <i class="fa fa-sign-out" style="font-size:55px;float:right;margin-top:10px;"></i>
                                    </span>
                                </h4>
                            <?php
                                if ($model[3] > 0) {
                                    echo $str_check;
                                } else {
                                    echo $str_not_check;
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
