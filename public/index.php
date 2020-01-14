<?php

    require_once 'vendor/autoload.php';

    use Twig\Loader\FilesystemLoader;
    use Twig\Environment;
    use src\Helper\Config;

    $loader = new FilesystemLoader('public/templates');
    $twig = new Environment($loader);
    $config = Config::getConfig("key");
    echo $twig->render('hello.html', array(
            'name' => 'Peter',
            'age' => $config
    ));

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html lang="en">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <title>League Test</title>

    <link rel="icon" href="images/favicon.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="styles/styles.css">

</head>
<body>
    <form action="summoner.php" method="get">
        <input type="text" placeholder="Summonername" name="name" id="name">
        <input style="margin-top: 25px" type="submit" value="Search">
    </form>
</body>
</html>
