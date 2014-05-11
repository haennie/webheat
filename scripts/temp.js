var adjust_temp_to;

function adjust_temp(op) {
	
	clearTimeout(adjust_temp_to);
	
	var temp = document.getElementById("temp").innerHTML;
	var wrapper_temp = document.getElementById("wrapper_temp").innerHTML;
	temp = parseFloat(temp);
	if (op == '+')
		temp += 0.5;
	else
		temp -= 0.5;

	document.getElementById("wrapper_temp").style.visibility = "hidden";
	document.getElementById("temp").innerHTML = temp + "&deg;C";
	document.getElementById("temp").style.visibility = "visible";
	
	adjust_temp_to = setTimeout(function() {
		ajax_request("set_temp",{"temp":temp},function(response){
			document.getElementById("temp").innerHTML = response + "&deg;C";
			document.getElementById("wrapper_temp").style.visibility = "visible";
		});
	}, 3000);
	

}

function ajax_request(func, params, callback) {
	var req = new XMLHttpRequest();
	req.open("POST", "../webheat/api/webheat_api.php");
	req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	req.onreadystatechange = function() {
		if (req.readyState == 4 && req.status == 200) {
			var return_value = req.responseText;
			callback(return_value);
		}
	}
	var query = "function=" + func;
	for (var index in params) {
		query += "&" + index + "=" + params[index];
	} 

	req.send(query);
}

