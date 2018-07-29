//start of ajax code here

	var xmlhttp;
	function addNote(pid,text)
	{
		xmlhttp = GetXmlHttpObject();
		if (xmlhttp==null)
		  {
		  	alert ("Your browser does not support AJAX!");
		  	return;
		  }
		 var text = document.getElementById(pid).value;
			var url='order_note.php';
			url=url+"?pid="+pid+"&txt_note="+text;
			//alert(url);
			url=url+"&sid="+Math.random();
			xmlhttp.onreadystatechange=stateChanged;
			//alert(url);
			xmlhttp.open("post",url,true);
			xmlhttp.send(null);
			//alert("success");	
	}

	function stateChanged()
	{
	if (xmlhttp.readyState==4)
	  {
	  	document.getElementById("searchResult").innerHTML=xmlhttp.responseText;
	  }
	}

	function GetXmlHttpObject()
	{
		if (window.XMLHttpRequest)
		  {
		  	// code for IE7+, Firefox, Chrome, Opera, Safari
		  	return new XMLHttpRequest();
		  }
		  
		if (window.ActiveXObject)
		  {
		  	// code for IE6, IE5
		  	return new ActiveXObject("Microsoft.XMLHTTP");
		  }
		  
		return null;
	}
	
	//end of ajax code here
	
	
