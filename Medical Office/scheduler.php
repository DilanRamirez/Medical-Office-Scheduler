<?php
    session_start();
    $key = array_search($_POST["delete"], $_SESSION["fullname"]);
    unset($_SESSION["startTime"][$key]);
    unset($_SESSION["endTime"][$key]);
    unset($_SESSION["address"][$key]);
    unset($_SESSION["fullname"][$key]);
    unset($_SESSION["new"][$key]);
    unset($_SESSION["startTime"][$key]);
    unset($_SESSION["comments"][$key]);
    unset($_SESSION["coord1"][$key]);
?>
<html>
    <h1>
        Patient deleted.
    </h1>
    <br>
    <br>
    <br>
    <form action="index.php" method="post">
        <button>Return Add Patient Site.</button>
    </form>
</html>