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
						 alert("Invalid Age");
                         twodigit.value="";
                         twodigit.focus();
						 return false;
						 }
	}
				function isPhoneNo(phonenumber)
				{
							var asm = /^[0-9]+$/;
						 if(asm.test(phonenumber.value)==false)
						 {
						 alert("This is Not Valid input! ");
						 		phonenumber.value="";
								 phonenumber.focus();
//frm.phonenumber.focus();
						 return false;
						 }
						 if((phonenumber.value).length > 10)
						 {
						 alert("phone number Should Be of 10 Digits");
						 phonenumber.value="";
						 phonenumber.focus();
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
				
                    if(myform.name.value=="" || myform.mname.value=="" || myform.lname.value=="" || myform.age.value=="" || myform.address.value=="" || myform.phone.value=="" || myform.email.value=="" || myform.password.value=="" || myform.confirmPass.value=="")
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




