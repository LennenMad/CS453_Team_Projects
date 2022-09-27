<?php
    echo "No session. Making one... ";
    //$randId = rand(1,100);
    // create new session and id
    session_start();
    session_create_id();
    print_r(session_id());
    //set session variables
    $_SESSION['maskFlags'] = array(
        "1" => '2',
        "2" => '2',
        "3" => '2',
        "4" => '2',
        "5" => '2',
        "Q" => '2',
        "I" => '2',
    );
    $_SESSION['lysolFlags'] = array(
        "1" => '2',
        "2" => '2',
        "3" => '2',
        "4" => '2',
        "5" => '2',
        "I" => '2',
    );
?>
<!DOCTYPE html>
<html>
<head>
    <title>Redirecting...</title>
    <!-- This will redirect to desired page on load. -->
    <meta http-equiv="refresh" content="1; URL=classroom_table.html" />
</head>
</html>
