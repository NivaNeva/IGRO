<?php
class Users {
	public $name;
	public $fam;

	public function outdata(){
			echo $this->name;
			echo "<br>";
			echo $this->fam;
			echo "<br>";
	}

	public function query($parm){
		 echo $parm;
		 echo "<br>";        
 }

 public function sumer($x,$y){
	$sum = $x + $y;
	return $sum;       
}

}

$user = new Users();
$user->name = "Name";
$user->fam = "Familia";

$user->outdata();
echo "<br>"; 
$res = $user->sumer(2,3);
echo $res;
echo "<br>"; 


$user2 = new Users();
$user2->name = "Иван";
$user2->fam = "Иванов";

$user2->outdata();

$res2 = $user2->sumer(3,3);
echo $res2;
echo "<br>"; 

$tem = "Тест";
$user->query($tem);
include "connect_db.php";
$pdo->query('DELETE FROM users WHERE id=0');
?> 