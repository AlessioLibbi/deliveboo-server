import Chart from 'chart.js/auto';
const labels = [
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

const dataholder = document.getElementById('myChart');
if(dataholder){

    const stats = JSON.parse(dataholder.dataset.stats);
    let myData = [];
    
    function getStats(){
        stats.forEach(element => {
            let myMonth = labels[element.month - 1];
            let obj = {
                X: myMonth,
                Y:element.order_count
            }
            myData.push(obj);
        });
    }
    getStats();
    console.log(myData);
    const data = {
        labels: labels,
        datasets: [{
            label: 'Orders per month',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: myData.reverse(),
        }]
    };
    
    const config = {
        type: 'bar',
        data: data,
        options: {
            parsing:{
                
                xAxisKey: 'X',
                yAxisKey: 'Y'
            }
        }
    };
    
    new Chart(
        document.getElementById('myChart'),
        config
        );
    }