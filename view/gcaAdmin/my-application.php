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
<?php require_once(ROOT.'/view/layout/menu-gca-admin.php');?>
         <?endif;?>
</div>
</div><!--END NAVIDATION-->
<div class="col-md-9 col-lg-9 col-sm-12">
	<div class="row">
<div class="wrapper-edit-profile">
	<i class="fa fa-eye" aria-hidden="true"></i>
		<h1>Review all travel</h1>
		<div class="table-review">
		<div class="col-md-12">
<? if($travels): ?>
<div class="table-container">
	<table>
			<thead>
				<tr>
					<th>Status:</th>
					<th>Date requested:</th>
				</tr>
			</thead>
			<tbody>
					      <?foreach($travels as $travel):?>
	            <tr>
				<td><a href="/gca-admin-my-travel/<?php echo  $travel['id_travel'];?>"><?php echo  $travel['status'] == 1? '<span class="approved"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>approved</span>':'<span class="notapproved"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i>not approved</span>';?></a></td>
                    <td><?php echo  $travel['registration'];?></td>
                </tr>

	                     <? endforeach;?>
		</tbody>
	</table>
	</div>
<? else:?>
	<p>No data to show</p>
<? endif;?>
</div>
</div>
	<img src="/template/img/logo2.png" class="img-responsive" />
</div>
</div>
</div><!--END CONTENT-->
</div><!--END WRAPPER-->
<?php require_once(ROOT.'/view/layout/footer.php');?>