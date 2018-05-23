<html>
<body>

<?php
    
    include 'Repository.php';
    $storage = new GameStorage();
    $id = $_GET['file'];
    $game = $storage->load($id);

    
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Close']))
    {
        header ('Location: reg_tz.php');
    }
    

    
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && (isset($_POST['MakeAStep'])))
    {    
        //$steps = $game->getSteps();
        $game->makeAStep($_POST['cell']);
        //$game->setSteps($steps);
        $storage->save($game); 
    }

    //$game->updateFieldPubl();
    $isEnded = $game->isEndOfGameWithWinner();
    $isDraw = $game->isEndOfGameWithDraw();
        
    if ($isEnded || $isDraw)
    {
        header('Location: win_tz.php?file='.$game->getId());
    }
    
    
    $rows = array_chunk($game->getField(), 3);     
    
?>
    
    
<form action="tz.php?file=<?php echo $_GET['file'] ?>" method="post">
    
    <label for="currentGamer">Ход игрока: <?php echo $game->getCurrentGamer() ?></label><br><br>
    
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
    
    <label for="XGamer">Имя игрока X: <?php echo $game->getGamers()[0] ?></label><br><br>
    <label for="OGamer">Имя игрока O: <?php echo $game->getGamers()[1] ?></label><br><br><br>
        
    <input name="Close" type = "submit" value="Выйти">   
</form>
</body>
</html>