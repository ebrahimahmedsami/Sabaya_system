<?php 
    ob_start();

    session_start();
    if(isset($_SESSION['username'])){
        
        $pageTitle = 'Dashboard';
        include 'init.php';


        /* start dashboard page */
        ?>

        <div class="container home-stats">
            <h1 class="text-center">Dashboard</h1>
            <div class="row">
                <div class="col-md-3">
                    <div class="stat text-center st-members">
                        Total Admins
                        <span><a href="members.php"><?php echo countItems('userID','users'); ?></a></span>
                    </div>
                </div>
                <div class="col-md-3">
                        <div class="stat text-center st-comments">
                            Total Categories
                            <span><a href="categories.php"><?php echo countItems('ID','categories'); ?></a></span>
                        </div>
                </div>
                <div class="col-md-3">
                        <div class="stat text-center st-items">
                            Total Recipes
                            <span><a href="items.php"><?php echo countItems('itemID','items'); ?></a></span>
                        </div>
                </div>
                <div class="col-md-3">
                        <div class="stat text-center st-pending">
                            Total Messages
                            <span><a href="messages.php"><?php echo countItems('id','contact'); ?></a></span>
                        </div>
                </div>
            </div>
        </div>
        <div class="container latest">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header">
                        <i class="fa fa-users"></i> Latest <?php echo $latestUsers = 5; ?> Users
                        <span class="toggle-info float-right">
                            <i class="fa fa-plus"></i>
                        </span>
                        </div>
                        <div class="card-body">
                            <?php 
                            $thelatest = getLatest('*','users','userID',$latestUsers);
                            foreach ($thelatest as $val) {
                                $usernow = $val['username'];

                                echo '<ul class="list-unstyled list-group"></ul>';
                                echo '<li class="list-group-item">' . $usernow .
                                     '<a href="members.php?do=edit&userid='.$val['userID'].'">
                                     <span class="btn btn-info float-right" style="
                                     font-size: 13px;
                                     padding: 5px 18px 5px 15px;
                                     font-weight: 700;"><i class="fa fa-edit"></i>Edit</span></a>'
                                . '</li>';
                                echo '</ul>';
                            }
                             ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-tag"></i> Latest Added Recipe
                        <span class="toggle-info float-right">
                            <i class="fa fa-plus"></i>
                        </span>
                        </div>
                        <div class="card-body">
                        <?php 
                            $thelatest = getLatest('*','items','itemID');
                            foreach ($thelatest as $val) {
                                $itemnow = $val['name'];
                                echo '<ul class="list-unstyled list-group"></ul>';
                                    echo '<li class="list-group-item">' . $itemnow .
                                        '<a href="items.php?do=edit&itemid='.$val['itemID'].'">
                                        <span class="btn btn-info float-right" style="
                                        font-size: 13px;
                                        margin-left:5px;
                                        padding: 5px 18px 5px 15px;
                                        font-weight: 700;"><i class="fa fa-edit"></i>Edit</span></a>';
                                    echo '</li>';
                                echo '</ul>';
                            }
                             ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-tag"></i> Latest Added Categories
                        <span class="toggle-info float-right">
                            <i class="fa fa-plus"></i>
                        </span>
                        </div>
                        <div class="card-body">
                        <?php 
                            $thelatest = getLatest('*','categories','ID');
                            foreach ($thelatest as $val) {
                                $catnow = $val['name'];
                                echo '<ul class="list-unstyled list-group"></ul>';
                                    echo '<li class="list-group-item">' . $catnow .
                                        '<a href="categories.php?do=edit&catid='.$val['ID'].'">
                                        <span class="btn btn-info float-right" style="
                                        font-size: 13px;
                                        margin-left:5px;
                                        padding: 5px 18px 5px 15px;
                                        font-weight: 700;"><i class="fa fa-edit"></i>Edit</span></a>';
                                    echo '</li>';
                                echo '</ul>';
                            }
                             ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <?php

        include $tpl . "footer.php";

    }else{
        header('Location: index.php');
        exit();
    }

    ob_end_flush();
?>