<div class="container">
<div class="row">
  <div class="col-md-8" id="posts"><h2>Latest Posts</h2>

  	<?php 
  	displayPosts('public');
  	?>
  	</div>
  <div class="col-md-4" id="search">
  <form class="form-inline" >
  <div class="form-group">
  <input type="hidden" name="page" value="search">
  <input type="text" name="q" class="form-control" id="sc" placeholder="Search">
  </div>
   <button type="submit" class="btn btn-primary" div="butha">Search</button>
</form>

<hr>
<div class="alert alert-danger" role="alert" id="alertError"></div>
<?php writePost(); ?>


</div>

  
</div>
</div>

    