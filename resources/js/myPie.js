import Chart from 'chart.js/auto';
const myLabels = [
    'January',
    'February',
    'March',
    'April',
    'May',
    'June',
    'July',
    'August',
    'September',
    'October',
    'November',
    'December'
];
const myBgColors = [
    '#a6cee3',
    '#1f78b4',
    '#b2df8a',
    '#33a02c',
    '#fb9a99',
    '#e31a1c',
    '#fdbf6f',
    '#ff7f00',
    '#cab2d6',
    '#6a3d9a',
    '#ffff99',
    '#b15928'
];
const dataholder = document.getElementById('myPie');

if(dataholder){
    const stats = JSON.parse(dataholder.dataset.stats);
    let myData = [];
    let labels = []
    let bgColors =[];
    function getStats(){
        stats.forEach(element => {
            let myMonth = myLabels[element.month - 1];
            let myColor = myBgColors[element.month - 1]
            myData.push(element.total_sales);
            labels.push(myMonth);
            bgColors.push(myColor);

        });
        console.log(myData, labels, bgColors);
    }
    getStats();
    const data = {
        labels: labels,
        datasets: [{
          label: 'Monthly income in \u20ac',
          data: myData,
          backgroundColor: bgColors,
          hoverOffset: 4
        }]
    };
    
    const config = {
          type: 'doughnut',
          data: data,
        };
        
    new Chart(
        document.getElementById('myPie'),
        config
    )
}