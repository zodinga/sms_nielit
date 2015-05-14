<?php
$setting=Settings::where('id','=',1)->first();
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title><?php echo $setting->name; ?></title>
	<meta name="viewport" content="width=device-width">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="/bootstrap/css/datepicker.css" rel="stylesheet" media="screen">
		<script src="/bootstrap/js/jquery.js"></script>
        <script src="/bootstrap/js/bootstrap.min.js"></script>
        <script src="/bootstrap/js/bootstrap-datepicker.js"></script>
        <link href="/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
	<style type="text/css">
		@import "/mycalendar/jquery.datepick.css";
	</style>
	<script type="text/javascript" src="/mycalendar/jquery.js"></script>
	<script type="text/javascript" src="/mycalendar/jquery.datepick.js"></script>
	<script language="javascript" type="text/javascript">
    //this code handles the F5

        var version = navigator.appVersion;

        function showKeyCode(e) {
            var keycode = (window.event) ? event.keyCode : e.keyCode;

            if ((version.indexOf('MSIE') != -1)) {
                if (keycode == 116) {
                    event.keyCode = 0;
                    event.returnValue = false;
                    return false;
                }
            }
            else {
                if (keycode == 116) {
                    return false;
                }
            }
        }

</script>
	<script language='JavaScript' type='text/JavaScript'> 
		// http://htmlgenerator.weebly.com 
		var tenth = ''; 
	 
		function ninth() { 
			if (document.all) { 
				(tenth); 
				alert("Tih Sual a awm loh nan, Right Click Disable a ni."); 
				return false; 
			} 
		} 
	 
		function twelfth(e) { 
			if (document.layers || (document.getElementById && !document.all)) { 
				if (e.which == 2 || e.which == 3) { 
					(tenth); 
					return false; 
				} 
			} 
		} 
		if (document.layers) { 
			document.captureEvents(Event.MOUSEDOWN); 
			document.onmousedown = twelfth; 
		} else { 
			document.onmouseup = twelfth; 
			document.oncontextmenu = ninth; 
		} 
		document.oncontextmenu = new Function('alert("Tih Sual a awm loh nan, Right Click Disable a ni."); return false') 
	</script> 

	<script type="text/javascript">
		$(function() {
			$('#popupDatepicker1').datepick();
			$('#inlineDatepicker').datepick({onSelect: showDate});
			
		});
		$(function() {
			$('#popupDatepicker2').datepick();
			$('#inlineDatepicker').datepick({onSelect: showDate});
			
		});
		$(function() {
			$('#popupDatepicker3').datepick();
			$('#inlineDatepicker').datepick({onSelect: showDate});
			
		});

		function showDate(date) {
			alert('The date chosen is ' + date);
		}
	</script>	
	
