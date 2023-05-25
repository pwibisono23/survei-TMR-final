var ctx = document.getElementById("barChart").getContext('2d');
var mybarChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [],
        datasets: [{
            label: '# of Votes',
            data: [],
            backgroundColor: "rgba(2,117,216,1)",
            borderWidth: 1
        }]
    }, 
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});