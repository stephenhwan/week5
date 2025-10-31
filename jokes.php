<?php
try {
    include 'includes/DatabaseConnection.php';

 $sql = '
    SELECT
        q.`Id`    AS id,
        q.`Text`  AS text,
        q.`Date`  AS date,
        q.`Img`   AS image,
        u.`Email` AS email,
        m.`Name` AS module
    FROM `Question` AS q
    LEFT JOIN `User` AS u
        ON q.`UserId` = u.`Id`
    LEFT JOIN `Module` AS m ON q.`ModuleId` = m.`Id`
    ORDER BY q.`Date` DESC, q.`Id` DESC
';

    $questions = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    $title = 'Question list';

    ob_start();
    include 'templates/jokes.html.php';
    $output = ob_get_clean();
} catch (PDOException $e) {
    $title  = 'An error has occured';
    $output = 'Database error: ' . $e->getMessage();
}

include 'templates/layout.html.php';
