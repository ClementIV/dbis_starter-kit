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


$this->registerJsFile('@web/js/attendance/check-in-today/plugins/jquery/jquery.min.js',['depends'=>['backend\assets\BackendAsset']]);
$this->registerJsFile('@web/js/attendance/check-in-today/plugins/bootstrap/bootstrap.min.js',['depends'=>['backend\assets\BackendAsset']]);
$this->registerJsFile('@web/js/attendance/check-in-today/plugins/icheck/icheck.min.js',['depends'=>['backend\assets\BackendAsset']]);
$this->registerJsFile('@web/js/attendance/check-in-today/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js',['depends'=>['backend\assets\BackendAsset']]);
$this->registerJsFile('@web/js/attendance/check-in-today/plugins/bootstrap/bootstrap-datepicker.js',['depends'=>['backend\assets\BackendAsset']]);
$this->registerJsFile('@web/js/attendance/check-in-today/plugins/owl/owl.carousel.min.js',['depends'=>['backend\assets\BackendAsset']]);
$this->registerJsFile('@web/js/attendance/check-in-today/plugins.js',['depends'=>['backend\assets\BackendAsset']]);
$this->registerJsFile('@web/js/attendance/check-in-today/actions.js',['depends'=>['backend\assets\BackendAsset']]);
?>
<body>
<div>
    <!--BEGIN CONTENT-->
    <div style="margin-left: 30px;">
    <table>
    <tr style="height:200px;">
    	<div style="width: 1000px">
    	<td>
	    	<div>今日签到</div>
	    </td>
	    <td>
	    	<div style="margin-left: 150px;">
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
	    	<div>	    		
			    <div class="page-content" style="width:1000px">
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
		                                            </span><span>$</span></h4>
		                            <p class="description">
		                                Profit description</p>
		                            <div class="progress progress-sm mbn">
		                                <div role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;" class="progress-bar progress-bar-success">
		                                    <span class="sr-only">80% Complete (success)</span></div>
		                            </div>
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
		                                <span>215</span><span>$</span></h4>
		                            <p class="description">
		                                Income detail</p>
		                            <div class="progress progress-sm mbn">
		                                <div role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;" class="progress-bar progress-bar-info">
		                                    <span class="sr-only">60% Complete (success)</span></div>
		                            </div>
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
		                                <span>215</span></h4>
		                            <p class="description">
		                                Task completed</p>
		                            <div class="progress progress-sm mbn">
		                                <div role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;" class="progress-bar progress-bar-danger">
		                                    <span class="sr-only">50% Complete (success)</span></div>
		                            </div>
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
		                                <span>128</span></h4>
		                            <p class="description">
		                                Visitor description</p>
		                            <div class="progress progress-sm mbn">
		                                <div role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;" class="progress-bar progress-bar-warning">
		                                    <span class="sr-only">70% Complete (success)</span></div>
		                            </div>
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