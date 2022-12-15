<?php
include("include/header.php");
$sql = "select dayname(created_datetime) as forweekday,count(dayname(created_datetime)) as total from posts group by forweekday order by forweekday ASC";
$res = $connection->prepare($sql);
$res->execute();
$data = $res->fetchAll(PDO::FETCH_ASSOC);
$weekDay = [];
for ($i = 0; $i < count($data); $i++) {
    $weekDayNum  = $data[$i]['forweekday'];
    $weekDay[] = $weekDayNum;
}
$countWeekDay = [];
for ($j = 0; $j < count($data); $j++) {
    $forWeekDayTotal = $data[$j]['total'];
    $countWeekDay[] = $forWeekDayTotal;
}
?>

<section class="row mt-3">
    <div class="col-8 offset-2">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <a href="index.php" class="btn btn-secondary">Back</a>
                <div>
                    <a href="weekly.php" class="btn btn-secondary">Weekly</a>
                    <a href="monthly.php" class="btn btn-outline-secondary">Monthly</a>
                    <a href="yearly.php" class="btn btn-outline-secondary">Yearly</a>
                </div>
            </div>
            <div class="card-body">
                <div>
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const labels = <?php echo json_encode($weekDay); ?>;
    const data = {
        labels: labels,
        datasets: [{
            label: '#Weekly Created Posts',
            data: <?php echo json_encode($countWeekDay); ?>,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 205, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(201, 203, 207, 0.2)',
                'rgba(255, 205, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(201, 203, 207, 0.2)'
            ],
            borderColor: [
                'rgb(255, 99, 132)',
                'rgb(255, 159, 64)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)',
                'rgb(54, 162, 235)',
                'rgb(153, 102, 255)',
                'rgb(201, 203, 207)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)',
                'rgb(54, 162, 235)',
                'rgb(153, 102, 255)',
                'rgb(201, 203, 207)'
            ],
            borderWidth: 1
        }]
    };

    const config = {
        type: 'bar',
        data: data,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        },
    };

    var myChart = new Chart(
        document.getElementById("myChart"),
        config
    );
</script>
</body>

</html>
