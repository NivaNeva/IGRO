
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/mystyle.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&display=swap" rel="stylesheet">
    <title>Информационный портал</title>
</head>
<body>
    <div class="main">        

        <header class="head">
            <div class="head__logo">
                <h1>Информационный портал</h1>
            </div>
            <div class="head__nav">
                <ul>
                    <li>
                        <a href="index.php">Главная страница</a>
                    </li>
										<li>
                        <a href="trin.php">Тренажер</a>
                    </li>
										<li>
                        <a href="regusers.php">Регистрация</a>
                    </li>
                </ul>
            </div>     
            <div class="head__login">

            <ul>

            <?php if (!empty($_SESSION['id'])) // здесь происходит следующее
                // если пользователь авторизован направляем его в личный кабинет
                {?>
                    <li><a  href="lk.php">Личный кабинет</a> </li>
                <?php }
                // если же не автоизован направляем его на 
                // страницу входа в систему
                    else
                {?>
                
                    <li><a  href="chek.php">Личный кабинет</a> </li>
            <?php }?>

            </ul>


            </div>   
        </header><!--class="head" -->