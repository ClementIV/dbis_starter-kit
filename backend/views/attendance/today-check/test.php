<div cass="row">

        <div class="attendance-in-out">
            <div id="tab-general">
                <div id="sum_box" class="row mbl">
                    <div class="col-sm-6 col-md-3">
                        <div class="panel profit db mbm">
                            <div class="panel-body">
                                <p class="icon">
                                    <i class="icon fa fa-shopping-cart"></i>
                                </p>
                                <h4 class="value">
                                    <span data-counter="" data-start="10" data-end="50" data-step="1"
                                          data-duration="0">
                                    </span><span><?php echo $rule['morning_begin'].'-'.$rule['morning_in']; ?></span>
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
                    <div class="col-sm-6 col-md-3">
                        <div class="panel income db mbm">
                            <div class="panel-body">
                                <p class="icon">
                                    <i class="icon fa fa-folder"></i>
                                </p>
                                <h4 class="value">
                                    <span><?php echo $rule['morning_out'].'-'.$rule['morning_end']; ?></span>
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
                    <div class="col-sm-6 col-md-3">
                        <div class="panel task db mbm">
                            <div class="panel-body">
                                <p class="icon">
                                    <i class="icon fa fa-shopping-cart"></i>
                                </p>
                                <h4 class="value">
                                    <span><?php echo $rule['afternoon_begin'].'-'.$rule['afternoon_in']; ?></span>
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
                    <div class="col-sm-6 col-md-3">
                        <div class="panel visit db mbm">
                            <div class="panel-body">
                                <p class="icon">
                                    <i class="icon fa fa-folder"></i>
                                </p>
                                <h4 class="value">
                                    <span><?php echo $rule['afternoon_out'].'-'.$rule['afternoon_end']; ?></span>
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


        <div class="info-self" style="margin-top:0px;margin-left:20%">
            <div class="single-member effect-3 info-color" style="margin: 0 0 -50px 0px;min-height: 0px;">
            <div class="member-info">
                <h2 style="font-size: 24px;color: #ffffff; font-weight: bold;  text-transform: uppercase; text-align: center;">用户信息</h2>
                <hr style="margin-bottom: 0px;">
            </div>
            </div>
            <div class="single-member effect-3 info-color"style="margin: 60px 0 0px;min-height: 0px;"  >
                <div class=" member-image " >
                    <img src="<?php echo Yii::$app->user->identity->userProfile->getAvatar($this->assetManager->getAssetUrl($bundle, 'img/anonymous.jpg')); ?>"
                    alt="Member">
                </div>
                <div class="more-info"style="margin-top:-10px;margin-left: 15px;margin-right:15px">
                    <p style="font-size: 14px; font-weight: 300; line-height: 22px; padding: 0 30px; margin-bottom: 0px;">
                    <h3 style="color:#ffffff;font-weight: bold; text-align:center;">个人考勤信息</h3>
                    <h4 style="font-weight: bold;font-size: 18px;color: #ffffff;" >
                        当前状态：
                            <?php
                                if ($info['checkin'] !== 0) {
                                    echo Yii::t('backend', 'Checkin').' <i class="fa fa-check-square" style="color:green;"></i>';
                                } else {
                                    echo Yii::t('backend', 'Checkout').' <i class="fa fa-window-close" style="color:blue;"></i>';
                                }
                            ?>
                    </h4>
                    <h4 style="font-weight: bold;font-size: 18px;color: #ffffff;" >用户id：<?php echo $info['uid']; ?></h4>
                    <h4 style="font-weight: bold;font-size: 18px;color: #ffffff;">真实姓名：<?php echo $info['real_name']; ?></h4>
                    <h4 style="font-weight: bold;font-size: 18px;color: #ffffff;">工位号：<?php echo $info['ccid']; ?></h4>
                    <h4 style="font-weight: bold;font-size: 18px;color: #ffffff;">部门：<?php echo $info['deptname']; ?></h4>
                    <h4 style="font-weight: bold;font-size: 18px;color: #ffffff;">email：<?php echo $info['email']; ?></h4>
                    </p>
                    <div class="social-touch" style="align:center;">
                        <a class="" href="#"></a>
                    </div>
                </div>
                <div class="more-info" style="margin-top:22px">
                    <h4 style="color:#ffffff;font-weight: bold; text-align:center;">DBIS, Nankai University</h3>
                </div>
            </div>
        </div>



<!-- </table> -->
</div>
