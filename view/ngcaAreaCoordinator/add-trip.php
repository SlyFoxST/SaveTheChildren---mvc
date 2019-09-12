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
<?php require_once(ROOT.'/view/layout/menu-ng-a-c.php');?>
         <?endif;?>
</div>
</div><!--END NAVIDATION-->
<div class="col-md-9 col-lg-9 col-sm-12">
	<div class="row">
<div class="wrapper-edit-profile">
	<?if(isset($result_form)):?>
		<p class="succsesful_form">Your application has been successfully submitted and will be processed shortly.</p>
	<?php else:?>
		<h1>Travel Movements Request Form</h1>
		<div class="section-info">
			<span>Note:<br />
For all Program movements and expats personal travel exceeding 10 km from their residency location, please fill in this form with all required information.
</span>
<ul>
	<label>Click on the grey boxes to enter your details, they have “drop down” menu.</label><br />
	<label>Form must be submitted 2 days in advance to arrange transportation and security, even if not all details are known. </label><br />
	<label>‘Urgent’ requests will only be approved by the Operations Manager and Security Coordinator.</label><br />
</ul>
		</div>
		<?endif;?>
		<h1>TRIP INFORMATION</h1>
		<div class="travel-type">
			<form action="#" method="POST">
				<div class="col-md-6">
			<label>				
				<span>Type of Travel:</span></label><br />
				<p id="error"></p>
				<select name="type" id="type" required="required">
					<option value="Choose an item">Choose an item</option>
					<option value="Within GCA">Within GCA</option>
					<option value="Within NGCA">Within NGCA</option>
					<option value="To NGCA">To NGCA</option>
					<option value="To GCA">To GCA</option>
					<option value="Expats Personal Travel > 10km">Expats Personal Travel > 10km</option>
				</select>
			</div>
			<div class="col-md-6">
				<label>
			   <span>Purpose of trip:</span></label><br />
			   <p id="errorpurpos"></p>
			   <input type="text" name="purpose" id="purpose"  /><br />
			<br />
			<label>
			</div>
			<br />
			<div class="clearfix"></div>
			<div class="col-md-6 col-sm-6">
					<label>Date requested</label><br />
			<input type="text"   name="registration" id="DateRequest" value="<?php echo date('Y.m.d')?>"  /><br>
		     <label>
				<span> Departing from:</label></span></label> <br>
				<p id="errordepartinF"></p>
				<input type="text" name="departingFrom" id="departingFrom" required="required" />
			<br />
			
			<label>
				<span>Date and time of departure:</span></label><br />
				<p id="errordepartinD"></p>
				<input type="datetime-local" name="datedeparture" id="datedeparture" required="required" />
			<br />
			<label>
				<span>Destination:</label></span><br>
				<p id="errordepartinDestin"></p>
				<input type="text" name="destination" id="destination" required="required" />
			<br />

			<label>
				<span>Exp. Date & Time of Arrival:</span></label><br>   
				<input type="datetime-local" name="deteArrial" />
			<br />
			<label>
			<label>
				<span>Returning to:</span></label><br /> 
				<input type="text" id="returnto" name="returnto" />
		<br />
		
		<span>Date and time of return: </span></label><br />
		 <p id="errordateRet"></p>
					<input type="datetime-local" id="datereturn" name="dateReturn">
		   <br />
			
			<label>
				<span>Email:</span></label><br>
				<input type="email" name="email" value="<?php echo $admin['email']?>"/>	
		   <br />
			<label>
				<span>Mobile:</span></label><br> 
				<input type="tel" name="mobile" value="<?php echo $admin['phone']?>"/>
			<br />
			
          </div>
          <div class="col-md-6 col-sm-6">
           <label>
           	<label>
				<span>Is it a group travel?</span></label><br />
				<input type="radio" name="groupTravel" id="groupTravel" value="Yes" /><span style="color: #fff">Yes</span>
				<input type="radio" name="groupTravel" id="groupTravel" value="No" checked="checked" /><span style="color:#fff">No</span>
             <br />
			<label>
				<span>If yes, specify with who:</span></label><br />
				<input type="text" name="ifGroupTravelWho"  id="ifGroupTravelWho" readonly="readonly" />
           <br />
           	<label>
				<span>Team Leader:</span></label><br>
				<p id="errorLider"></p>
				<input type="text" name="teamLeader" id="teamLeader" readonly="readonly" /><br>
			<label>
				<span>Child Safeguarding Training Completed: </label></span><br>
			    <input type="radio" name="ChildSafeguardingTrainingCompleted" value="Yes" /><span style="color: #fff">Yes</span>
				<input type="radio" name="ChildSafeguardingTrainingCompleted" value="No" checked="checked" /><span style="color: #fff">No</span>
			<br />
			<label>
				<span>If no, why?:</span></label><br />
                <textarea name="ifNoChildSafeguardingWhy"></textarea>
			<br />
            <label>
				<span>Personal S&S Training Completed:</span></label><br />
					<input type="radio" name="PersonalS&STraining" value="Yes" />Yes
					<input type="radio" name="PersonalS&STraining" value="No" checked="checked"/>No
			<br />
				<label><span>If no, why?:</span></label><br />
				<textarea name="ifNoPersonalWhy"></textarea>
			<br />
		
			
		</div>	
		<div class="clearfix"></div>
	<hr />
		<p style="text-align: center;color:#fff;">
		<span style="margin: 5px">Detailed itinerary - to include known or assessed dates, locations, accommodation</span><br />
			<textarea name="DetailedItinerary" style="width:90%"></textarea>
		</p>
		<hr />
		<p class="travel-p">Admin / Logistics Requirements( to be filled by requestor )</p>
	<div class="col-md-4 col-sm-4">
	 <label>
		Accommodation Required:</label><br />
			<select name="accommodationRequired">
				<option value="Choose an item">Choose an item</option>
				<option value="Guesthouse">Guesthouse</option>
				<option value="Hotel room to be booked">Hotel room to be booked </option>
				<option value="No">No</option>
			</select>
	<br />
	 <label>
		Method of Travel:
		 <p id="errorTrav"></p>
	</label><br />
    <select name="methodTravel" id="methodTravel">
    	<option value="Choose an item">Choose an item.</option>
    	<option value="Taxi" >Taxi</option>
    	<option value="Vehicle"  >Vehicle</option>
    	<option value="Train" >Train</option>
    	<option value="Plain" >Plain</option>
    	<option value="Personal transport" checked >Personal transport</option>
    </select><br>
	<label>
		Support Needed: </label><br>
		<select name="supportNeeded">
			<option value="Logistics to provide vehicle">Logistics to provide vehicle</option>
			<option value="Admin to book tickets">Admin to book tickets</option>
			<option value="Admin to order a taxi">Admin to order a taxi</option>
			<option value="Admin to book tickets and order a taxi">Admin to book tickets and order a taxi</option>
			<option value="None">None</option>
		</select>
	<br />
