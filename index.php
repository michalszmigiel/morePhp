<?php
$db_connection = mysqli_connect('localhost','root','','pizza_db');
if(!$db_connection)
{
    echo "Connection error: " .mysqli_connect_error();
}

$sql = "SELECT title, ingredients, id FROM pizzas ORDER BY created_at";

$result = mysqli_query($db_connection, $sql);

$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);

mysqli_close($db_connection);

;?>

<?php
require 'templates/header.php'; ?>

<h4 class="center grey-text">PIZZAS :)</h4>

    <div class="container">
        <div class="row">
            <?php foreach ($pizzas as $pizza): ?>
                <div class="col s6 md3">
                    <div class="card z-depth-0">
                        <div class="card-content center">
                            <h6><?=htmlspecialchars($pizza['title']);?></h6>
                            <div><?=htmlspecialchars($pizza['ingredients']);?></div>
                        </div>
                        <div class="card-action right-align">
                            <a href="/" class="brand-text">More info</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

<?php
require 'templates/footer.php'; ?>