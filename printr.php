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
    setcookie('printer', $_POST["printer"]);
    if ($sku != "") {
        $output = var_dump(shell_exec('barcode -e 128 -b "' . $sku . '" -u in -p "1.45x1" -g 1.75x1 | lpr -P ' . $printer . ' -# ' . $quantity));
        echo ('echo " barcode -e 128 -b "' . $sku . '" -u in -p "2x1" -g 1.7x1" | lpr -P ' . $printer . ' -# ' . $quantity);
        header("location: " . $referrer . "?success=true");
    } else {
        header("location: " . $referrer . "?success=false");
    }
    
}
echo "how'd you get here little one?";
?>