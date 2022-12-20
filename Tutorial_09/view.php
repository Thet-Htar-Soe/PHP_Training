<?php
include("include/header.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "select * from posts where id=?";
    $res = $connection->prepare($sql);
    $res->execute([$id]);
    $data = $res->fetch(PDO::FETCH_ASSOC);
    if ($data['is_published'] == 1) {
        $publish = "Published";
    } else {
        $publish = "Unpublished";
    }
}
?>
<section class="row mt-5">
    <div class="col-8 offset-2">
        <div class="card">
            <div class="card-header">
                <h3>Post Details</h3>
            </div>
            <div class="card-body">
                <h3><?php echo $data['title']; ?></h3>
                <h6><i><?php echo $publish; ?> at </i><?php echo date('M d,Y',strtotime($data['created_datetime'])); ?></h6>
                <p><?php echo $data['content'] ?></p>
                <a href="index.php" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
</section>

<?php
include("include/footer.php");
?>
