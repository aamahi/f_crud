<?php
    require_once('function.php');

    $info ='';

    $task = $_GET['task']?? 'report';
    $error = $_GET['error']?? '0';

    if('seed'==$task){
        seed();
        $info = "Seeding is Compleate";
    }

    $name = '';
    $dept = '';
    $roll = '';
    if(isset($_POST['save'])){
      $name = filter_input(INPUT_POST,'name',FILTER_SANITIZE_STRING);
      $dept = filter_input(INPUT_POST,'dept',FILTER_SANITIZE_STRING);
      $roll = filter_input(INPUT_POST,'roll',FILTER_SANITIZE_STRING);
      if($name !='' && $dept !='' && $roll !=''){
        $result = add_student($name,$dept,$roll);
        if($result){
          header('Location:index.php?error=sc');
        }else{
          $error = 1;
        }
      }
    }


?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>File Crud</title>
  </head>
  <body>
    

    <div class="row mt-3">
        <div class="container">
            <div class="col-md-10 offset-md-1">
                <div class="card">
                        <?php include_once('nav.php');?>
                    <div class="card-body">
                    <?php
                        if($info !=''):
                    ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                          <?=$info;?>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  <?php
                      endif;
                      if('sc'==$error):
                        ?>
                           <div class="alert alert-success alert-dismissible fade show" role="alert">
                                  Student added Sucessfully !
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        <?php
                      endif;
      
                      if('1'==$error):
                  ?>
                     <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Duplicate Roll Number !
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  <?php
                      endif;

                      if($task == 'report'):
                        genarateReport();
                      endif;
                      if($task == 'add_student'):
                  ?>
                  <form action='index.php?task=add_student' method="post">
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?=$name?>" placeholder="Enter Name">
                      </div>
                      <div class="form-group">
                        <label for="dept">Department</label>
                        <input type="text" class="form-control" id="dept" name="dept" value="<?=$dept?>" placeholder="Enter Department">
                      </div>
                      <div class="form-group">
                        <label for="roll">Roll</label>
                        <input type="number" class="form-control" id="dept" name="roll" value="<?=$roll?>" placeholder="Enter Roll">
                      </div>
                      <button type="submit" class="btn btn-primary" name="save">Save</button>
                </form>
                  <?php
                      endif;
                  ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>