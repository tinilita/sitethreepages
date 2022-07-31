<?php

declare(strict_types=1);
?>

<!DOCTYPE html>
<html lang = "ru">
<head>
    <meta charset = "UTF-8">
    <meta http-equiv = "X-UA-Compotible" content = "IE=edge">
    <meta name = "viewport" content = "width=device-width, intial-scale=1.0">
    <meta name = "kaywords" content = "тематика сайта">
    <link rel = "stylesheet" href = "css/style.css">
    <link rel = "stylesheet" href = "css/bootstrap.min.css">
    <script src="https://unpkg.com/vue@next"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.26.1/axios.min.js"></script>

</head>
<body>
<header>
</header>
<main>

    <?php
    if (!isset($_POST['submit'])) {
    ?>
    <div class="js-form ">
     <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
         <input name="firstname" type="text" placeholder="Имя" required><br/>
         <input name="lastname" type="text" placeholder="Фамилия" required><br/>
         <input name="otchestvo" type="text" placeholder="Отчество" required><br/>
         <input name="adress" type="text" placeholder="Адресс"><br/>
         <input name="email" type="text" placeholder="Email"><br/>
         <input name="mobile" type="text" placeholder="Мобильный телефон" required><br/>
         <input type="submit" name="submit" value="Отправить форму"><br>
     </form>

     <?php
     } else  if (isValid()) {
        try {
            $db = new PDO('sqlite:identifier.sqlite');
            $sql = "INSERT INTO userdata (firstname, lastname, otchestvo, adress, email, mobile) VALUES
            (:firstname, :lastname, :otchestvo, :adress, :email, :mobile)";
            $stmt = $db->prepare($sql);

            $firstname = filter_input(INPUT_POST, 'firstname');
            $stmt->bindValue(':firstname', $firstname, PDO::PARAM_STR);

            $lastname = filter_input(INPUT_POST, 'lastname');
            $stmt->bindValue(':lastname', $lastname, PDO::PARAM_STR);

            $otchestvo = filter_input(INPUT_POST, 'otchestvo');
            $stmt->bindValue(':otchestvo', $otchestvo, PDO::PARAM_STR);

            $adress = filter_input(INPUT_POST, 'adress');
            $stmt->bindValue(':adress', $adress, PDO::PARAM_STR);

            $email = filter_input(INPUT_POST, 'email');
            $stmt->bindValue(':email', $email, PDO::PARAM_STR);

            $mobile = filter_input(INPUT_POST, 'mobile');
            $stmt->bindValue(':mobile', $mobile, PDO::PARAM_STR);

            $success = $stmt->execute();
            if($success){
                echo "Форма отправлена успешно!";
            } else {
                echo "Что-то пошло не так...";
            }
            $db = null;
        } catch (PDOException $e) {
            print "Ошибка:" . $e->getMessage() . "<br/>";
            die();
        }
         echo users();
     }
     ?>
    </div>





    <footer>
    </footer>
    

    <?php

function isValid ()
{
    session_start();
    $data['result'] = 'success';

    $firstname = filter_var(trim($_POST['firstname']),
        FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST['email']),
        FILTER_SANITIZE_STRING);
    $mobile = filter_var(trim($_POST['mobile']),
        FILTER_SANITIZE_STRING);

    if (mb_strlen($firstname) < 5 || mb_strlen($firstname) > 90) {
        echo "Недопустимая длина имени";
        exit();
    } else if (preg_match('/@gmail.com/i', $email)) {
        echo "регистрация пользователей с таким почтовым адресом невозможна";
        exit();
    } else if (mb_strlen($mobile) < 5 || mb_strlen($mobile) > 90) {
        echo "Недопустимый номер";
        exit();
    } else return true;
}
    ?>

    <?php
    function users(){
        echo "<p>Форму направили:</p>";
        $db = new SQLite3('identifier.sqlite');
        $results = $db->query("SELECT * FROM userdata");
        while ($row = $results->fetchArray()) {
            $id = $row['.'];
            echo "Имя: ".$row['firstname']." Фамилия: ".$row['lastname']." Отчество: ".$row['otchestvo']." Адресс: ".$row['adress']." Почта: ".$row['email']." Номер мобильного телефона: ".$row['mobile'];
            echo " | <a href='/?update=$id'>Изменить</a> | <a href='/?del=$id'>Удалить</a><br>";
        }
        $db->close();
    }

    ?>
    <script src = "js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.0.5/vue.min.js"></script>
    <script src="js/scripts.js"></script>
</body>
</html>

