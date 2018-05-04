<html>
    <title>XO Reg</title>
    
    
<body>
<h1>Регистрация</h1>
    <form action="reg_tz.php" enctype="multipart/form-data" method="post">
        
        <label for="XGamer">Имя игрока Х</label><br>
        <input name = "XGamer" id="XGamer"><br><br>
        <label for="OGamer">Имя игрока O</label><br>
        <input name = "OGamer" id="OGamer"><br><br>
        <input name="OKBtn" type = "submit" value="Новая игра"><br><br>
        <input name="LoadBtn" type = "file" value="Загрузить игру"><br><br>
        <input name="SendGameBtn" type = "submit" value="Открыть выбранную игру">
    </form>
</body>
</html>

<?php 
        include 'Repositary.php';

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && (isset($_POST['OKBtn'])))
        {
          GameStorage::create();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && (isset($_POST['SendGameBtn'])))
        {
            GameStorage::load($id);
        }