<html>
<body>

<?php
    include 'Game.php';
    include 'Repositary.php';
    
    
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Close'])){
        header ('Location: reg_tz.php');
    }
    
    if(isset($_GET['file']))
    {
        $fileContent = file_get_contents("saved_games/" . $_GET['file']);
           
    }
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && (isset($_POST['MakeAStep'])))
    {    
        $valuedRadio = $_POST['cell'];
        $steps[] = $valuedRadio;
        $stepsString = implode(" ", $steps);
        file_put_contents("saved_games/" . $_GET['file'], "$gamers[0]" . PHP_EOL . "$gamers[1]". PHP_EOL . $stepsString);      
    }
    
    
    foreach ($steps as $index => $cell){
        if ($index % 2 == 0){
            $field[$cell] = 'X';
        } else {
            $field[$cell] = 'O';
        }
    }
    

    
    if ($isEnded){
        header('Location: win_tz.php?file='.$_GET['file']);
    }
    
    
   
    
    $currentGamer = $gamers[0];
    if((count($steps)) % 2 == 0)
    {
        $currentGamer = $gamers[0];
    }
    else 
    {
        $currentGamer = $gamers[1];
    }
    
    
    
    $rows = array_chunk($field, 3);        
    
?>
    
    
<form action="tz.php?file=<?php echo $_GET['file'] ?>" method="post">
    
    <label for="currentGamer">Ход игрока: <?php echo $currentGamer ?></label><br><br>
    
    <table>
        <?php foreach($rows as $rowIndex => $row): ?>
        <tr>
            <?php foreach($row as $colIndex => $col): ?>
                <td>
                    <?php if($col === null): ?>
                        <input type ="radio" name = "cell" value="<?= ($rowIndex * 3 + $colIndex); ?>">
                    <?php else: ?>
                        <?= $col ?>
                    <?php endif; ?>
                </td>
            <?php endforeach; ?>
        </tr>
        <?php endforeach; ?>
    </table>  
    <br><br><br>    
    
    <input name="MakeAStep" type = "submit" value="Сделать ход"><br><br>
    
    <label for="XGamer">Имя игрока X: <?php echo $gamers[0] ?></label><br><br>
    <label for="OGamer">Имя игрока O: <?php echo $gamers[1] ?></label><br><br><br>
        
    <input name="Close" type = "submit" value="Выйти">   
</form>
</body>
</html>