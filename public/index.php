<?php

$request = $_SERVER['REQUEST_URI'];
$uri = parse_url($request, PHP_URL_PATH);



switch ($uri) {
    case '/' :
        require __DIR__ . '/pages/homepage.php';
        break;

    default :
        require __DIR__ . '/pages/homepage.php';
        break;
}


?>


</body>
</html>





