<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
define ('DB_HOST','localhost');
define('DB_USER', 'root');
define('DB_PASSWORD','');
define('DB_NAME', 'users');


$conn = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD) or die("Failed to connect to MySQL : ". mysql_error());
$db = mysql_select_db(DB_NAME, $conn) or die("Failed to connect to DATABASE : ".  mysql_errno());