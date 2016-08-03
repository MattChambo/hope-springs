<?php $this->layout('master', [
    'title'=>'Make a post on the Hope Springs forum',
    'desc'=>'The page for making a post on the Hope Springs forum'
  ]); ?>

  <body>

<div class="container-fluid">
  <div class="row content">
   
   <?= $this->insert('nav') ?>


      <div class="col-sm-9">
        <h2>Make a post</h2>
        <form action="" method="post" id="postform">
        <label for="title">Title</label>
        <br>
        <input type="text" name="title" placeholder="Post title" id="title">
        <span id="titleMessage"><?= isset($titleMessage) ? $titleMessage : '' ?></span>
        <br>
        <label for="post">Your post</label>
        <br>
        <textarea name="post" id="post" cols="70" rows="20" class="inputField" placeholder="Write your post here"></textarea>
        <br>
        <span id="postMessage"></span>
        <br>
        <input type="submit" name="postsubmit" value="Make your post" id="postsubmit" class="btn btn-success">
        </form>
      </div>
    </div>
  </div>
</div>

<footer class="container-fluid">
  <p>&copy; Matthew William Chamberlain <a href="http://mattchambo.github.io/oh-green-september/" class="footerlink">Visit Matts poetry and music website!</a></p>
</footer>

