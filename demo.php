<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

include_once 'db.php';

// inefficient query but fine for small db
// could use another method but as long as we have sparse ids
// we would need some pretty serious overhead to make it truly random and efficient
// good article on the topic: https://jan.kneschke.de/projects/mysql/order-by-rand/
$res = $mySQLiconn->query(
    "SELECT photo
    FROM students
    WHERE photo IS NOT NULL AND photo <> ''
    ORDER BY RAND()
    LIMIT 2;"
);

$images = $res->fetch_all();
?>

<img src="./img/<?php echo $images[0][0] ?>" alt="">
<img src="./img/<?php echo $images[1][0] ?>" alt="">
