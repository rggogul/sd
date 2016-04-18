// Common form validator file..

var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;   // For email validation..
var regexObj = /^\(?([0-9]{3,5})\)?[-. ]?([0-9]{6,8})$/;  // For phone number validation
var regexMobObj = /^\(?([7-9]{1})\)?([0-9]{9})$/;  // For mobile number validation

var error_img = "<img src='/cococo/images/error.jpg' width='11' height='11'>";
var error_color = "red";
var success_img = "<img src='/cococo/images/done.png' width='11' height='11'>";

var select_box_err_msg = "please select an option";
var text_box_err_msg = "should not be empty";
var invalid_email_msg = "email is not valid";
var range_error_msg = "range is not valid";
var numeric_error_msg = "allowed numbers only";
var invalid_phone_msg = "phone number is not valid";
var invalid_mob_msg = "mobile number is not valid";
var radio_button_msg = "choose any one";
var chk_box_err_msg = "please check anyone atleast.";
var exp_date_msg = "Date has expired.!";
var academic_quarter_msg = "Quarter Date is not within range.!";
var academic_year_msg = "Academic Year range is invalid.!";

//var success_color = "{'color' : 'black'}";
//var error_color = "{'color' : 'red'}";

function isEmpty(id)
{
	if(document.getElementById(id).value == "")
	{
		alert("Field cannot be empty");
	    document.getElementById(id).focus();
		return true;  // indicating error.
	}
	else
	{
		return false;  // indicating no errors.
	}
}

function checkSelected(id)
{
	if(document.getElementById(id).value == "")
	{
		alert("Please select option");
	    document.getElementById(id).focus();
		return true;  // indicating error.
	}
	else
	{
		return false;  // indicating no errors.
	}
}

function hightlightNoneSelected(id)
{
	if(document.getElementById(id).value == "")
	{
		document.getElementById(id).style.borderColor = error_color;
		return true;  // indicating error.
	}
	else
	{
		document.getElementById(id).style.borderColor = "black";
		return false;  // indicating no errors.
	}
}

function isValidEmail(id)
{
	if(!isEmpty(id))
	{
		if(!(reg.test(document.getElementById(id).value)))
		{
			$("#err_"+id).html(error_img);
			$("#msg_"+id).html(invalid_email_msg);
			document.getElementById("msg_"+id).style.color = error_color;
			document.getElementById(id).focus();
			return true;
		}
		else
		{
			$("#err_"+id).html(success_img);
			$("#msg_"+id).html("");
			return false;
		}
	}
	else
	{
		return true;
	}
}

function isValidPhoneNumber(id)
{
	if(!isEmpty(id))
	{
		var phone_num = document.getElementById(id).value;

		if(!regexObj.test(phone_num))
		{
			$("#err_"+id).html(error_img);
			$("#msg_"+id).html(invalid_phone_msg);
			document.getElementById("msg_"+id).style.color = error_color;
			document.getElementById(id).focus();
			return true;  // indicating error.
		}
		else
		{
			$("#err_"+id).html(success_img);
			$("#msg_"+id).html("");
			return false; 
		}
	}
	else
	{
		return true;
	}
}

function isValidMobileNumber(id)
{
	if(!isEmpty(id))
	{
		var mob_num = document.getElementById(id).value;

		if(!regexMobObj.test(mob_num))
		{
			$("#err_"+id).html(error_img);
			$("#msg_"+id).html(invalid_mob_msg);
			document.getElementById("msg_"+id).style.color = error_color;
			document.getElementById(id).focus();
			return true;  // indicating error.
		}
		else
		{
			$("#err_"+id).html(success_img);
			$("#msg_"+id).html("");
			return false; 
		}
	}
	else
	{
		return true;
	}
}

function rangeComparison(id, val1, val2)
{
	var v1 = parseInt(val1);
	var v2 = parseInt(val2);
	
	if(v1 >= v2)
	{
		$("#err_"+id).html(error_img);
		$("#msg_"+id).html(range_error_msg);
		document.getElementById("msg_"+id).style.color = error_color;
		return true;
	}
	else
	{
		$("#err_"+id).html(success_img);
		$("#msg_"+id).html("");
		return false;  // indicating no errors.
	}
}

function isNumeric(id)
{
	if(!isEmpty(id))
	{
		if(isNaN(document.getElementById(id).value))
		{
			alert("Please enter only numeric value (0-9)");
			document.getElementById(id).focus();
			return true;
		}
		else
		{
			return false;
		}
	}
	else
	{
		return true;
	}
}

