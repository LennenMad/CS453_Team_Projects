<?php 
    $rectVal = htmlspecialchars($_GET["rect"]);
    if ($rectVal >= 2) {
        echo "<script>alert('Too many students at entrance!');</script>";
        exit;
    }

    echo "Sent val: " . htmlspecialchars($_GET["rect"]);
    
    //echo "<p>Students at entrance: " . htmlspecialchars($_POST["entranceVal"]) . "</p>";
    
?>
