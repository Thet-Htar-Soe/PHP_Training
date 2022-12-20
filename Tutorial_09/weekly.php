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
    const getDatas = <?php echo json_encode($countWeekDay); ?>;
</script>
<script src="js/weekly.js"></script>
</body>

</html>
