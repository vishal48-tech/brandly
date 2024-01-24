<?php
$conn = mysqli_connect('localhost', 'root', '', 'brandly');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>