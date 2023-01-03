<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Export</title>
</head>

<body>
    <?php $i = 1; ?>

    <table class="table table-striped">
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Major</th>
        </tr>
        @foreach ($students as $student)
            <tr>
                <td><?php echo $i;
                $i++; ?></td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->phone }}</td>
                <td>{{ $student->address }}</td>
                <td>{{ $student->major->name }}</td>
            </tr>
        @endforeach
    </table>

</body>

</html>
