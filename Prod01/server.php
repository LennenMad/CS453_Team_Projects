<?php 
    //print_r(session_id());
    if (!session_id()) {
        //echo "No session. Making one... ";
        //$randId = rand(1,100);
        session_start();
        session_create_id();
        //print_r(session_id());
    }

    //var_dump($_SESSION); //For debugging
    //get name and value from request
    $rectName = htmlspecialchars($_GET["name"]);
    $rectVal = htmlspecialchars($_GET["value"]);
    //if data from html is for desk val check if there are too many students at desk
    if (str_contains($rectName,"rect")) {
        if ($rectVal >= 2) {
            //Check for which student desk and send alert
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
        //when the first person enters a square, enable the mask and lysol check
        else if ($rectVal == 1){
            foreach ($_SESSION['maskFlags'] as $num => $maskFlag) {
                if (str_ends_with($rectName,$num)) {
                    $_SESSION['maskFlags'][$num] = '0';
                    //print_r(" " . $num . "=>" . $maskFlag . " As session:" . $_SESSION['maskFlags'][$num] . " ");
                    //echo "Mask " . $num . " set to true.";
                    break;
                } else if (str_contains($rectName, "Instru")) {
                    $_SESSION['maskFlags']["I"] = '0';
                }
            }
            foreach ($_SESSION['lysolFlags'] as $num => $lysolFlag) {
                if (str_ends_with($rectName,$num)) {
                    $_SESSION['lysolFlags'][$num] = '0';
                    //echo " " . $num . "=>" . $lysolFlag . " " . $_SESSION['lysolFlags'][$num] . " ";
                    //echo "Lysol " . $num . " set to true.";
                    break;
                } else if (str_contains($rectName, "Instru")) {
                    $_SESSION['lysolFlags']["I"] = '0';
                }
            }
        }
        
        exit;
    }
    //perform a mask check if the value sent is check, otherwise set the mask val to 1
    if (str_contains($rectName,"Mask")) {
        //Check if all students have masks
        if (str_contains($rectVal,"check")) {
            foreach ($_SESSION['maskFlags'] as $num => $maskFlag) {
                if ($maskFlag != '2') {
                    if ($maskFlag != '1') {
                        //print_r(" " . $num . "=>" . $maskFlag . " " . $_SESSION['maskFlags'][$num] . " ");
                        if ($num == "I") {
                            echo "alert('Instructor is not properly wearing a mask!')";
                        } else if ($num == "Q") {
                            echo "alert('Question Square is not properly wearing a mask!')";
                        } else {
                            echo "alert('Desk " . $num . " is not properly wearing a mask!')";
                        }
                        exit;
                    }
                }
            }
            exit;
        } else {
            foreach ($_SESSION['maskFlags'] as $num => $maskFlag) {
                if ($rectVal == $num) {
                    $_SESSION['maskFlags'][$num] = '1';
                    //print_r(" " . $num . "=>" . $maskFlag . " As session:" . $_SESSION['maskFlags'][$num] . " ");
                    //echo "Mask " . $num . " set to true.";
                    break;
                }
            }
            //session_commit();
            //exit;
        }
    }
    //erform a lysol check if the value sent is check, otherwise set the lysol val to 1
    if (str_contains($rectName,"Lysol")) {
        //Check if all students have used the lysol
        if (str_contains($rectVal,"check")) {
            foreach ($_SESSION['lysolFlags'] as $num => $lysolFlag) {
                if ($lysolFlag != '2') {
                    if ($lysolFlag != '1') {
                        if ($num == "I") {
                            echo "alert('Instructor has not used their Lysol!')";
                        }  else {
                            echo "alert('Desk " . $num . " has not used their Lysol!')";
                        }
                        exit;
                    }
                }
            }
            exit;
        } else {
            foreach ($_SESSION['lysolFlags'] as $num => $lysolFlag) {
                if ($rectVal == $num) {
                    $_SESSION['lysolFlags'][$num] = '1';
                    //echo " " . $num . "=>" . $lysolFlag . " " . $_SESSION['lysolFlags'][$num] . " ";
                    //echo "Lysol " . $num . " set to true.";
                    break;
                }
            }
        }
    }
    session_commit();
    exit;

    //echo "" . htmlspecialchars($_GET["value"]);
    
    //echo "<p>Students at entrance: " . htmlspecialchars($_POST["entranceVal"]) . "</p>";
    
?>
