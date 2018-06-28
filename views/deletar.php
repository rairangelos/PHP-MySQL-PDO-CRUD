<?php
	$id = $_GET['id'];
try{
	$deletar = $con->prepare('DELETE FROM users WHERE id = :id');
	$deletar->bindParam(':id', $id); 
	$deletar->execute();
	var_dump($deletar->execute());
	if($deletar->execute() == true){
		header("location:profile.php?link=2");
	}
}catch(PDOException $e){
	echo 'Error: ' . $e->getMessage();
}
?>