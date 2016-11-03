<?php
if ($_POST["sku"] || $_POST["printer"] || $_POST["quantity"]) {
    $quantity = 1;
    if (isset($_POST["quantity"])) {
        $quantity = $_POST["quantity"];
    }
    
    $sku     = $_POST["sku"];
    $sku     = preg_replace('/\s+/', '', $sku);
    $sku = substr($sku,0,19);
    $printer = $_POST["printer"];
    $referrer = $_SERVER['HTTP_REFERER'];
    $referrer = str_replace('?success=true', '', $referrer);
    $referrer = str_replace('?success=false', '', $referrer);
      $referrer = str_replace('&printer=false', '', $referrer);
    setcookie('printer', $_POST["printer"]);
    if ($sku != "") {
        $output = shell_exec('barcode -e 128 -b "' .  escapeshellcmd($sku) . '" -u in -p "1.45x1" -g 1.75x1 | lpr -P ' . escapeshellcmd($printer) . ' -# ' . escapeshellcmd($quantity) .' 2>&1' );
//        echo ('echo " barcode -e 128 -b "' . $sku . '" -u in -p "2x1" -g 1.7x1" | lpr -P ' . $printer . ' -# ' . $quantity);
			echo $output;
			if(strpos($output, "does not exist")  !== false){
			       header("location: " . $referrer . "?success=false&printer=false");
			}else{
			       header("location: " . $referrer . "?success=true");
			      }
			      echo "error";
 
    } else {
        header("location: " . $referrer . "?success=false");
    }
    
}
?>