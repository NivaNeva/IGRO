<?php 
session_start(); 
// стратуем сессию, чтобы использовать 
//проерку авторизации пользователя
include "connect_db.php";
?>
<?php
/**
 * Модуль регистрации пользователей
 */
?>
<?php include "header.php"; ?>

        <section class="regusers">
            <div class="regusers-content">
            <h2>Регистрация нового пользователя</h2>
                <form class="registr" role="form" action="regusers.php" method="post">
                <div class="form-group">
                    <label for="reglogin" class="reg-label">Логин</label>                   
                    <input type="text" class="reg-form-control" id="reglogin" name = "reglogin" placeholder="Придумайте логин">                 
                </div> 
                <div class="form-group">
                    <label for="regpass" class="lk-label">Пароль</label>                   
                    <input type="text" class="reg-form-control" id="regpass" name = "regpass" placeholder="Придумайте пароль">                 
                </div> 
                <div class="form-group">
                    <label for="regfam" class="reg-label">Фамилия</label>                   
                    <input type="text" class="reg-form-control" id="regfam" name = "regfam" placeholder="Введите фамилию">                 
                </div> 
                <div class="form-group">
                    <label for="regname" class="lk-label">Имя</label>                   
                    <input type="text" class="reg-form-control" id="regname" name = "regname" placeholder="Введите имя">                 
                </div> 
                <div class="form-group">
                   
                    <label for="type_user" class="lk-label">Тип пользователя</label>  
                        <select class="pol" name="type_user" id="type_user" >
                            <option value="admin" >Администратор</option>
                            <option value="user" >Пользователь</option>
                                
                        </select>
                    
                </div> 
                <div class="form-group reg-form-group">                
                    <button type="submit" class="reg-btn">Сохранить</button>
                </div>
                <?php
                    //print_r($_POST);
                    include "connect_db.php";

                if (!empty($_POST)){
                    $login = $_POST['reglogin'];
                    $pass = $_POST['regpass']; 
                    $fam = $_POST['regfam']; 
                    $name = $_POST['regname'];    
                    $type_user = $_POST['type_user'];  
                    
                    $sql = "INSERT INTO users (fam, name, type_user, login, pass) VALUES ( :fam , :name, :type_user, :login, :pass )";
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindParam(':login', $login, PDO::PARAM_STR);
                    $stmt->bindParam(':pass', $pass , PDO::PARAM_STR);
                    $stmt->bindParam(':fam', $fam , PDO::PARAM_STR);
                    $stmt->bindParam(':name', $name, PDO::PARAM_STR); 
                    $stmt->bindParam(':type_user', $type_user, PDO::PARAM_STR);      
                    $chek = $stmt->execute();

                    if($chek){
                        echo "Данные успешно сохранены";
                    };
                };    
            ?>                            
                
                </form>

            </div>           
        </section><!-- class="content" -->
				<?php include "footer.php"; ?>
    </div>
<script src="js/myscript.js"></script>    
</body>
</html>