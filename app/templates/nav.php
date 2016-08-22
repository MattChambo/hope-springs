
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

    <!--   Display links for signup and login if the user is not logged in -->

      <ul class="account">
        <?php if(!isset($_SESSION['id'])): ?>
          <li><a href="index.php?page=signup">Create Account</a></li>
          <li><a href="index.php?page=login">Login</a></li>
        <?php endif; ?>

    <!--  Display links for making posts editing account details and logging out if the user is logged in -->

        <?php if(isset($_SESSION['id'])): ?>
          <li><a href="index.php?page=makepost">Make a post</a></li>
          <li><a href="index.php?page=editaccount&accountid=<?= $_SESSION['id'] ?>">Edit account details</a></li>
          <li><a href="index.php?page=logout">Logout</a></li>
        <?php endif; ?>
      </ul>

    <!--      In my proposal I was going to loop out the first ten posts with previous and next buttons to move through them but
              since I added pagination I was looping out ten links at a time anyway so it seemed redundant to have another list of links
              so I replaced the links with resources for abuse survivors. -->

      <ul class="nav nav-pills nav-stacked" id="links">
        <li class="active"><a href="index.php?page=wellcome">Wellcome to Hope Springs!</a></li>
        <p id="resources">Resources for abuse survivors</p>
        <li><a href="http://survivor.org.nz/">Survivor New Zealand</a></li>
        <li><a href="https://www.rainn.org/">Rainn</a></li>
        <li><a href="http://www.havoca.org/">Havoca</a></li>
        <li><a href="http://isurvive.org/">isurvive</a></li>
        <li><a href="http://www.supportforpartners.org/library.html">Support for partners</a></li>
        <li><a href="https://www.notalone.gov/resources/">Not alone</a></li>
        <li><a href="http://www.pandys.org/secondarysurvivors.html">Pandora project</a></li>
        <li><a href="http://amensproject.com/male-survivors-of-abuse">A men's project</a></li>
        <li><a href="https://1in6.org/">1 in 6</a></li>   
      </ul><br>
    </div>

   