function isRadioButtonChecked(id, chk_id1, chk_id2)
{
	if((document.getElementById(chk_id1).checked == false) && (document.getElementById(chk_id2).checked == false))
	{
		$("#err_"+id).html(error_img);
		$("#msg_"+id).html(radio_button_msg);
		document.getElementById("msg_"+id).style.color = error_color;
		return true;
	}
	else
	{
		$("#err_"+id).html(success_img);
		$("#msg_"+id).html("");
		return false;
	}
}

function isCheckBoxChecked(chk_bx_name)
{
	var chks = document.getElementsByName(chk_bx_name+"[]");
	var checkCount = 0;
	
	for (var i = 0; i < chks.length; i++)
	{
		if (chks[i].checked)
		{
			checkCount++;
		}
	}
	
	if (checkCount == 0)
	{
		$("#msg_"+chk_bx_name).html(chk_box_err_msg);
		document.getElementById("msg_"+chk_bx_name).style.color = error_color;
		return true;
	}
	else
	{
		return false;
	}
}

function compareValues(val1, val2)
{
	if(!isValidEmail(val2))
	{
		if(document.getElementById(val1).value == document.getElementById(val2).value)
		{
			$("#err_"+val2).html(error_img);
			$("#msg_"+val2).html("Official email id and Personal email id should not be same.");
			document.getElementById("msg_"+val2).style.color = error_color;
			return true;
		}
		else
		{
			$("#err_"+val2).html(success_img);
			$("#msg_"+val2).html("");
			return false;
		}
	}
}

function dateExpiryValidation(id)
{
	if(!isEmpty(id))
	{
		var chk_date = document.getElementById(id).value;
		var date_arr = chk_date.split("/");
		
		var sel_date = new Date();
		sel_date.setFullYear(date_arr[2],date_arr[0] - 1,date_arr[1]);
		
		var today = new Date();
		
		if (sel_date <= today)
	  	{
	 		$("#err_"+id).html(error_img);
			$("#msg_"+id).html(exp_date_msg);
			document.getElementById("msg_"+id).style.color = error_color;
			return true;
	  	}
		else
		{
			$("#err_"+id).html(success_img);
			$("#msg_"+id).html("");
			return false;
		}
	}
	else
	{
		return true;
	}
}

function compareDates(start_date_id, end_date_id, chk_date_id)
{
	if(!isEmpty(chk_date_id))
	{
		var start_date = document.getElementById(start_date_id).value;
		var end_date = document.getElementById(end_date_id).value;
		var chk_date = document.getElementById(chk_date_id).value;
		
		var start_date_arr = start_date.split("/");
		var end_date_arr = end_date.split("/");
		var chk_date_arr = chk_date.split("/");
		
		var st_date = new Date();
		var en_date = new Date();
		var ck_date = new Date();
		
		st_date.setFullYear(start_date_arr[2],start_date_arr[0] - 1,start_date_arr[1]);
		en_date.setFullYear(end_date_arr[2],end_date_arr[0] - 1,end_date_arr[1]);
		ck_date.setFullYear(chk_date_arr[2],chk_date_arr[0] - 1,chk_date_arr[1]);
		
		if (ck_date < st_date)
	  	{
	 		$("#err_"+chk_date_id).html(error_img);
			$("#msg_"+chk_date_id).html(academic_quarter_msg);
			document.getElementById("msg_"+chk_date_id).style.color = error_color;
			return true;
	  	}
		else if(ck_date > en_date)
		{
			$("#err_"+chk_date_id).html(error_img);
			$("#msg_"+chk_date_id).html(academic_quarter_msg);
			document.getElementById("msg_"+chk_date_id).style.color = error_color;
			return true;
		}
		else
		{
			$("#err_"+chk_date_id).html(success_img);
			$("#msg_"+chk_date_id).html("");
			return false;
		}
	}
	else
	{
		return true;
	}
}

function chkMonthDiff(date1, date2, id)
{
	var months;
	
	var st_date = new Date();
	var en_date = new Date();
	
	var dt1 = document.getElementById(date1).value;
	var dt2 = document.getElementById(date2).value;
	
	var st_date_arr = dt1.split("/");
	var en_date_arr = dt2.split("/");
	
	var d1 = new Date(st_date_arr[2],st_date_arr[0] - 1,st_date_arr[1]);
	var d2 = new Date(en_date_arr[2],en_date_arr[0] - 1,en_date_arr[1]);
	
    months = (d2.getFullYear() - d1.getFullYear()) * 12;
    months -= d1.getMonth() + 1;
    months += d2.getMonth();

	if(months != 9)
	{
		//$("#err_"+id).html(error_img);
		$("#msg_"+id).html(academic_year_msg);
		document.getElementById("msg_"+id).style.color = error_color;
		return true;
	}
	else
	{
		$("#err_"+id).html(success_img);
		$("#msg_"+id).html("");
		return false;
	}
}