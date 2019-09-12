$(document).ready(function(){
$('.cklick-login').click(function(){
	$('.section-form').slideDown(800);
	$('.overlay-index').css('background','rgba(23,0,0,0.9)');
});
$('.close').click(function(){
	$('.section-form').fadeOut(1000);
	$('.overlay-index').css('background','rgba(0,0,0,0.5)');
})
$('.humburger').click(function(){
	$('.navigation').toggleClass('toggle');
});

$('#DateRequest').prop('readonly',true);

$('#groupTravel').click(function(){

	if($(this).val() == 'Yes'){
		$('#teamLeader').removeAttr('readonly').prop('required',true);
        $('#ifGroupTravelWho').removeAttr('readonly').prop('required',true);

	}
	if($(this).val() == 'No'){
	 	$('#teamLeader').removeProp('required').prop('readonly',true);  
        $('#ifGroupTravelWho').removeAttr('readonly').prop('required',true);  
	}
	
});

$('.btn-form').click(function(){
	if($('#type option:selected').val() == 'Choose an item'){
	  $('#error').text('*You did not choose the type of trip').css({'color':'rgb(239, 0, 0)','padding':'10px'});
	}
	else{
	  $('#error').html('<i class="fa fa-check-square-o" aria-hidden="true">succsesful</i>').addClass('succsesful');
	}
    if($('#purpose').val() == ''){
	 $('#errorpurpos').text('*You did not choose the type of trip').css({'color':'rgb(239, 0, 0)','padding':'10px'});
    }
    else{
    	 $('#errorpurpos').html('<i class="fa fa-check-square-o" aria-hidden="true">succsesful</i>').addClass('succsesful');
    }
    if($('#departingFrom').val() == ''){
    	 $('#errordepartinF').text('*You did not specify the departure').css({'color':'rgb(239, 0, 0)','padding':'10px'});
    }
     else{
    	 $('#errordepartinF').html('<i class="fa fa-check-square-o" aria-hidden="true">succsesful</i>').addClass('succsesful');
    }
    if($('#datedeparture').val() == ''){
    	 $('#errordepartinD').text('*You did not specify a departure date').css({'color':'rgb(239, 0, 0)','padding':'10px'});
    }
    else{
    	$('#errordepartinD').html('<i class="fa fa-check-square-o" aria-hidden="true">succsesful</i>').addClass('succsesful');
    }
    if($('#returnto').val() != ''){
    	if($('#datereturn').val() == ''){
    	 $('#errordateRet').text('*You did not specify a departure date').css({'color':'rgb(239, 0, 0)','padding':'10px'});	
    	}
    	else{
    	$('#errordateRet').html('<i class="fa fa-check-square-o" aria-hidden="true">succsesful</i>').addClass('succsesful');
    	}
    }
    if($('#destination').val() == ''){
    	$('#errordepartinDestin').text('*You did not specify a departure date').css({'color':'rgb(239, 0, 0)','padding':'10px'});	
    }
    else{
    	$('#errordepartinDestin').html('<i class="fa fa-check-square-o" aria-hidden="true">succsesful</i>').addClass('succsesful');
    }
    if($('#methodTravel option:selected').val() == 'Choose an item'){
    	$('#errorTrav').text('*What is the travel method?').css({'color':'rgb(239, 0, 0)','padding':'10px'});
    }
    else{
    	$('#errorTrav').html('<i class="fa fa-check-square-o" aria-hidden="true">succsesful</i>').addClass('succsesful');
    }
   
  
});



});