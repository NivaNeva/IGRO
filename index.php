<?php 
session_start(); 
// стратуем сессию, чтобы использовать 
//проерку авторизации пользователя
include "connect_db.php";
?>
<?php include "header.php"; ?>

        <section class="content">
            <div class="content__sidebar">
                <h2>Разделы</h2>
								<?php
                $cat = $pdo->query('SELECT cid,cname FROM category');
								  while ($row_cat = $cat->fetch())
                   {
										 
								?>
									<p>
									<a href="http://prcatica-main/index.php?id=<?php echo $row_cat['cid']; ?>">
									<?php echo $row_cat['cname']; ?>		
								</a>
									</p>
								<?php
									 }									

									 //print_r($_GET);
/*
									 SELECT article.atitle, article.atext,category.cname FROM article
LEFT JOIN art_cat ON article.id=art_cat.art_id
LEFT JOIN category ON art_cat.cat_id=category.cid
WHERE category.cid=1
*/
								?>
								<p>
									 <a href="http://prcatica-main/index.php?id=0">
									 Все статьи	
								   </a>
								</p>
								
            </div>
            <div class="content__block">
                <div class="content__block-title">
                   <h2>Статьи</h2> 
                </div>
								<?php
								if (0==$_GET['id']) {
                $stmt = $pdo->query('SELECT adate,atitle,atext FROM article');
								  while ($row = $stmt->fetch())
                   {
								?>
                <div class="content__block-item">
                    <div class="content__block-img">

                    </div>
                    <h3 class="content__block-txt-top"><?php echo $row['atitle'];?></h3>
                    <p>Дата публикации: <?php echo $row['adate'];?></p>
                    <p class="content__block-txt">
										<?php echo $row['atext'];?>
                    </p> 
                   
                </div>
								<?php
									 } // while
									} // if	
									else 
									{
										/*
										$sqlin = 'SELECT article.atitle, article.atext,category.cname FROM article LEFT JOIN art_cat ON article.id=art_cat.art_id LEFT JOIN category ON art_cat.cat_id=category.cid WHERE category.cid=3';
										$stmt = $pdo->query($sqlin);
                    */
										$stmt = $pdo->prepare('SELECT article.atitle, article.atext,category.cname FROM article LEFT JOIN art_cat ON article.id=art_cat.art_id LEFT JOIN category ON art_cat.cat_id=category.cid WHERE category.cid = ?');
                    $stmt->execute(array($_GET['id']));

										while ($row = $stmt->fetch())
										 {
									?>
									<div class="content__block-item">
											<div class="content__block-img">
	
											</div>
											<h3 class="content__block-txt-top"><?php echo $row['atitle'];?></h3>
											<p>Дата публикации: <?php echo $row['adate'];?></p>
											<p class="content__block-txt">
											<?php echo $row['atext'];?>
											</p> 
										 
									</div>
									<?php
										 } // while

									} // else is
								?>

            </div>
        </section><!-- class="content" -->
				<?php include "footer.php"; ?>
    </div>
<script src="js/myscript.js"></script>    
</body>
</html>