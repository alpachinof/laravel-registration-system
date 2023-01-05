import Chart from 'chart.js/auto';

const labels = [
    'January',
    'February',
    'March',
    'April',
    'May',
    'June',
    '1',
    '2',
    '3',
    '4',
    '5',
];

const data = {
    labels: labels,
    datasets: [{
        label: 'My First dataset',
        backgroundColor: 'rgb(255, 99, 132)',
        borderColor: 'rgb(255, 99, 132)',
        data: [0, 10, 5, 2, 20, 30, 200],
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