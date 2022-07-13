require('./bootstrap');

const chartElement = document.getElementById("chartStatistics");

if( typeof customers_per_day !== 'undefined' && chartElement ) {
    const labelsBarChart = Object.keys(customers_per_day);
    const dataBarChart = {
        labels: labelsBarChart,
        datasets: [
            {
                label: "Customers per day",
                backgroundColor: "hsl(252, 82.9%, 67.8%)",
                borderColor: "hsl(252, 82.9%, 67.8%)",
                data: Object.values(customers_per_day),
            },
        ],
    };

    const configBarChart = {
        type: "bar",
        data: dataBarChart,
        options: {
            responsive: true,
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Day'
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'Value'
                    },
                    min: 0,
                    ticks: {
                        stepSize: 1
                    }
                }
            }
        },
    };

    var chartBar = new Chart(
        chartElement,
        configBarChart
    );
}
