<?php 
    $studentRects = $_POST["rects"];
    foreach ($studentRects as $studentRect) {
        echo "<p>" . htmlspecialchars($studentRect) . "</p>";
        if ($studentRect >= 2 ) {
            echo "<script>alert(\"Too many students at desk!\")</script>";
        }
    }
    //echo "<p>Students at entrance: " . htmlspecialchars($_POST["entranceVal"]) . "</p>";
    
?>
