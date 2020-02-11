<?php

require 'config/db_connection.php';

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
                            <ul>
                                <?php foreach (explode(", ", $pizza['ingredients']) as $ingredient): ?>
                                <li><?= htmlspecialchars($ingredient);?></li>
                                <?php endforeach;?>
                            </ul>
                        </div>
                        <div class="card-action right-align">
                            <a href="/" class="brand-text">More info</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div>
            <?= count($pizzas) >= 3 ? "There are 3 or more pizzas." : "There are less than 3 pizzas." ;?>
        </div>
    </div>

<?php
require 'templates/footer.php'; ?>