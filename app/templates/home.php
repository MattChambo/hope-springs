 <?php $this->layout('master', [
    'title'=>'Hope Springs forum',
    'desc'=>'Hope Springs is a forum for male survivors of physical, sexual and emotional abuse, as well as their families and friends'
  ]); 
  ?> 

  <body>
    <div class="container-fluid">
      <div class="row content">
        <?= $this->insert('nav') ?>
        <div class="col-sm-9">
          <hr>
          <h2><a href="index.php?page=wellcome" id="homeheading">Wellcome to Hope Springs!</a></h2>
          <h3 id="subheading">A forum for male survivors of abuse</h3>
          <br>
          <hr>
          <ul class="pagination">

          <!-- For loop to loop out pagination -->

            <?php for($i=1; $i<=$totalPages; $i++): ?>
            <li>
            <a href="index.php?page=home&pagination=<?= $i ?>">
            <?= $i ?>
            </a>
            </li>
            <?php endfor; ?>
          </ul>

     <!--  For each loop to make the posts appear -->

      <?php if( count($allPosts) > 0 ): ?>

        <?php foreach($allPosts as $item): ?>

          <h2><a href="index.php?page=viewpost&postid=<?= $item['id'] ?>"><?= htmlentities($item['title']) ?></a></h2>
          <h5><span class="glyphicon glyphicon-time"></span> Post by <?= $this->e($item['username']) ?>, <?= $item['created_at'] ?></h5>
          <p><?= htmlentities($item['content']) ?></p>
          <hr>
          <p>Comments:<span class="badge"><?= $this->e($item['commentCount']) ?></span></p><br>
      
          <div class="row">
            <div class="col-sm-10">
              <br>
              </div>
            </div>
          <hr>

       <?php endforeach; ?>

    <?php else: ?>
      <p>Can't find any posts :(</p>
    <?php endif; ?>

  <!--   Another for loop to loop out pagination -->

    <ul class="pagination">
      <?php for($i=1; $i<=$totalPages; $i++): ?>
        <li>
          <a href="index.php?page=home&pagination=<?= $i ?>">
            <?= $i ?>
          </a>
        </li>
      <?php endfor; ?>
    </ul>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- because the footer was only three lines I decided not to separate it from the page -->

<footer class="container-fluid">
  <p>&copy; Matthew William Chamberlain <a href="http://mattchambo.github.io/oh-green-september/" class="footerlink">Visit Matts poetry and music website!</a></p>
</footer>
