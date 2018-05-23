<?php 
include_once 'Repository.php';

$storage = new GameStorage();
$id = $_GET['file'];
$game = $storage->load($id);
if($game->getId())
{   
    
    $stepsLength = count($game->getSteps());
    if ($game->isEndOfGameWithWinner())
    {
        if ($stepsLength % 2 == 0)
        {
            echo $game->getGamers()[1]. " won";
        }
        else
        {
            echo $game->getGamers()[0]. " won";
        }
    }

    if ($game->isEndOfGameWithDraw())
    {
    echo "Ничья.";
    }
    
}