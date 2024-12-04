<?php
session_start();
require_once __DIR__ . '/../includes/conexao.php'; // Conexão com o banco
$especialidades = include __DIR__ . '/../includes/especialidades.php';

// Inclui o menu apenas em requisições normais (não AJAX)
if (!(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest')) {
    require_once __DIR__ . '/../includes/menu.php';
}

// Tratamento de requisição AJAX
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SERVER['HTTP_X_REQUESTED_WITH']) && 
    strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
    
    $especialidadeSelecionada = $_POST['especialidadeSelecionada'] ?? '';
    $sql = "SELECT * FROM usuarios WHERE tipo = 'm'";
    
    if (!empty($especialidadeSelecionada)) {
        $sql .= " AND especialidade = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $especialidadeSelecionada);
    } else {
        $stmt = $conn->prepare($sql);
    }

    $stmt->execute();
    $result = $stmt->get_result();

    $medicos = [];
    while ($row = $result->fetch_assoc()) {
        $medicos[] = [
            'id' => $row['id'],
            'nome' => $row['nome'],
            'especialidade' => $row['especialidade'],
            'foto' => htmlspecialchars($row['pfp'], ENT_QUOTES, 'UTF-8'),
        ];
    }

    // Retorna o JSON e finaliza a execução
    header('Content-Type: application/json');
    echo json_encode($medicos);
    exit;
}
?>




<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendamento</title>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="../assets/css/agendamento.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container">
        <!-- Dropdown para selecionar especialidades -->
        <select name="especialidadeSelecionada" id="especialidade-select" class="especialidade-select">
            <option value="" selected>Selecione uma especialidade</option>
            <?php foreach ($especialidades as $especialidade) : ?>
                <option value="<?= htmlspecialchars($especialidade, ENT_QUOTES, 'UTF-8') ?>">
                    <?= htmlspecialchars($especialidade, ENT_QUOTES, 'UTF-8') ?>
                </option>
            <?php endforeach; ?>
        </select>

        <!-- Slider com os médicos -->
        <div class="slider-container">
            <section>
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper" id="medicos-list">
                        <!-- Os médicos serão carregados dinamicamente aqui -->
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                </div>
            </section>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
    $(document).ready(function () {
    // Inicializa o Swiper
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 3,
        spaceBetween: 30,
        slidesPerGroup: 3,
        loop: true,
        loopFillGroupWithBlank: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });

    // Monitorar alterações no dropdown
    $('#especialidade-select').on('change', function () {
        var especialidade = $(this).val();

        // Faz a requisição AJAX
        $.ajax({
            url: 'agendamento.php', // URL do mesmo arquivo PHP
            type: 'POST',
            data: { especialidadeSelecionada: especialidade },
            dataType: 'json',
            success: function (data) {
                // Limpa os slides atuais
                swiper.removeAllSlides(); // Remove todos os slides

                // Adiciona os novos médicos no slider
                if (data.length > 0) {
                    var slides = [];
                    data.forEach(function (medico) {
                        slides.push(`
                            <div class="swiper-slide card">
                                <div class="card-content">
                                    <div class="image">
                                        <img src="${medico.foto}" alt="Foto do médico">
                                    </div>
                                    <div class="name-profession">
                                        <span class="name">${medico.nome}</span>
                                        <span class="profession"><br>${medico.especialidade}</span>
                                    </div>
                                    <div class="button">
                                        <form method="post" action="eventoscontrolar.php?id_medico=${medico.id}">
                                            <input type="submit" class="btn-agenda" value="Ver Agenda">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        `);
                    });

                    // Adiciona os slides ao Swiper
                    swiper.appendSlide(slides);
                } else {
                    swiper.appendSlide('<h1 class="swiper-slide">Nenhum resultado foi encontrado.</h1>');
                }

                // Atualiza o Swiper
                swiper.update();
            },
            error: function () {
                alert('Erro ao carregar os dados. Tente novamente.');
            }
        });
    });

    // Carregar todos os médicos na inicialização
    $.ajax({
        url: 'agendamento.php',
        type: 'POST',
        data: { especialidadeSelecionada: '' }, // Envia vazio para carregar todos os médicos
        dataType: 'json',
        success: function (data) {
            var slides = [];
            data.forEach(function (medico) {
                slides.push(`
                    <div class="swiper-slide card">
                        <div class="card-content">
                            <div class="image">
                                <img src="${medico.foto}" alt="Foto do médico">
                            </div>
                            <div class="name-profession">
                                <span class="name">${medico.nome}</span>
                                <span class="profession"><br>${medico.especialidade}</span>
                            </div>
                            <div class="button">
                                <form method="post" action="eventoscontrolar.php?id_medico=${medico.id}">
                                    <input type="submit" class="btn-agenda" value="Ver Agenda">
                                </form>
                            </div>
                        </div>
                    </div>
                `);
            });

            // Adiciona os slides ao Swiper
            swiper.appendSlide(slides);

            // Atualiza o Swiper
            swiper.update();
        },
        error: function () {
            alert('Erro ao carregar os dados iniciais.');
        }
    });
});

</script>

</body>
</html>
