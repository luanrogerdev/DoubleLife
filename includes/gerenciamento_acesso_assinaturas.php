<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/conexao.php';

date_default_timezone_set('America/Sao_Paulo'); // Configuração global de timezone

/**
 * Conecta ao banco de dados e retorna o objeto de conexão.
 *
 * @return mysqli Objeto de conexão.
 */
function conectarBanco() {
    static $conn;
    if (!$conn) {
        if (!defined('DB_SERVER') || !defined('DB_USERNAME') || !defined('DB_PASSWORD') || !defined('DB_NAME')) {
            die('Configurações do banco de dados não definidas.');
        }
        $conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        if ($conn->connect_error) {
            error_log('Erro na conexão com o banco: ' . $conn->connect_error);
            die('Erro na conexão com o banco de dados.');
        }
    }
    return $conn;
}

/**
 * Verifica se o usuário está logado e, opcionalmente, valida o tipo de acesso.
 */
function verificarAcesso($tipoNecessario = null, $redirecionarNaoLogado = '../index.php', $redirecionarAcessoNegado = '../index.php') {
    if (!isset($_SESSION['nome']) || !isset($_SESSION['tipo'])) {
        unset($_SESSION['nome'], $_SESSION['tipo']);
        header("location: $redirecionarNaoLogado");
        exit;
    }
    if ($tipoNecessario !== null && $_SESSION['tipo'] !== $tipoNecessario) {
        header("location: $redirecionarAcessoNegado");
        exit;
    }
}

/**
 * Verifica o status da assinatura de um usuário e redireciona se necessário.
 */
function verificarStatusAssinatura($conn, $redirecionarSemPlano = '/menu-cliente/escolherplano.php') {
    if (!isset($_SESSION['id_usuario'])) {
        exibirMensagemErro('Você precisa estar logado para verificar sua assinatura.');
        header("Refresh: 0; url = /menu-cliente/cadastro-login.php");
        exit;
    }
    $sql = "SELECT * FROM assinaturas WHERE id_usuario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $_SESSION['id_usuario']);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $row = $result->fetch_assoc()) {
        if ($row['status'] !== 'pago') {
            header("location: $redirecionarSemPlano");
            exit;
        }
    } else {
        exibirMensagemErro('Nenhuma assinatura encontrada.');
        header("Refresh: 0; url = $redirecionarSemPlano");
        exit;
    }
}

/**
 * Processa assinaturas expiradas de um usuário.
 */
function processarAssinaturas($id_usuario, $conn) {
    $sql = "SELECT * FROM assinaturas WHERE id_usuario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_usuario);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $id_assinatura = $row['id'];
            $data_hoje = strtotime('now');
            $data_exp = strtotime($row['dt_exp']);
            $resultado = $data_hoje - $data_exp;

            if ($resultado > 0) {
                $sql_update = "UPDATE assinaturas SET status = 'expirada' WHERE id = ?";
                $stmt_update = $conn->prepare($sql_update);
                $stmt_update->bind_param("i", $id_assinatura);
                $stmt_update->execute();
                $stmt_update->close();
            }
        }
    } else {
        exibirMensagemErro('Nenhuma assinatura encontrada para o usuário.');
    }

    $stmt->close();
}

/**
 * Exibe mensagens de erro com segurança.
 */
function exibirMensagemErro($mensagem) {
    echo "<script>window.alert('" . htmlspecialchars($mensagem, ENT_QUOTES, 'UTF-8') . "');</script>";
}
?>
