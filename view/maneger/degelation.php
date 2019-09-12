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
	<i class="fa fa-user" aria-hidden="true"></i><span>Howdy,<?php echo $admin['name'];?></span>
</div>
</div>
<div class="col-md-2 col-sm-3">
<div class="logout">
	<a href="/finish/"><i class="fa fa-unlock" aria-hidden="true"></i> <span>logout</span></a>
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
	<h1>Delegate rights</h1>
	<?if(isset($result_form)):?>
		<p class="succsesful_form">You have successfully delegated the rights.</p>
	<?php else:?>
		<?endif;?>
	
<?php if(isset($del) && $del == true):?>
	<p class="succsesful_form">You have returned user rights</p>
<?php endif;?>
		<div class="travel-type">
				<?php
           if(isset($errors) && is_array($errors)):
			?>
			<?php foreach($errors as $x):?>
				<p class="errors-p"><?php echo $x;?></p>
				<?php foreach($was_manedger as $y):?>
				<p class="error">
				You transferred the rights, <?php echo $y['was_degel'];?></p>
				<?php endforeach;?>
				<form action="#" method="POST">
					<input type="submit" name="restore" value="Restore rights" class="btn-form" />
				</form>
			<?php endforeach;?>
			<?php endif;?>
			<form action="#" method="POST">											
			   <select name="option">
					<?php foreach ($manedger as $key ): ?>
					<option value="<?php echo $key['name'];?>"><?php echo $key['name'];?></option>
					<?php endforeach ?>
				</select><br />
				<input type="submit" name="sub" value="Delegate" class="btn-form" /><br />
</form>


	<img src="/template/img/logo2.png" class="img-responsive" />
</div>
</div>
</div><!--END CONTENT-->
</div><!--END WRAPPER-->
<?php require_once(ROOT.'/view/layout/footer.php');?>