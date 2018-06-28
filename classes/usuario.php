<?php

//___________________________________CADASTRAR USUÁRIO______________________________________//
if(isset($_POST['cadastrar'])){
 $name = $_POST['name'];
 $email = $_POST['email'];
 $pass = $_POST['pass'];
 $age = $_POST['age'];

 $select = $con->prepare("SELECT * FROM users WHERE email='$email'");
 $select->setFetchMode(PDO::FETCH_ASSOC);
 $select->execute();
 $data=$select->fetch();

 if($data['email']!=$email and $data['pass']!=$pass)
 {
  if ( isset( $_FILES[ 'foto' ][ 'name' ] ) && $_FILES[ 'foto' ][ 'error' ] == 0 ) {

    $arquivo_tmp = $_FILES[ 'foto' ][ 'tmp_name' ];
    $nome = $_FILES[ 'foto' ][ 'name' ];
 
    // Pega a extensão
    $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );
 
    // Converte a extensão para minúsculo
    $extensao = strtolower ( $extensao );
 
    // Somente imagens, .jpg;.jpeg;.gif;.png
    // Aqui eu enfileiro as extensões permitidas e separo por ';'
    // Isso serve apenas para eu poder pesquisar dentro desta String
    if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
        // Cria um nome único para esta imagem
        // Evita que duplique as imagens no servidor.
        // Evita nomes com acentos, espaços e caracteres não alfanuméricos
        $novoNome = uniqid ( time () ) . '.' . $extensao;
 
        // Concatena a pasta com o nome
        $destino = '../arquivos/' . $novoNome;
 
        // tenta mover o arquivo para o destino
        if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {
        	$foto = $destino;
        }
        else
            echo 'Erro ao salvar o arquivo. Aparentemente você não tem permissão de escrita.<br />';
    }
    else
        echo 'Você poderá enviar apenas arquivos "*.jpg;*.jpeg;*.gif;*.png"<br />';
}
else
    echo 'Você não enviou nenhum arquivo!';

	//Prepara os dados para inserção (cadastro) no DB
	$insert = $con->prepare("INSERT INTO users (name,email,pass,age,foto)
	values(:name,:email,:pass,:age,:foto) ");
	$insert->bindParam(':name',$name);
	$insert->bindParam(':email',$email);
	$insert->bindParam(':pass',$pass);
	$insert->bindParam(':age',$age);
	$insert->bindParam(':foto',$foto);
	if($insert->execute() == true){
			return $msg = "Cadastro realizado com sucesso!";
		}else{
			return $erro = "Erro ao cadastrar!";
		}
			
	 }
 elseif($data['email']==$email)
 {
	return $erro = "Email já cadastrado, tente outro e-mail!";
 }

 }


//___________________________________ATUALIZAR CADASTRO______________________________________//
elseif(isset($_POST['atualizar'])){
	$id = $_POST['id'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$pass = $_POST['pass'];
	$age = $_POST['age'];

	//Recuperar o array com o id do usuário
	$select = $con->prepare("SELECT * FROM users WHERE id='$id'");
	$select->setFetchMode(PDO::FETCH_ASSOC);
	$select->execute();
	$data=$select->fetch();

	if ( isset( $_FILES[ 'foto' ][ 'name' ] ) && $_FILES[ 'foto' ][ 'error' ] == 0 ) {
		    $arquivo_tmp = $_FILES[ 'foto' ][ 'tmp_name' ];
		    $nome = $_FILES[ 'foto' ][ 'name' ];
		    // Pega a extensão
		    $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );
		    // Converte a extensão para minúsculo
		    $extensao = strtolower ( $extensao );
		    // Somente imagens, .jpg;.jpeg;.gif;.png
		    // Aqui eu enfileiro as extensões permitidas e separo por ';'
		    // Isso serve apenas para eu poder pesquisar dentro desta String
		    if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
		        // Cria um nome único para esta imagem
		        // Evita que duplique as imagens no servidor.
		        // Evita nomes com acentos, espaços e caracteres não alfanuméricos
		        $novoNome = uniqid ( time () ) . '.' . $extensao;
		 
		        // Concatena a pasta com o nome
		        $destino = '../arquivos/' . $novoNome;
		 
		        // tenta mover o arquivo para o destino
		        if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {

		        	//Nome do caminho + nome do arquivo da foto encaminhada ao sistema
		        	$foto = $destino;
		        }
		        else
		            echo 'Erro ao salvar o arquivo. Aparentemente você não tem permissão de escrita.<br />';
		    }
		    else
		        echo 'Você poderá enviar apenas arquivos "*.jpg;*.jpeg;*.gif;*.png"<br />';
		}
		else
			//Recupera o caminho da foto do usuário caso a atualização não inclua uma foto nova
		    $foto = $data['foto'];


	//Prepara os dados para atualizar (cadastro) no DB
	$insert = $con->prepare("UPDATE users SET name=:name,email=:email,pass=:pass,age=:age,foto=:foto WHERE id='$id'");
	$insert->bindParam(':name',$name);
	$insert->bindParam(':email',$email);
	$insert->bindParam(':pass',$pass);
	$insert->bindParam(':age',$age);
	$insert->bindParam(':foto',$foto);
	$insert->execute();
	if($insert->execute() == true){
		return $msg = "Cadastro realizado com sucesso!";
	}else{
		return $erro = "Erro ao atualizar";
	}
}


//____________________VALIDAÇÃO DE ACESSO (LOGIN)______________________________________//
elseif(isset($_POST['entrar'])){
 $email = $_POST['email'];
 $pass = $_POST['pass'];
 
 $select = $con->prepare("SELECT * FROM users WHERE email='$email' and pass='$pass'");
 $select->setFetchMode(PDO::FETCH_ASSOC);
 $select->execute();
 $data=$select->fetch();
 if($data['email']!=$email and $data['pass']!=$pass)
 {
  echo "invalid email or pass";
 }
 elseif($data['email']==$email and $data['pass']==$pass)
 {
 $_SESSION['email']=$data['email'];
    $_SESSION['name']=$data['name'];
header("location:views/profile.php?link=1"); 
 }
 }
?>