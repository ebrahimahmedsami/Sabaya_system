<?php

    ob_start();
    session_start();
    $pageTitle = 'Items';
    if (isset($_SESSION['username'])) {
        include 'init.php';

        $do = isset($_GET['do']) ?  $_GET['do'] : 'manage';

        if ($do == 'manage') {
                         //manage items page
                         //select all items
            
                         $stmt = $con->prepare("SELECT items.*,categories.name AS category_name,
                         users.username AS user_name  FROM items
                         INNER JOIN categories ON categories.ID = items.cat_id
                         INNER JOIN users ON users.userID = items.user_id
                         ");
                         $stmt->execute();
                         $items = $stmt->fetchAll();
                         ?>
            
                        <h1 class="text-center">Manage recipes</h1>
                        <div class="container">
            
                            <div class="table-responsive text-center">
                                <table class="table table-striped table-bordered table-dark">
                                    <tr>
                                        <td>#ID</td>
                                        <td>Image</td>
                                        <td>Name</td>
                                        <td>Description</td>
                                        <td>Add Date</td>
                                        <td>Category</td>
                                        <td>Username</td>
                                        <td>Control</td>
                                    </tr>
                                    <?php 
                                    
                                    foreach ($items as $val) {
                                       ?>
                                        <tr>
                                            <td><?php echo $val['itemID']; ?></td>
                                            <?php
                                            if (empty($val['image'])) {
                                                echo '<td>No image</td>';
                                            }else{
                                                echo '<td><img style="width:50px;height:50px;" src="uploads/'.$val['image'].'" alt=""></td>';
                                            }
                                               
                                            ?>
                                            <td><?php echo $val['name']; ?></td>
                                            <td><?php echo $val['description']; ?></td>
                                            <td><?php echo $val['addDate']; ?></td>
                                            <td><?php echo $val['category_name']; ?></td>
                                            <td><?php echo $val['user_name']; ?></td>
                                            <td>
                                                <a href="items.php?do=edit&itemid=<?php echo $val['itemID']; ?>" class="btn btn-success">Edit</a>
                                                <a href="items.php?do=delete&itemid=<?php echo $val['itemID']; ?>" class="btn btn-danger confirm">Delete</a>
                                            </td>
                                        </tr>
                                       <?php
                                    }
                                    
                                    ?>
                                </table>
                            </div>
            
                            <a href="items.php?do=add" class="btn btn-primary"><i class="fa fa-plus"></i> Add New recipe</a>
                        </div>
            
                         <?php

                    }elseif($do == 'add'){

                        //add items page
                        ?>
                        <h1 class="text-center">Add recipe page</h1>
                        <div class="container">
                                <form class="form-horizontal" action="?do=insert" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="userid">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Recipe Name</label>
                                        <div class="col-sm-10 col-lg-4">
                                            <input type="text" name="itemname" class="form-control" required="required">
                                        </div>
                                    </div>
            
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Recipe Desc</label>
                                        <div class="col-sm-10 col-lg-4">
                                            <textarea name="itemdesc" class="form-control" required="required"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Recipe image</label>
                                        <div class="col-sm-10 col-lg-4">
                                            <input type="file" name="avatar" class="form-control" required="required">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Member</label>
                                        <div class="col-sm-10 col-lg-4">
                                            <select class="form-control" name="itemmember">
                                                <?php
                                                     $stmt = $con->prepare("SELECT * FROM users");
                                                     $stmt->execute();
                                                     $users = $stmt->fetchAll();
                                                     foreach ($users as $user) {
                                                         echo '<option value="'.$user['userID'].'">'.$user['username'].'</option>';
                                                     }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Category</label>
                                        <div class="col-sm-10 col-lg-4">
                                            <select class="form-control" name="itemcategory">
                                                <?php
                                                     $stmt2 = $con->prepare("SELECT * FROM categories");
                                                     $stmt2->execute();
                                                     $categories = $stmt2->fetchAll();
                                                     foreach ($categories as $category) {
                                                         echo '<option value="'.$category['ID'].'">'.$category['name'].'</option>';
                                                     }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
            
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <input type="submit" value="Add Item" class="btn btn-primary">
                                        </div>
                                    </div>
                                </form>
                            </div>
            
                        <?php

        }elseif($do == 'insert'){
            echo "<h1 class=\"text-center\">Insert Recipe</h1>";
                
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                //get variables from the form
                $avatar = $_FILES['avatar'];

                $avatarName = $_FILES['avatar']['name'];
                $avatarSize = $_FILES['avatar']['size'];
                $avatarTmp = $_FILES['avatar']['tmp_name'];
                $avatarType = $_FILES['avatar']['type'];

                $avatarEx = explode('.',$avatarName);
                $avatarEx1 = strtolower(end($avatarEx));

                $avatar = rand(0, 100000) . '_' . $avatarName;
                move_uploaded_file($avatarTmp, "uploads\\" . $avatar);
                
                
                $itemname = $_POST['itemname'];
                $itemdesc = $_POST['itemdesc'];

                $itemmember =  $_POST['itemmember'];
                $itemcategory =  $_POST['itemcategory'];

                //insert new item into database
               $stmt = $con->prepare("INSERT INTO items (name, description,addDate,image, cat_id, user_id)
                VALUES (:itemname, :itemdesc,NOW(), :image, :itemcategory, :itemmember)");
                $stmt->execute(array(
                    'itemname' => $itemname,
                    'itemdesc' => $itemdesc,
                    'image'  => $avatar,
                    'itemcategory' => $itemcategory,
                    'itemmember' => $itemmember
                )); 

                echo '<div class="alert alert-success">You add new recipe successfuly</div>';
                header("refresh:2;url=items.php?do=manage");
                exit();

            }else{
                redirectHome("you can not proceed this page directly",5);
            }

        }elseif($do == 'edit'){
                        
           $itemid =  isset($_GET['itemid']) && is_numeric($_GET['itemid']) ? intval($_GET['itemid']) : 0;
            
           $stmt = $con->prepare("SELECT * FROM items WHERE itemID = ?");
           $stmt->execute(array($itemid));
           $row = $stmt->fetch();
           $count = $stmt->rowCount();

           if ($count > 0) { ?>
           
       
               <h1 class="text-center">Edit Recipe</h1>
               <div class="container">
                   <form class="form-horizontal" action="?do=update" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="itemid" value="<?php echo $itemid; ?>">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Recipe Name</label>
                                        <div class="col-sm-10 col-lg-4">
                                            <input type="text" name="itemname" class="form-control" value="<?php echo $row['name']; ?>" required="required">
                                        </div>
                                    </div>
            
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Recipe Desc</label>
                                        <div class="col-sm-10 col-lg-4">
                                            <textarea name="itemdesc" class="form-control" required="required"><?php echo $row['description']; ?></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Recipe image</label>
                                        <div class="col-sm-10 col-lg-4">
                                            <input type="file" name="avatar" class="form-control" value="<?php echo $row['image']; ?>" required="required">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Member</label>
                                        <div class="col-sm-10 col-lg-4">
                                            <select class="form-control" name="itemmember">
                                                <?php
                                                     $stmt = $con->prepare("SELECT * FROM users");
                                                     $stmt->execute();
                                                     $users = $stmt->fetchAll();
                                                     foreach ($users as $user) {
                                                         echo '<option value="'.$user['userID'].'">'.$user['username'].'</option>';
                                                     }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Category</label>
                                        <div class="col-sm-10 col-lg-4">
                                            <select class="form-control" name="itemcategory">
                                                <?php
                                                     $stmt2 = $con->prepare("SELECT * FROM categories");
                                                     $stmt2->execute();
                                                     $categories = $stmt2->fetchAll();
                                                     foreach ($categories as $category) {
                                                         echo '<option value="'.$category['ID'].'">'.$category['name'].'</option>';
                                                     }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
            
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <input type="submit" value="Edit Item" class="btn btn-primary">
                                        </div>
                                    </div>
                   </form>

                    <?php

           }else{
               redirectHome("no such id",4);
           }

        }elseif($do == 'update'){
            //update page
            echo "<h1 class=\"text-center\">Recipe informations</h1>";
            echo '<div class="container">';

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

               //get variables from the form
               $avatar = $_FILES['avatar'];

               $avatarName = $_FILES['avatar']['name'];
               $avatarSize = $_FILES['avatar']['size'];
               $avatarTmp = $_FILES['avatar']['tmp_name'];
               $avatarType = $_FILES['avatar']['type'];

               $avatarEx = explode('.',$avatarName);
               $avatarEx1 = strtolower(end($avatarEx));

               $avatar = rand(0, 100000) . '_' . $avatarName;
               move_uploaded_file($avatarTmp, "uploads\\" . $avatar);

               $itemid = $_POST['itemid'];
               $itemname = $_POST['itemname'];
               $itemdesc = $_POST['itemdesc'];

               $itemmember = $_POST['itemmember'];
               $itemcategory = $_POST['itemcategory'];

                //update the database
                $stmt = $con->prepare("UPDATE items SET name = ?,description = ?,image = ?, cat_id = ?, user_id = ?
                 WHERE itemID = ?");
                $stmt->execute(array($itemname,$itemdesc,$avatar,$itemcategory,$itemmember,$itemid));
                echo '<div class="alert alert-success">Your informations is updated successfuly</div>';
                ?>
                <ul class="list-group">
                    <li class="list-group-item active" aria-current="true"><strong>Recipe informations</strong></li>
                    <li class="list-group-item"><?php echo $itemname; ?></li>
                    <li class="list-group-item"><?php echo $itemdesc; ?></li>
                    <li class="list-group-item"><img style="width: 50px;height:50px;" src="<?php echo 'uploads/' . $avatar; ?>" alt=""></li>
                </ul>

                <?php                                

            }else{
                redirectHome("you can not proceed this page directly");
            }
            echo '</div>';

        }elseif($do == 'delete'){
                //delete item page
                ?>
                <h1 class="text-center">Delete recipe</h1>
                <div class="container">
            <?php

                $itemid =  isset($_GET['itemid']) && is_numeric($_GET['itemid']) ? intval($_GET['itemid']) : 0;
                $check = checkItem("itemID","items",$itemid);

                if ($check > 0) {
                    //delete item from database
                    $stmt = $con->prepare("DELETE FROM items WHERE itemID = ?");
                    $stmt->execute(array($itemid));
                    echo '<div class="alert alert-success">You deleted the iterecipem successfuly</div>';
                    header("refresh:2;url=items.php?do=manage");
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