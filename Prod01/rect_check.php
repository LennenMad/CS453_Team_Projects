<?php 
    echo "Sent val: " . htmlspecialchars($_GET["rect"]);

    $rectVal = htmlspecialchars($_GET["rect"]);
    if ($rectVal >= 2) {
        echo "<script>alert(\"Too many students at desk!\")</script>";
    }
    
    //echo "<p>Students at entrance: " . htmlspecialchars($_POST["entranceVal"]) . "</p>";
    
?>
