<?php
/**
 * Created by PhpStorm.
 * User: Chavezye
 * Date: 2017/8/3
 * Time: 9:14
 */
use backend\assets\BackendAsset;
?>
<?php
BackendAsset::register($this);
//css定义一样
$this->registerCssFile('@web/css/attendance/check-in-today/theme-default1.css',['depends'=>['backend\assets\BackendAsset']]);
$this->registerCssFile('@web/css/attendance/check-in-today/font-awesome.min.css',['depends'=>['backend\assets\BackendAsset']]);
$this->registerCssFile('@web/css/attendance/check-in-today/bootstrap.min.css',['depends'=>['backend\assets\BackendAsset']]);
$this->registerCssFile('@web/css/attendance/check-in-today/main.css',['depends'=>['backend\assets\BackendAsset']]);


//$this->registerJsFile('@web/js/attendance/check-in-today/plugins/jquery/jquery.min.js',['depends'=>['backend\assets\BackendAsset']]);
$this->registerJsFile('@web/js/attendance/check-in-today/plugins/bootstrap/bootstrap.min.js',['depends'=>['backend\assets\BackendAsset']]);
$this->registerJsFile('@web/js/attendance/check-in-today/plugins/icheck/icheck.min.js',['depends'=>['backend\assets\BackendAsset']]);
$this->registerJsFile('@web/js/attendance/check-in-today/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js',['depends'=>['backend\assets\BackendAsset']]);
$this->registerJsFile('@web/js/attendance/check-in-today/plugins/bootstrap/bootstrap-datepicker.js',['depends'=>['backend\assets\BackendAsset']]);
$this->registerJsFile('@web/js/attendance/check-in-today/plugins/owl/owl.carousel.min.js',['depends'=>['backend\assets\BackendAsset']]);
$this->registerJsFile('@web/js/attendance/check-in-today/plugins.js',['depends'=>['backend\assets\BackendAsset']]);
$this->registerJsFile('@web/js/attendance/check-in-today/actions.js',['depends'=>['backend\assets\BackendAsset']]);
?>
<?php
    $str_check = '<div style="margin-top: 60px;">
                                        <div style="float: left;margin-right: 250px;">
                                            已签到
                                        </div>
                                        <div>
                                            <img src="/dbis_starter-kit/backend/web/img/check.png" width="50" height="50">
                                        </div>
                                    </div>';
    $str_not_check = '<div style="margin-top: 60px;">
                                        <div style="float: left;margin-right: 250px;">
                                            未签到
                                        </div>
                                        <div>
                                            <img src="/dbis_starter-kit/backend/web/img/not_check.png" width="50" height="50">
                                        </div>
                                    </div>';
?>
<body>
<div>
    <!--BEGIN CONTENT-->
    <div style="margin-left: 30px;">
    <table>
    <tr style="height:200px;">
    	<div >
    	<td>
	    	<div style="width: 920px">今日签到</div>
	    </td>
	    <td>
	    	<div style="margin-left: 10%;">
	    	  <div class="row" style="width:400px;">
		        <div style="width: 100%">
		            <div class="widget widget-info widget-padding-sm">
		                <div class="widget-big-int plugin-clock">00:00</div>
		                <div class="widget-buttons">
		                    <div class="widget-title plugin-date">Loading...</div>
		                </div>
		            </div>
		        </div>
		    </div>
	    	</div>
	    </td>	    	
	    </div>
	</tr>
	<tr>
	    <div>
	    <td>
	    	<div style="width: 920px;">
			    <div class="page-content" >
		        	<div id="tab-general">
		            <div id="sum_box" class="row mbl">
		                <div class="col-sm-6 col-md-3">
		                    <div class="panel profit db mbm">
		                        <div class="panel-body">
		                            <p class="icon">
		                                <i class="icon fa fa-shopping-cart"></i>
		                            </p>
		                            <h4 class="value">
		                                            <span data-counter="" data-start="10" data-end="50" data-step="1" data-duration="0">
		                                            </span><span><?php echo $rule['morning_begin'].'-'.$rule['morining_in'] ?></span></h4>
<!--		                            <p class="description">-->
<!--		                                Profit description</p>-->
<!--		                            <div class="progress progress-sm mbn">-->
<!--		                                <div role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;" class="progress-bar progress-bar-success">-->
<!--		                                    <span class="sr-only">80% Complete (success)</span></div>-->
<!--		                            </div>-->
                                    <?php
                                    if($model[0] > 0)
                                        echo $str_check;
                                    else echo $str_not_check;
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
		                                <span><?php echo $rule['morining_out'].'-'.$rule['morning_end'] ?></span></h4>
                                    <?php
                                    if($model[1] > 0)
                                        echo $str_check;
                                    else echo $str_not_check;
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
		                                <span><?php echo $rule['afternoon_begin'].'-'.$rule['afternoon_in'] ?></span></h4>
                                    <?php
                                    if($model[2] > 0)
                                        echo $str_check;
                                    else echo $str_not_check;
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
		                                <span><?php echo $rule['afternoon_out'].'-'.$rule['afternoon_end'] ?></span></h4>
                                    <?php
                                    if($model[3] > 0)
                                        echo $str_check;
                                    else echo $str_not_check;
                                    ?>
		                        </div>
		                    </div>
		                </div>
		            </div>
		        	</div>
		    	</div>
	    	</div>
	    </td>
	    <td>
	    	<div style="margin-left: 150px;">今日天气</div>
	     </td>
	    </div>
	    </tr>
	   </table>
    </div>
    

   
    <!--END PAGE WRAPPER-->
</div>
</div>
</body>

</html>