<?php 
    $maskFlags = array(
        "I" => false,
        "1" => false,
        "2" => false,
        "3" => false,
        "4" => false,
        "5" => false,
        "Q" => false,
    );
    $lysolFlags = array(
        "I" => false,
        "1" => false,
        "2" => false,
        "3" => false,
        "4" => false,
        "5" => false,
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
    } else if (str_contains($rectName,"mask")) {
        //Check if all students have masks
        if (str_contains($rectVal,"check")) {
            foreach ($maskFlags as $num => $maskFlag) {
                if (!$maskFlag) {
                    echo "Desk " . $num . " is not properly wearing a mask!";
                    exit;
                }
            }
        }
        foreach ($maskFlags as $num => $maskFlag) {
            if ($rectVal == $num) {
                $maskFlag = true;
            }
        }
    } else if (str_contains($rectName,"lysol")) {
        //Check if all students have used the lysol
        if (str_contains($rectVal,"check")) {
            foreach ($lysolFlags as $num => $lysolFlag) {
                if (!$lysolFlag) {
                    echo "Desk " . $num . " has not used their lysol!";
                    exit;
                }
            }
        }
        foreach ($lysolFlags as $num => $lysolFlag) {
            if ($rectVal == $num) {
                $lysolFlag = true;
            }
        }
    }

    //echo "" . htmlspecialchars($_GET["value"]);
    
    //echo "<p>Students at entrance: " . htmlspecialchars($_POST["entranceVal"]) . "</p>";
    
?>