</div>
<div class="col-md-4 col-sm-4">
	 <label>
		Location: </label><br />
		<input type="text" name="locationCountry" />
	<br />
    <label>
		From: 
	</label><br />
	<input type="date" name="locationFrom" /><br>
	 <label>
		To:
	</label><br /> 
    <input type="date" name="locationTo" /><br>
</div>

<div class="col-md-4 col-sm-4">
	<label>
		Location: 
	</label><br />
	<input type="text" name="locationCountry2" /><br>
		 <label>
		From: 
	</label><br />
	<input type="date" name="locationFrom2" /><br>
	 <label>
		To: 
	</label><br />
    <input type="date" name="locationTo2" />
</div>
    <label>
		Extra luggage/equipment : Type, size, weight:
	</label><br />
    <textarea name="extraLuggage"></textarea><br>
	<hr />
		<p class="travel-p">Budget Code</p>
		<div class="col-md-4">
		<label>
			Account Code:<br /> 
		</label><br />
        		<input type="text" name="accountCode" />
        		<br />
		<label>
			Cost Centre:<br />   
		</label><br />

		<input type="text" name="costCentre" />
       <br />
       </div>
       <div class="col-md-4">
		<label>
			%: 
		</label><br />
         <input type="text" name="procent" /><br />
		<label>
			SOF:             
		</label><br />
		<input type="text" name="soft" />
        <br />
    </div>
    <div class="col-md-4">
		<label>
			DEA Code:
		</label><br />
		<input type="text" name="DEACode">
        <br />
		<label>
			Project Code:<br />
		</label><br />
        <input type="text" name="projectCode" />
         <br />
</div>
	<hr />
		<p class="travel-p">Approval</p>
		<div class="col-md-3 col-sm-3">
			
				<label>Line Manager:<br />
				</label><br />
				<select name="LineManager">
					<?php foreach($manedger as $man):?>
					<option value="<?php echo $man['name'];?>"><?php echo $man['name'];?></option>
					
				<?php endforeach;?>
				</select>
			
		</div>
		<div class="col-md-3 col-sm-3">		
				<label>Country Director:          
				</label><br />
				<? foreach($country as $con):?>
		<input type="text" name="countryDirector" id="countryDirector" value="<?php echo $con['name'];?>" readonly />
	<?php endforeach;?>
		</div>
		<div class="col-md-3 col-sm-3">
				<label>Security Coordinator:
				</label><br />
				<?
				foreach ($security as $key): 			    
                            ?>
				<input type="text" name="securityCoordinator" value="<?php  echo $key['name'];?>" readonly />
			<?php endforeach;?>
		</div>
		<div class="col-md-3 col-sm-3">
			<ul>
				<label>Ngca Area Coordinator(if needed):
				</label><br />
				<?php foreach($areaCoordinator as $area):?>
				<input type="text" name="NgcaCoordinator" value="<?php echo $area['name'];?>" readonly/>
			<?php endforeach;?>
			</ul>
		</div>
	
</div>
<input type="submit" name="submit-form" class="btn-form" value="Make a request"/>
</form>


	<img src="/template/img/logo2.png" class="img-responsive" />
</div>
</div>
</div><!--END CONTENT-->
</div><!--END WRAPPER-->
<?php require_once(ROOT.'/view/layout/footer.php');?>