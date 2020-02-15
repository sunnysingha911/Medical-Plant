
function numeric() 
{
    var x, text;
    x = document.getElementById("number").value;
    if (isNaN(x)) 
	{
        //document.getElementById("number").style.backgroundColor = "#ffcccc"; 
		document.getElementById("number").value = ""; 
		alert("Invalid Phone No");
    }
	else if(x < 1)
	{
		//document.getElementById("number").style.backgroundColor = "#ffcccc"; 
		document.getElementById("number").value = ""; 
		alert("Invalid Phone No");
	}
	else 
	{
        document.getElementById("number").style.backgroundColor = "#ccffcc";  
    }
}

function validateForm() {
    var x = document.getElementById("mail").value;
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
        //document.getElementById("mail").style.backgroundColor = "#ffcccc"; 
		document.getElementById("mail").value = ""; 
		alert("Not a valid e-mail address");
		//return false;
    }
}

function valname1(){
    var TCode1 = document.getElementById('name1').value;
	
    if(!/^[a-zA-Z]+$/.test( TCode1 ) ) {
        alert('Input is not valid');
		document.getElementById("name1").value = ""; 
        return false;
    }
	
    //return true;     
}

function valname2(){
    var TCode2 = document.getElementById('name2').value;
	
    if(!/^[a-zA-Z]+$/.test( TCode2 ) ) {
        alert('Input is not valid');
		document.getElementById("name2").value = ""; 
        return false;
    }
	
    //return true;     
}