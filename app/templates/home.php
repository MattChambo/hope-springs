 <?php $this->layout('master', [
    'title'=>'Hope Springs forum',
    'desc'=>'Hope Springs is a forum for male survivors of physical, sexual and emotional abuse, as well as their families and friends'
  ]); ?> 

  <body>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav">
      <h2 class="pagetitle">Hope Springs</h2>
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
        <li><button type="button" class="prevnext">Prev</button><button type="button" class="prevnext">Next</button></li>
        <br>
        <a href="#" class="makepost">Make a post</a>
      </ul><br>
    </div>

    <div class="col-sm-9">
      <h4><small>RECENT POSTS</small></h4>
      <hr>
      <h2>Wellcome to Hope Springs!</h2>
      <h5><span class="glyphicon glyphicon-time"></span> Post by Matthew Chamberlain, July 20, 2016.</h5>
      <p>Hope Springs is a forum for male survivors of physical, sexual and mental abuse, as well as their families and friends. Hope Springs aims to be a friendly and supportive environment for all those who have suffered abuse. We recognise that the information you post here may be sensitive and we value your anonymity. Feel free to choose a pseudonym or use your real name if you prefer. Trolling and abusive behavior will not be tolerated under any circumstances (You will be banned!). At Hope Springs we believe that there is always a light at the end or the tunnel and no matter how difficult things get there is always hope. If you have been affected by abuse, you know someone who has, or you feel like you have something to contribuste to the conversation please feel free to join our friendly community.</p>
      <br>
      <br>

      <h4><small>RECENT POSTS</small></h4>
      <hr>
      <h2>Post 2</h2>
      <h5><span class="glyphicon glyphicon-time"></span> Post by John Doe, May 24, 2016.</h5>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
      <button type="button" class="editdelete">Edit</button>
      <button type="button" class="editdelete">Delete</button>

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
      
      <p><span class="badge">2</span> Comments:</p><br>
      
      <div class="row">
        <div class="col-sm-10">
          <h4>Matt <small>Jan 27, 2016, 9:12 PM</small></h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <button type="button" class="editdelete">Edit</button>
          <button type="button" class="editdelete">Delete</button>
          <br>
        </div>
        <div class="col-sm-10">
          <h4>John Doe <small>Feb 25, 2016, 8:25 PM</small></h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <button type="button" class="editdelete">Edit</button>
          <button type="button" class="editdelete">Delete</button>
          <br>
          </div>
        </div>

              <h4><small>RECENT POSTS</small></h4>
      <hr>
      <h2>Post 3</h2>
      <h5><span class="glyphicon glyphicon-time"></span> Post by John Doe, May 24, 2016.</h5>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

      <button type="button" class="editdelete">Edit</button>
      <button type="button" class="editdelete">Delete</button>
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
      
      <p><span class="badge">2</span> Comments:</p><br>
      
      <div class="row">
        <div class="col-sm-10">
          <h4>Matt <small>Jan 27, 2016, 9:12 PM</small></h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <button type="button" class="editdelete">Edit</button>
          <button type="button" class="editdelete">Delete</button>
          <br>
        </div>
        <div class="col-sm-10">
          <h4>John Doe <small>Feb 25, 2016, 8:25 PM</small></h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <button type="button" class="editdelete">Edit</button>
          <button type="button" class="editdelete">Delete</button>
          <hr>
          <br>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

<footer class="container-fluid">
  <p>&copy; Matthew William Chamberlain <a href="http://mattchambo.github.io/oh-green-september/" class="footerlink">Visit Matts poetry and music website!</a></p>
</footer>
