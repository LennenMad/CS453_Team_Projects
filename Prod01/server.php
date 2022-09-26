<?php 
    $maskFlags = array(
        "1" => false,
        "2" => false,
        "3" => false,
        "4" => false,
        "5" => false,
        "Q" => false,
        "I" => false,
    );
    $lysolFlags = array(
        "1" => false,
        "2" => false,
        "3" => false,
        "4" => false,
        "5" => false,
        "I" => false,
    );
    
    $rectName = htmlspecialchars($_GET["name"]);
    $rectVal = htmlspecialchars($_GET["value"]);
    if (str_contains($rectName,"rect")) {
        if ($rectVal >= 2) {
            //Check for which student desk
            if (str_ends_with($rectName,"1")) {
                echo "alert('Only one student should be at Dest 1!')";
            } else if (str_ends_with($rectName,"2")) {
                echo "alert('Only one student should be at Dest 2!')";
            } else if (str_ends_with($rectName,"3")) {
                echo "alert('Only one student should be at Dest 3!')";
            } else if (str_ends_with($rectName,"4")) {
                echo "alert('Only one student should be at Dest 4!')";
            } else if (str_ends_with($rectName,"5")) {
                echo "alert('Only one student should be at Dest 5!')";
            } else if (str_ends_with($rectName,"Q")) {
                echo "alert('Only one student should be in the Question Rectangle!')";
            } else {
                echo "alert('Only the Instructor should be up front!')";
            }
        }
        exit;
    } else if (str_contains($rectName,"Mask")) {
        //Check if all students have masks
        if (str_contains($rectVal,"check")) {
            foreach ($maskFlags as $num => $maskFlag) {
                if (!$maskFlags[$num]) {
                    echo $maskFlag;
                    echo $maskFlags[$num];
                    if ($num = "I") {
                        echo "<p>Instructor is not properly wearing a mask!<br></p>";
                    } else if ($num = "Q") {
                        echo "<p>Question Square is not properly wearing a mask!<br></p>";
                    } else {
                        echo "<p>Desk " . $num . " is not properly wearing a mask!<br></p>";
                    }
                    //exit;
                }
            }
            exit;
        }
        foreach ($maskFlags as $num => $maskFlag) {
            if ($rectVal == $num) {
                echo $maskFlag;
                echo $maskFlags[$num];
                $maskFlags[$num] = true;
                echo "<p>Mask " . $num . " set to true.<br></p>";
            }
        }
        exit;
    } else if (str_contains($rectName,"Lysol")) {
        //Check if all students have used the lysol
        if (str_contains($rectVal,"check")) {
            foreach ($lysolFlags as $num => $lysolFlag) {
                if (!$lysolFlags[$num]) {
                    if ($num = "I") {
                        echo "Instructor has not used their Lysol!<br>";
                    }  else {
                        echo "Desk " . $num . " has not used their Lysol!<br>";
                    }
                    //exit;
                }
            }
            exit;
        }
        foreach ($lysolFlags as $num => $lysolFlag) {
            if ($rectVal == $num) {
                $lysolFlags[$num] = true;
                echo "Lysol " . $num . " set to true.<br>";
            }
        }
        exit;
    }

    //echo "" . htmlspecialchars($_GET["value"]);
    
    //echo "<p>Students at entrance: " . htmlspecialchars($_POST["entranceVal"]) . "</p>";
    
?>
