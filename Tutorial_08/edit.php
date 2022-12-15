<?php
include('include/header.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "select * from posts where id=?";
    $res = $connection->prepare($sql);
    $res->execute([$id]);
    $data = $res->fetch(PDO::FETCH_ASSOC);

    echo $data['is_published'];
    if ($data['is_published'] == 1) {
        $publish = "checked";
    } else {
        $publish = "";
    }
}

if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    if ($_POST['published'][0]) {
        $publish = $_POST['published'][0];
    } else {
        $publish = 0;
    }
    $sql = "update posts set title=?,content=?,is_published=? where id=?";
    $res = $connection->prepare($sql);
    $res->execute([$title, $content, $publish, $id]);
    $data = $res->fetch(PDO::FETCH_ASSOC);
    header("Location:index.php");
}
?>
<section class="row mt-5">
    <div class="col-8 offset-2">
        <div class="card">
            <div class="card-header">
                <h3>Edit Post</h3>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="form-group mb-3">
                        <label>Title</label><br />
                        <input type="text" name="title" value="<?php echo $data['title']; ?>" class="form-control" />
                    </div>
                    <div class="form-group mb-3">
                        <label>Content</label><br />
                        <textarea rows="5" name="content" class="form-control"><?php echo $data['content']; ?></textarea>
                    </div>
                    <input type="checkbox" name="published[]" value="1" <?php echo $publish; ?> /><label>Publish</label><br />
                    <div class="d-flex justify-content-between mt-3">
                        <a href="index.php" class="btn btn-secondary">Back</a>
                        <button type="submit" name="update" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php
include('include/footer.php');
?>
