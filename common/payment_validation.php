<?php
    $credit = $expiry = $cvc = "";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $credit = $_POST['credit_num'];
        $expiry = $_POST['expiry'];
        $cvc = $_POST['cvc'];
    }
?>