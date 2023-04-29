<!DOCTYPE html>
<html>
<head>
	<title>محاسبه ی قیمت سینی کابل</title>
        <meta name="description" content="لیست قیمت سینی کابل، درب سینی کابل، رابط سینی کابل، سه راهی سینی کابل، چهار راهی سینی کابل"/>
	<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<style type="text/css">
		@font-face {
  			font-family: Mitra;
  			src:url(Mitra.com.ttf);
		}
		@font-face {
    		font-family: Mitra;
   	 		src: url(B Mitra.tff);
    		font-weight: bold;
		}
		body{
			font-family: Mitra;
			font-size: 1.78em;
		}
		label{
			font-weight: bold !important;
		}
		input{
			font-size: 0.9em !important;
		}
		.alert{
			font-weight: bold !important;
		}
		body{
			padding: 50px;
			font-weight: bold;
		}
		select{
			font-size: 0.8em !important;
			/*font-family: arial !important;*/
		}
	</style>
	<script type="text/javascript">
	$(document).ready(function(){
		$("#proccess").click(function(){
			var type = $('#type').val();
			var width = $('#width').val();
			width=parseInt(width);
			var thickness=$('#thickness').val();
			var gheimat_vazn=42;
			var vazn=0;
			thickness=parseFloat(thickness);
			switch(thickness)
			{
				case 1:
					vazn=16;
					break;
				case 1.25:
					vazn=20;
					break;
				case 1.5:
					vazn=24;
					break;
				case 2:
					vazn=32;
					break;
			}
			if($('#checkbox').is(':checked'))
			{
				gheimat_vazn=gheimat_vazn+22;
			}
			width=width+10;
			$('#meter').text(": قیمت هر متر");
			$('#shakhe').show();
			$('#shakhe_fee').show();
			if (type=='traycable')
			{
				var fee=vazn*gheimat_vazn*width;
				$('#meter_fee').text("تومان"+fee/2);
				$('#shakhe_fee').text("تومان"+fee);
			}
			else if (type=='cover_traycable')
			{
				width=width-5;
				var fee=vazn*gheimat_vazn*width;
				$('#meter_fee').text("تومان"+fee/2);
				$('#shakhe_fee').text("تومان"+fee);
			}
			else if (type=='connector_traycable')
			{
				$('#meter').text(": قیمت هر عدد");
				var fee=vazn*gheimat_vazn*width;
				$('#meter_fee').text("تومان"+fee/10);
				$('#shakhe').hide();
				$('#shakhe_fee').hide();
			}
			else 
			{
				$('#meter').text(": قیمت هر عدد");
				var fee=vazn*gheimat_vazn*width;
				$('#meter_fee').text("تومان"+fee/2);
				$('#shakhe').hide();
				$('#shakhe_fee').hide();
			}
		});
	});
	</script>
</head>
<body>
	<div class="container">
		<div class="panel panel-primary text-right">
			<div class="panel-heading">قیمت سینی کابل</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
						<img src="traycable.jpg" class="img-responsive img-rounded">
					</div>
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
						<div>
							<div class="pull-left">
								<select id="type">
									<option value="traycable">سینی کابل</option>
									<option value="cover_traycable">درب سینی کابل</option>
									<option value="connector_traycable">رابط سینی کابل</option>
									<option value="two_way_traycable">زانویی سینی کابل</option>
									<option value="three_way_traycable">سه راهی سینی کابل</option>
									<option value="four_way_traycable">چهار راهی سینی کابل</option>
								</select>
							</div>
							<div>
								<label for="type">: نوع کالا </label>
							</div>
						</div>
						<div style="height: 12px;"></div>
						<div>
							<div class="pull-left">
								<select id="width">
									<option value="10">10 cm</option>
									<option value="20">20 cm</option>
									<option value="30">30 cm</option>
									<option value="40">40 cm</option>
									<option value="50">50 cm</option>
									<option value="60">60 cm</option>
								</select>
							</div>
							<div>
								<label for="width">: عرض سینی </label>
							</div>
						</div>
						<div style="height: 12px;"></div>
						<div>
							<div class="pull-left">
								<select id="thickness">
									<option value="1">1 ml</option>
									<option value="1.25">1.25 ml</option>
									<option value="1.5">1.5 ml</option>
									<option value="2">2 ml</option>
								</select>
							</div>
							<div>
								<label for="thickness">: ضخامت سینی </label>
							</div>
						</div>
						<div style="height: 30px;"></div>
						<div>
							<div class="pull-left">
								<label id="meter_fee">0</label>
							</div>

							<div>
								<label id="meter">: قیمت هر متر </label>
							</div>
						</div>
						<div style="height: 12px;"></div>
						<div>
							<div class="pull-left">
								<label id="shakhe_fee">0</label>
							</div>
							<div>
								<label id="shakhe">: قیمت هر شاخه </label>
							</div>
						</div>
						<div class="checkbox">
							<label><input type="checkbox" id="checkbox">آبکاری گرم</label>
						</div>
						<div style="height: 20px;"></div>
						<div class="text-right">
							<button id="proccess" class="btn btn-success" style="font-size: 1em">محاسبه</button>
						</div>
					</div>
				</div>
			</div>
			<div class="panel-footer">
				<div class="text-center"><label style="font-size: 1.5em;">سینی کابل کبیر</label></div>
				<div>
                                        تلفن تماس: 09123102458 - 02133960092
				</div>
				<div>
                                        دفتر فروش: تهران، خیابان سعدی جنوبی، مجتمع تجاری سعدی، طبقه دوم، پلاک 207
				</div>
			</div>
		</div>
	</div>
</body>
</html>