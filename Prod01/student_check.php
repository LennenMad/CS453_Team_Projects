<?php 
    echo "Sent val: " . htmlspecialchars($_POST["rect"]);

    $rectVal = htmlspecialchars($_POST["rect"]);
    if ($rectVal >= 2) {
        echo "<script>alert(\"Too many students at desk!\")</script>";
    }
    
    //echo "<p>Students at entrance: " . htmlspecialchars($_POST["entranceVal"]) . "</p>";
    
?>
