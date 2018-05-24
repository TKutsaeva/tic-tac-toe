<html>
	<title>XO Play</title>
	<body>  
		<form action="index.php?action=play&file=<?php echo $_GET['file'] ?>" method="post">
			<label for="currentGamer">Ход игрока: <?php echo $game->getCurrentGamer() ?></label>
			<br><br>
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