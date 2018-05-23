<html>
    <title>XO Reg</title>
    
    
<body>
<h1>Регистрация</h1>
    <form action="reg_tz.php" enctype="multipart/form-data" method="post">
        
        <label for = "XGamer">Имя игрока Х</label><br>
        <input name = "XGamer" id = "XGamer"><br><br>
        <label for = "OGamer">Имя игрока O</label><br>
        <input name = "OGamer" id = "OGamer"><br><br>
        <input name = "OKBtn" type = "submit" value = "Новая игра"><br><br>
        <input name = "LoadBtn" type = "file" value = "Загрузить игру"><br><br>
        <input name = "OpenGameBtn" type = "submit" value = "Открыть выбранную игру">
    </form>
</body>
</html>

<?php 
    include 'Repository.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && (isset($_POST['OKBtn'])))
    {
        $XGamer = $_POST['XGamer'];
        $OGamer = $_POST['OGamer'];
        
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
            $name1 = fopen('saved_games/'.$gamefile, "a+");
            fputs($name1, $newFileInfo);
            fclose($name1);
            header('Location: tz.php?file='.$gamefile);
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
        header('Location: tz.php?file='.$id);
        }
    }