<div class="container text-center texto-branco">
	<h1>Lista de Usuário</h1>
</div>

<div class="container">
<table class="table table-hover">
  <thead class="thead-light text-center">
    <tr>
    
      <th scope="col">Nome</th>
      <th scope="col">Email</th>
      <th scope="col">Idade</th>
      <th scope="col">Opções</th>

    </tr>
  </thead>
  <tbody>

<?php
$select = $con->query("SELECT * FROM users");
$data = $select->fetchAll();
foreach ($data as $row){
		echo '<tr class="text-center">';
	    echo '<td>'.$row["name"].'</td>';
	    echo '<td>'.$row["email"].'</td>';
	    echo '<td>'.$row["age"].'</td>';
	   	echo '<td><a href="profile.php?link=3&id='.$row["id"].'" class="btn btn-primary">'.'EDITAR'.'</a> <a href="profile.php?link=4&id='.$row["id"].'" class="btn btn-danger">'.'DELETAR'.'</a> </td>';
	    echo '</tr>';
}
?>
  </tbody>
</table>
</div>