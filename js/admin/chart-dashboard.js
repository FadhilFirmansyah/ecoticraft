let getData = [];

async function fetchData() {
    try {
        const response = await fetch(window.location + "/api/homepage", {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json'
            }
        });

        if (!response.ok) {
            throw new Error('Network response was not ok ' + response.statusText);
        }

        getData = await response.json();
        updateChartData();

    } catch (error) {
        console.error('Error during fetch operation:', error); 
    }
}

function updateChartData() {
    data_chart.labels = getData.map(item => item.getDate);
    data_chart.datasets[0].data = getData.map(item => item.count);

    if (window.chart) {
        window.chart.update();
    }
}

export const data_chart = {
    labels: [],
    datasets: [{
        label: 'View',
        data: [],
        borderColor: '#3d5d1c',
        borderWidth: 2,
        fill: true,
    }],
};

export const view_stat = {
    type: 'line',
    data: data_chart,
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    stepSize: 5,
                },
            },
        },
        plugins: {
            title: {
                display: true,
                text: 'View Landing Page',
                font: {
                    size: 16,
                },
            },
        },
    },
};

export function createChart() {
    const view_stat_canvas = document.getElementById('view_page').getContext('2d');
    window.chart = new Chart(view_stat_canvas, view_stat);
    return window.chart;
}

fetchData();