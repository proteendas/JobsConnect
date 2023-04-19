 $("#cancelModal").click(function() { 
  
 });
 
$("#regNowBtn").click(function() { 

   $('#signInCloseBtn').trigger('click');
   
    
    
});


$("#loginsubmit").click(function() {
   
    var email= $('#email').val();
    var password  = $('#password').val();
     var flag = true;
     var cPage =$('#currentPage').val();
     
     if(email==""){ 
        $('#email').css('border-color','red'); 
        flag = false;
		output = '<div class="error">Please Enter Your Email</div>';
		$("#loginresult").hide().html(output).slideDown();  
		return false;
    }
    
   
    /* pass field validation */
    if(password==""){ 
        $('#password').css('border-color','red'); 
		
        flag = false;
		output = '<div class="error">Please Enter Your Password</div>';
		$("#loginresult").hide().html(output).slideDown();   
		return false;
    }
    
      
     if(flag) 
    {
        
        $.ajax({
            type: 'post',
            url: 'signin.php', 
            dataType: 'json',
            data:{ 
                 
                 email:email,
                 password:password,
                 loginsubmit: 1
             },
            beforeSend: function() {
                 
                $('#loginsubmit').attr('disabled', true);
               
            },
            complete: function() {
                 
                $('#loginsubmit').attr('disabled', false);
               
            },  
            success: function(data)
            {
                if(data.type == 'error')
                {
                   
                    output = '<div class="error">'+data.text+'</div>';
                    $("#loginresult").hide().html(output).slideDown(); 
                    return false;
                }
                else
                {
//                     eval( data.text);
		
                   
//                    output = '<div class="error">'+data.text+'</div>';
//                    $("#loginresult").hide().html(output).slideDown(); 
//                    return true;
                  document.location.href = "employerAccount.php";
//	             location.reload();
//                     return true;
			
                }

                   
				
                }
        });
    }
     
}); 
 
 $("#regsubmit").click(function() { 
     
     
     
     if (grecaptcha === undefined) {
		alert('Recaptcha not defined'); 
		return false; 
	}

	var response = grecaptcha.getResponse();

	if (!response) {
		alert('Coud not get recaptcha response'); 
		return false; 
	}
     
    //get input field values
    console.log("Reached regSubmit");
    var name = $('#signup-username').val();
    var email= $('#signup-email').val();
    var mob   = $('#signup-mobile').val();
    var pass  = $('#signup-password').val();
    var output = "";
	  
    var flag = true;
    /********validate all our form fields***********/
    /* Name field validation  */
    if(name==""){ 
        $('#name').css('border-color','red'); 
        flag = false;
		output = '<div class="error">Please Enter Your Name</div>';
		$("#result").hide().html(output).slideDown();  
		return false;
    }
	
	   if(email==""){ 
        $('#email').css('border-color','red'); 
        flag = false;
		output = '<div class="error">Please Enter Your Email</div>';
		$("#result").hide().html(output).slideDown();  
		return false;
    }
    
   
    /* pass field validation */
    if(pass==""){ 
        $('#signup-password').css('border-color','red'); 
		
        flag = false;
		output = '<div class="error">Please Enter Your Password</div>';
		$("#result").hide().html(output).slideDown();  
		return false;
    } 
    /* mob field validation */
     if(mob==""){ 
        $('#mob').css('border-color','red'); 
		
        flag = false;
		output = '<div class="error">Please Enter Your Mobile No.</div>';
		$("#result").hide().html(output).slideDown();  
		return false;
    } 
    
    
    /********Validation end here ****/
    /* If all are ok then we send ajax request to email_send.php *******/
    if(flag) 
    {
        console.log("reached ajax");
        $.ajax({
            type: 'post',
            url: 'registerUser.php', 
            dataType: 'json',
            data:{ 
                 username:name,
                 useremail:email,
                 mob:mob,
                 pass:pass,
                 regsubmit:1,
                 captcha:response
             },
            beforeSend: function() {
                 
                $('#regsubmit').attr('disabled', true);
               
            },
            complete: function() {
                 grecaptcha.reset();
//                $('.wait').remove();
                $('#regsubmit').attr('disabled', false);
               
            },  
            success: function(data)
            {
                console.log(data);
                if(data.type == 'error')
                {
                   
                    output = '<div class="error">'+data.text+'</div>';
                    $("#result").hide().html(output).slideDown(); 
                    return false;
                }else{
                    
		
	 	
                        console.log("reached success");
			$('input').val(''); 
                        $('#signUpCloseBtn').trigger('click');
			$('#regSuccessSubmit').trigger('click');
                        return true;
			
                }

                   
				
                }
        });
    }
});


//reset previously set border colors and hide all message on .keyup()
//$("#contactform input, #contactform textarea").keyup(function() { 
//    $("#contactform input, #contactform textarea").css('border-color',''); 


