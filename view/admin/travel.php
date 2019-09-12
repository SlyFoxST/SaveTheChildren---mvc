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
	<i class="fa fa-user" aria-hidden="true"></i><span>Howdy, <?php echo $admin['name'];?></span>
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
		<h1>Watch trip</h1>
		<div class="travel">
		<div class="col-md-6 col-sm-6">
		<ul>

			<li>
				Type of Travel: <span><?php echo $travelTrip['type'];?></span>
			</li>
			<li>
				Requested by:   <span><?php echo $travelTrip['name'];?></span>
			</li>
			<li>
				Date requsted:   <span><?php echo $travelTrip['registration'];?></span>
			</li>
			
			<li>
				Departing from: <span><?php echo $travelTrip['departingFrom'];?></span>
			</li>
			<li>
				Date and time of departure: <span><?php echo $travelTrip['datedeparture'];?></span>
			</li>
			<li>
				Destination:   <span><?php echo $travelTrip['destination'];?></span>
			</li>
			<li>
				Exp. Date & Time of Arrival:   <span><?php echo $travelTrip['deteArrial'];?></span>
			</li>
			<li>
				Returning to:  <span><?php echo $travelTrip['returnto'];?></span>
			</li>
			<li>
				Date and time of return: <span><?php echo $travelTrip['dateReturn'];?></span>
			</li>
			<li>
				Email: <span><?php echo $travelTrip['email'];?></span>
			</li>
			<li>
				Mobile: <span><?php echo $travelTrip['mobile'];?></span>
			</li>									          
		</ul>
	</div>
	<div class="col-md-6 col-sm-6">
		<ul>	
			<li>
				Purpose of trip: <span><?php echo $travelTrip['purpose'];?></span>
			</li>
			<li>
				Is it a group travel?: <span><?php echo $travelTrip['groupTravel'] ?></span>
			</li>
			<li>
				If yes, specify with who: <span><?php echo $travelTrip['ifGroupTravelWho'];?></span>
			</li>
			<li>
				Team Leader: <span><?php echo $travelTrip['teamLeader'];?></span>
			</li>
			<li>
				Child Safeguarding Training Completed: <span><?php echo $travelTrip['ChildSafeguardingTrainingCompleted'] ?></span>
			</li>
			<li>
				If no, why?: <span><?php echo $travelTrip['ifNoChildSafeguardingWhy'];?></span>
			</li>
			 <li>
				Personal S&S Training Completed: <span><?php echo $travelTrip['PersonalSSTraining'] == 0? "No" : "Yes";?></span>
			</li>
           <li>
				If no, why?: <span><?php echo $travelTrip['ifNoPersonalWhy'];?></span>
			</li>						
					</ul>

</div>
<div class="clearfix"></div>
	<hr />
		<p style="text-align: center">
		Detailed itinerary - to include known or assessed dates, locations, accommodation<br />
		<textarea value="<?php echo $travelTrip['DetailedItinerary'];?>"></textarea>	
		</p>
		<hr />
		<p class="travel-p p-txt">Admin / Logistics Requirements( to be filled by requestor )</p>
	<div class="col-md-4 col-sm-4">
	<ul>
	 <li>
		Accommodation Required: <span><?php echo $travelTrip['accommodationRequired'];?></span>
	</li>
	 <li>
		Method of Travel: <span><?php echo $travelTrip['methodTravel'];?></span>
	</li>
	<li>
		Support Needed: <span><?php echo $travelTrip['supportNeeded'];?></span>
	</li>
</ul>	
	</div>	
	<div class="col-md-4 col-sm-4">
		<ul>
	 <li>
		Location: <span><?php echo $travelTrip['locationCountry'];?></span>
	</li>
		 <li>
		From: <span><?php echo $travelTrip['locationFrom'];?></span>
	</li>
	 <li>
		To: <span><?php echo $travelTrip['locationTo'];?></span>
	</li> 
</ul>	
	</div>
	<div class="col-md-4 col-sm-4">
		<ul>
			<li>
		Location: <span><?php echo $travelTrip['locationCountry2'];?></span>
	</li>
		 <li>
		From: <span><?php echo $travelTrip['locationFrom2'];?></span>
	</li>
	 <li>
		To: <span><?php echo $travelTrip['locationTo2'];?></span>
	</li>
		</ul>
	</div>
	<div class="col-md-12">
	<p style="text-align: center">
		Extra luggage/equipment : Type, size, weight: <span>
			<textarea value="<?php echo $travelTrip['extraLuggage'];?>"></textarea>
		</span></p>
	
	</div>
	<div class="clearfix"></div>
	<hr />
		<p class="travel-p p-txt">Budget Code</p>
<div class="col-md-4 col-sm-4">
	<ul>
		<li>
			Account Code: <span><?php echo $travelTrip['accountCode'];?></span>

		</li>
		<li>
			Cost Centre: <span><?php echo $travelTrip['costCentre'];?></span>

		</li>
	</ul>
</div>

<div class="col-md-4 col-sm-4">
	<ul>
		<li>
			%: <span><?php echo $travelTrip['procent'];?></span>

		</li>
		<li>
			SOF: <span><?php echo $travelTrip['soft'];?></span>

		</li>
	</ul>
</div>

<div class="col-md-4 col-sm-4">
	<ul>
		<li>
			DEA Code: <span><?php echo $travelTrip['costCentre'];?></span>

		</li>
		<li>
			Account Code: <span><?php echo $travelTrip['accountCode'];?></span>

		</li>
	</ul>
</div>

<div class="clearfix"></div>
	<hr />
		<p class="travel-p p-txt">Approval</p>
		<div class="col-md-3 col-sm-3">
			<ul>
				<li>Line Manager:<br /><br />
             <span><?php echo $travelTrip['LineManager'];?></span>

				</li>
			</ul>
		</div>
		<div class="col-md-3 col-sm-3">
			<ul>
				<li>Country Director:<br /><br />
             <span><?php echo $travelTrip['countryDirector'];?></span>

				</li>
			</ul>
		</div>
		<div class="col-md-3 col-sm-3">
			<ul>
				<li>Security Coordinator:<br /><br />
             <span><?php echo $travelTrip['securityCoordinator'];?></span>

				</li>
			</ul>
		</div>
		<div class="col-md-3 col-sm-3">
			<ul>
				<li>NGCA Area Coordinator:<br /><br />
             <span><?php echo $travelTrip['NgcaCoordinator'];?></span>

				</li>
			</ul>
		</div>
	
<div class="print_or_save">
<a href="#print-this-document" onclick="print(); return false;"><i class="fa fa-print" aria-hidden="true"></i></a>
</div>
</div>

	<img src="/template/img/logo2.png" class="img-responsive" />
</div>
</div>
</div><!--END CONTENT-->
</div><!--END WRAPPER-->
<?php require_once(ROOT.'/view/layout/footer.php');?>