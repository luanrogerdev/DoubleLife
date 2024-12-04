<?php
session_start();

//Verifica o acesso.
//require 'acessocomum.php';

//Faz a conexão com o BD.
require 'conexao2.php';

//Cria o SQL (consulte tudo da tabela usuarios)
$sql = "SELECT * FROM usuarios WHERE id =" . $_SESSION["id_usuario"];

//Executa o SQL
$result = $conn->query($sql);

	//Se a consulta tiver resultados
	 if ($result->num_rows > 0) {

// Cria uma matriz com o resultado da consulta
 $row = $result->fetch_assoc();
?>
<html>
<head>
    <link rel="stylesheet" href="././estilos/style.css">
    <link rel="stylesheet" href="././estilos/header-footer.css">
        

</head>
<body>
    
    <?php
    include "menu.php";
    ?>
    <div id="container-form">
        <i class="fa-solid fa-person"></i>
        <form method="post" action="mudardados.php">
            <label class="form-conta-label">Nome:</label><br><br>
            <input class="form-conta" type="text" value="<?php echo $row["nome"]; ?>" name="nome"><br><br>
            <label class="form-conta-label">Email:</label><br><br>
            <input class="form-conta" type="email" value="<?php echo $row["email"]; ?>" name="email"><br><br>
            <label class="form-conta-label">CPF:</label><br><br>
            <input class="form-conta" type="text" value="<?php echo $row["cpf"]; ?>" name="cpf" required pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" title="Digite um CPF no formato: xxx.xxx.xxx-xx"><br><br>
            <label class="form-conta-label">CEP:</label><br><br>
            <input class="form-conta" type="text" value="<?php echo $row["cep"]; ?>" name="cep" required pattern= "\d{5}-?\d{3}" title="Digite um CEP no formato: xxxxx-xxx"><br><br>
            <label class="form-conta-label">Telefone:</label><br><br>
            <input class="form-conta" type="text" value="<?php echo $row["telefone"]; ?>" name="telefone" required pattern="(?:([1-9]{2})|([0-9]{3})?)(\d{4,5})(\d{4})" title="digite números nesse campo no formato: xx-xxxxx-xxxx ou xxxx-xxxx."><br><br>
             <label class="form-conta-label">Endereço:</label><br><br>
            <input class="form-conta" type="text" value="<?php echo $row["endereco"]; ?>" name="endereco"><br><br>
             <label class="form-conta-label">Data de Nascimento:</label><br><br>
            <input class="form-conta" type="date" value="<?php echo $row["data_nascimento"]; ?>" name="data_nascimento"><br><br>
            <input type="submit" class="form-conta-buttom" value="Salvar" name="btn_enviar">
            
        </form>
    </div>
    
</body>
</html>
<?php
	//Se a consulta não tiver resultados  			
	} else {
		echo "<h1>Nenhum resultado foi encontrado.</h1>";
	}

	//Fecha a conexão.	
	$conn->close();
	


?>