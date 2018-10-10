<?php
  $images = scandir('upload');
  ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Quête téléchargement</title>
</head>

<body>

<form method="POST" action="upload.php" enctype="multipart/form-data">
    <!-- On limite le fichier à 1000Ko -->
    <input type="hidden" name="MAX_FILE_SIZE" value="1000000">

    <input type="file" name="files[]" multiple="multiple">

    <input type="submit" name="envoyer" value="Envoyer le fichier">

</form>


<div class="container">
    <div class="row">
        <?php foreach ($images as $image):?>
        <div class="col-4">
            <div class="card" style="width:18rem">
                <img class="card-img-top" src="upload/<?php echo $image; ?>" alt="Card image cap" >
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text"></p>
                    <a href="unlink.php?delete=<?php echo $image; ?>" class="btn btn-primary">DELETE</a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

</body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</html>

