<div class="container">
<div class="row">
  <div class="col-md-8" id="posts"><h2>Latest Posts</h2>

  	<?php 
  	displayPosts('public');
  	?>
  	</div>
  <div class="col-md-4" id="search">

<div class="form-inline" >
  <div class="form-group">
    <label for="search">Posts</label>
    <input type="text" class="form-control" id="exampleInputName2" placeholder="Search">
  </div>
   <button class="btn btn-primary" div="butha">Search</button>

</div>
<hr>
<div class="alert alert-danger" role="alert" id="alertError"></div>
<?php writePost(); ?>


</div>

  
</div>
</div>

    