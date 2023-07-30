<?php
                print_r($_POST);
                include "connect_db.php";
              if (!empty($_POST['chtitle'])){
                $chtitle = $_POST['chtitle'];
                $chtext = $_POST['chtext']; 
								$chid = $_POST['chid'];    
                $chdate = date('Y-m-d H:i:s');   

                $sqlch = "UPDATE article SET atitle = ?,atext = ?  WHERE id = ?";
                //$sql = "INSERT INTO article (adate, atitle, atext) VALUES ( :adate, :atitle, :atext)";
                $stmt = $pdo->prepare($sqlch);
                $chehng = $stmt->execute(array($chtitle,$chtext,$chid));
							}
                if($chehng ){
                    echo "Данные успешно изменены";
										?>
										<script> window.setTimeout(function() { window.location = 'lk.php'; }, 3000) </script> 
										<?php
                } else{
									echo "Что-то пошло не так";
								};
            ?>