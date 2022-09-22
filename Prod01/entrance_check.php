<?php 
    echo "Sent val: " . htmlspecialchars($_GET["rect"]);

    $rectVal = htmlspecialchars($_GET["rect"]);
    if ($rectVal >= 6) {
        echo "alert('Too many students at entrance!');";
    }
    
    //echo "<p>Students at entrance: " . htmlspecialchars($_POST["entranceVal"]) . "</p>";
    
?>
