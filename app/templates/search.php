<?php $this->layout('master', [
    'title'=>'Your search results',
    'desc'=>'Search results for Hope Springs search'
  ]); 

?> 

<body>
  <div class="container-fluid">
    <div class="row content">
    
     <?= $this->insert('nav') ?>

     <div class="col-sm-9">

      <h1>Search Results for "<i><?= $this->e($searchTerm) ?></i>"</h1>

      <?php if(strlen($searchTerm) > 0): ?>
        <?php if($searchResults > 0): ?>
		      <?php foreach($searchResults as $Result): ?>
            <h3><a href="index.php?page=viewpost&postid=<?= $Result['id'] ?>"><?= $Result['score_title'] ?></a></h3>
            <p><?= $Result['score_content'] ?></p>
            <hr>
		      <?php endforeach; ?>
          <?php else: ?>
		      <p>There were no results for "<i><?= $this->e($searchTerm) ?></i>"</p>
        <?php endif; ?>
        <?php else: ?>
        <p>Please put something into the search bar</p>
      <?php endif; ?>

 	 	  </div>
   	</div>
  </div>
</div>

<footer class="container-fluid">
  <p>&copy; Matthew William Chamberlain <a href="http://mattchambo.github.io/oh-green-september/" class="footerlink">Visit Matts poetry and music website!</a></p>
</footer>

