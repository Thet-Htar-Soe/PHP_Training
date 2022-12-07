<?php require_once("connection.php"); ?>
<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "select * from bib_students where id=?";
    $res = $connection->prepare($sql);
    $res->execute([$id]);
    $data = $res->fetch(PDO::FETCH_ASSOC);
}
?>
<form action="update.php?id=<?php echo $data['id'] ?>" method="POST">
    <input type="text" name="name" value="<?php echo $data['name'] ?>" /><br />
    <input type="email" name="email" value="<?php echo $data['email'] ?>" /><br />
    <input type="submit" value="Update" />
</form>