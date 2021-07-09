<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>CRUD IN PHP</title>
    <style>
    
    </style>

</head>

<body>
    <?php require_once 'process.php';?>

    <?php

    if (isset($_SESSION['message'])) {?>

    <div class="alert alert-<?=$_SESSION['msg_type'] ?>">

        <?php 
            echo $_SESSION['message'];
            unset($_SESSION['message']);
            ?>


    </div>


    <?
    }
    ?>

    <div class="container">

        <?php
    $mysqli= new mysqli('localhost','root','','curd') or die($mysqli->error);
    $result = $mysqli->query("SELECT * FROM data ") or die($mysqli->error);
    //re_r($result->fetch_assoc());
    ?>


        <div class="row justify-content-center">
            <table class="table table-striped table-bordered">
                <thead>
                    <th>Id<th>
                    <th>Name</th>
                    <th>Location</th>
                    <th colspan="2">Action</th>

                </thead>
                <?php
         
         while ($row = $result->fetch_assoc()) { ?>

                <tr>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['location']; ?></td>
                    <td>
                        <a href="index.php?edit=<?php echo $row['id'];?>" class="btn btn-info">Edit</a>
                        <a href="process.php?delete=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <?
         }
 ?>

            </table>

        </div>

        <?php

        function pre_r($array){ 
            echo '<pre>';
            print_r($array);
            echo'<pre>';
        }
    ?>


        <div class="row justify-content-center">
            <form action="process.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $id;?>">

                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control" value="<?php echo $name;?>"
                        placeholder="Enter Your Name">
                </div>
                <div class="from-group">
                    <label for="">Location</label>

                    <input type="text" name="location" class="form-control" value="<?php echo $location;?>"
                        placeholder="Enter Your location">


                </div>
                <div class="form-group">
                <?php

                if ($update == true) { ?>

                      <button type="submit" name="update" class="btn btn-info">Update</button>

                <?    
                }
                else {?>
                <button type="submit" name="save" class="btn btn-primary">Save</button>

                <?
                }
                ?>
                    
                </div>

            </form>
        </div>


        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    </div>
</body>

</html>
