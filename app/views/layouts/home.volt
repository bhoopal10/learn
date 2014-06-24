	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	        </button>
	        	  
	        
	        <a class="navbar-brand" href="index.php">LOGO</a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	        <a class="btn btn-success" style="color: #ffffff;float: left;margin-top: 7px" >Getting Started</a>

	        <ul class="nav navbar-nav navbar-left">
	            <li><a href="index.php">Home</a></li>
	            <li><a href="#">Find Course</a></li>
	            <li><a href="#">About</a></li>
	        </ul>

	        <ul class="nav navbar-nav navbar-right">
	            <li><a href="#">Help</a></li>
	            <li><a href="login.php">Sign in</a></li>
	        </ul>
	    </div><!-- /.navbar-collapse -->
	</nav>
	<!-- END NAVIGATION -->
	
	<!-- START MAIN ROW -->
	<div class="row">
		<div class="col-xs-5 col-md-3">
	        <h4>How to</h4>
	        <div class="list-group">
	              <a href="#" class="list-group-item">Create course</a>
	              <a href="#" class="list-group-item">Join course</a>
	              <a href="#" class="list-group-item">Donate</a>
	              <a href="#" class="list-group-item">More </a>
	        </div>
            <h4 class="page-header">Categories</h4>
            <div class="list-group">
                <a href="#" class="list-group-item">Computer Science</a>
                <a href="#" class="list-group-item">Solar energy</a>
                <a href="#" class="list-group-item">Marketing</a>
            </div>
            <h4>What people say</h4>
            <div class="panel panel-info">
                <div class="panel-body">
                    <p>this site is very useful for students and also unemployees</p>
                    <hr/>
                    <p>yes this site is good</p>
                </div>
            </div>
		</div>  
		<!-- End sideNav -->
        <?php echo $this->getContent(); ?>
	    </div> <!-- END MAIN -->

		
