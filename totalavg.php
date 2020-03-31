<?php 
require_once "config.php";

	$sql="select count(*) as total from PE";
	$result=mysqli_query($link,$sql);
	$values=mysqli_fetch_assoc($result);
	$total=round($values['total']);
	
	$sql="select avg(pe_1) as avg from PE ";
	$result=mysqli_query($link,$sql);
	$values=mysqli_fetch_assoc($result);
	$avg_1=round($values['avg']);

	$sql="select avg(pe_2) as avg from PE ";
	$result=mysqli_query($link,$sql);
	$values=mysqli_fetch_assoc($result);
	$avg_2=round($values['avg']);

	$sql="select avg(pe_4) as avg from PE ";
	$result=mysqli_query($link,$sql);
	$values=mysqli_fetch_assoc($result);
	$avg_4=round($values['avg']);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Total Average</title>
	<link  rel="icon" type="image/jpg" href="icon.jpg">
	<link  rel="stylesheet" type="text/css" href="bar.css">
</head>
<body>
	<div >
			<div style="margin-left: 150px; margin-top: 90px; box-shadow: 0px 0px 0px #eee; ">
				<p><b><h1 style="font-size: 1.3rem;"><a href="totalavg.php">Average of marks scored in Question 1,2&3</a></h1></b></p>
			</div>
			<div style="background-color: rgb(214,214,214); height: flex; width: 400px; margin-top: 50px; margin-bottom: 20px ; margin-left: 90px ">
				<ul class="bar-graph">
		    	<li class="bar-graph-axis">
				    <div class="bar-graph-label">100%</div>
				    <div class="bar-graph-label">80%</div>
				    <div class="bar-graph-label">60%</div>
				    <div class="bar-graph-label">40%</div>
				    <div class="bar-graph-label">20%</div>
				    <div class="bar-graph-label">0%</div>
			    </li>
					<li class="bar_primary" style="height: <?php echo round($avg_1*100/$total)  ?>%;" title="<?php echo round($avg_1*100/$total)  ?>">    <!--  $t1  -->
					    <div class="percent"><?php echo round($avg_1*100/$total) ?><span>%</span></div>
					    <!-- <div class="description" style="margin-top: -15px;">Not Required</div> -->
					</li>
					<li class="bar_secondary" style="height: <?php echo round($avg_2*100/$total) ?>%;" title="<?php echo round($avg_2*100/$total) ?>">   <!--  $t2   -->
					    <div class="percent"><?php echo round($avg_2*100/$total) ?><span>%</span></div> 
					    <!-- <div class="description" >Required</div> -->
					</li>
					<li class="bar_success" style="height: <?php echo round($avg_4*100/$total) ?>%;" title="<?php echo round($avg_4*100/$total) ?>">     <!--  $t4  -->
					    <div class="percent"><?php echo round($avg_4*100/$total) ?><span>%</span></div> 
					    <!-- <div class="description" >Essential</div> -->
					</li> 
				</ul>
			</div>
		</div>
</body>
</html>