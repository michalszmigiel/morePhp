<?php
$db_connection = mysqli_connect('localhost','root','','pizza_db');
if(!$db_connection)
{
    echo "Connection error: " .mysqli_connect_error();
}

$sql = "select title, ingredients, id from pizzas";

$result = mysqli_query($db_connection, $sql);

$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);

mysqli_close($db_connection);

;?>

<?php
require 'templates/header.php'; ?>




<?php
require 'templates/footer.php'; ?>