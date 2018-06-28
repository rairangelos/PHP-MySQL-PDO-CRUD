  	<div class="container col-md-4 offset-md-4">
		<div class="row">
			<div class="col padding30">
				<div class="colorCadastrar padding20">
				<div class="form-group col text-center texto-branco">
					<h1>Criar Conta</h1>
				</div>
					<form method="post" enctype="multipart/form-data">

						<div class="form-group col">
						    <input type="text" class="form-control" placeholder="Nome" name="name">
						</div>

						<div class="form-group col">
						    <input type="email" class="form-control" placeholder="Email" name="email">
						</div>

						<div class="form-group col">
						    <input type="password" class="form-control"  placeholder="Senha" name="pass">
						</div>

						<div class="form-group col">
						    <input type="number" class="form-control"  placeholder="Idade" name="age">
						</div>

						<div class="form-group col text-center">
							<label for="exampleFormControlFile1" class="texto-branco">Foto</label>
						    <input type="file" class="form-control"  placeholder="Foto" name="foto" >
						</div>

						<div class="form-group col text-center">
							<button type="submit" name="cadastrar" class="btn btn-success btn-lg">Cadastrar</button>
						</div>

						<div class="form-group col text-center">
							<h5 style="color:red;"><?php echo"$erro" ?></h5>
						</div>
						<div class="form-group col text-center">
							<h5 style="color:green;"><?php echo"$msg" ?></h5>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>