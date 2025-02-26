<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="chart.css">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="../bootstrap/js/bootstrap.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body>


    <div class="col-8 offset-2 w-25 my-5">
        <div class="card">
            <div class="card-body">
                <p class="h5">This is a chart</p>
                <hr>
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>


</body>



<script>
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Papaya', 'Apple', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: 'Sales of items',
                data: [12, 19, 3, 5, 2, 3],
                borderWidth: 3
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>


</html>