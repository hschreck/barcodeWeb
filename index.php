<!DOCTYPE html>
<html>
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <title>PrintER2</title>
    <base target="_parent">
    <link href="/apple-icon-57x57.png" rel="apple-touch-icon" sizes="57x57">
    <link href="/apple-icon-60x60.png" rel="apple-touch-icon" sizes="60x60">
    <link href="/apple-icon-72x72.png" rel="apple-touch-icon" sizes="72x72">
    <link href="/apple-icon-76x76.png" rel="apple-touch-icon" sizes="76x76">
    <link href="/apple-icon-114x114.png" rel="apple-touch-icon" sizes=
    "114x114">
    <link href="/apple-icon-120x120.png" rel="apple-touch-icon" sizes=
    "120x120">
    <link href="/apple-icon-144x144.png" rel="apple-touch-icon" sizes=
    "144x144">
    <link href="/apple-icon-152x152.png" rel="apple-touch-icon" sizes=
    "152x152">
    <link href="/apple-icon-180x180.png" rel="apple-touch-icon" sizes=
    "180x180">
    <link href="/android-icon-192x192.png" rel="icon" sizes="192x192" type=
    "image/png">
    <link href="/favicon-32x32.png" rel="icon" sizes="32x32" type="image/png">
    <link href="/favicon-96x96.png" rel="icon" sizes="96x96" type="image/png">
    <link href="/favicon-16x16.png" rel="icon" sizes="16x16" type="image/png">
    <link href="/manifest.json" rel="manifest">
    <meta content="#ffffff" name="msapplication-TileColor">
    <meta content="/ms-icon-144x144.png" name="msapplication-TileImage">
    <meta content="#ffffff" name="theme-color">
    <link href="harold.css" rel="stylesheet" type="text/css">
    <script charset="utf-8" type="text/javascript">
        window.onload = function() {
            ((window.devicePixelRatio > 1)? document.body.className = "hidpi" : null);
        }
    </script>
</head>
<body>
    <div id="page">
        <img src="logo.png">
		<?php if(isset($_GET["success"])){
			if($_GET["success"] == "true"){
				echo("<h2 class='success'>Success!</h2>");
			}else{
				echo("<h2 class='fail'>Error: did not print successfully</h2>");
			}
		
		}?>
        <div id="main">
            <div id="top">
     
                <form action="printr.php" method="post">
                    <p>SKU: <input name="sku" placeholder="DE6530BWA3520AZ3"
                    type="text"></p>
                    <p>Quantity: <input name="quantity" type="text" value=
                    "1"></p>
                    <p>Printer: <select name="printer">
                
                       <?php if(isset($_COOKIE["printer"]) && $_COOKIE["printer"] == "Stage1"){?>
                       
                        <option selected value="Stage1">
                            Stage 1
                        </option>
                        
                          <option value="Sales">
                            Sales
                        </option>
                         <?php } else { ?>
                          
                    <option selected value="Stage1">
                            Stage 1
                        </option>
                        <option selected value="Sales">
                            Sales
                        </option>
                        <?php } ?>
                      
                    </select></p>
                    <input type="submit" value="Print">
                </form>
              
                
            </div>
        </div>
    </div>
</body>
</html>