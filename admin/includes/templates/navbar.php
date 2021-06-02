<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="dashboard.php">Admin</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="categories.php">Categories</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="items.php">Recipes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="messages.php">Messages
          <?php
            $msgNum = countItems('id','contact');
            if ($msgNum > 0) {
              echo '<span class="badge badge-light">'.$msgNum.'</span>';
            }
            
          ?>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="members.php">All admins</a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <?php echo $_SESSION['username']; ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="../index.php">visit home</a>
          <a class="dropdown-item" href="members.php?do=edit&userid=<?php echo $_SESSION['ID']; ?>">edit profile</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="logout.php">log out</a>
        </div>
      </li>
    </ul>
  </div>
</nav>