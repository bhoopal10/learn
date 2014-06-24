<!DOCTYPE html>
<head>
    <title>Welcome</title>
    <link rel="stylesheet" href="../css/fuelux.min.css">

    <link href="<?php echo $this->url->get('public/css/bootstrap.css');?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $this->url->get('public/css/labs.css');?>" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="<?php echo $this->url->get('public/js/jquery.js') ?>"></script>
    <script type="text/javascript" src="<?php echo $this->url->get('public/js/bootstrap.js') ?>"></script>
    <script type="text/javascript" src="<?php echo $this->url->get('public/js/pinned.jQuery.js') ?>"></script>
    <script type="text/javascript" src="<?php echo $this->url->get('public/js/jquery.raty.js') ?>"></script>
    <script type="text/javascript" src="<?php echo $this->url->get('public/js/labs.js') ?>"></script>
    <script type="text/javascript" src="<?php echo $this->url->get('jquery.sticky') ?>"></script>
	
    <!--    <script type="text/javascript" src="../js/bootstrap-wysiwyg.js"></script>-->
    <link href="<?php echo $this->url->get('public/css/bootstrap-responsive.min.css');?>" rel="stylesheet">
    <link href="<?php echo $this->url->get('public/css/font-awesome.css');?>" rel="stylesheet">
	<style>
	body{
		padding:70px !important;
	}
	</style>
</head>
<body>
<style>
    body {
        background: url('../img/bridge.jpg') no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }
</style>
<div class="container">

    <div class="row">
        <div class="col-md-6 col-md-offset-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-lock"></span>Register</div>
                <div class="panel-body">
            <form role="form" action="<?php echo $this->url->get(array("for" => "doRegister"));?>" method="post">
                <div class="form-row">
                    <div class="col-xs-6 form-group ">
                            <input type="text" name="first_name" id="first_name" class="form-control input-lg" placeholder="First Name" tabindex="1">
                    </div>
                    <div class="col-xs-6 form-group">
                            <input type="text" name="last_name" id="last_name" class="form-control input-lg" placeholder="Last Name" tabindex="2">
                    </div>
                </div>
                <div class="form-row">
					<div class="col-xs-12 form-group">
                    		<input type="text" name="display_name" id="display_name" class="form-control input-lg" placeholder="Display Name" tabindex="3">
                	</div>
				</div>
                <div class="form-row">
					<div class="col-xs-12 form-group">
                    	<input type="text" name="organisation" id="organisation" class="form-control input-lg" placeholder="Organistaion" tabindex="4"/>
					</div>
                </div>
                <div class="form-row">
					<div class="col-xs-12 form-group">
                    	<input type="email" name="username" id="email" class="form-control input-lg" placeholder="Email Address" tabindex="5">
					</div>
                </div>
                <div class="form-row">
					<div class="col-xs-12 form-group">
						<input type="text" name="mobile" id="mobile" class="form-control input-lg" placeholder="Mobile" tabindex="6">
					</div>
                </div>
                <div class="form-row">
                    	<div class="col-xs-6 form-group">
							<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="7">
                        </div>
                    	<div class="col-xs-6 form-group">
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-lg" placeholder="Confirm Password" tabindex="8">
                        </div>
                </div>
                <div class="form-row">
                    <div class="col-xs-6 form-group">
                        <div class="radio">
                            <label>
                            <input type="radio" name="module" value="1"/>Content Provider
                            </label>
                        </div>
                    </div>
                    <div class="col-xs-6 form-group">
                        <div class="radio">
                            <label>
                                <input type="radio" name="module" value="2"/>Video Viewer
                            </label>
                        </div>
                    </div>
                </div>
				<input type="hidden" name="<?php echo $this->security->getTokenKey() ?>"
				        value="<?php echo $this->security->getToken() ?>"/>
               <hr class="colorgraph">
                <div class="form-row">
                    <div class="col-md-6 form-group"><input type="submit" value="Create My Account" class="btn btn-primary btn-block btn-lg" tabindex="8"></div>
                    <div class="col-md-6 form-group"><a href="login" class="btn btn-success btn-block btn-lg">Sign Me In</a></div>
                </div>
            </form>
        </div>
    </div>
</div>
        </div>
    </div>


</body>

</html>