<?php if(isset($_GET['file']))
    {   
        $fileContent = file_get_contents("saved_games/" . $_GET['file']);
        $gamers = explode("\n", $fileContent);
        echo $gamers[0] . "won";      
    }


?>