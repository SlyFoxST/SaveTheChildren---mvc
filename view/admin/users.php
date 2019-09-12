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
<?php require_once(ROOT.'/view/layout/menu-user.php');?>
         <?endif;?>

</div>
</div><!--END NAVIDATION-->
<div class="col-md-9 col-lg-9 col-sm-12">
	<div class="row">
<div class="wrapper-edit-profile">
	<i class="fa fa-eye" aria-hidden="true"></i>
		<h1>View users</h1>
		<div class="table-review">
		<div class="col-md-12">
<?php if(isset($result) && $result==true):?>
				<p class="good_edit">User successfully deleted</p>
				<?php endif;?>
<div class="table-container">
	<table>
			<thead>
				<tr>
					<th>User names:</th>
					<th>Role:</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($getListUsers as $users):?>
				<tr>
					<td><a href="/users/<?php echo $users['id'];?>"><i class="fa fa-eye" aria-hidden="true"></i><?php echo $users['name'];?></a></td>
                    <td><?php echo  $users['role'];?> </td>

				</tr>
			<?php endforeach;?>

		</tbody>
	</table>
	</div>
</div>
</div>
	<img src="/template/img/logo2.png" class="img-responsive" />
</div>
</div>
</div><!--END CONTENT-->
</div><!--END WRAPPER-->
<?php require_once(ROOT.'/view/layout/footer.php');?>