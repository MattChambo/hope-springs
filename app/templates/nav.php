
    <div class="col-sm-3 sidenav">
     <a href="index.php?page=home"><h2 class="pagetitle">Hope Springs</h2></a>
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
          <li><a href="index.php?page=logout">Logout</a></li>
        <?php endif; ?>
      </ul>
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="index.php?page=wellcome">Wellcome to Hope Springs!</a></li>
        <li><a href="#">Post 1</a></li>
        <li><a href="#">Post 2</a></li>
        <li><a href="#">Post 3</a></li>
        <li><a href="#">Post 4</a></li>
        <li><a href="#">Post 5</a></li>
        <li><a href="#">Post 6</a></li>
        <li><a href="#">Post 7</a></li>
        <li><a href="#">Post 8</a></li>
        <li><a href="#">Post 9</a></li>
        <li><a href="#">Post 10</a></li>
        <li><button type="button" class="prevnext">Prev</button><button type="button" class="prevnext">Next</button></li>
        <br>
        <?php if(isset($_SESSION['id'])): ?>
          <li><a href="index.php?page=makepost" class="makepost">Make a post</a></li>
        <?php endif; ?>
      </ul><br>
    </div>

   
