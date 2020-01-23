<?php
    require_once '../vendor/autoload.php';

    use Twig\Loader\FilesystemLoader;
    use Twig\Environment;

    $loader = new FilesystemLoader('templates');
    $twig = new Environment($loader);


    if(!isset($_GET['id'])){
        echo $twig->render('index.twig', array(
            'name' => 'Peter',
            'age' => '21'
        ));
    } else {
        $id = $_GET['id'];
        switch ($id){
            case 0:{
                break;
            }
            default: {
                echo "ID: ".$id;
            }
        }
    }
?>