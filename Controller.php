<?php
class Controller
{
	public function createGame()
	{
		include 'Repository.php';
		
		if ($_SERVER['REQUEST_METHOD'] === 'POST' && (isset($_POST['OKBtn'])))
		{
			$game = new Game;
			$XGamer = $_POST['XGamer'];
			$OGamer = $_POST['OGamer'];
			$storage = new GameStorage();
			$isValidNames = $game->isValidGamersNames($XGamer, $OGamer);	
			
			if ($isValidNames)
			{
				$id = $storage->create($XGamer, $OGamer);
				header('Location: index.php?action=play&file='.$id);
            } 
			else 
			{
				echo "Недопустимые имена!";
			}
		}

		if ($_SERVER['REQUEST_METHOD'] === 'POST' && (isset($_POST['OpenGameBtn'])))
		{
			$id = $dir . basename($_FILES['LoadBtn']['name']);
			if (move_uploaded_file($_FILES['LoadBtn']['tmp_name'], $id))
			{
				header('Location: index.php?action=play&file='.$id);
			}
		}
		
		include 'View_reg.php';
	}
	
	public function play()
	{
		include 'Repository.php';
		$storage = new GameStorage();
		$id = $_GET['file'];
	//	var_dump($_GET['file']);
	//	exit();
		$game = $storage->load($id);


		if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Close']))
		{
			header ('Location: index.php');
		}

		if ($_SERVER['REQUEST_METHOD'] === 'POST' && (isset($_POST['MakeAStep'])))
		{    
			$game->makeAStep($_POST['cell']);
			$storage->save($game); 
		}

		$isEnded = $game->isEndOfGameWithWinner();
		$isDraw = $game->isEndOfGameWithDraw();

		if ($isEnded || $isDraw)
		{
			header('Location: index.php?action=win&file='.$game->getId());
		}


		$rows = array_chunk($game->getField(), 3);   
		
		include 'View_play.php';
    
	}
	
	public function win()
	{
		include_once 'Repository.php';
		$storage = new GameStorage();
		$id = $_GET['file'];
		$game = $storage->load($id);
		if($game->getId())
		{   
			$stepsLength = count($game->getSteps());
			if ($game->isEndOfGameWithDraw())
			{
				echo "Ничья.";
			}
			else if ($game->isEndOfGameWithWinner())
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
		}
	}
}