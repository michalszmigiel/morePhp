<?php

$db_connection = mysqli_connect('localhost','root','','pizza_db');
if(!$db_connection)
{
    echo "Connection error: " .mysqli_connect_error();
}