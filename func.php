<?php
//подключение к базе данных
if(file_exists('my.db')){
    $db = new SQLite3('my.db');
}else{
    echo "Установите базу данных - <a href='install.php'>Установить</a>";
    exit();
}


//Добавить пользователя
function add($firstname,$lastname, $otchestvo, $adress, $email, $mobile){
    $db = new SQLite3('my.db');
    $db->query("INSERT INTO users VALUES (NULL,'$firstname','$lastname', '$otchestvo', '$adress', '$email','$mobile')");
    $db->close();
}

?>

/*
<form method="post">
    <input type="text" name="firstname" id="firstname" placeholder="Имя">
    <input type="text" name="lastname" id="lastname" placeholder="Возраст">
    <input type="text" name="otchestvo" id="otchestvo" placeholder="Город">
    <input type="text" name="adress" id="adress" placeholder="Имя">
    <input type="text" name="email" id="email" placeholder="Возраст">
    <input type="text" name="mobile" id="mobile" placeholder="Город">
    <input type="submit" name="add" id="add" value="Добавить">
</form>
<table>
    <tbody>
    <tr>
        <th>Имя</th>
        <th>{{firstname}}</th>
    </tr>
    <tr>
        <th>Фамилия</th>
        <th>{{lastname}}</th>
    </tr>
    <tr>
        <th>Отчество</th>
        <th>{{otchestvo}}</th>
    </tr>
    <tr>
        <th>Адресс</th>
        <th>{{adress}}</th>
    </tr>
    <tr>
        <th>Почта</th>
        <th>{{email}}</th>
    </tr>
    <tr>
        <th>Номер мобильного телефона</th>
        <th>{{mobile}}</th>
    </tr>
    </tbody>
</table>
*/
