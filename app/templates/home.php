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
      <h2>Wellcome to Hope Springs!</h2>
      <h5>Matthew Chamberlain, July 20, 2016.</h5>
      <p>Hope Springs is a forum for male survivors of physical, sexual and mental abuse, as well as their families and friends. Hope Springs aims to be a friendly and supportive environment for all those who have suffered abuse. We recognise that the information you post here may be sensitive and we value your anonymity. Feel free to choose a pseudonym or use your real name if you prefer. Trolling and abusive behavior will not be tolerated under any circumstances (You will be banned!). At Hope Springs we believe that there is always a light at the end or the tunnel and no matter how difficult things get there is always hope. If you have been affected by abuse, you know someone who has, or you feel like you have something to contribuste to the conversation please feel free to join our friendly community.</p>
      <br>
      <br>

      <hr>
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
       <?php endforeach ?>
        </div>
      </div>
    </div>
  </div>
</div>

<footer class="container-fluid">
  <p>&copy; Matthew William Chamberlain <a href="http://mattchambo.github.io/oh-green-september/" class="footerlink">Visit Matts poetry and music website!</a></p>
</footer>
