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
<div class="col-md-5 col-sm-4">
<div class="hello-user">
	<i class="fa fa-user" aria-hidden="true"></i><span><?php echo $user['role'];?> - <?php echo $user['name'];?></span>
</div>
</div>

</div>
</div><!--END TOP LINE-->
<div class="col-md-3 col-lg-3 col-sm-12">
	<div class="row">
		<?if($role == 'admin'):?>
<?php require_once(ROOT.'/view/layout/menu.php');?>
     <?else:?>
<?php require_once(ROOT.'/view/layout/menu-user.php');?>
         <?endif;?>

</div>
</div><!--END NAVIDATION-->
<div class="col-md-9 col-lg-9 col-sm-12">
	<div class="row">
<div class="wrapper-edit-profile">
	<i class="fa fa-eye" aria-hidden="true"></i>
		<h1>View user</h1>
		<div class="table-review">
		<div class="col-md-12">
			<?php if(isset($result) && $result==true):?>
				<p class="good_edit">User successfully deleted</p>
				<?php else:?>
<form  method="POST">					
Role:<strong> <?php echo $user['role'];?></strong><br /><br />
Name:<strong> <?php echo $user['name'];?></strong><br /><br />
Email:<strong> <?php echo $user['email'];?></strong><br /><br />
Phone number:<strong> <?php echo $user['phone'];?></strong><br /><br />
Password number:<strong> <?php echo $user['password'];?></strong><br /><br /><br />
<input type="submit" value="delete" name="delete-user" class="submit-edit-main-user"/>
</form>
	<?endif;?>
	
</div>
</div>
	<img src="/template/img/logo2.png" class="img-responsive" />
</div>
</div>
</div><!--END CONTENT-->
</div><!--END WRAPPER-->
<?php require_once(ROOT.'/view/layout/footer.php');?>