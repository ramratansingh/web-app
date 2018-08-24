<?php
$connection  = new PDO('mysql:host=localhost;dbname=Web-App;charset=utf8mb4', 'root', '');
$connection ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$connection ->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);