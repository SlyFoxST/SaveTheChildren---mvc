<?php include_once(ROOT. '/view/layout/header.php');?>
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
	<a href="/logout/"><i class="fa fa-unlock" aria-hidden="true"></i><span>logout</span></a>
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
	<div class="col-md-6">
			<div class="row">
			<div class="section-nav"><i class="fa fa-eye" aria-hidden="true"></i>
				<br /><a href="/view-profile/">View Profile</a>
			</div>
		</div>
</div>
		<div class="col-md-6">
			<div class="row">
			<div class="section-nav">
				<i class="fa fa-plus" aria-hidden="true"></i>
<br />
				<a href="/add-trip/">Add a trip</a>
			</div>
		</div>
</div>
	
		<div class="col-md-6">
			<div class="row">
			<div class="section-nav">
				<i class="fa fa-pencil" aria-hidden="true"></i>
				<br /><a href="/edit-profile/">Edit profile</a>
			</div>
		</div>
	</div>
		<div class="col-md-6">
<div class="row">
			<div class="section-nav">
			<i class="fa fa-eye" aria-hidden="true"></i>
			<br /><a href="/review-application/">Review of applications</a>
		</div>
	</div>
</div>
</div>
</div><!--END CONTENT-->
</div><!--END WRAPPER-->
<?php include_once(ROOT. '/view/layout/footer.php');?>