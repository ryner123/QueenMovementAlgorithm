<!DOCTYPE html>
<html>
	<head>
        <title>QUEEN MOVEMENT ALGORITHM</title>

        <link href="stuff.css" rel="stylesheet" type="text/css">
		<script src="jquery-3.2.1.js"></script>
		<script src="jquery-3.2.1.min.js"></script>
		<script src="app.js"></script>
	<style>
		html, body {height: 100%; background:#ddd;}
		.container {
			text-align: center;
			display: table-cell;
			vertical-align: middle;
		}
		.content1 {
			text-align: center;
			display: inline-block;
		}
		.title {
			font-size: 40px;
			color: darkslategrey;
			font-weight: bold;
			padding: 10px;
		}
		table{border:2px solid #000; box-shadow:2px 2px 2px 2px #000; background:#fff;}
		.evens{background:#ebebeb; color:#000;}
		.odds{background:#000; color:#ebebeb}
		
		#shows{position:fixed; right:0; font-style:none; font-size:30px;}
		#foot{position:fixed; bottom:0; left:0; font-size:13px; color: #000; font-weight:bold; padding:20px 20px 20px 20px;}
		#header{position:fixed; }
	</style>
    </head>
	<body>
	<div id="header" class="title">QUEEN MOVEMENT ALGORITHM</div>
		<span id="shows">-NOTHING-</span>
		<div class="container">
            <div class="content1">
                <div class="title">
					<?php
						$a = 0; $b = 0;$z = 8;
						// ===== CREATES THE TABLE =====
						echo '<table>';
						for($a=0;$a<$z;$a++){                      
						   echo "<tr id='tr$a'>";
							 for($b=0;$b<$z;$b++){
								 if ($a % 2 == 0){
									 if ($b % 2 == 0){
										echo "<td class='evens' id='td$b'>NQ</td>";
									 }else{echo "<td class='odds' id='td$b'>NQ</td>";}
								 }else{
									 if ($b % 2 != 0){
										echo "<td class='evens' id='td$b'>NQ</td>";
									 }else{echo "<td class='odds' id='td$b'>NQ</td>";}
								}
								
							  }           
						   echo "</tr>";
						}
						echo '</table>';
						//===== END =====
					
					?>
				</div>
				
				
			</div>
		</div>
		<div id="foot">&copy; Copyright RSG 2017  </div>
		<script>
			$(document).ready(function(){
				//change the queen position here tr=row---td=column
				$('#tr0 #td3').text('1');
				
				
				//don touch this variables
				var $cts = 8; var $ctrrrr = '0';
				var $a = 0; var $c = 0; var $d = 8; var $b = 8; var $e=0; var $f=0; var $g=0;
				var $tes = $('#shows');
				var $a1 = 0; var $a2 = 0;
				setInterval(function() {
					//exits loop
					if(($a1 == 7)&&($a2 == 7)){ $tes.text('DONE'); return false;}
					//sets row
					if($a1==8){$a2 = $a2 + 1;$a1 = 0;}
					//starts loop for searching the entered 1st queen
					if($a1 < $cts){
						
						$holds = $('#tr'+$a2+' > '+'#td'+$a1).text();
						if(($holds=='NQ')&&($ctrrrr=='0')){
							$tes.text('calculating... ' + $a2+$a1);
							$a1 += 1;
						}else if(($holds=='NQ')&&($ctrrrr=='1')){
							$tes.text('calculating... ' + $a2+$a1);
							$('#tr'+$a2+' > '+'#td'+$a1).text('1');
							$a1 -= 1;
						}
						else if($holds=='1'){
							$tes.text('calculating... ' + $a2+$a1);
								$('#tr'+$a2+' > '+'#td'+$a1).text('-Q-');
								while($a<$b){
									$('#tr'+$a2+' > '+'#td'+$a).text('--'); //horizontal
									$('#tr'+$c+' > '+'#td'+$a1).text('--'); //vertical
									$('#tr'+$a2+' > '+'#td'+$a1).text('-Q-');
									$a +=1; $c +=1;
								}								
								$d = $a1;$f = $a2; $g = $a2;
								while($d != -1){
									$('#tr'+$f+' > '+'#td'+$d).text('--'); //upper left
									$('#tr'+$g+' > '+'#td'+$d).text('--'); //lower left
									$('#tr'+$a2+' > '+'#td'+$a1).text('-Q-');
									$d -= 1;
									$f -= 1;
									$g += 1;
								}
								$d = $a1;$f = $a2; $g = $a2;
								while($d != 8){
									$('#tr'+$f+' > '+'#td'+$d).text('--'); //upper right
									$('#tr'+$g+' > '+'#td'+$d).text('--'); //lower right
									$('#tr'+$a2+' > '+'#td'+$a1).text('-Q-');
									$d += 1;
									$f += 1;
									$g -= 1;
								}
								
								//sets all remaining available slots 
								$a1 = 0; $a2 = 0; $a = 0; $c = 0;
								$ctrrrr = 1;
						}else if($('#tr'+$a2+' > '+'#td'+$a1).text() == "--"){
							$tes.text('calculating... ' + $a2+$a1);
							$a1 +=1;
						}
						else{$a1 +=1;}
					}
					
					
				}, 0400);
			})
		</script>
	</body>
</html>
