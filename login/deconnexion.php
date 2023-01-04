<?php
session_start();

$_SESSION['username'] = "";

echo "<script>alert('Deonnexion réussi');
    window.location.href='../index.php';
    </script>";

?>