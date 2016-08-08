<?php $this->layout('master', [
    'title'=>'View a post on the Hope Springs forum',
    'desc'=>'This is a post from Hope Springs a website for male survivors of physical, sexual or emotional abuse, as well as their families and friends'
  ]);  ?> 



  <body>

    <div class="container-fluid">
      <div class="row content">

      <?= $this->insert('nav') ?>

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
          <a href="index.php?page=editpost&postid=<?= $_GET['postid'] ?>" class="editdelete">Edit</a>
          <button id="deletePost" class="editdelete">Delete</button>
          <div id="deletePostOptions">
            <a href="<?= $_SERVER['REQUEST_URI'] ?>&delete">Yes</a> / <button>No</button>
          </div>


        <?php
      }

    }

  ?>

      <hr>
      </div>
      <?php if( isset($_SESSION['id']) ): ?>
      <h4>Leave a Comment:</h4>
        <form role="form" action="index.php?page=viewpost&postid=<?= $_GET['postid'] ?>" method="post">
          <div class="form-group">
            <textarea name="comment" class="form-control" rows="3" required></textarea>
          </div>
           <span id="commentMessage" name="commentMessage"></span><br>
          <button type="submit" class="btn btn-success" name="new-comment">Submit</button>
        </form>
      <?php endif; ?>
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

<script>
  
  // Wait for all the stuff to be ready
  $(document).ready(function() {

    // When the user clicks on the delete button
    $('#deletePost, #deletePostOptions button').click(function(){

      // Toggle the visibilty of the controls
      $('#deletePostOptions').toggle();

    });

  });

</script>

