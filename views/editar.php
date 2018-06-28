<?php
	$id=$_GET["id"];
	$select = $con->prepare("SELECT * FROM users WHERE id='$id'");
	$select->setFetchMode(PDO::FETCH_ASSOC);
	$select->execute();
	$data=$select->fetch();
?>
  	<div class="container col-md-6 offset-md-3">
		<div class="row">
			<div class="col padding20">
				<div class="padding20" style="background-color: #0D47A1;">
				<div class="form-group col text-center texto-branco">
					<h1>Editar Cadastro</h1>
				</div>
					<form method="post" enctype="multipart/form-data">

						<div class="form-group col">
						    <input type="hidden" class="form-control" placeholder="Nome" name="id" value="<?php echo $data['id'];?>">
						</div>

						<div class="form-group col">
						    <input type="text" class="form-control" placeholder="Nome" name="name" value="<?php echo $data['name'];?>">
						</div>

						<div class="form-group col">
						    <input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo $data['email'];?>">
						</div>

						<div class="form-group col">
						    <input type="text" class="form-control"  placeholder="Senha" name="pass" value="<?php echo $data['pass'];?>">
						</div>

						<div class="form-group col">
						    <input type="number" class="form-control"  placeholder="Idade" name="age" value="<?php echo $data['age'];?>">
						</div>

						<div class="container col text-center">
							<div class="row">
								<div class="form-group col-3 text-center">
									<img style="width: 100px;" src="<?php echo $data['foto'];?>">
								</div>
								<div class="form-group col-9 text-center">
									<label for="exampleFormControlFile1" class="texto-branco">Foto</label>
								    <input type="file" class="form-control"  placeholder="Foto" name="foto">
								</div>
							</div>
						</div>

						<div class="form-group col text-center">
							<button type="submit" name="atualizar" class="btn btn-success">Atualizar</button>
						</div>

						<div class="form-group col text-center padding10">
							<h5 style="color:#00ff2b;"><?php echo $msg ?></h5>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

