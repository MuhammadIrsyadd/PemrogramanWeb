<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BELAJAR PHP</title>
</head>
<body> 
    <?php $halo = "Sayang";?>
    <?php $kabar = "Apa Kabar ?";?>
    <h1>
       Hai <?php echo $halo. ' ' .$kabar ?>
    </h1> 
    <p>
        <?php echo 'Lop u $halo'; ?>
        <p>
            <?php echo "Lop u $halo"; ?>
        </p>
    </p>
</body>
</html>