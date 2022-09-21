<?php 
    $rectNums = array("1","2","3","4","5","Q");
    foreach ($rectNums as $rectNum) {
        $rectName = "rect" . $rectNum;
        $rectVal = htmlspecialchars($_POST[$rectName]);
        echo "<p>" . htmlspecialchars($_POST[$rectName]) . "</p>";
        if ($rectVal >= 2) {
            echo "<script>alert(\"Too many students at desk!\")</script>";
        }
    }
    //echo "<p>Students at entrance: " . htmlspecialchars($_POST["entranceVal"]) . "</p>";
    
?>
