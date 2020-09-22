var n1=document.getElementById('pas');
var n2=document.getElementById('cpas');
function validate()
{
	if(n1.value != n2.value)
	{
		alert("password is wrong in confirm box");
		return false;
	}
	else
	{
		return true;
	}
}