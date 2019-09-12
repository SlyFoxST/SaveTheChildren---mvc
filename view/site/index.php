<?php include_once(ROOT.'/view/layout/header.php');?>
<body>
	<div class="bg-index">
	<section class="wrapper-index">	
		<?php if(isset($errors) && is_array($errors)):?>
			<?php foreach ($errors as $error): ?>
				<div class="error">
				<?php echo "-" .$error . "<br />";?>
			</div>
			<?php endforeach;?>
		<?php endif;?>
	<div class="overlay-index"></div>
	<a href="#" class="cklick-login">Login</a>
	<div class="section-form">
		<div class="close">	&#215;</div>
		<form method="post" action="#" class="form-register">
			<input type="email" name="email" placeholder="email" value="<?php if(isset($email)) echo $email;?>"/><br />
			<input type="password" name="password" placeholder="password" value="<?if(isset($password))echo $password;?>"/><br />
			<input type="submit" name="btn" class="btn-index" value="Login"/> 
		</form>
	</div>
</section>
</div>
<?php include_once(ROOT.'/view/layout/footer.php');?>
