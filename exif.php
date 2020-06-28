<?php
error_reporting(0);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>ICWR-TECH | Exif tools</title>
  </head>
  <body class="container" style="background-color:black">
    <div class="jumbotron mt-5">
    <h1 class="mt-3"><u><i>Exif tools online</i></u></h1>
    <form class="form-group mt-3" action="" method="post" enctype="multipart/form-data">
      <input type="file" name="file" value="">
      <br>

      <br>
      <input type="submit" name="submit" value="Submit" class="btn btn-primary">
    </form>
    <?php
    $nama_g=htmlentities($_FILES['file']['name']);
    $type_g=$_FILES['file']['type'];
    $ukuran_g=$_FILES['file']['size'];
    $tmp_g=$_FILES['file']['tmp_name'];
    $tempat_g="files/".$nama_g;
    $target_file_g="files/".basename($nama_g);
    $type_file_g=pathinfo($target_file_g,PATHINFO_EXTENSION);
    if($_POST['submit']){
        if(move_uploaded_file($tmp_g,$tempat_g)){
          if (exif_read_data("files/".$nama_g)){
          ?>
<pre>
<textarea rows="8" cols="80" class="form-control" disabled>
  <?php
    print_r(exif_read_data("files/".$nama_g))
  ?>
</textarea>
</pre>
          <?php
        }else{
          echo "<div class='alert alert-warning'>Format file tak didukung!</div>";
        }
        unlink("files/".$nama_g);
      }else{
        echo "<div class='alert alert-warning'>Harap isi file!</div>";
      }
    }
     ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>
