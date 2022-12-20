<?php
include("include/header.php");
$sql = "select * from posts";
$res = $connection->prepare($sql);
$res->execute([]);
$datas = $res->fetchAll(PDO::FETCH_ASSOC);
$no = 1;
?>
<section class="row mt-5 mx-2">
    <div class="col-12">
        <a href="create.php" class="btn btn-primary">Create</a>
        <a href="weekly.php" class="btn btn-primary">Graph</a>
        <div class="card mt-3">
            <div class="card-header">
                <h2>Post Lists</h2>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr class="text-center">
                            <th>ID</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Is Published</th>
                            <th>Created Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($datas as $data) {
                            if ($data['is_published'] == 1) {
                                $publish = "Published";
                            } else {
                                $publish = "Unpublished";
                            } 
                        ?>
                            <tr>
                                <td><?php echo $no;
                                    $no++; ?></td>
                                <td><?php echo $data['title'] ?></td>
                                <td class="d-block text-truncate" style="max-width:500px;height:70px;"><?php echo $data['content'] ?></td>
                                <td><?php echo $publish; ?></td>
                                <td><?php echo $data['created_datetime'] ?></td>
                                <td>
                                    <a href="view.php?id=<?php echo $data['id']; ?>" class="btn btn-info d-inline">View</a>
                                    <a href="edit.php?id=<?php echo $data['id']; ?>" class="btn btn-success d-inline">Edit</a>
                                    <a href="#"  class="btn btn-danger d-inline modal-delete-btn" >Delete</a>
                                <div class="modal-box">
                                    <h4>Delete Box</h4>
                                    <p>Are You Sure You Want To Delete?</p>
                                    <div class="modal-option">
                                      <button type="cancel" class="cancel-btn">Cancel</button>
                                       <a href="delete.php?id=<?php echo $data['id']; ?>" class="box-delete text-decoration-none">Delete</a>
                                    </div>
                                </div>
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
