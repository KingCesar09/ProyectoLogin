<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado</title>
</head>
<body>

    <?php foreach ($tasks as $task) : ?>
         <tr>
             <td><?php echo $task->id; ?></td>
             <td><?php echo $task->nombre; ?></td>
             <td><?php echo $task->vencimiento; ?></td>
         </tr>
    <?php endforeach; ?>

</body>
</html>