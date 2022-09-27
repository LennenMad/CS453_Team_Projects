<?php 
    /*
    $maskFlags = array(
        "1" => 0,
        "2" => 0,
        "3" => 0,
        "4" => 0,
        "5" => 0,
        "Q" => 0,
        "I" => 0,
    );
    $lysolFlags = array(
        "1" => 0,
        "2" => 0,
        "3" => 0,
        "4" => 0,
        "5" => 0,
        "I" => 0,
    );
    */

    if (!session_id()) {
        echo "No session. Making one... ";
        session_start();
        $_SESSION['maskFlags'] = array(
            "1" => 0,
            "2" => 0,
            "3" => 0,
            "4" => 0,
            "5" => 0,
            "Q" => 0,
            "I" => 0,
        );
        $_SESSION['lysolFlags'] = array(
            "1" => 0,
            "2" => 0,
            "3" => 0,
            "4" => 0,
            "5" => 0,
            "I" => 0,
        );
    }
    /*
    if (!isset($_SESSION['maskFlags'])) {
        $_SESSION['maskFlags'] = array(
            "1" => 0,
            "2" => 0,
            "3" => 0,
            "4" => 0,
            "5" => 0,
            "Q" => 0,
            "I" => 0,
        );
    }
    if (!isset($_SESSION['lysolFlags'])) {
        $_SESSION['lysolFlags'] = array(
            "1" => 0,
            "2" => 0,
            "3" => 0,
            "4" => 0,
            "5" => 0,
            "I" => 0,
        );
    }
    */

    var_dump($_SESSION); //For debugging
    
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
            foreach ($_SESSION['maskFlags'] as $num => $maskFlag) {
                if ($maskFlag != 1) {
                    print_r(" " . $num . "=>" . $maskFlag . " " . $_SESSION['maskFlags'][$num] . " ");
                    if ($num == "I") {
                        echo "Instructor is not properly wearing a mask!";
                    } else if ($num == "Q") {
                        echo "Question Square is not properly wearing a mask!";
                    } else {
                        echo "Desk " . $num . " is not properly wearing a mask!";
                    }
                    //exit;
                }
            }
            exit;
        } else {
            foreach ($_SESSION['maskFlags'] as $num => $maskFlag) {
                if ($rectVal == $num) {
                    $_SESSION['maskFlags'][$num] = 1;
                    print_r(" " . $num . "=>" . $maskFlag . " As session:" . $_SESSION['maskFlags'][$num] . " ");
                    echo "Mask " . $num . " set to true.";
                    break;
                }
            }
            exit;
        }
    } else if (str_contains($rectName,"Lysol")) {
        //Check if all students have used the lysol
        if (str_contains($rectVal,"check")) {
            foreach ($_SESSION['lysolFlags'] as $num => $lysolFlag) {
                if ($lysolFlag != 1) {
                    if ($num == "I") {
                        echo "Instructor has not used their Lysol!";
                    }  else {
                        echo "Desk " . $num . " has not used their Lysol!";
                    }
                    //exit;
                }
            }
            exit;
        } else {
            foreach ($_SESSION['lysolFlags'] as $num => $lysolFlag) {
                if ($rectVal == $num) {
                    $_SESSION['lysolFlags'][$num] = 1;
                    echo " " . $num . "=>" . $lysolFlag . " " . $_SESSION['lysolFlags'][$num] . " ";
                    echo "Lysol " . $num . " set to true.";
                    break;
                }
            }
            exit;
        }
    }

    //echo "" . htmlspecialchars($_GET["value"]);
    
    //echo "<p>Students at entrance: " . htmlspecialchars($_POST["entranceVal"]) . "</p>";
    
?>
