<html>
<head>
<title>Nyamuk</title>
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
<script type="text/javascript" src="support/jquery/jquery-2.1.4.min.js"></script>
<style type="text/css">
.hased{
	background-color: red !important;

}
.blocks{
    border: 1px solid;
    /*height: 45px;*/
    text-align: center;
    padding: 5px;
    height: 22%;
    z-index: 2;
}
.container {
    cursor: url("squash_racket1.gif"), auto;
}
.relatif{
    position: relative;
     /*display: none;*/ 
    width: 100%;
    height: 100%;
    display: block;
}
.score{
	position: absolute;
    top: 50%;
    left: 50%;
    display: none;
    text-align: center;
    	font-size: 63px;
    color: blue;
        transform: translate(-50%,-50%);
}
#scoredd{
	font-size: 63px;
    color: blue;
}
.start {
    text-align: center;
    margin-top: 23px;
}
.start a {
	background: green;
    color: #ffffff;
    font-size: 24px;
    padding: 12px;
	text-decoration: none;
}
@media only screen and (max-width: 800px) {
	span > img{
		width: 45%;
	}

	.start{
		margin-top: 10px;
	}
	.start:before{
		position: absolute;
		content: '';
		background-color: rgba(0,0,0,.7);
		width: 100%;
		height: 100%;
		top: 0;
		left: 0;
	}
	.start > a{
		font-size: 20px;
		padding: 5px 10px;
		text-decoration: none;
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%,-50%);
		z-index: 2;
	}
	.hdr{
		margin: 10px 0;
	}
}
</style>
</head>
<body>

<div class="container">
	<div class="row">
		<div class="col-xs-12 text-center hdr"><strong>dibuat oleh bapak nya Abiy dan Bani</strong></div>
	</div>
	<div class="row">
		<?php
		for($i = 1; $i<=16; $i++){
			echo '<div class="blocks col-xs-3">';
			
			echo '</div>';
		}
		// echo '<div class="relatif">
		// 			<div class="score">
		// 				<div class>
		// 					"Your Score"
		// 				</div>
		// 				<div id="scoredd">
		// 					0
		// 				</div>
		// 			</div>
		// 		  </div>';
		?>
	</div>
	<div class="row">
		<input type="hidden" class="valdata" value="">
	</div>
	<div class="start">
		<a href="#">Mulai</a>
	</div>
</div>

</body>
</html>
<script type="text/javascript">
$(document).ready(function(){

	var level = 0;
	var value = 0;

	$('.start').on('click','a',function(event){
		event.preventDefault()
		load();
		$('.start').fadeOut(100)
	})

	var load = function(){
		if(level <= 10){
			//$('.blocks span').load('index.php');
		
		
			level = level+1;
			panggil_nyamuk(level);
			console.log(level);
			
			setTimeout(function(event){
				$('.blocks span').fadeOut();
				setTimeout(load,2000);
			},2000);
		}else{
			var final_score = $('.valdata').val();
			alert(final_score)
		}	
	}

	function panggil_nyamuk(level){
		var arr = [];
		// var level = 10;


		//Isi
		for(var i = 1; i <=16; i++){
			if(i <= level){  
				arr.push('1');
			}else{
				arr.push('0');
			}
		}


		// Function
		// function Shuffle(o) {
		// 	for(var j, x, i = o.length; i; j = parseInt(Math.random() * i), x = o[--i], o[i] = o[j], o[j] = x);
		// 	return o;
		// };
		arr.sort(function() { return 0.5 - Math.random() });

		//Shuffle
		//Shuffle(arr);


		//Isi nyamuk
		for(i = 0; i <= arr.length; i++){
			var nyamuk = '0';
			
			if(arr[i] == '1'){
				// nyamuk = '<span class="active'+i+'" style="background-color:blue;font-weight:bold;color:#fff;padding:5px;display: block;height: 100%;">ada nyamuk</span>';

				nyamuk = '<span class="active'+i+'" style="display:block"><img src="nyamuk.png" style="margin: 0 auto" class="img-responsive"></span>';
			}
			else{
				nyamuk = '';
			}
			
		  	$('.blocks').eq(i).html(nyamuk);
		  	
		  	$('span.active'+i).click(function(){
		  		//if('span.active'+i).has('hased')
				var nyamuk_dead = '<img src="nyamuk-dead.jpg" style="margin: 0 auto" class="img-responsive">';
		  		$(this).html(nyamuk_dead);
		  		value = value+1;
		  		$('input.valdata').val(value);
		  		
		  		// $('#scoredd').text(value);

		  		// $(this).hide();
		  	});
		}

	}
});
</script>