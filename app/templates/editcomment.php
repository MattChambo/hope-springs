<?php $this->layout('master', [
    'title'=>'Edit your comment on the Hope Springs forum',
    'desc'=>'Edit your comment on this page'
  ]); ?>

  <body>

<div class="container-fluid">
  <div class="row content">
    <?= $this->insert('nav') ?>

      <div class="col-sm-9">
        <h2>Edit your comment</h2>
        <form action="#" method="post" id="postform">
        <label for="comment">Your comment</label>
        <br>
        <textarea name="comment" id="comment" cols="80" rows="20" class="inputField"></textarea>
        <br>
        <span id="commentmessage"></span>
        <br>
        <input type="submit" value="Edit your comment" id="commentsubmit" class="btn btn-success">
        </form>
      </div>
    </div>
  </div>
</div>

<footer class="container-fluid">
  <p>&copy; Matthew William Chamberlain <a href="http://mattchambo.github.io/oh-green-september/" class="footerlink">Visit Matts poetry and music website!</a></p>
</footer>