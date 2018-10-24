<table border=3px>
	
<?php

	$compteur =0;
	foreach ($resultats[0] as $key => $value)
		if (gettype($key) == 'string')
			$compteur++;
	echo "<tr bgcolor='grey'><th colspan=".$compteur."><center>".$table."</center></th></tr>";
	echo "<tr bgcolor='grey'>";

	foreach ($resultats[0] as $key => $value)
		if (gettype($key) == 'string')
			echo'<th >'. $key.'</th>';

	echo '</tr>';

	for ($i=0 ; $i < count($resultats); $i ++)
	{
		echo '<tr>';
	  	foreach ($resultats[$i] as $key => $value)
	  	{	
	  		//var_dump($resultats[$i]);
	  		
	  		if (gettype($key) == 'integer' && $key % 2 == 0 )
	  					$color='grey';
	  			else 	$color='white';
	  		
			if (gettype($key) == 'string')
				echo"<td bgcolor='".$color."'>". $value.'</td>';
			
		}
			
		echo '<tr>';
	}
?>

</table>