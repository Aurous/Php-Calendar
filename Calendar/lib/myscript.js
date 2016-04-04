// JavaScript Document
function valform()
{
	if(document.frm.eventtitle.value == "")
	{
		alert("Event title cannot be empty !");
		return false;
	}
	else
		return true;
}