</head>
<body  onload="JavaScript:document.body.focus();" onkeydown="return showKeyCode(event)">
	      
        <div class="container-fluid">
        <div class="row-fluid">
        <div class="span12">
            <!--Banner content-->
            <h3><center><?php echo $setting->name; ?></center></h3>
            <br />
            @yield('menubar')
            <ul class="nav pull-right">
                <li class="divider-vertical"></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user icon-blue"></i>&nbsp;Welcome : <?php  echo $username; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="/logout" ><i class="icon-off icon-blue"></i>&nbsp;&nbsp;Logout</a></li>
						<li class="nav-header">Settings</li>
                        <li><a href="/change_setting"><i class="icon-wrench icon-blue"></i>&nbsp;&nbsp;Change Settings</a></li>
                    </ul>
                </li>
            </ul>
            <hr />
            <div class="navbar">
                <div class="navbar-inner">
                    <div class="container">
                        <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        </a>
                        <div class="nav-collapse collapse navbar-responsive-collapse">
                            <ul class="nav">
                                <li class="active"><a href="/admin"><i class="icon-home icon-red"></i>&nbsp;&nbsp;Home</a></li>
                                @if(Auth::user()->type==1)
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-edit icon-blue"></i>&nbsp;&nbsp;Admin Panel<b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-header">Main Entry</li>
                                        <li><a href="/new_account"><i class="icon-plus icon-blue"></i>&nbsp;&nbsp;Create New Account</a></li>
                                        <li><a href="/existing_account"><i class="icon-minus icon-blue"></i>&nbsp;&nbsp;View Existing Account for Delete</a></li>
										<li class="nav-header">VAT Entry</li>
                                        <li><a href="/new_vat"><i class="icon-user icon-blue"></i>&nbsp;&nbsp;Create VAT </a></li>
                                        <li><a href="/existing_vat"><i class="icon-minus icon-blue"></i>&nbsp;&nbsp;View Existing VAT for Delete/Edit</a></li>
										<li class="nav-header">Unit</li>
                                        <li><a href="/new_unit"><i class="icon-plus icon-blue"></i>&nbsp;&nbsp;Create New Unit</a></li>
                                        <li><a href="/existing_unit"><i class="icon-minus icon-blue"></i>&nbsp;&nbsp;View Existing Unit for Edit</a></li>
                                        <li class="nav-header">Practices</li>
                                        <li><a href="/new_practice"><i class="icon-plus icon-blue"></i>&nbsp;&nbsp;Create New Practice</a></li>
                                        <li><a href="/existing_practice"><i class="icon-minus icon-blue"></i>&nbsp;&nbsp;View Existing Practice for Edit</a></li>
                                        <li><a href="/new_practiceitem"><i class="icon-plus icon-blue"></i>&nbsp;&nbsp;Create New Practice Item</a></li>
                                        <li><a href="/existing_practiceitem"><i class="icon-minus icon-blue"></i>&nbsp;&nbsp;View Existing Item for Edit</a></li>
										
                                    </ul>
                                </li>
                                @endif
                                @if(Auth::user()->type==1 || Auth::user()->type==2)
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-inbox icon-blue"></i>&nbsp;&nbsp;Stock <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="/item"><i class="icon-plus icon-blue"></i>&nbsp;&nbsp;Stock Entry/Update</a></li>
                                        <li><a href="/item_return"><i class="icon-minus icon-blue"></i>&nbsp;&nbsp;Stock Return</a></li>
                                    </ul>
                                </li>
                                @endif
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class=" icon-shopping-cart icon-blue"></i>&nbsp;&nbsp;Clinic/Vaccin/Surgical etc.. <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <?php
                                        $practice = Practices::all();
                                        foreach ($practice as $prac) {
                                        ?>
                                        <li><a href="/clinic/index/<?php echo $prac->id; ?>"><i class="icon-barcode icon-blue"></i>&nbsp;&nbsp;<?php echo $prac->name; ?></a></li>
                                        <?php
                                        }
                                        ?>
                                        <!--<li><a href="/sale_return"><i class="icon-retweet icon-blue"></i>&nbsp;&nbsp;Return Item</a></li>-->
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class=" icon-shopping-cart icon-blue"></i>&nbsp;&nbsp;Retail Sales <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="/sale"><i class="icon-barcode icon-blue"></i>&nbsp;&nbsp;Sale</a></li>
                                        <li><a href="/sale_return"><i class="icon-retweet icon-blue"></i>&nbsp;&nbsp;Return Item</a></li>
                                    </ul>
                                </li>

                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class=" icon-shopping-cart icon-blue"></i>&nbsp;&nbsp;Whole Sales <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="/wholesale"><i class="icon-barcode icon-blue"></i>&nbsp;&nbsp;Sale</a></li>
                                        <li><a href="/wholesale_return"><i class="icon-retweet icon-blue"></i>&nbsp;&nbsp;Return Item</a></li>
                                    </ul>
                                </li>
                                
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-share icon-blue"></i>&nbsp;&nbsp;Report <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                            <li class="nav-header">Sales Report</li>
                                        @if(Auth::user()->type==1 || Auth::user()->type==3)
                                            <li><a href="/sale_report"><i class="icon-inbox icon-blue"></i>&nbsp;&nbsp;Retail Sales Report</a></li>
                                            <li><a href="/wholesale_report"><i class="icon-inbox icon-blue"></i>&nbsp;&nbsp;Whole Sales Report</a></li>
                                            <li><a href="/practice_sale_report"><i class="icon-inbox icon-blue"></i>&nbsp;&nbsp;Practice Sales Report</a></li>
                                        @endif
                                            <li class="nav-header">Stocks Report</li>
                                        @if(Auth::user()->type==1 || Auth::user()->type==2)
                                            <li><a href="/stock_report"><i class="icon-th-list icon-blue"></i>&nbsp;&nbsp;Stock Report</a></li>
                                            <li><a href="/stock_update_report"><i class="icon-th-list icon-blue"></i>&nbsp;&nbsp;Stock Update History</a></li>
                                        @endif
                                            <li class="nav-header">Credit Report</li>
                                        @if(Auth::user()->type==1 || Auth::user()->type==3)
                                            <li><a href="/credit_report"><i class="icon-th-list icon-blue"></i>&nbsp;&nbsp;Credit Report Retail</a></li>
                                            <li><a href="/credit_report_wholesale"><i class="icon-th-list icon-blue"></i>&nbsp;&nbsp;Credit Report WholeSale</a></li>
                                        @endif
                                    </ul>
                                </li>
								<!--
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class=" icon-fire icon-blue"></i>&nbsp;&nbsp;Tax <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#"><i class="icon-inbox icon-blue"></i>&nbsp;&nbsp;VAT %  Entry</a></li>
                                    </ul>
                                </li>
								-->
                                 <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-share icon-blue"></i>&nbsp;&nbsp;Backup/Restore Database <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="/backup_database"><i class="icon-inbox icon-blue"></i>&nbsp;&nbsp;Backup</a></li>
                                    </ul>
                                </li>
                            </ul>                            
                        </div> 
                    </div>
                </div>
            </div>
        </div>
        <div class="span12">
            <div class="well well-small">
                <!--Body content-->
		@yield('content')
            </div>
        </div>
        <div class="span12" align="center">
            <div class="well well-small">
                Copyright to <?php echo $setting->name; ?>, <?php echo $setting->address; ?>. Aizawl 2014
            </div>
        </div>
    </div>
    </div>
    
