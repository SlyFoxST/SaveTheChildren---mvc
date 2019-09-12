<?php require_once(ROOT.'/view/layout/header.php');?>
<body class="bg-admin">
	<div class="wrapper-admin">
		<div class="top-line">
			<div class="container-fluid">
		<div class="col-md-5 col-sm-5">
			<div class="logo">
			<i class="fa fa-home hidden-sm hidden-xs" aria-hidden="true"></i>
			<a href="/<?php echo $role;?>/"> <img src="/template/img/logo.png" class="img-responsive"/></a>
		</div>
		</div>
<div class="col-md-2 hidden-sm hidden-xs"></div>
<div class="col-md-3 col-sm-4">
<div class="hello-user">
	<i class="fa fa-user" aria-hidden="true"></i><span>Howdy, <?php echo $admin['name'];?></span>
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
			<?if($role == 'admin'):?>
<?php require_once(ROOT.'/view/layout/menu.php');?>
     <?else:?>
<?php require_once(ROOT.'/view/layout/menu-mg.php');?>
         <?endif;?>
</div>
</div><!--END NAVIDATION-->
<div class="col-md-9 col-lg-9 col-sm-12">
	<div class="row">
<div class="wrapper-edit-profile">
	<?php if($result == true):?>
		<p class="good_edit"><?php echo "Your data has been successfully updated";?></p>
	<?php else:?>
		<?if(isset($errors) && is_array($errors)):?>
		<?foreach($errors as $error):?>
			<p class="errors-p">*<?php echo $error . "<br>";?></p>
		<?php endforeach;?>
		<?endif;?>
	<i class="fa fa-pencil" aria-hidden="true"></i>
	<h1>Edit Profile</h1>
	<form action="#" method="post" class="form-edit-main-user">
		<label>Enter your new name:<br />
		<input type="name" class="name" name="name" value="<?php echo $admin['name'];?>" />
	    </label><br />
	    <label>Enter your new email: <br />
		<input type="email" class="email" name="email" value="<?php echo $admin['email'];?>"/>
	    </label><br />
	    <label>Enter your new password:<br />
		<input type="password" class="password" name="password" value="<?php echo $admin['password'];?>"/>
	    </label><br />
	    <label>Enter your new phone number:<br />
		<input type="tel" name="phone" class="phone" value="<?php echo $admin['phone'];?>" />
	    </label><br />      
		<input type="submit" class="submit-edit-main-user" name="submit-edit" value="edit" />
	</form>
<?php endif;?>
	<img src="/template/img/logo2.png" class="img-responsive" />
</div>
</div>
</div><!--END CONTENT-->
</div><!--END WRAPPER-->
<?php require_once(ROOT.'/view/layout/footer.php');?>