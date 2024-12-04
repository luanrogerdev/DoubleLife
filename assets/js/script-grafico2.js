
var ctx = document.getElementById('myChart2');
var Quantidade = [10, 2 , 3];
const Usuario = ['Comum', 'Administrador', 'Médico'];
const graphColors = [];
const bordercolor = [];
for (i = 0; i < Usuario.length; i++){
  const r = Math.floor(Math.random() * 255);
  const g = Math.floor(Math.random() * 255);
  const b = Math.floor(Math.random() * 255);
  graphColors.push('rgba('+r+', '+g+', '+b+', 0.8)');
  bordercolor.push('rgba('+r+', '+g+', '+b+', 1)');
}
var myChart2 = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: Usuario ,
    datasets: [{
        label: "Serviço por usuário",
        data: Quantidade,
        backgroundColor: graphColors,      
        borderColor: "rgba(255, 255, 255, 1)",
        hoverBorderColor: "rgba(255, 255, 255, 1)",
        hoverBackgroundColor: bordercolor,
        borderWidth: 1,
       
    }]
  },
  options: {
    layout: {
      padding: 0
    },
    plugins: {
      legend: {
        display: true
      },
    labels: {
      precision: 1,
      position: 'border',
      fontColor: "rgba(0, 0, 0, 1)"
      }
    }
  }  
})
;