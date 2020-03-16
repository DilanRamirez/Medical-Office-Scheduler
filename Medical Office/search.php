<?php
    session_start();
    error_reporting(0);
    
    $name = $_SESSION["fullname"][$_POST["pos1"]];
    $new = $_SESSION["new"][$_POST["pos1"]];
    $address = $_SESSION["address"][$_POST["pos1"]];
    $start = $_SESSION["startTime"][$_POST["pos1"]];
    $end = $_SESSION["endTime"][$_POST["pos1"]];
    $coord1 = $_SESSION["coord2"][$_POST["pos1"]];
    $comments = $_SESSION["comments"][$_POST["pos1"]];
    

    

    
    $_SESSION["fullname"][$_POST["pos1"]] = $_SESSION["fullname"][$_POST["pos2"]];
    $_SESSION["fullname"][$_POST["pos2"]] = $name;

    $_SESSION["new"][$_POST["pos1"]] = $_SESSION["new"][$_POST["pos2"]];
    $_SESSION["new"][$_POST["pos2"]] = $new;

    $_SESSION["address"][$_POST["pos1"]] = $_SESSION["address"][$_POST["pos2"]];
    $_SESSION["address"][$_POST["pos2"]] = $address;

    $_SESSION["start"][$_POST["pos1"]] = $_SESSION["start"][$_POST["pos2"]];
    $_SESSION["start"][$_POST["pos2"]] = $start;

    $_SESSION["end"][$_POST["pos1"]] = $_SESSION["end"][$_POST["pos2"]];
    $_SESSION["end"][$_POST["pos2"]] = $end;

    $_SESSION["coord2"][$_POST["pos1"]] = $_SESSION["coord2"][$_POST["pos2"]];
    $_SESSION["coord2"][$_POST["pos2"]] = $coord1;

    $_SESSION["comments"][$_POST["pos1"]] = $_SESSION["comments"][$_POST["pos2"]];
    $_SESSION["comments"][$_POST["pos2"]] = $comments;
    
?>
<html>
    <center><h1>
        Patient Changed.
        <h2>
            <?php echo 'Patient: '.$name.' with appointment at '.$start.' - '.$end.' was changed from position '.$_POST["pos1"].' to position '. $_POST["pos2"]. ' in the table.';?>
        </h2>
    </h1></center>
    <br>
    <br>
    <br>
    <form action="index.php" method="post">
        <button>Return Add Patient Site.</button>
    </form>
</html>