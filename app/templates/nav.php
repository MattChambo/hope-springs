
    <div class="col-sm-3 sidenav">
     <a href="index.php?page=home" class="maintitle"><h2 class="pagetitle">Hope Springs</h2></a>
       <div class="input-group">
       <form action="index.php?page=search" method="post">
        <input type="text" class="form-control" name="search" placeholder="Search Hope Springs">
        <span class="input-group-btn">
          <button class="btn btn-default" type="submit">
            <span class="glyphicon glyphicon-search"></span>
          </button>
        </span>
        </form>
      </div>
      <br>
      <ul class="account">
        <?php if(!isset($_SESSION['id'])): ?>
          <li><a href="index.php?page=signup">Create Account</a></li>
          <li><a href="index.php?page=login">Login</a></li>
        <?php endif; ?>
        <?php if(isset($_SESSION['id'])): ?>
          <li><a href="index.php?page=makepost">Make a post</a></li>
          <li><a href="index.php?page=editaccount&accountid=<?= $_SESSION['id'] ?>">Edit account details</a></li>
          <li><a href="index.php?page=logout">Logout</a></li>
        <?php endif; ?>
      </ul>
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="index.php?page=wellcome">Wellcome to Hope Springs!</a></li>

        <?php foreach ($allTitles as $titles): ?>
          <li><a href="index.php?page=viewpost&postid=<?= $titles['id'] ?>"><?= htmlentities($titles['title']) ?></li>
        <?php endforeach; ?>
        
        <li><a href="#">Post 2</a></li>
        <li><a href="#">Post 3</a></li>
        <li><a href="#">Post 4</a></li>
        <li><a href="#">Post 5</a></li>
        <li><a href="#">Post 6</a></li>
        <li><a href="#">Post 7</a></li>
        <li><a href="#">Post 8</a></li>
        <li><a href="#">Post 9</a></li>
        <li><a href="#">Post 10</a></li>
      </ul><br>
    </div>

   
