<?php 
include_once 'Repositary.php';

$storage = new GameStorage();
$id = $_GET['file'];
$game = $storage->load($id);
if(isset($game->id))
{   
    
    $stepsLength = count($game->steps);
    if ($stepsLength == 9){
        echo "Ничья.";
    } else if ($stepsLength % 2 == 0)
    {
        echo $game->gamers[1]. " won";
    } else {
        echo $game->gamers[0]. " won";
    } 
}
//    $fileContent = file_get_contents("saved_games/" . $_GET['file']);
//        $gamers = explode("\n", $fileContent);
//        echo $gamers[0] . "won";      
//    }