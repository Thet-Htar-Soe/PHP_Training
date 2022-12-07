<?php require_once("connection.php");

$sql = "select * from bib_students";
$res = $connection->query($sql);
$data = $res->fetchAll(PDO::FETCH_ASSOC);
?>
<a href="createform.php">Create Student</a>

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Option One</th>
            <th>Option Two</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $d) { ?>
            <tr>
                <td><?php echo $d["name"]; ?></td>
                <td><?php echo $d["email"]; ?></td>
                <td><a href="updateform.php?id= <?php echo $d['id'] ?>">Update Student</a></td>
                <td>
                    <form action="delete.php?id=<?php echo $d['id'] ?>" method="POST">
                        <input type="submit" value="Delete" />
                    </form>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>