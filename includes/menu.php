<header class="header">
    <a href="../pages/index.php">
        <img 
            src="../assets/imagens/Logo_Cubo_para_empresa_de_Arquitetura_Design_e_Engenharia_1.png" 
            id="logo" 
            alt="Logo da DoubleLife" 
            title="Voltar para o Menu Principal">
    </a>

    <nav id="nav">
        <button 
            aria-label="Abrir Menu" 
            id="btn-mobile" 
            aria-haspopup="true" 
            aria-controls="menu" 
            aria-expanded="false">
            <span id="hamburger"></span>
        </button>

        <table id="menu">
            <tr>
                <td><a href="../pages/agendamento.php" id="itens">Agendamento</a></td>
                <td><a href="../pages/services.php" id="itens">Serviços</a></td>
                <td><a href="../pages/login.php" id="itens">Nossos Planos</a></td>

                <?php if (!isset($_SESSION['email']) && !isset($_SESSION['senha'])): ?>
                    <td><a id="login" href="../pages/login.php">Login</a></td>
                <?php else: ?>
                    <td>
                        <div class="dropd">
                            <a class="nome"><?php echo htmlspecialchars($_SESSION['nome']); ?></a>
                            <div class="drop">
                                <a href="/conta.php?id=<?php echo htmlspecialchars($_SESSION['id_usuario']); ?>">Gerenciar Conta</a>
                                <a href="/historicoconsultas.php">Histórico de Consultas</a>
                                <a href="/deslogar.php">Deslogar</a>
                            </div>
                        </div>
                    </td>
                <?php endif; ?>
            </tr>
        </table>
    </nav>
</header>

<script src="../assets/js/menu-conta.js"></script>
<link rel="stylesheet" href="../assets/css/header-footer.css">

