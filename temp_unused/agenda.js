(function(win,doc){
  'use strict';

  //Captura o elemento HTML marcado com a classe
  let calendarEl = document.querySelector('.calendar');
  
  const urlParams = new URLSearchParams(window.location.search);
  const id_medico_url = urlParams.get('id_medico');
  //const data = new Date();
  
  //let diaAtual = data.getDate();
  //let mesAtual = data.getMonth() + 1;
  //let anoAtual = data.getFullYear();
  
  //const dataAtual = {
  //      data: anoAtual . mesAtual . diaAtual
  //  }
  
  //console.log("Data:" + dataAtual.mm);
  
  //Cria uma inst�ncia
  //dayGridMonth - Abre por m�s, pode ser semana ou display 
let calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    hiddenDays: [0, 6],
    //headerToolBar - configura��o da barra superior. O que vai no in�cio, no meio ou no fim
    headerToolbar:{
        start: 'prev,today,next',
        center: 'title',
        end: 'dayGridMonth, timeGridWeek, timeGridDay'
    },
    //buttonText - personaliza o texto dos bot�es da headerToolBar
    buttonText:{
        today:    'hoje',
        month:    'm�s',
        week:     'semana',
        day:      'dia'
    },
    //locale - troca a linguagem
    locale:'pt-br',
    slotDuration: '00:40:00',
    snapDuration: '00:40:00',
    //Captura o evento clique
    dateClick: function(info, id_medico) {
            if(info.view.type == 'dayGridMonth'){
                calendar.changeView('timeGrid', info.dateStr);
            } else{
                if(info.date.getHours()<7 || info.date.getHours()>20){
                    alert('Nosso hor�rio de funcionamento � de 7:00 �s 20:00');
                } else if(info.date.getDay() < 'diaAtual'){
                    alert('Nosso hor�rio de funcionamento � de 7:00 �s 20:00');
                } else{
                    window.location.href='eventocadastrarform.php?date='+info.dateStr+'&id_medico='+id_medico_url;
                }
    
            }            
    },
    //Marca eventos no calend�rio
    events: 'eventoslistar.php?id_med=' + id_medico_url,
	eventClick: function(info) {
		alert("Esse � o seu evento!");
	}
});
//console.log(id_medico_url);
calendar.render();

})(window,document);