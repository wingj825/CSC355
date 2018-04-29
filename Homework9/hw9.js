var xmlHttp

function showData(id)
{
  if (id == 0)
  {
    document.getElementById("name").innerHTML="";
    document.getElementById("year").innerHTML="";
    document.getElementById("party").innerHTML="";
    return;
  }
  xmlHttp = new XMLHttpRequest();
  var url = "hw9.php";
  url = url+"?i="+id+"&sid="+Math.random();
  xmlHttp.onreadystatechange = stateChanged;
  xmlHttp.open("GET",url,true);
  xmlHttp.send(null);
}
function stateChanged()
{
  if (xmlHttp.readyState == 4)
  {	
  	document.getElementById("name").innerHTML="";
    document.getElementById("year").innerHTML="";
    document.getElementById("party").innerHTML="";

  	var xmlDoc = xmlHttp.responseXML.documentElement;
  	var presidents = xmlDoc.getElementsByTagName("President");
  	if (xmlDoc.childNodes == null || xmlDoc.childNodes.length == 0)
    {
        document.getElementById("name").innerHTML="No match";
    }
    else if (xmlDoc.getElementsByTagName("error") != null
            && xmlDoc.getElementsByTagName("error").length != 0)
    {
        alert(xmlDoc.getElementsByTagName("error")[0].firstChild.nodeValue);
    }
    else
    {
    	for(i=0; i < presidents.length; i++)
    	{
  			document.getElementById("name").innerHTML +=
    		presidents[i].getElementsByTagName("Name")[0].firstChild.nodeValue;
    		document.getElementById("year").innerHTML +=
    		presidents[i].getElementsByTagName("Year")[0].firstChild.nodeValue;            
    		document.getElementById("party").innerHTML +=  
    		presidents[i].getElementsByTagName("Party")[0].firstChild.nodeValue; 
    	}           
    }  
   }
}