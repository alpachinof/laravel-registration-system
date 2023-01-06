import Chart from 'chart.js/auto';



const data = {
    labels: lecturers,
    datasets: [{
        label: 'تعداد دروس',
        backgroundColor: 'rgb(255, 99, 132)',
        borderColor: 'rgb(255, 99, 132)',
        data: courses,
    }]
};

const config = {
    type: 'line',
    data: data,
    options: {}
};

new Chart(
    document.getElementById('myChart'),
    config
);