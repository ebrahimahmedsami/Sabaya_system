<?php

    ob_start();
    session_start();
    $pageTitle = 'Categories';

    if (isset($_SESSION['username'])) {
        include 'init.php';

        $do = isset($_GET['do']) ?  $_GET['do'] : 'manage';

        if ($do == 'manage') {

             //manage ccategories page

             //select all categories
             $chooseOrdering = 'ASC';
             $stmt2 = $con->prepare("SELECT * FROM categories");
             $stmt2->execute();
             $row = $stmt2->fetchAll();
             ?>

            <h1 class="text-center">Manage Categories</h1>
            <div class='starrr'></div>
            <form method="POST" id="rateForm" action="?do=rate">
                <input type="hidden" name="getrate" id="getrate" required>
                <button id="submitRate" type="submit">rate</button>
            </form>
            
            <div class="container">

            

                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-dark">
                        <tr>
                            <td>#ID</td>
                            <td>Name</td>
                            <td>Description</td>
                            <td>Rating</td>
                            <td>Control</td>
                        </tr>
                        <?php 
                        
                        foreach ($row as $val) {
                           ?>
                            <tr>
                                <td><?php echo $val['ID']; ?></td>
                                <td><?php echo $val['name']; ?></td>
                                <td><?php  if (empty($val['description'])) {
                                    echo 'No description';
                                }else{
                                    echo $val['description'];
                                }  ?>
                                <td>
                                
                                </td>
                                <td>
                                <a href="categories.php?do=edit&catid=<?php echo $val['ID']; ?>" class="btn btn-success">Edit</a>
                                <a href="categories.php?do=delete&catid=<?php echo $val['ID']; ?>" class="btn btn-danger confirm">Delete</a>

                                </td>
                            </tr>
                           <?php
                        }
                        
                        ?>
                    </table>
                </div>

                <a href="categories.php?do=add" class="btn btn-primary"><i class="fa fa-plus"></i> Add New category</a>
            </div>

             <?php
            
        }elseif($do == 'add'){
            //add categories page
            ?>
            <h1 class="text-center">Add category page</h1>
            <div class="container">
                    <form class="form-horizontal" action="?do=insert" method="POST">
                    <input type="hidden" name="userid">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Category Name</label>
                            <div class="col-sm-10 col-lg-4">
                                <input type="text" name="name" class="form-control" autocomplete="off" required="required">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Category Desc</label>
                            <div class="col-sm-10 col-lg-4">
                                <input type="text" name="desc" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <input type="submit" value="Add Category" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                </div>

            <?php

        }elseif($do == 'rate'){

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $rate = $_POST['getrate'];
                $stmt = $con->prepare("INSERT INTO categories (rate) VALUES (:rate)");
                $stmt->execute(array(
                    'rate' => $rate,
                )); 

                echo '<div class="alert alert-success">You add new rate successfuly</div>';
                header("refresh:2;url=categories.php?do=manage");
                exit();

            }
        }elseif($do == 'insert'){


            echo "<h1 class=\"text-center\">Insert Category</h1>";
                
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                //get variables from the form
                $name = $_POST['name'];
                $desc = $_POST['desc'];

                //check if user exist in database
                $check = checkItem("name","categories",$name);

                if ($check == 0) {
                //insert new category into database
                $stmt = $con->prepare("INSERT INTO categories (name, description) VALUES (:name, :desc)");
                $stmt->execute(array(
                    'name' => $name,
                    'desc' => $desc
                )); 

                echo '<div class="alert alert-success">You add new category successfuly</div>';
                header("refresh:2;url=categories.php?do=add");
                exit();

                }else{
                    echo '<div class="alert alert-danger">This category already exist</div>';
                }
            }else{
                redirectHome("you can not proceed this page directly",5);
            }

        }elseif($do == 'edit'){
            $catid =  isset($_GET['catid']) && is_numeric($_GET['catid']) ? intval($_GET['catid']) : 0;
            
            $stmt3 = $con->prepare("SELECT * FROM categories WHERE ID = ? LIMIT 1");
            $stmt3->execute(array($catid));
            $row = $stmt3->fetch();
            $count = $stmt3->rowCount();

            if ($count > 0) { ?>
        
                <h1 class="text-center">Edit Category</h1>
                <div class="container">
                <form class="form-horizontal" action="?do=update" method="POST">
                    <input type="hidden" name="catid"  value="<?php echo $catid; ?>">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Category Name</label>
                            <div class="col-sm-10 col-lg-4">
                                <input type="text" name="name" value="<?php echo $row['name']; ?>" class="form-control" autocomplete="off" required="required">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Category Desc</label>
                            <div class="col-sm-10 col-lg-4">
                                <input type="text" name="desc" value="<?php echo $row['description']; ?>" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <input type="submit" value="Save" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                </div>
        
       <?php 
            }else{
                redirectHome("no such id",4);
            }

        }elseif($do == 'update'){
            echo "<h1 class=\"text-center\">Category informations</h1>";
            echo '<div class="container">';

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

               //get variables from the form
               $catid = $_POST['catid'];
               $name = $_POST['name'];
               $desc = $_POST['desc'];
               
                //update the database
                $stmt4 = $con->prepare("UPDATE categories SET name = ?, description = ? WHERE ID = ? LIMIT 1");
                $stmt4->execute(array($name, $desc,$catid));
                echo '<div class="alert alert-success">Your informations is updated successfuly</div>';
                ?>
                <ul class="list-group">
                    <li class="list-group-item active" aria-current="true"><strong>Category informations</strong></li>
                    <li class="list-group-item"><?php echo $name; ?></li>
                    <li class="list-group-item"><?php echo $desc; ?></li>
                </ul>

                <?php                                

            }else{
                redirectHome("you can not proceed this page directly");
            }
            echo '</div>';

        }elseif($do == 'delete'){
            //delete category page
            ?>
                <h1 class="text-center">Delete category</h1>
                <div class="container">
            <?php

                $catid =  isset($_GET['catid']) && is_numeric($_GET['catid']) ? intval($_GET['catid']) : 0;
                $check = checkItem("ID","categories",$catid);

                if ($check > 0) {
                    //delete member from database
                    $stmt = $con->prepare("DELETE FROM categories WHERE ID = ?");
                    $stmt->execute(array($catid));
                    echo '<div class="alert alert-success">You deleted the category successfuly</div>';
                    header("refresh:2;url=categories.php?do=manage");
                    exit();
                }else{
                    redirectHome("This id not exist",4);
                }

            ?>
                </div>
            <?php

        }

        include $tpl . 'footer.php';
    
    }else{
        header('Location: index.php');
        exit();
    }
ob_end_flush();
?>


<!-- rate error Modal -->
<div class="modal fade" id="errorRateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">please rate</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <i class="fas fa-exclamation-circle fa-5x" style="color:red;"></i>
        <br>
        <h4>please rate</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
    $(function(){
        $('#exampleModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
        })
        var getrate = document.getElementById('getrate');
        $(".starrr").starrr({
            rating: 5,
        });

        $('.starrr').on('starrr:change', function(e, value){
            getrate.value = value;
        })
        
        $('#submitRate').on('click',function(){
            if(getrate.value == ''){
               $('#errorRateModal').modal('show');
                
            $("#rateForm").submit(function(e){
                e.preventDefault();
            });

        }else{
            console.log(getrate.value);
            $("#rateForm").submit(function(e){
                $(this).unbind('submit').submit();
            });
        }

        });


    });
</script>