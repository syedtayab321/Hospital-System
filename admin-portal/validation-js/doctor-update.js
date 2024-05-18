function name_validation()
{
    var patname=document.forms['myforms']['doctorname'].value;
    var text1=document.querySelector('.username');
    var text2=document.querySelector('.username1');
    if(patname.length<7 || patname.length>25)
    {
        text1.style.display='flex';
        text1.style.color='red';
    }
    else
    {
        text1.style.display='none';
    }

    if(patname.match(/[0-9]/))
    {
        text1.style.display='none';
        text2.style.display='flex';
        text2.style.color='red';
    }
    else
    {
        text2.style.display='none';
    }
};


function mobile_validation()
{
    var patname=document.forms['myforms']['mobile'].value;
    var text1=document.querySelector('.text');
    var text2=document.querySelector('.text2');
    if(patname.length<11 || patname.length>14)
    {
        text1.style.display='flex';
        text1.style.color='red';
    }
    else
    {
        text1.style.display='none';
    }

    if(patname.match(/[A-Z]/) || patname.match(/[a-z]/) || patname.match(/[!\@\$\%\^\&\*\(\)\{\}\[\]\"\:\;\'\<\>\.\,\?\/\~\`]/))
    {
        text1.style.display='none';
        text2.style.display='flex';
        text2.style.color='red';
    }
    else
    {
        text2.style.display='none';
    }
};