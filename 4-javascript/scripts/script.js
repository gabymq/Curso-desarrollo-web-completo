var inicio = new Date().getTime(); //funcion de alcance global
function obtenerColorAleatorio()
{
	var letters = '0123456789ABCDEF'.split('');
	var color= '#';
	for (var i = 0; i < 6; i++ ){
	color += letters[Math.round(Math.random() * 15)];
	}
	return color;
}	

function aparecerForma()

{	
	var top = Math.random()*400;
	var left = Math.random()*400;
	var width = (Math.random()*200)+100;
	
	if (Math.random()>0.5)
		{
			document.getElementById("forma").style.borderRadius = "50%";
		}
	else
		{
			document.getElementById("forma").style.borderRadius = "0%";

		}
	document.getElementById("forma").style.top = top;
	document.getElementById("forma").style.left = left;

	document.getElementById("forma").style.width = width;
	document.getElementById("forma").style.height = width;

	document.getElementById("forma").style.backgroundColor = obtenerColorAleatorio();

	document.getElementById("forma").style.display = "block";
	inicio = new Date().getTime();
}
function aparecerFormaDespuesRetraso()
{
	setTimeout(aparecerForma, Math.random()*2000);
}
aparecerFormaDespuesRetraso();
document.getElementById("forma").onclick= function ()
{
	document.getElementById("forma").style.display = "none";
	var fin = new Date().getTime();
	var diferencia = (fin-inicio)/1000;
	document.getElementById("tiempoReaccion").innerHTML = diferencia + "s";
	aparecerFormaDespuesRetraso();
}