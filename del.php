<?php
print_r($_POST);
include "connect_db.php";
if ("Удалить"==$_POST['marker']){
	$stmt = $pdo->prepare('DELETE FROM article WHERE article.id = ?');
	$stmt->execute(array($_POST['delid']));
	?>
	<p>Статья Удалена</p>
  <script> window.setTimeout(function() { window.location = 'lk.php'; }, 3000) </script> 
	<?php
} elseif ("Изменить"==$_POST['marker']){
    echo "Изменить";
		?>
		<p>Статья Изменена</p>


    




		<div class="lk_cabinet_data">
		<?php
		//$_POST['delid'] = 5;
                $stmtch = $pdo->prepare('SELECT * FROM article WHERE id = ?');
								$stmtch->execute(array($_POST['delid']));
								  while ($rowch = $stmtch->fetch())
                   {
		?>

         <form class="registr" role="form" action="cheng.php" method="post">
            <div class="form-group">
                <label for="lktitle" class="lk-label">Заголовок статьи</label>                   
                <input type="text" class="lk-form-control" id="chtitle" name = "chtitle" placeholder="<?php echo $rowch['atitle']?>" value="<?php echo $rowch['atitle']?>">                 
            </div> 
            <div class="form-group">   
                <label for="lktext" class="lk-label">Текст статьи</label>                                                                          
                <textarea rows="15" cols="45" name="chtext" id="chtext" placeholder="<?php echo $rowch['atext']?>" value="<?php echo $rowch['atext']?>"></textarea>   
            </div>   
            <div class="form-group btn-form-group"> 
						<input type="hidden" name="chid" value="<?php echo $rowch['id'];?>">               
                <button type="submit" class="lk-btn">Изменить</button>
            </div>                            
              
          </form>
			<?php
			 }
			?>
      
         </div>   

  <script> //window.setTimeout(function() { window.location = 'lk.php'; }, 3000) </script> 
		<?php
}
?>
