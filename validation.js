var intname=0;
var intlanguage=0;
//FUNCTION TO ADD TEXT BOX ELEMENT
function addElement()
{
	intname = intname + 1;
	intlanguage = intlanguage + 1;
    var contentID = document.getElementById('content');
    var newTBDiv = document.createElement('div');
    newTBDiv.setAttribute('id','Hosp'+intname);
    newTBDiv.innerHTML = "<table><tr> <td width = '160'>Name "+intname+": </td> <td><input type='text' id='hospital_" + intname + "' placeholder = 'Name'   name='name[]'/> </td> <td width = '50'></td>   <td width = '160' >Language "+intlanguage+":</td> <td><input type='text' placeholder = 'Language' id='hospital_" + intlanguage + "'    name='language[]'/></td> <td width = '50'></td>  <td><a href='javascript:removeElement(\"" + intlanguage + "\")'><font color = 'red'>Remove</font></a></td></tr><table>";
    contentID.appendChild(newTBDiv);
}
//FUNCTION TO REMOVE TEXT BOX ELEMENT
function removeElement(id)
{
	if(intname != 0 && intlanguage != 0)
      { 
		var contentID = document.getElementById('content');
        //alert(contentID);
        contentID.removeChild(document.getElementById('Hosp'+id));
        intname = intname-1;
		intlanguage = intlanguage-1;
      }
}

var intpart=0;
var intuses=0;
//FUNCTION TO ADD TEXT BOX ELEMENT
function addElement1()
{
	intpart = intpart + 1;
	intuses = intuses + 1;
    var conID = document.getElementById('partuses');
    var newTBDiv2 = document.createElement('div');
    newTBDiv2.setAttribute('id','Hosp1'+intpart);
    newTBDiv2.innerHTML = "<table><tr> <td width = '160'></td> <td width = '167'><input type='text' id='hospital_" + intpart + "' placeholder = 'Part'   name='part[]'/> </td> <td width = '50'></td> <td><textarea rows = '4' cols = '70' placeholder = 'Uses' id='hospital_" + intuses + "' name='uset[]'></textarea></td> <td><a href='javascript:removeElement1(\"" + intuses + "\")'><font color = 'red'>Remove</font></a></td></tr><table>";
    conID.appendChild(newTBDiv2);
}
//FUNCTION TO REMOVE TEXT BOX ELEMENT
function removeElement1(id)
{
	if(intpart != 0 && intuses != 0)
      { 
		var conID = document.getElementById('partuses');
        //alert(conID);
        conID.removeChild(document.getElementById('Hosp1'+id));
        intpart = intpart-1;
		intuses = intuses-1;
      }
}

var photo = 0;
function addElement2()
{
	photo = photo + 1;
    var conID3 = document.getElementById('image3');
    var newTBDiv3 = document.createElement('div');
    newTBDiv3.setAttribute('id','Hosp3'+photo);
    newTBDiv3.innerHTML = "<input type='file' id='hospital_" + photo + "' name='photo[]' id = 'fileToUpload' accept = 'image/*'/><a href='javascript:removeElement2(\"" + photo + "\")'><font color = 'red'>Remove</font></a>";
    conID3.appendChild(newTBDiv3);
}
//FUNCTION TO REMOVE TEXT BOX ELEMENT
function removeElement2(id)
{
	if(photo != 0)
      { 
		var conID = document.getElementById('image3');
        conID.removeChild(document.getElementById('Hosp3'+id));
        photo = photo-1;
      }
}


var photo = 0;
function addElement2()
{
	photo = photo + 1;
    var conID3 = document.getElementById('image3');
    var newTBDiv3 = document.createElement('div');
    newTBDiv3.setAttribute('id','Hosp3'+photo);
    newTBDiv3.innerHTML = "<input type='file' id='hospital_" + photo + "' name='photo[]' id = 'fileToUpload' accept = 'image/*'/><a href='javascript:removeElement2(\"" + photo + "\")'><font color = 'red'>Remove</font></a>";
    conID3.appendChild(newTBDiv3);
}
//FUNCTION TO REMOVE TEXT BOX ELEMENT
function removeElement2(id)
{
	if(photo != 0)
      { 
		var conID = document.getElementById('image3');
        conID.removeChild(document.getElementById('Hosp3'+id));
        photo = photo-1;
      }
}

