<?php 
class GameStorage
{
    
    
    public function create()
    {
        $XGamer = $_POST['XGamer'];
        $OGamer = $_POST['OGamer'];
        $dir = 'saved_games/';
        
        function checkValidNames ($XGamer, $OGamer)
        {
            $pattern = '/[a-zA-Zа-пр-яА-ПР-Я_]+/';
            if (preg_match($pattern, $XGamer) && preg_match($pattern, $OGamer))
            {
                return true;
            }
        }
            
        $checkingValidNames = checkValidNames ($XGamer, $OGamer);
        if (!empty($XGamer) && !empty($OGamer) && $checkingValidNames)
        {
            $timeForName = uniqid();
            $gamefile = "$timeForName.txt";
            $newFileInfo = "$XGamer" . PHP_EOL . "$OGamer". PHP_EOL . "";
            $name1 = fopen($dir.$gamefile, "a+");
            fputs($name1, $newFileInfo);
            fclose($name1);
            header('Location: tz.php?file='.$gamefile);
            } 
        else 
        {
            echo "Недопустимые имена!";
        }
    }
    
    public function save($game)
    {
        
    }
    
    public function load($id)
    {
        $id = $dir . basename($_FILES['LoadBtn']['name']);
        if (move_uploaded_file($_FILES['LoadBtn']['tmp_name'], $id))
        {
        header('Location: tz.php?file='.$id);
        }
    }
}
