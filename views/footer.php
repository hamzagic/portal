

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap.min.js"></script>
    <script src="scripts.js"></script>
    <!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="loginModalTitle">Login</h4>
	      </div>
	      <div class="modal-body">
	       <form class="form-horizontal">
	       	<input type="hidden" name="loginActive" id="loginActive" value="1">
  <div class="form-group">
  	<div class="alert alert-danger" role="alert" id="alertError"></div>
    <label for="email" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="email" placeholder="Email">
    </div>
  </div>
  <div class="form-group">
    <label for="password" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="password" name="password" placeholder="Password">
    </div>
  </div>
  
</form>
	      
	      <div class="modal-footer">
	      	<a id="toggleLogin">Sign Up</a>
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="button" class="btn btn-primary" name="login2" id="login2">Login</button>
	      </div>
	    </div>
	  </div>
	</div>
 </div>   
  </body>
  </html>