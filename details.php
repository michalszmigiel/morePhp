<?php

require 'config/db_connection.php';

if (isset($_GET['id']))
{
    $id = mysqli_real_escape_string($db_connection, $_GET['id']);

    $sql = "SELECT * FROM pizzas WHERE id = $id";

    $result = mysqli_query($db_connection, $sql);

    $pizza = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
    mysqli_close($db_connection);
}

?>

<?php
require 'templates/header.php'; ?>

<div class="container center">
    <?php if($pizza): ?>
    <h4><?= htmlspecialchars($pizza['title']);?></h4>
    <p>Created by: <?= htmlspecialchars($pizza['email']);?></p>
    <p><?= date($pizza['created_at']);?></p>
    <h5>Ingredients:</h5>
    <p><?= htmlspecialchars($pizza['ingredients']);?></p>

    <?php else: ?>
    <h5>No such pizza exists. :(</h5>

    <?php endif;?>
</div>


<?php
require 'templates/footer.php'; ?>
