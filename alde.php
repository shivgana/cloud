<?php
require_once "config.php";


	$sql="select count(*) as total from alumni";
	$result=mysqli_query($link,$sql);
	$values=mysqli_fetch_assoc($result);
	$total=$values['total'];
	
	$sql="select count(*) as total from alumni where det_1='YES'";
	$result=mysqli_query($link,$sql);
	$values=mysqli_fetch_assoc($result);
	$totaly_det1=$values['total'];

	$sql="select count(*) as total from alumni where det_2='YES'";
	$result=mysqli_query($link,$sql);
	$values=mysqli_fetch_assoc($result);
	$totaly_det2=$values['total'];

	$sql="select count(*) as total from alumni where det_3='YES'";
	$result=mysqli_query($link,$sql);
	$values=mysqli_fetch_assoc($result);
	$totaly_det3=$values['total'];

	$sql="select count(*) as total from alumni where det_4='YES'";
	$result=mysqli_query($link,$sql);
	$values=mysqli_fetch_assoc($result);
	$totaly_det4=$values['total'];

	$sql="select count(*) as total from alumni where det_5='YES'";
	$result=mysqli_query($link,$sql);
	$values=mysqli_fetch_assoc($result);
	$totaly_det5=$values['total'];

	$sql="select count(*) as total from alumni where det_1='NO'";
	$result=mysqli_query($link,$sql);
	$values=mysqli_fetch_assoc($result);
	$totaln_det1=$values['total'];

	$sql="select count(*) as total from alumni where det_2='NO'";
	$result=mysqli_query($link,$sql);
	$values=mysqli_fetch_assoc($result);
	$totaln_det2=$values['total'];

	$sql="select count(*) as total from alumni where det_3='NO'";
	$result=mysqli_query($link,$sql);
	$values=mysqli_fetch_assoc($result);
	$totaln_det3=$values['total'];

	$sql="select count(*) as total from alumni where det_4='NO'";
	$result=mysqli_query($link,$sql);
	$values=mysqli_fetch_assoc($result);
	$totaln_det4=$values['total'];

	$sql="select count(*) as total from alumni where det_5='NO'";
	$result=mysqli_query($link,$sql);
	$values=mysqli_fetch_assoc($result);
	$totaln_det5=$values['total'];

	$det1= round(($totaly_det1*100)/$total);
	$det2= round(($totaly_det2*100)/$total);
	$det3= round(($totaly_det3*100)/$total);
	$det4= round(($totaly_det4*100)/$total);
	$det5= round(($totaly_det5*100)/$total);
	//$det= 30 +'px';
?>
<!DOCTYPE html>
<html>
<head>
	<link  rel="icon" type="image/jpg" href="icon.jpg">
	<title>Alumni details</title>
	<link rel="stylesheet" type="text/css" href="dl.css">
	<!-- <link rel="stylesheet" type="text/css" href="bar.css"> -->
	<style type="text/css">
	
		.box{
            padding-top: 20px ; 
            max-width: 700px;
            float: right;
        }

		body{
				background-color: #0892d0; 
			}
		b {
			font-size: 1.2em;
		}
		.rwd-table td{
				text-align: center;
			}
	</style>
