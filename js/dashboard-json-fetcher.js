document.addEventListener('DOMContentLoaded', function(){
    const canva = document.getElementById('enrollee-pie-chart');
    const canva2 = document.getElementById('enrollee-grade-level-distribution');
    const canva3 = document.getElementById('enrollee-biological-sex');
    fetch('../server_side/return-dashboard-json.php')
    .then(response => response.json())
    .then(data=> {
        console.log(data);
        if(data.success === false) {
            alert(data.message);
        }
        else {
           EnrollmentsPieChart(data.chart1);
           barGraph(data.chart2); 
           BiologicalSexPieGraph(data.chart3);
        }
    })
    .catch(error=>{
        console.error('Error fetching data:', error);
    })
    function EnrollmentsPieChart(data) {
        const ctx = canva.getContext('2d');
        const labels = data.map(item=> item.label);
        const values = data.map(item=> item.value);
        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    data: values,
                    backgroundColor: [
                        '#36A2EB',
                        '#FFCE56',
                        '#FF6384',
                    ]
                }]
            },
            option: {
                responsive: true,
                plugins: {
                    legend: {
                    position: 'top'
                }
                }
            }
        })
    }
    function barGraph(data) {
        const ctx = canva2.getContext('2d');
        const labels = data.map(item=> item.label);
        const values = data.map(item=> item.value);
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Grade Level Count',
                    data: values,
                    backgroundColor: '#36A2EB'
                }]
            },
            option: {
                responsive: true,
                plugins: {
                    legend: {
                    position: 'top'
                }
                }
            }
        })
    } 
    function BiologicalSexPieGraph(data) {
        const ctx = canva3.getContext('2d');
        const labels = data.map(item=> item.label);
        const values = data.map(item=> item.value);
        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    data: values,
                    backgroundColor: [
                        '#36A2EB',
                        '#FFCE56',
                        '#FF6384',
                    ]
                }]
            },
            option: {
                responsive: true,
                plugins: {
                    legend: {
                    position: 'top'
                }
                }
            }
        })
    }
});