var name = 0;
var article = 0;
var author = 0;
var publication = 0;
var vol = 0;
var year = 0;
var publisher = 0;
var coment = 0;
function addElement3()
{
	name = name + 1;	
	article = article + 1;			
	author = author + 1;			
	publication = publication + 1;	
	vol = vol + 1;					
	year = year + 1;				
	publisher = publisher + 1;		
	coment = coment + 1;			
	
    var conID4 = document.getElementById('reference');
    var newTBDiv4 = document.createElement('div');
    newTBDiv4.setAttribute('id','Hosp4'+name);
    newTBDiv4.innerHTML = " <table border><tr><td><input type = 'text'  name = 'rname[]' id='hospital_" + name + "' placeholder = 'Name of Book'></td>   <td><input type = 'text'  name = 'article[]' id='hospital_" + article + "' placeholder = 'Article'></td>    <td><input type = 'text'  name = 'author[]' id='hospital_" + author + "' placeholder = 'Author'></td>	  <td><input type = 'text'  name = 'publication[]' id='hospital_" + publication + "' placeholder = 'PLace of Publication'></td>  <td><input type = 'text'  name = 'vol[]' id='hospital_" + vol + "' placeholder = 'Volume/Issue'></td>	 <td><input type = 'text'  name = 'year[]' id='hospital_" + year + "' placeholder = 'Year'></td>	<td><input type = 'text'  name = 'publisher[]' id='hospital_" + publisher + "' placeholder = 'Publisher'></td>	<td><input type = 'text'  name = 'coment[]' id='hospital_" + coment + "' placeholder = 'Comment'></td> <td><a href='javascript:removeElement3(\"" + name + "\")'><font color = 'red'>Remove</font></a></td></tr></table>";
    conID4.appendChild(newTBDiv4);
}
//FUNCTION TO REMOVE TEXT BOX ELEMENT
function removeElement3(id)
{
	if(name != 0)
      { 
		var conID = document.getElementById('reference');
        conID.removeChild(document.getElementById('Hosp4'+id));
        name = name - 1;	
		article = article - 1;			
		author = author - 1;			
		publication = publication - 1;	
		vol = vol - 1;					
		year = year - 1;				
		publisher = publisher - 1;		
		coment = coment - 1;			
      }
}