</head>
<body>
	<div id="divToPrint">
		<div  style="padding-top: 40px;padding-left: 100px ;">
			<div  style=" width: 500px;margin-top: 60px">
				<p style="font-size: 3em;" ><b>Details of Alumni in Tabular Format</b></p>
			</div>
			<div  style=" margin-right: 100px; float: right; margin-top: -250px  ">
				<table class="rwd-table" >
					<tr>
						<th>Question NO.</th>
						<th>Count of Yes</th>
						<th>Count of No</th>
						<th>Average</th>
					</tr>
					
					<tr>
						<td>1</td>
						<td><?php echo $totaly_det1; ?></td>
						<td><?php echo $totaln_det1; ?></td>
						<td><?php echo round(($totaly_det1*100)/$total)  ?></td>
					</tr>
					<tr>
						<td>2</td>
						<td><?php echo $totaly_det2; ?></td>
						<td><?php echo $totaln_det2; ?></td>
						<td><?php echo round(($totaly_det2*100)/$total)  ?></td>
					</tr>
					<tr>
						<td>3</td>
						<td><?php echo $totaly_det3; ?></td>
						<td><?php echo $totaln_det3; ?></td>
						<td><?php echo round(($totaly_det3*100)/$total)  ?></td>
					</tr>
					<tr>
						<td>4</td>
						<td><?php echo $totaly_det4; ?></td>
						<td><?php echo $totaln_det4; ?></td>
						<td><?php echo  round(($totaly_det4*100)/$total) ?></td>
					</tr>
					<tr>
						<td>5</td>
						<td><?php echo $totaly_det5; ?></td>
						<td><?php echo $totaln_det5; ?></td>
						<td><?php echo round(($totaly_det5*100)/$total)  ?></td>
					</tr>
					<tr>
						<td colspan="2">Total Alumni</td>
						<td colspan="2"><?php echo $total; ?></td>
					</tr>
				</table>
			</div>
		</div>
		<div > 
				<div style="margin-top: 30px; float: right ; padding-right: 30px" >
					<p><b><h1 style="font-size: 3rem; color: black">Total average?</h1></b></p>
					<table class="table" >
	                    <tr>
	                        <td><b>Q1</b> - Do you feel proud to be associated with SCOE as Alumni?</td>
	                    </tr>

	                    <tr>
	                        <td><b>Q2</b> - Are you willing to contribute to the development of the college?</td>
	                    </tr>
	                    <tr>
	                        <td><b>Q3</b> - Are theory and practicals inline with Industries?</td>
	                    </tr>
	                    <tr>
	                        <td><b>Q4</b> - Is the education imparted at SCOE useful and relevant in your present job?</td>
	                    </tr>
	                    <tr>
	                        <td><b>Q5</b> - Are you willing to share your knowledge and resources with SCOE students?</td>
	                    </tr>
	                </table>
				</div>
				<div  style="background-color: rgb(214,214,214); margin-top: 260px; max-width: 500px; margin-left: 40px ">
					<ul class="bar-graph" style="width: 400px">
			    	<li class="bar-graph-axis">
					    <div class="bar-graph-label">100%</div>
					    <div class="bar-graph-label">80%</div>
					    <div class="bar-graph-label">60%</div>
					    <div class="bar-graph-label">40%</div>
					    <div class="bar-graph-label">20%</div>
					    <div class="bar-graph-label">0%</div>
				    </li>
						<li class="bar_primary" style="height: <?php echo $det1  ?>%;" title="<?php echo $det1  ?>">    <!--  $t1  -->
						    <div class="percent"><?php echo $det1 ?><span>%</span></div>
						    <div class="description" style="font-size: 1.2rem ;font-weight: bold; margin-top: -5px">Q1</div>
						    <!-- <div class="description" style="margin-top: -15px;">Q1</div> -->
						</li>
						<li class="bar_secondary" style="height: <?php echo $det2 ?>%;" title="<?php echo $det2 ?>">   <!--  $t2   -->
						    <div class="percent"><?php echo $det2 ?><span>%</span></div> 
						    <div class="description" style="font-size: 1.2rem ;font-weight: bold; margin-top: -5px">Q2</div>
						    <!-- <div class="description" >Q2</div> -->
						</li>
						<li class="bar_success" style="height: <?php echo $det3 ?>%;" title="<?php echo $det3 ?>">     <!--  $t4  -->
						    <div class="percent"><?php echo $det3 ?><span>%</span></div> 
						    <div class="description" style="font-size: 1.2rem ;font-weight: bold; margin-top: -5px">Q3</div>
						    <!-- <div class="description" >Q3</div> -->
						</li>
						<li class="bar_warning" style="height: <?php echo $det4 ?>%;" title="<?php echo $det4 ?>">     <!--  $t4  -->
						    <div class="percent"><?php echo $det4 ?><span>%</span></div> 
						    <div class="description" style="font-size: 1.2rem ;font-weight: bold; margin-top: -5px">Q4</div>
						    <!-- <div class="description" >Q4</div> -->
						</li>
						<li class="bar_alert" style="height: <?php echo $det5 ?>%;" title="<?php echo $det5 ?>">     <!--  $t4  -->
						    <div class="percent"><?php echo $det5 ?><span>%</span></div> 
						    <div class="description" style="font-size: 1.2rem ;font-weight: bold; margin-top: -5px">Q5</div>
						    <!-- <div class="description" >Q5</div> -->
						</li> 
					</ul>
				</div>
		</div>
		<br>
		<br>
		<table cellspacing = 10px; style="margin-top: 20px" >
				<tr >
					<td>
						<div style="background-color: rgb(204,204,204);">
							<div>
								<h1 style="font-size: 1.4rem; padding-left: 30px; padding-top: 40px ; padding-right: 10px"><b>What aspect of college do you appreciate?</b></h1>
							</div>
							<div style="padding-top: 4px; padding-left: 20px; padding-bottom: 20px; width: 600px ; height: flex ;  display: flex; " >
								<!-- <b>Do you think more advanced software should be included in course? </b> -->
								<?php 
									$sql="select appreciation from alumni ";
									$result=mysqli_query($link,$sql);
						    		echo "<ul>";		
									while ($row=mysqli_fetch_row($result))
						    		{
						    			echo "<li>";
						    			printf($row[0]);
						    			echo "</li>";
						    		}	
								?>
								</ul>
								
							</div>
						</div>
					</td>
					<td>
						<div style="background-color: rgb(204,204,204);">
							<div>
								<h1 style="font-size: 1.4rem; padding-left: 30px; padding-top: 20px ; padding-right: 10px"><b>Suggestion for improvement in theory Lecture and practicals ?</b></h1>
							</div>
							<div style="padding-top: 4px; padding-left: 20px; padding-bottom: 20px; width: 600px ; height: flex ;  display: flex; " >
								<!-- <b>Are you satisfied with the facilities provided like teaching , regularly placement?</b> -->
								<br>
								<?php 
									$sql="select suggestion from alumni ";
									$result=mysqli_query($link,$sql);
								
								    echo "<ul>";		
									while ($row=mysqli_fetch_row($result))
						    		{
						    		echo "<li>";
						    		printf($row[0]);
						    		echo "</li>";
						    		}	
								?>
								</ul>
							</div>
						</div>
					</td>
				</tr>
			</table>
		</div>
		<div  style="float: right; margin-top: 10px; margin-bottom: 20px;">
				<input style="font-size:15pt; color:white; background-color:green; border:none; outline: none; padding:7px;" type="button" value="Print" onclick="PrintDiv();" />
		</div>
		<script type="text/javascript">     
		    function PrintDiv() {    
		    	
		       	var divToPrint = document.getElementById('divToPrint');
		       	var popupWin = window.open('', '_blank', 'width=1000,height=500');
		       	popupWin.document.open();
		       	popupWin.document.write('<html><head><link  rel="stylesheet" type="text/css" href="dl.css"><link  rel="stylesheet" type="text/css" href="bar.css"></head><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
		       	popupWin.document.close();
		    }
		 </script>
</body>
</html>