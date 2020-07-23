<?php

$host = "db";
$user = "proposta";
$senha = "q1w2e3r4";
$banco = "proposta";

$conn = mysqli_connect($host, $user, $senha);
var_dump(mysqli_select_db($conn, $banco));