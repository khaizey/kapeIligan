<?php		
	include("connect.php");
	
	if(isset($_POST['proc_date'])) {
		$new_date =$_POST['proc_date'];
		$new_coffee =$_POST['proc_coffee'];
		$new_in =$_POST['proc_IN'];
		$new_out =$_POST['proc_OUT'];
			
		$conn->query("INSERT INTO production(rawInvent, volumeInput, volumeOut, productDate) 
				VALUES('$new_coffee', '$new_in', '$new_out', '$new_date')");
	}	
?>
<!DOCTYPE html>
<html>
<head> 
<style>
	*{ padding:0; margin:0; }
	.production_div1{ width:10%; float:left;}
	#new_prod_form { padding:2%;}
	#new_prod_form button{ width:30.5%; padding:2% 1%;}
	table { border:1px solid white; width:80%;}
	table td { border:1px solid black; padding:5px; width:15%; height:15px;}
	input { padding:2px; width:96%; }
	select { padding:2px; width:98%; }
</style>
<script>
</script>		
</head>
<body>
<div id="new_prod_form">	
  <a href="/index.php"> Home </a> </br></br>
  <?php
	$arabica_total = 0;			
	$robusta_total = 0;
		$q_wh_total = "SELECT * FROM rawinvent";	//----- Compute Bean(raw) TOTAL Quantity
		$res_wh_total = $conn->query($q_wh_total);
	
	while ($row_wh_total = $res_wh_total->fetch_assoc()) {
		if($row_wh_total['beansId']==1){ 	
			$robusta_total += $row_wh_total['volAmount'];
		}
			else {	$arabica_total += $row_wh_total['volAmount'];
			}
	}	  
	
	echo 'Robusta: '.$robusta_total.'</br>'.'Arabica: '.$arabica_total.'</br>';
  ?> 
  
  <table>
	<tr> <th> Date </th> <th> Coffee Source</th> <th> Raw Beans(g) </th> <th> OUT (Roasted Beans)</th> </tr>
	<tr>
	<form method="post" action="#">
		<td> <input type="text" name="proc_date" value="<?php echo date("Y/m/d"); ?>"/>	</td>			
		<td> 
		<select name="proc_coffee">			
		  <?php																//----- Compute Bean(raw) TOTAL Quantity
			$q_rob_wh = "SELECT * FROM rawinvent WHERE beansId='1' ORDER BY rawInvent DESC LIMIT 1";	
			$res_rob_wh = $conn->query($q_rob_wh);
				while ($row_rob_wh = $res_rob_wh->fetch_assoc()) {
					echo '<option value="'.$row_rob_wh['rawInvent'].'">'.'Robusta'.'</option>';
				}
			$q_arab_wh = "SELECT * FROM rawinvent WHERE beansId='2' ORDER BY rawInvent DESC LIMIT 1";	
			$res_arab_wh = $conn->query($q_arab_wh);
				while ($row_arab_wh = $res_arab_wh->fetch_assoc()) {
					echo '<option value="'.$row_arab_wh['rawInvent'].'">'.'Arabica'.'</option>';
				}
		  ?>
		</select>
		</td>	
		<td> <input type="text" name="proc_IN" value=""/> </td>
		<td> <input type="text" name="proc_OUT" value=""/> </td>
		<td style="border:none;"> <input type="submit" value="ADD" /> </td>
    </form>
	</tr>
	<?php
		$q_production = "SELECT * FROM production ORDER BY productDate DESC";	//----- Display Production History
		$res_production = $conn->query($q_production);
		while ($row_production = $res_production->fetch_assoc()) {
			$coffee_id = $row_production['rawInvent'];
			$q_coffee = "SELECT * FROM rawinvent WHERE rawInvent='$coffee_id'";	
				$res_coffee = $conn->query($q_coffee);
			
			while ($row_coffee = $res_coffee->fetch_assoc()) {
				if($row_coffee['beansId']==1){ $coffee_s = 'Robusta';
				}
					else{ $coffee_s = 'Arabica'; }
			}
			echo '<tr>';
				echo '<td>'.$row_production['productDate'].'</td>';			
				echo '<td>'.$coffee_s.'</td>';
				echo '<td>'.$row_production['volumeInput'].'</td>';
				echo '<td>'.$row_production['volumeOut'].'</td>';			
			echo '</tr>';
		}
	?>
  </table>
</div>








</body>
</html>