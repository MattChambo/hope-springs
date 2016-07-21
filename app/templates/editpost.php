<?php $this->layout('master', [
    'title'=>'Edit your post on the Hope Springs forum',
    'desc'=>'Edit your post on this page'
  ]); ?>

  <body>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav">
      <a href="index.php?page=home"><h2 class="pagetitle">Hope Springs</h2></a>
       <div class="input-group">
        <input type="text" class="form-control" placeholder="Search Hope Springs">
        <span class="input-group-btn">
          <button class="btn btn-default" type="button">
            <span class="glyphicon glyphicon-search"></span>
          </button>
        </span>
      </div>
      <br>
      <ul class="account">
        <li><a href="index.php?page=signup">Create Account</a></li>
        <li><a href="index.php?page=login">Login</a></li>
      </ul>
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="#section1">Post 1 (Sticky)</a></li>
        <li><a href="#section2">Post 2</a></li>
        <li><a href="#section3">Post 3</a></li>
        <li><a href="#section4">Post 4</a></li>
        <li><a href="#section5">Post 5</a></li>
        <li><a href="#section6">Post 6</a></li>
        <li><a href="#section7">Post 7</a></li>
        <li><a href="#section8">Post 8</a></li>
        <li><a href="#section9">Post 9</a></li>
        <li><a href="#section10">Post 10</a></li>
        <li><button type="button" class="prevnext">Prev</button><button type="button" class="prevnext">Next</button></li>
        <br>
        <a href="index.php?page=makepost" class="makepost">Make a post</a>
      </ul><br>
    </div>

      <div class="col-sm-9">
        <h2>Edit your post</h2>
        <form action="" method="post" id="postform">
        <label for="title">Title</label>
        <br>
        <input type="text" name="title" id="title">
        <br>
        <span id="titlemessage"></span>
        <br>
        <label for="post">Your post</label>
        <br>
        <textarea name="post" id="post" cols="80" rows="20" class="inputField"></textarea>
        <br>
        <span id="postmessage"></span>
        <br>
        <input type="submit" value="Edit your post" id="postsubmit" class="btn btn-success">
        </form>
      </div>
    </div>
  </div>
</div>

<footer class="container-fluid">
  <p>&copy; Matthew William Chamberlain <a href="http://mattchambo.github.io/oh-green-september/" class="footerlink">Visit Matts poetry and music website!</a></p>
</footer>