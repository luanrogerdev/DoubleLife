<style>
.X {
    cursor: pointer;
    float: right;
    position: absolute;
    top: -10px;
	left: 340px;
    color: white;
    transition: 0.3s;
}
.X:hover {
    color: black;
}
.X2 {
    cursor: pointer;
    float: right;
    position: absolute;
    top: -20px;
	left: 340px;
    color: white;
    transition: 0.3s;
}
.X2:hover {
    color: black;
}

</style>
<head>
    <link rel="stylesheet" href="../assets/css/header-footer.css">
</head>
<body>
    <div class="caixa">
        <div class="conteudo">
            <a class = "X">  X </a>
            <p></p><h2>Sobre Nós:</h2>
            <p>A DoubleLife é uma clínica médica instalada 
            na Gávea, no Rio de Janeiro. Foi fundada em 1998,
            com o intuito de melhorar a saúde dos cariocas e ser
            um exemplo de modernidade e eficiência médica.
            Nossa clínica visa a agilidade e qualidade em serviços de saúde,
            por meio do cooperativismo médico e do conhecimento, 
            para que o maior número de pessoas possa ter o melhor atendimento
            ao seu dispor.</p> 
        </div>
    </div>
    
    <div class="caixa-2">
        <div class="conteudo-2">
            <a class = "X2">  X </a>
            <p></p><h2>Equipe Double Life (Desenvolvedores) </h2>
                <p>✧ Ana Eduarda ✧</p>
                <p>✧ Diego Tasso ✧</p>
                <p>✧ Felipe Martins ✧</p>
                <p>✧ Gabriel Tavares ✧</p>
                <p>✧ Isabel Marinho ✧</p>
                <p>✧ Luan Roger ✧</p>
        </div>
    </div>
    
    <footer class="footer">
      <div class="social">
         <a href="https://www.instagram.com/_doublelife_clinical/"><i id="instagram" class="fa-brands fa-instagram"></i></a>
         <a href="#"><i class="fa-brands fa-twitter"></i></i></a>
         <a href="#"><i class="fa-brands fa-facebook"></i></a>
         <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
         <a href="#"><i class="fa-solid fa-phone"></i></a>
      </div>

    <ul class="list">
        <li>
            <div class = "togglebutton-2">Equipe </div>
        </li>
        
        <li>
            <div class = "togglebutton">Sobre Nós </div>
        </li>
        
        <li>
            <a href="../menu-cliente/contato.html">Contate-nos</a>
        </li>
        
        <li>
            <a href="../terms.php">Termos de Uso</a>
        </li>
        
        <li>
            <a href="../privacidade.php">Política de Privacidade</a>
        </li>
    </ul>

      <p class="copyright">
         1303 - Double Life @ 2022
      </p>
   </section>
   
</footer>

        <script>
            //Modal 1
            let togglebutton =document.querySelector('.togglebutton');
            let x =document.querySelector('.X');
            let caixa =document.querySelector('.caixa');
            
            x.onclick = function() {
                caixa.classList.toggle('active');
            }
            togglebutton.onclick = function() {
                caixa.classList.toggle('active');
            }
            //Modal 2
            let togglebutton2 =document.querySelector('.togglebutton-2');
            let x2 =document.querySelector('.X2');
            let caixa2 =document.querySelector('.caixa-2');
            
            x2.onclick = function() {
                caixa2.classList.toggle('active');
            }

            togglebutton2.onclick = function() {
                caixa2.classList.toggle('active');
            }
        </script>