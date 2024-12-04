<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="/estilos/login.css">
    <link rel="stylesheet" href="/estilos/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta charset="UTF-8">
    <title>Esqueceu Senha</title>
</head>
<body>
    
    <div class="btn-voltar">
        <a href="/cadastro-login.php" id="icon"<i class="fa-solid fa-arrow-left-long"></i></a>
        
        <style>
            #icon{
                padding-left: 10px;
                color: #063666;
                text-decoration: none;
                font-size: 38px;
            }
        </style>
        
    </div>
    
    <form method="post" action="recebecodigo.php">
        <div class="fundo">
           <div class="container_senha">
                <div id="title_senha">
                    <h2 class="title-second">Recuperação de Senha</h2>
                </div>
                <div class="Email">
                    <input type="email" name="email" placeholder="Insira seu email" class="input_email">
                </div>
                <div class="btn_senha">
                    <button type="submit" value="Enviar" id="btn-logar" class="btn btn-second">Enviar</button>
                </div>
            </div>
       </div>
   </form>
   
   </a>
</body>
</html>