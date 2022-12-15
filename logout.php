<?php
include("components/navbar.php");
// Session gaat kapot waardoor je bent uitgelogt bent
session_destroy();
header("location: login.php");