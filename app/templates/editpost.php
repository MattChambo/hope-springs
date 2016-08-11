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
        <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post" enctype="multipart/form-data" id="postform">
            <label for="title">Title</label>
            <br>
            <input type="text" value="<?= $post['title'] ?>" name="title" id="title">
            <br>
            <span id="titleMessage"><?= isset($titleError) ? $titleError : '' ?></span>
            <br>
            <label for="post">Your post</label>
            <br>
            <textarea name="content" id="post" cols="80" rows="20" class="inputField"><?= $post['content'] ?></textarea>
            <br>
            <span id="postMessage"><?= isset($postError) ? $postError : '' ?></span>
            <br>
            <input type="submit" value="Edit your post" name="editpost" id="postsubmit" class="btn btn-success">
            <br>
            <span id="updateMessage"><?= isset($updateMessage) ? $updateMessage : '' ?></span>
            <br>
        </form>
      </div>
    </div>
  </div>
</div>

<footer class="container-fluid">
  <p>&copy; Matthew William Chamberlain <a href="http://mattchambo.github.io/oh-green-september/" class="footerlink">Visit Matts poetry and music website!</a></p>
</footer>