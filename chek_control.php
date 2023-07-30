<?php 
session_start(); // инициализция механизма сессии
// контрольный вывод передаваемой информации
// подключаемся к базе данных

include "connect_db.php";

// извлекаем логин и  пароль для проверки
$tmp_locic = false; // флаг 
$sql_select = "SELECT * FROM `users` LIMIT 0, 50 ";
$stmt = $pdo->query($sql_select);
    while ($row = $stmt->fetch())
    {

    // проверяем есть в базе данных пользователь с данным логином и паролем
        if (
            ($_POST['login']==$row['login'])&&($_POST['pass']==$row['pass'])
           )
        {
            echo "Здравствуйте";
            echo " ";
            echo $row['fam'];
            echo " ";
            echo $row['name'];    	
            echo "<br/> ";
            
            $tmp_locic = true; // устанавливаем флаг, пользователь найден

            // необходимые данные из бд сохраняем в сессии
            // для того чтобы использовать их на страницах сайта
            $_SESSION['auth'] = $tmp_locic;
            $_SESSION['id'] = $row['id'];	
            $_SESSION['fam'] = $row['fam']; 
            $_SESSION['name'] = $row['name'];     
            $_SESSION['type_user'] = $row['type_user'];       
            
            break;	// выходим сразу из цикла    	
            
        }
        
    } // while

if ($tmp_locic == false) // если пользователь не найден 
     {
    	echo "Пользователь с таким Логином и Паролем не сущетсвует";
        ?>    
    <p>Через 5 секунд будет произведено перенаправление на страницу регистрации пользоватлей</p>
   <script> window.setTimeout(function() { window.location = '../regusers.php'; }, 5000) </script>
<?php
       }

// сделаем редирект (переход) на страницу пользователя

if (!empty($_SESSION['id'])) { 
?>    
    <p>Через 5 секунд будет произведено перенаправление в личный кабинет</p>
   <script> window.setTimeout(function() { window.location = '../lk.php'; }, 5000) </script>
<?php
} 


?>