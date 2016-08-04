<?php $this->layout('master', [
    'title'=>'Edit your post on the Hope Springs forum',
    'desc'=>'Edit your post on this page'
  ]); ?>

  <body>

<div class="container-fluid">
  <div class="row content">
   <?= $this->insert('nav') ?>


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
        <input type="submit" value="Edit your post" name="editpost" id="postsubmit" class="btn btn-success">
        </form>
      </div>
    </div>
  </div>
</div>

<footer class="container-fluid">
  <p>&copy; Matthew William Chamberlain <a href="http://mattchambo.github.io/oh-green-september/" class="footerlink">Visit Matts poetry and music website!</a></p>
</footer>