<?php
include("include/header.php");
$sql = "select date(created_datetime) as forday,count(day(created_datetime)) as total from posts group by forday order by forday ASC";
$res = $connection->prepare($sql);
$res->execute();
$data = $res->fetchAll(PDO::FETCH_ASSOC);
$day = [];
for ($i = 0; $i < count($data); $i++) {
    $dayNum  = $data[$i]['forday'];
    $day[] = $dayNum;
}
$countDay = [];
for ($j = 0; $j < count($data); $j++) {
    $forTotal = $data[$j]['total'];
    $countDay[] = $forTotal;
}
?>

<section class="row mt-3">
    <div class="col-8 offset-2">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <a href="index.php" class="btn btn-secondary">Back</a>
                <div>
                    <a href="weekly.php" class="btn btn-outline-secondary">Weekly</a>
                    <a href="monthly.php" class="btn btn-secondary">Monthly</a>
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
    const labels = <?php echo json_encode($day); ?>;
    const getDatas = <?php echo json_encode($countDay); ?>;
</script>
<script src="js/monthly.js"></script>
</body>

</html>
