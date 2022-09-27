<?php
    echo "No session. Making one... ";
    //$randId = rand(1,100);
    session_start();
    session_create_id();
    print_r(session_id());
    $_SESSION['maskFlags'] = array(
        "1" => '0',
        "2" => '0',
        "3" => '0',
        "4" => '0',
        "5" => '0',
        "Q" => '0',
        "I" => '0',
    );
    $_SESSION['lysolFlags'] = array(
        "1" => '0',
        "2" => '0',
        "3" => '0',
        "4" => '0',
        "5" => '0',
        "I" => '0',
    );
?>
<!DOCTYPE html>
<html>
<head>
    <title>Redirecting...</title>
    <meta http-equiv="refresh" content="5; URL=classroom_table.html" />
</head>
</html>