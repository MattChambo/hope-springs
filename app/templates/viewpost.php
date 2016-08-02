<?php $this->layout('master', [
    'title'=>'View a post on the Hope Springs forum',
    'desc'=>'This is a post from Hope Springs a website for male survivors of physical, sexual or emotional abuse, as well as their families and friends'
  ]);  ?> 



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
        <li><button type="button" class="prevnext">Prev</button>
        <button type="button" class="prevnext">Next</button></li>
        <br>
        <a href="index.php?page=makepost" class="makepost">Make a post</a>
      </ul><br>
    </div>

      <div class="col-sm-9">
        <div id="viewpost">
          
          <h2><?= $this->e($post['title']) ?></h2>
        
          <p>
            <?= $this->e($post['content']) ?>
          </p>
        <div>
          <?php

            if( isset($_SESSION['id']) ) {

              if( $_SESSION['id'] == $post['user_id'] || $_SESSION['privilege'] == 'admin' ) {
              // You own post!
          ?>
          <a href="index.php?page=editpost" class="editdelete">Edit</a>
          <a href="#" class="editdelete">Delete</a>

        <?php
      }

    }

  ?>

      <hr>
      </div>
      <h4>Leave a Comment:</h4>
        <form role="form" action="index.php?page=viewpost&postid=<?= $_GET['postid'] ?>" method="post">
          <div class="form-group">
            <textarea name="comment" class="form-control" rows="3" required></textarea>
          </div>
           <span id="commentmessage"></span><br>
          <button type="submit" class="btn btn-success" name="new-comment">Submit</button>
        </form>
      <br><br>
      

      <p><span class="badge"><?= count($allComments) ?></span> Comments:</p><br>
      <?php foreach($allComments as $comment): ?>
      <div class="row">
        <div class="col-sm-10">
          <h4><?= htmlentities($comment['username']) ?><small> Comment was last edited on <?= htmlentities($comment['updated_at']) ?></small></h4>
          <p><?= htmlentities($comment['comment']) ?></p>
          <?php

            if( isset($_SESSION['id']) ) {

              if( $_SESSION['id'] == $post['user_id'] || $_SESSION['privilege'] == 'admin' ) {
              // You own post!
              ?>
          <a href="index.php?page=editpost" class="editdelete">Edit</a>
          <a href="#" class="editdelete">Delete</a>

        <?php
      }

    }

  ?>
          <hr>
          <br>
        </div>
      </div>
      <?php endforeach ?>
    </div>
  </div>
</div>

<footer class="container-fluid">
  <p>&copy; Matthew William Chamberlain <a href="http://mattchambo.github.io/oh-green-september/" class="footerlink">Visit Matts poetry and music website!</a></p>

</footer>
