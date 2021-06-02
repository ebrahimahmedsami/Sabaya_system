<?php

    ob_start();
    session_start();
    $pageTitle = 'Messages';
    if (isset($_SESSION['username'])) {
        include 'init.php';

        $do = isset($_GET['do']) ?  $_GET['do'] : 'manage';

        if ($do == 'manage') {
                         //manage items page
                         //select all items
            
                         $stmt = $con->prepare("SELECT * FROM contact ");
                         $stmt->execute();
                         $items = $stmt->fetchAll();
                         ?>
            
                        <h1 class="text-center">Manage messages</h1>
                        <div class="container">
            
                            <div class="table-responsive text-center">
                                <table class="table table-striped table-bordered table-dark">
                                    <tr>
                                        <td>#ID</td>
                                        <td>Name</td>
                                        <td>Email</td>
                                        <td>Subject</td>
                                        <td>Add Message</td>
                                        <td>Control</td>
                                    </tr>
                                    <?php 
                                    
                                    foreach ($items as $val) {
                                       ?>
                                        <tr>
                                            <td><?php echo $val['id']; ?></td>
                                            <td><?php echo $val['name']; ?></td>
                                            <td><?php echo $val['email']; ?></td>
                                            <td><?php echo $val['subject']; ?></td>
                                            <td><?php echo $val['message']; ?></td>
                                            <td>
                                                <a href="messages.php?do=delete&meid=<?php echo $val['id']; ?>" class="btn btn-danger confirm">Delete</a>
                                            </td>
                                        </tr>
                                       <?php
                                    }
                                    
                                    ?>
                                </table>
                            </div>
                                    </div>
            
                         <?php

        }elseif($do == 'delete'){
                //delete item page
                ?>
                <h1 class="text-center">Delete message</h1>
                <div class="container">
            <?php

                $meid =  isset($_GET['meid']) && is_numeric($_GET['meid']) ? intval($_GET['meid']) : 0;
                $check = checkItem("id","contact",$meid);

                if ($check > 0) {
                    //delete item from database
                    $stmt = $con->prepare("DELETE FROM contact WHERE id = ?");
                    $stmt->execute(array($meid));
                    echo '<div class="alert alert-success">You deleted the message successfuly</div>';
                    header("refresh:2;url=messages.php?do=manage");
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