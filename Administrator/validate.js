
    
	function isTwo(twodigit)
	{
	                    var r=/\D$/i;
                    if(r.test(twodigit.value))
                     {
                         alert("This Field allows Only Numerics.");
                         twodigit.value="";
                         twodigit.focus();
                     }
					 if((twodigit.value).length > 2)
						 {
						 alert("Invalid Input");
                         twodigit.value="";
                         twodigit.focus();
						 return false;
						 }
	}
		function isYear(twodigit)
	{
	                    var r=/\D$/i;
                    if(r.test(twodigit.value))
                     {
                         alert("This Field allows Only Numerics.");
                         twodigit.value="";
                         twodigit.focus();
                     }
					 if((twodigit.value).length > 1)
						 {
						 alert("Invalid Input");
                         twodigit.value="";
                         twodigit.focus();
						 return false;
						 }
	}
    function isalphanum(ele)
                {
                    var r=/\W$/i;
                    if(r.test(ele.value))
                     {
                         alert("This Field allows Only Alpha Numeric characters.");
                         ele.value="";
                         ele.focus();
                     }
                }
                function isalpha(ele)
                {
                    var r=/[^a-zA-Z]+/i;
                    if(r.test(ele.value))
                     {
                         alert("This Field allows Only Alphabets.");
                         ele.value="";
                         ele.focus();
                     }
                }
                function isnum(ele)
                {
                    var r=/\D$/i;
                    if(r.test(ele.value))
                     {
                         alert("This Field allows Only Numerics.");
                         ele.value="";
                         ele.focus();
                     }
                }

                function validateform(mmyform)
                {
                    var em=/[a-zA-Z0-9]+@[a-zA-Z0-9]+.[a-zA-Z]+/;
                    myform=document.forms[mmyform];
				
                    if(myform.course_code.value=="" || myform.course_title.value=="" || myform.credit_hour.value=="")
                     {
                         alert("Some of the fields are Empty.");
                         return false;
                         //  myform.onsubmit=false;
                     }
					
					
                     else if(myform.password.value!=myform.confirmPass.value)
                         {
                             alert("Passwords Donot Match!");
                            // myform.onsubmit=false;
                            return false;
                         }
                         else if(!em.test(myform.email.value))
                             {
                                 alert("Enter the E-mail Correctly!");
                               //  myform.onsubmit=false;
                                 return false;
                             }


                }

                function validatesubform(mmyform)
                {

                    myform=document.forms[mmyform];
                    if(myform.subname.value=="" || myform.subdesc.value=="")
                     {
                         alert("Some of the fields are Empty.");
                         myform.onSubmit=false;
                     }
                     
                }
        function validatetestform(mmyform)
                {

                   /* myform=document.forms[mmyform];
                    if(myform.subname.value=="" || myform.subdesc.value=="")
                     {
                         alert("Some of the fields are Empty.");
                         myform.onSubmit=false;
                     }
*/
                }
		

function validateTeacher(mmyform)
                {
                    var em=/[a-zA-Z0-9]+@[a-zA-Z0-9]+.[a-zA-Z]+/;
                    myform=document.forms[mmyform];
				
                    if(myform.username.value=="" || myform.password.value=="" || myform.confirm.value=="")
                     {
                         alert("Some of the fields are Empty.");
                         return false;
                         //  myform.onsubmit=false;
                     }
					else if(myform.password.value!=myform.confirm.value)
                         {
                             alert("Passwords Donot Match!");
                            // myform.onsubmit=false;
                            return false;
                         }
				}
