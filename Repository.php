<?php 
include 'Game_class.php';
class GameStorage
{
    public function create()
    {

    }
    
    public function save($game)
    {
        $id = $game->getId();
        $gamers = $game->getGamers();
        $steps = $game->getSteps();
        $stepsString = implode(" ", $steps);
        file_put_contents("saved_games/" . $id, "$gamers[0]" . PHP_EOL . "$gamers[1]". PHP_EOL . $stepsString);   
    }
    
    public function load($id)
    {
        $steps = [];
        $fileContent = file_get_contents("saved_games/" . $id); 
        $gamers = explode("\n", $fileContent);
        if(isset($gamers[2]) && strlen($gamers[2]))
        {
            $steps = explode(" ", $gamers[2]);
        }
        $game = new Game();
        $game->setId($id);
        $game->setGamers($gamers);
        $game->setSteps($steps);
        return $game;
        return $game;
    }
}
