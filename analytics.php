<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<canvas id="winLossChart"></canvas>
<script>
    const ctx = document.getElementById('winLossChart').getContext('2d');
    const winLossData = {
        labels: ['Win', 'Loss'],
        datasets: [{
            label: 'Win/Loss Ratio',
            data: [<?php echo $winCount; ?>, <?php echo $lossCount; ?>],
            backgroundColor: ['green', 'red']
        }]
    };
    const winLossChart = new Chart(ctx, {
        type: 'pie',
        data: winLossData
    });
</script>
