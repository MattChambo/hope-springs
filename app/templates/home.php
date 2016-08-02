 <?php $this->layout('master', [
    'title'=>'Hope Springs forum',
    'desc'=>'Hope Springs is a forum for male survivors of physical, sexual and emotional abuse, as well as their families and friends'
  ]); 



  ?> 

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
        <?php if(!isset($_SESSION['id'])): ?>
          <li><a href="index.php?page=signup">Create Account</a></li>
          <li><a href="index.php?page=login">Login</a></li>
        <?php endif; ?>
        <?php if(isset($_SESSION['id'])): ?>
          <li><a href="index.php?page=logout">Logout</a></li>
        <?php endif; ?>
      </ul>
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="index.php?page=viewpost">Wellcome to Hope Springs!</a></li>
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
        <?php if(isset($_SESSION['id'])): ?>
          <li><a href="index.php?page=makepost" class="makepost">Make a post</a></li>
        <?php endif; ?>
      </ul><br>
    </div>

    <div class="col-sm-9">
      <hr>
      <h2>Wellcome to Hope Springs!</h2>
      <h5><span class="glyphicon glyphicon-time"></span> Post by Matthew Chamberlain, July 20, 2016.</h5>
      <p>Hope Springs is a forum for male survivors of physical, sexual and mental abuse, as well as their families and friends. Hope Springs aims to be a friendly and supportive environment for all those who have suffered abuse. We recognise that the information you post here may be sensitive and we value your anonymity. Feel free to choose a pseudonym or use your real name if you prefer. Trolling and abusive behavior will not be tolerated under any circumstances (You will be banned!). At Hope Springs we believe that there is always a light at the end or the tunnel and no matter how difficult things get there is always hope. If you have been affected by abuse, you know someone who has, or you feel like you have something to contribuste to the conversation please feel free to join our friendly community.</p>
      <br>
      <br>

      <hr>
      <?php foreach($allPosts as $item): ?>
      <h2><a href="index.php?page=viewpost&postid=<?= $item['id'] ?>"><?= htmlentities($item['title']) ?></a></h2>
      <h5><span class="glyphicon glyphicon-time"></span> Post by <?= $this->e($item['username']) ?>, <?= $item['created_at'] ?></h5>
      <p><?= htmlentities($item['content']) ?></p>
        <?php

    if( isset($_SESSION['id']) ) {

      if( $_SESSION['id'] == $item['user_id'] || $_SESSION['privilege'] == 'admin' ) {
        // You own post!
        ?>
          <a href="index.php?page=editpost" class="editdelete">Edit</a>
          <a href="#" class="editdelete">Delete</a>

        <?php
      }

    }

  ?>

      
      

      <hr>

      <h4>Leave a Comment:</h4>
      <form role="form">
        <div class="form-group">
          <textarea class="form-control" rows="3" required></textarea>
        </div>
        <span id="commentmessage"></span><br>
        <button type="submit" class="btn btn-success">Submit</button>
      </form>
      <br><br>
      
      <p><span class="badge">1</span> Comments:</p><br>
      
      <div class="row">
        <div class="col-sm-10">
          <h4>Matt <small>Jan 27, 2016, 9:12 PM</small></h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <a href="index.php?page=editcomment" class="editdelete">Edit</a>
          <a href="#" class="editdelete">Delete</a>
          <br>
        </div>
        </div>
      <hr>
       <?php endforeach ?>
        </div>
      </div>
    </div>
  </div>
</div>

<footer class="container-fluid">
  <p>&copy; Matthew William Chamberlain <a href="http://mattchambo.github.io/oh-green-september/" class="footerlink">Visit Matts poetry and music website!</a></p>
</footer>
