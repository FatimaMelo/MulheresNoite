<?php
    session_start();
    ob_start();

    unset ($_SESSION['nome']);

    $_SESSION['msg'] = "Sessão Finalizada!";

    header("Location: login.php");


?>