<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>main</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
		.a {
    		word-spacing: 10px;
		}

		.b {
    		word-spacing: 187px;
		}
	</style>
</head>
<body>
	<form action="/main.php" method="POST">
		<label for="input">Masukkan input: </label>
		<input name="input" type="text"></input>
		<input type="submit" value="submit"></input>
	</form>
</body>
</html>

<?php

	define("TILES", '@');

	function isDeretAritmatika($i, $a, $b) {

    	$value = $i-$a;
    	return ($value%$b==0) && ($value>=0);
	}

	function isDoor($i, $j, $n) {
    	return (isDeretAritmatika($i, 0, 4) && $i%2==0 && $j==1) 
            	|| (isDeretAritmatika($i, 2, 4) && $i%2==0 && $j==$n-2);
	}

	function isFloor($i, $j, $n) {
    	return ($i%2==1 && $j>=1 && $j<$n-1);
	}

	function isNotWall($i, $j, $n) {
    	return (isDoor($i,$j,$n) || isFloor($i,$j,$n));
	}

	function spacing($counter) {

		for ($i = 1; $i <= $counter; $i++) {
			echo "&nbsp";
		}

	}

	if (isset($_POST['input'])) {

		$n = $_POST['input'];
		$tile = TILES;

		echo "<p>";

		for ($i = 0; $i < $n; $i++) {

			if ($i % 2 == 0) {
				for($j = 0; $j < $n; $j++) {
					if (isDoor($i,$j,$n)) {
						echo "<span class='a'>&nbsp</span>";
					} else {
						echo TILES;
					}
				}
			} else {
				echo TILES;
				echo "<span class='b'>&nbsp</span>";
				echo TILES;
			}
			
			echo "<br>";
		}

		echo "</p>";
	}
	
?>