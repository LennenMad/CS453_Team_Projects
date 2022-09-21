<?php 
    $studentRects = htmlspecialchars($_POST["rects"]);
    echo "<p>" . $studentRects . "</p>";
    foreach ($studentRects as $studentRect) {
        echo "<p>" . $studentRect . "</p>";
        /*if ($studentRect <= 2 ) {
            echo "Too many students in rect!";
        }*/
    }
    echo "<p>Students at entrance: " . htmlspecialchars($_POST["entranceVal"]) . "</p>";
    
?>
