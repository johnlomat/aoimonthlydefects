<?php
    $query = "SELECT * FROM user";
    $statement = $connect->prepare($query);
    $statement->execute();
    $total_pages = $statement->fetch(PDO::FETCH_ASSOC);

    $page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;

    $num_results_on_page = 5;
?>