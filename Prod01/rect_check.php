<?php 
    $rectVal = htmlspecialchars($_GET["rect"]);
    if ($rectVal >= 2) {
        echo "alert('Too many students at desk!');";
        file_put_contents('./log_'.date("j.n.Y").'.txt', "Too many students at desk!", FILE_APPEND);
        exit;
    }

    echo "Sent val: " . htmlspecialchars($_GET["rect"]);
    
    //echo "<p>Students at entrance: " . htmlspecialchars($_POST["entranceVal"]) . "</p>";
    
?>
