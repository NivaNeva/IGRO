<?php 
session_start();

if (!empty($_SESSION['id'])) { //id достаем из сессии
  // если он не пустой, отобразим весь html код ниже, 
  // если же id пустое, то отравим на страницу авторизации
       
// unset($_POST['submit']);
?> 
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

 <?php include "header.php"; ?>

<section class="lk_cabinet">
    <h2>Личный кабинет</h2>
         <div class="lk_cabinet_data">
         <form class="registr" role="form" action="lk.php" method="post">
            <div class="form-group">
                <label for="lktitle" class="lk-label">Заголовок статьи</label>                   
                <input type="text" class="lk-form-control" id="lktitle" name = "lktitle" placeholder="Заголовок статьи">                 
            </div> 
            <div class="form-group">   
                <label for="lktext" class="lk-label">Текст статьи</label>                                                                          
                <textarea rows="15" cols="45" name="lktext" id="lktext" placeholder="Текст статьи"></textarea>   
            </div>   
            <div class="form-group btn-form-group">                
                <button type="submit" class="lk-btn">Отправить</button>
            </div>                            
              
            </form>
            <?php
                //print_r($_POST);
                include "connect_db.php";
              if (!empty($_POST['lktitle'])){
                $atitle = $_POST['lktitle'];
                $atext = $_POST['lktext'];    
                $adate = date('Y-m-d H:i:s');   
                
                $sql = "INSERT INTO article (adate, atitle, atext) VALUES ( :adate, :atitle, :atext)";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':adate', $adate, PDO::PARAM_STR);
                $stmt->bindParam(':atitle', $atitle, PDO::PARAM_STR);               
								$stmt->bindParam(':atext', $atext, PDO::PARAM_STR);  

                $chek = $stmt->execute();
							}
                if($chek){
                    echo "Данные успешно сохранены";
                };
            ?>
         </div>       
</section>
<section class="lk-art-info">
    <h3>Мои статьи</h3>
		
		<table class="table">
					<caption>Количество статей</caption>
					<thead>
						<tr>
							<th>№</th>
							<th>Дата</th>
							<th>Заголовок</th>
							<th>Изменить</th>
							<th>Удалить</th>						
							
						</tr>
					</thead>
					<tbody>
					<?php
                $stmt = $pdo->query('SELECT id,adate, atitle FROM article');
								  while ($row = $stmt->fetch())
                   {
								?>
						<tr>
						<form action="del.php" method="post" name="form<?php echo $row['id'];?>">
							<td><?php echo $row['id'];?></td>
							<td><?php echo $row['adate'];?></td>
							<td><?php echo $row['atitle'];?></td>
							<td><input type="submit" class="ch-btn" name="marker" value="Изменить"></td>
							<td>
								<input type="hidden" name="delid" value="<?php echo $row['id'];?>">
								<input type="submit" class="ud-btn" name="marker" value="Удалить">
						  </td>						
						</form>	
						</tr>
						<?php
									 }
								?>										
					</tbody>
				</table>

</section>   


<?php include "footer.php"; ?>
</div>
<script src="js/myscript.js"></script>    
</body>
</html>
<?php
}
else {
echo "Вам необходимо пройти авторизацию";
?>
<p>Через 5 секунд будет произведено перенаправление на страницу авторизации</p>
  <script> window.setTimeout(function() { window.location = 'chek.php'; }, 5000) </script> 
<?php
//header('Location: chek.php'); exit();
}
?>