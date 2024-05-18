/*USERNAME VALIDATION STARTS HERE */
function name_validation()
{
    var burger=document.querySelector(".user");
    var username=document.querySelector(".username");
    var name=document.forms['myforms']['username'].value;
    if(name.length>5 && name.length<20 && name.match(/[0-9]/))
    {
       burger.style.border='2px solid green';
       username.style.display='none';
    }
    else
    if(name.length<5 || name.length>20)
    {
       burger.style.border='2px solid red';
       username.style.display='flex';
    }
  };
  /* EMAIL VALIDATION STARTS HERE*/
  function email_validation()
  {
    var burger1=document.querySelector(".emails");
    var em=document.querySelector(".email");
    var email=document.forms['myforms']['email'].value;

    if(email.length<16 ||email.length>35)
    {
     burger1.style.border='2px solid red';
     em.style.display='flex';
    }
    else
    if(email.length>20 && email.match(/[0-9]/))
    {
        burger1.style.border='2px solid green';
        em.style.display='none';
    }
  };
/*PASSW ORD VALIDATION STARTS HERE */
function password_validation()
{
    var letter=document.getElementById('letter');
    var capital=document.getElementById('capital');
    var number=document.getElementById('number');
    var special=document.getElementById('special');
    var password=document.forms['myforms']['password'].value;
    var cpassword=document.forms['myforms']['cpassword'].value;
    var cpass=document.querySelector('.cpassword');

    document.getElementById('ul').style.display='flex';
    if(password.match(/[A-Z]/))
    {
      capital.style.color='green';
    }
    else
    {
     capital.style.color='red';
    }
    
   if(password.match(/[0-9]/))
   {
     number.style.color='green';
   }
   else
   {
    number.style.color='red';
   }

   if(password.match(/[!\@\#\$\%\^\&\*\(\)\{\}\<\>\?\"\:\,\.\~\+\=\-]/))
   {
     special.style.color='green';
   }
   else
   {
    special.style.color='red';
    rel=false;
   }

   if(password.length<5 || password.length>20)
   {
    letter.style.color='red';
   }
   else
   if(password.length>5 || password.length<20 && letter.match(/[a-z]/))
   {
    letter.style.color='green';
   }

  //  if(password.length>5 && password.length<20 && letter.match(/[a-z]/) && password.match(/[!\@\#\$\%\^\&\*\(\)\{\}\<\>\?\"\:\,\.\~\+\=\-]/) && password.match(/[0-9]/) && password.match(/[A-Z]/))
  //  {
  //   document.getElementById('ul').style.display='none';
  //  }
  //  else
  //  {
  //   document.getElementById('ul').style.display='flex';
  //  }
  };
  function cpassword_validation()
  {
//confirm password validation
    var password=document.forms['myforms']['password'].value;
    var cpassword=document.forms['myforms']['cpassword'].value;
    var cpass=document.querySelector('.cpassword');
    if(password!=cpassword)
    {
    cpass.style.display='flex';
    cpass.style.color='red';
    }
    else
    {
     cpass.style.display='none';
    }
};
function show()
{
  var pass=document.getElementById("password");
  if(pass.type==="password")
  {
    pass.type="text";
  }
  else
  {
    pass.type="password";
  }
};