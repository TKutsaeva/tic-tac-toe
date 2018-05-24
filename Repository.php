<?php 
include 'Model.php';
class GameStorage
{
    public function create($XGamer, $OGamer)
    {
		$idGame = uniqid();
		$id = "$idGame.txt";
		$newFileInfo = "$XGamer" . PHP_EOL . "$OGamer". PHP_EOL . "";
		$name1 = fopen('saved_games/'.$id, "a+");
		fputs($name1, $newFileInfo);
		fclose($name1);
		if (file_exists('saved_games/'.$id))
		{
			$game = new Game;
			$game->setId($id);
			return $id;
		}
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
		//var_dump($id);
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
    }
}
