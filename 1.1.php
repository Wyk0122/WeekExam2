<table align="center">
<?php 
//杨辉三角
$len = 11;
$arr = array();
for ($i=1; $i < $len; $i++) { 
	echo "<tr>";
	for ($j=1; $j <=$i ; $j++) { 
		if($j==0||$i==$j){
			$arr[$i][$j]=1;
		}else{		
			@$arr[$i][$j] = $arr[$i-1][$j]+$arr[$i-1][$j-1];
		}
		echo "<td>";
        echo $arr[$i][$j];
	}
	echo "<br>";
}
 ?>
 </table>