<?php require_once(ROOT.'/view/layout/header.php');?>
<body class="bg-admin">
	<div class="wrapper-admin">
		<div class="top-line">
			<div class="container-fluid">
		<div class="col-md-5 col-sm-5">
			<div class="logo">
			<i class="fa fa-home hidden-sm hidden-xs" aria-hidden="true"></i>
			<a href="/admin/"> <img src="/template/img/logo.png" class="img-responsive"/></a>
		</div>
		</div>
<div class="col-md-2 hidden-sm hidden-xs"></div>
<div class="col-md-3 col-sm-4">
<div class="hello-user">
	<i class="fa fa-user" aria-hidden="true"></i><span>Howdy,<?php echo $admin['name'];?></span>
</div>
</div>
<div class="col-md-2 col-sm-3">
<div class="logout">
	<a href="/logout/"><i class="fa fa-unlock" aria-hidden="true"></i> <span>logout</span></a>
</div>
</div>
</div>
</div><!--END TOP LINE-->
<div class="col-md-3 col-lg-3 col-sm-12">
	<div class="row">
		<div class="humburger hidden-md hidden-lg">
			<i class="fa fa-bars" aria-hidden="true"></i>Menu
		</div>
	<nav class="navigation">	
	<ul>
		<li><i class="fa fa-eye" aria-hidden="true"></i><a href="/view-profile-admin/">View Profile</a></li>
		<li><i class="fa fa-pencil" aria-hidden="true"></i><a href="/edit-admin/">Edit profile</a></li>
		<li><i class="fa fa-plus" aria-hidden="true"></i><a href="/add-user/">Add a user</a></li>
		<li><i class="fa fa-plus" aria-hidden="true"></i><a href="/view-user/">View users</a></li>
		<li><i class="fa fa-eye" aria-hidden="true"></i><a href="/all-travel/">Review all travel</a></li>
	</ul>
</nav>

</div>
</div><!--END NAVIDATION-->
<div class="col-md-9 col-lg-9 col-sm-12">
	<div class="row">
<div class="wrapper-edit-profile">
	<?php if($result == true):?>
		<p class="good_edit"><?php echo "Your data successfully added";?></p>
	<?php else:?>
	<?if(isset($errors) && is_array($errors)):?>
		<?foreach($errors as $error):?>
			<p class="errors-p">*<?php echo $error . "<br>";?></p>
		<?php endforeach;?>
		<?endif;?>
	<?php endif;?>
	<i class="fa fa-plus" aria-hidden="true"></i>
	<h1>Add a user</h1>
	<form action="#" method="POST" class="form-edit-main-user">
		<label>Name:<br />
		<input type="name" class="name" name="name" required="required" value="<?php if(isset($_POST['name'])) echo $_POST['name'];?>"/>
	    </label><br />
	    <label>Email: <br />
		<input type="email" class="email" name="email" required="required" value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>"  />
	    </label><br />
	    <label>Password:<br />
		<input type="password" class="password" name="password"  required="required" />
	    </label><br />
	    <label>Phone number:<br />
		<input type="tel" name="phone" class="phone" required="required" value="<?php if(isset($_POST['phone'])) echo $_POST['phone'];?>" />
	    </label><br />
	    <label>User<input type="radio" name="radio" value="user" checked="checked" /></label><br >
   	    <label>Manager<input type="radio" name="radio" value="maneger" /></label><br />
		<input type="submit" class="submit-edit-main-user" name="add-user" value="Add" />
	</form>
	<img src="/template/img/logo2.png" class="img-responsive" />
</div>
</div>
</div><!--END CONTENT-->
</div><!--END WRAPPER-->
<?php require_once(ROOT.'/view/layout/footer.php');?>
