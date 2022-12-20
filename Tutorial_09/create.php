<?php
include("include/header.php");
$errTitle = "";
if (isset($_POST['create'])) {
    if($_POST['title']=="") {
        $errTitle = "Title is required!!!";
    } else {
    $sql = "insert into posts(title,content,is_published) values(?,?,?)";
    $title = $_POST['title'];
    $content = $_POST['content'];
    if ($_POST['published'][0]) {
        $publish = $_POST['published'][0]; 
    } else {
        $publish = 0;
    }
    $res = $connection->prepare($sql);
    $res->execute([$title, $content, $publish]);
    header("Location:index.php");
}
}
?>
<section class="row mt-5">
    <div class="col-6 offset-3">
        <div class="card">
            <div class="card-header">
                <h3>Create Post</h3>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="form-group mb-3">
                        <label>Title</label><br />
                        <input type="text" name="title" placeholder="name@example.com" class="form-control" />
                        <small class="text-danger"><?php echo $errTitle;?></small>
                    </div>
                    <div class="form-group mb-3">
                        <label>Content</label><br />
                        <textarea rows="5" name="content" class="form-control"></textarea>
                    </div>
                    <input type="checkbox" name="published[]" value="1" /><label>Publish</label><br />
                    <div class="d-flex justify-content-between mt-3">
                        <a href="index.php" class="btn btn-secondary">Back</a>
                        <button type="submit" name="create" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php include("include/footer.php"); ?>
