<html lang="pt-br">
<head>
    <link rel="shortcut icon" href="/imagens/Logo_Cubo_para_empresa_de_Arquitetura_Design_e_Engenharia_2.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="../assets/css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>
    
<?php
    include "../includes/menu.php";
?>
    <div class="container">
        <div class="content first-content">
            <div class="first-column">
                <h2 class="title title-primary">Bem Vindo a DoubleLife!</h2>
                <p class="description description-primary">Novo por aqui? Comece sua jornada conosco! ❤</p>
                <p class="description description-primary">Se cadastre para acessar nossas funcionalidades.</p>
                <button id="signin" class="btn btn-primary" onclick="trocaCorBranco()">Cadastrar</button>
            </div>    
            <div class="second-column">
                <h2 class="title title-second">Login</h2>
                <p class="description description-second">Faça login para acessar nossas funcionalidades. ❤</p>
                <form class="form" method="post" action="login.php">
                    <label class="label-input" for="">
                        <i class="far fa-envelope icon-modify"></i>
                        <input type="email" name="email" placeholder="Email">
                    </label>
                
                    <label class="label-input" for="">
                        <i class="fas fa-lock icon-modify"></i>
                        <input type="password" name="senha" placeholder="Senha">
                    </label>
                    
                    <a id="cadastrar" href="/menu-cliente/php/login.php">Cadastre-se aqui</a>
                    <a class="password" href="/menu-cliente/esqueceusenha.php">Esqueceu sua Senha?</a>
                    
                    <button type="submit" value="Enviar" id="btn-logar" class="btn btn-second">Entrar</button>

                </form>
            </div><!-- second column -->
        </div><!-- first content -->
        <div class="content second-content">
            <div class="first-column">
                <h2 class="title title-primary">Bem Vindo a DoubleLife!</h2>
                <p class="description description-primary">Já possui uma conta? faça seu login abaixo. ❤</p>
                <p class="description description-primary">Faça login para acessar nossas funcionalidades. </p>
                <button id="signup" class="btn btn-primary" onclick="trocaCorAzul()">Entrar</button>
            </div>
            <div class="second-column">
                <h2 class="title title-second">Cadastre-se</h2>

                <form class="form" method="post" action="cadastro.php">
                
                    <label class="label-input" for="">
                        <i class="far fa-solid fa-clipboard icon-modify"></i>
                        <input type="text" name="nome" placeholder="Nome Completo" pattern="[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$" required>
                    </label>
                
                    <label class="label-input" for="">
                        <i class="far fa-envelope icon-modify"></i>
                        <input type="email" name="email" placeholder="nome@email.com" required>
                    </label>
                    
                    <label class="label-input" for="">
                        <i class="fas fa-lock icon-modify"></i>
                        <input type="password" name="senha" placeholder="Senha" id="pass" name="password" minlength="7" required title="é preciso que a senha contenha no mínimo 7 caracteres.">
                    </label>

                    <label class="label-input" for="">
                        <i class="far fa-solid fa-chalkboard-user icon-modify"></i>
                        <input type="text" name="cpf" placeholder="CPF" required pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" title="Digite um CPF no formato: xxx.xxx.xxx-xx">
                    </label>
                    
                    <label class="label-input" for="">
                        <i class="far fa-solid fa-house icon-modify"></i>
                        <input type="text" name="cep" placeholder="CEP" id="CEP" required pattern= "\d{5}-?\d{3}" title="Digite um CEP no formato: xxxxx-xxx">
                    </label>

                    <label class="label-input" for="">
                        <i class="far fa-solid fa-phone icon-modify"></i>
                        <input type="text" name="telefone" placeholder="Número de Telefone" id="telefone" required pattern="(?:([1-9]{2})|([0-9]{3})?)(\d{4,5})(\d{4})" title="digite números nesse campo no formato: xx-xxxxx-xxxx ou xxxx-xxxx.">
                    </label>
                    
                    <label class="label-input" for="">
                        <i class="far fa-solid fa-house icon-modify"></i>
                        <input type="text" name="endereco" placeholder="Endereço" id="endereço" required title="digite seu endereço.">
                    </label>

                    <label class="label-input" for="">
                        <i class="fa-regular fa-calendar-days"></i>
                        <input type="date" name="data_nascimento">
                    </label>
                    
                    <button type="submit" class="btn btn-second" id="btn-cadastrar">Cadastrar</button>
                </form>
            </div><!-- second column -->
        </div><!-- second-content -->
    </div>
    <script src="../js/app.js"></script>
    <script type="text/javascript" src="../js/btn-voltar.js"></script>
    <script type="text/javascript" src="../js/btn-mobile.js"></script>

</html>