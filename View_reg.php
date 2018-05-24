<html>
    <title>XO Reg</title>
    
    
<body>
<h1>Регистрация</h1>
    <form action="index.php?action=createGame" enctype="multipart/form-data" method="post">
        
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
//include 'Controller.php';