import {Chart} from 'chart.js/auto';



const data = {
    labels: lecturers,
    datasets: [{
        label: 'تعداد دروس',
        borderWidth: 2,
        backgroundColor: 'rgb(255,177,193)',
        borderColor: 'rgb(255, 99, 132)',
        borderRadius:20,
        data: courses,
    }]
};

const config = {
    type: 'bar',
    data: data,
    options: {}
};

new Chart(
    document.getElementById('myChart'),
    config
);


const data2 = {
    labels: students,
    datasets: [{
        label: 'دانشجویان درس',
        borderWidth: 2,
        backgroundColor: 'rgb(154,208,245)',
        borderColor: 'rgb(63,166,236)',
        borderRadius:20,
        data: courses2,
    }]
};

const config2 = {
    type: 'bar',
    data: data2,
    options: {}
};

new Chart(
    document.getElementById('myChart2'),
    config2
);