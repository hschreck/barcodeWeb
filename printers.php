<?php header('Access-Control-Allow-Origin: *');


$lines = file('printers.txt');

		// Loop through our array, show HTML source as HTML source; and line numbers too.
		foreach ($lines as $line_num => $line) {
		
			echo $line;
			

		}
 ?>