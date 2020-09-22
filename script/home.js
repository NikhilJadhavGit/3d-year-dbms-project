window.onscroll=function(){hidehead()};
function hidehead()
{
	if(document.body.scrollTop > 80 || document.documentElement.scrollTop > 80)
	{

		document.getElementById('heade').style.height="0px";
		var nav=document.getElementById('navi');
		nav.style.position="fixed";
		nav.style.top="0px";
		nav.style.right="0px";
		nav.style.width="100%";
		nav.style.height="50px";

	}
	else
	{
		document.getElementById('heade').style.height="600px";
		var nav=document.getElementById('navi');
		nav.style.position="static";
		nav.style.width="100%";
		nav.style.height="100px";
	}
}