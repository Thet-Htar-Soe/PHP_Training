<?php
include("include/header.php");
$sql = "select * from posts";
$res = $connection->prepare($sql);
$res->execute([]);
$data = $res->fetchAll(PDO::FETCH_ASSOC);
$no = 1;
?>
<section class="row mt-5">
    <div class="col-10 offset-1">
        <a href="create.php" class="btn btn-primary">Create</a>
        <div class="card mt-3">
            <div class="card-header">
                <h2>Post Lists</h2>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Is Published</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $d) {
                            if ($d['is_published'] == 1) {
                                $publish = "Published";
                            } else {
                                $publish = "Unpublished";
                            }
                        ?>
                            <tr>
                                <td><?php echo $no;
                                    $no++; ?></td>
                                <td><?php echo $d['title'] ?></td>
                                <td class="d-block text-truncate" style="max-width:600px;height:70px;"><?php echo $d['content'] ?></td>
                                <td><?php echo $publish; ?></td>
                                <td><a href="view.php?id=<?php echo $d['id']; ?>" class="btn btn-info">View</a></td>
                                <td><a href="edit.php?id=<?php echo $d['id']; ?>" class="btn btn-success">Edit</a></td>
                                <td>
                                    <form action="delete.php?id=<?php echo $d['id']; ?>" method="POST">
                                        <input type="submit" value="Delete" onclick="return confirm('Are You Sure You Want To Delete?')" class="btn btn-danger" />
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<?php include("include/footer.php"); ?>