</body>
</html>

<script type="text/javascript">

$(document).ready(function(){
	var item_size=$("#size_of_item_select").val();
	for(i=0;i<item_size;i++)
		{
		var info="#info"+i;
		$(info).hide();
        }
	
 
});

$("#amt_receive").change(function(){
	
	$("#box").hide();
    var amt=$("#amt").val();
	var amt_receive=$("#amt_receive").val();
	$("#amt_return").val(amt_receive-amt);
    if(amt_receive < amt)
        {
            //alert("Please Enter Customer Details in Credit...");
            $("#box").show();
                       
        }
    
});

function check(){
	
	var sp=$("#sp").val();
	var cp1=$("#cp1").val();
	if(sp < cp1)
		{
		alert("Selling Price cannot less than Cost price..");
		return false;
		}
	
};
function check2(){
	
	var item_size=$("#size_of_item_select").val();
	//alert(item_size);
	
	for(i=0;i<item_size;i++)
		{
		var sp="#sp"+i;
		var cp="#cp"+i;
		var info="#info"+i;
		var barcode="#barcode"+i;
		var cpdata=$(cp).val();
		var spdata=$(sp).val();
		//alert(exqntydata);
		//var barcodedata=$(barcode).val();
		//console.log(exqtydata);
		//return false;
		//console.log(cpdata);
		//console.log(barcodedata);
		if(spdata < cpdata)
			{
			$(info).show("slow");
			return false;
			}
	
		
		}
	
	
};

function goBack() {
    window.history.back()
}
</script>