<?php
include("include/header.php");
$sql = "select month(created_datetime) as formonth,count(month(created_datetime)) as total from posts group by formonth order by formonth ASC";
$res = $connection->prepare($sql);
$res->execute();
$data = $res->fetchAll(PDO::FETCH_ASSOC);
$month = [];
for ($i = 0; $i < count($data); $i++) {
    $monthNum  = $data[$i]['formonth'];
    $dateObj   = DateTime::createFromFormat('!m', $monthNum);
    $monthName = $dateObj->format('F');
    $month[] = $monthName;
}
$countMonth = [];
for ($j = 0; $j < count($data); $j++) {
    $forTotal = $data[$j]['total'];
    $countMonth[] = $forTotal;
}
?>

<section class="row mt-3">
    <div class="col-8 offset-2">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <a href="index.php" class="btn btn-secondary">Back</a>
                <div>
                    <a href="weekly.php" class="btn btn-outline-secondary">Weekly</a>
                    <a href="monthly.php" class="btn btn-outline-secondary">Monthly</a>
                    <a href="yearly.php" class="btn btn-secondary">Yearly</a>
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
    const labels = <?php echo json_encode($month); ?>;
    const getDatas = <?php echo json_encode($countMonth); ?>;
</script>
<script src="js/yearly.js"></script>
</body>

</html>