var oname=0;
var district=0;
var locality=0;
var state=0;
var latitude=0;
var longitude=0;
var bname=0;
var population=0;
var organ=0;
//FUNCTION TO ADD TEXT BOX ELEMENT
function organisation()
{
	oname = oname + 1;
	district = district + 1;
	locality = locality + 1;
	state = state + 1;
	latitude = latitude + 1;
	longitude = longitude + 1;
	bname = bname + 1;
	population = population + 1;
	organ = organ + 1;
	
    var conID5 = document.getElementById('org');
    var newTBDiv5 = document.createElement('div');
    newTBDiv5.setAttribute('id','Hosp5'+oname);
	//newTBDiv5.innerHTML = "<table border> <tr><td><h2>Organization "+organ+" </h2></td></tr>   <tr><td>Name</td><td><input type='text' id='hospital_" + oname + "' placeholder = 'Organisation Name' name='organisation[]'/></td><td>District</td><td><input type='text' placeholder = 'District' id='hospital_" + district + "'name='district[]'/></td></tr>  <tr><td>Locality</td><td><input type='text' id='hospital_" + locality + "' placeholder = 'Locality' name='locality[]'/></td><td>State</td><td><input type='text' id='hospital_" + state + "' placeholder = 'State' name='state[]'/></td></tr> <tr><td><h2>Map Coordinates</h2></td></tr> <tr><td>Latitude</td><td><input type='text' id='hospital_" + latitude + "' placeholder = 'Latitude' name='latitude[]'/></td><td>Longitude</td><td><input type='text' id='hospital_" + longitude + "' placeholder = 'Longitude' name='longitude[]'/></td></tr><tr><td><a href='javascript:removeorganisation(\"" + oname + "\")'><font color = 'red'>Remove</font></a></td></tr><tr><td><a href= 'javascript:blocka();'>Add Block</a></td></tr></table> <br> <table border> <tr><td><div id='blockp'></div></td></tr></table>";
    newTBDiv5.innerHTML = "<table border> <tr><td><h2>Organisation"+oname+"</h2></td></tr> <tr><td>Name</td><td><input type='text' id='hospital_" + oname + "' placeholder = 'Organisation Name' name='organisation[]'/></td><td>District</td><td><input type='text' placeholder = 'District' id='hospital_" + district + "'name='district[]'/></td></tr>  <tr><td>Locality</td><td><input type='text' id='hospital_" + locality + "' placeholder = 'Locality' name='locality[]'/></td><td>State</td><td><input type='text' id='hospital_" + state + "' placeholder = 'State' name='state[]'/></td></tr> <tr><td><h2>Map Coordinates</h2></td></tr> <tr><td>Latitude</td><td><input type='text' value=0 id='hospital_" + latitude + "' placeholder = 'Latitude' name='latitude[]'/></td><td>Longitude</td><td><input type='text' value=0 id='hospital_" + longitude + "' placeholder = 'Longitude' name='longitude[]'/></td></tr><tr><td><a href='javascript:removeorganisation(\"" + oname + "\")'><font color = 'red'>Remove</font></a></td></tr></table>";
    conID5.appendChild(newTBDiv5);
	
}
//FUNCTION TO REMOVE TEXT BOX ELEMENT
function removeorganisation(id)
{
	if(oname != 0)
      { 
		var conID = document.getElementById('org');
        //alert(conID);
        conID.removeChild(document.getElementById('Hosp5'+id));
        
		oname = oname - 1;
		district = district - 1;
		locality = locality - 1;
		state = state - 1;
		latitude = latitude - 1;
		longitude = longitude - 1;
		bname = bname - 1;
		population = population - 1;
		organ = organ - 1;
      }
}

var blname=0;
var bpopulation=0;
var inst=0;
//FUNCTION TO ADD TEXT BOX ELEMENT
function blocka()
{
	blname = blname + 1;
	bpopulation = bpopulation + 1;
	inst = inst + 1;
	
    var conID6 = document.getElementById('blockp');
    var newTBDiv6 = document.createElement('div');
    newTBDiv6.setAttribute('id','Hosp6'+blname);
    newTBDiv6.innerHTML = "<table> <tr> <td><input type='text' id='hospital_" + inst + "' placeholder = 'Organization Name' name='iname[]'/></td> <td><input type='text' id='hospital_" + blname + "' placeholder = 'Block Name' name='blname[]'/> </td> <td><input type='text' placeholder = 'Population' id='hospital_" + bpopulation + "' name='bpopulation[]'/></td> <td><a href='javascript:removeblocka(\"" + blname + "\")'><font color = 'red'>Remove</font></a></td></tr><table>";
    conID6.appendChild(newTBDiv6);
}
//FUNCTION TO REMOVE TEXT BOX ELEMENT
function removeblocka(id)
{
	if(blname != 0)
      { 
		var conID = document.getElementById('blockp');
        //alert(conID);
        conID.removeChild(document.getElementById('Hosp6'+id));
        
		blname = blname - 1;
		bpopulation = bpopulation - 1;
		inst = inst - 1;
      }
}




function numeric() 
{
    var x, text;
    x = document.getElementById("number").value;
    if (isNaN(x)) 
	{
        document.getElementById("number").style.backgroundColor = "#ffcccc"; 
		document.getElementById("number").value = ""; 
    }
	else if(x < 1)
	{
		document.getElementById("number").style.backgroundColor = "#ffcccc"; 
		document.getElementById("number").value = ""; 
	}
	else 
	{
        document.getElementById("number").style.backgroundColor = "#ccffcc";  
    }
}
