document.addEventListener('DOMContentLoaded', function(){
    const canva = document.getElementById('enrollee-pie-chart');
    const canva2 = document.getElementById('enrollee-grade-level-distribution');
    const canva3 = document.getElementById('enrollee-biological-sex');
    const enrolleeLoading = document.getElementById('enrollee-pie-chart-loading');
    const GradeLevelDistributionLoading = document.getElementById('enrollee-grade-level-distribution-loading');
    const BiologicalSexLoading = document.getElementById('enrollee-biological-sex-loading');
    const pieChartContainer = document.getElementById('pie-chart-container');
    const gradeLevelDistributionContainer = document.getElementById('grade-level-distribution-container');
    const biologicalSexContainer = document.getElementById('biological-sex-container');

    pieChartContainer.style.display = 'none';
    gradeLevelDistributionContainer.style.display = 'none';
    biologicalSexContainer.style.display = 'none';

    fetch('../server_side/return-dashboard-json.php')
    .then(response => response.json())
    .then(data=> {
        enrolleeLoading.style.display = 'none';
        GradeLevelDistributionLoading.style.display = 'none';
        BiologicalSexLoading.style.display = 'none';

        pieChartContainer.style.display = 'block';
        gradeLevelDistributionContainer.style.display = 'block';
        biologicalSexContainer.style.display = 'block';
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
        enrolleeLoading.innerHTML = "<p>No data found</p>";
        GradeLevelDistributionLoading.innerHTML = "<p>No data found</p>";
        BiologicalSexLoading.innerHTML = "<p>No data found</p>";
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
                        '#FFB3C4'
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