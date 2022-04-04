    let stops = [false,false,false,false,false,false,false,false,false,false,false,false];

    function accionPlay()
{
	if(!medio.paused && !medio.ended)
	{
		medio.pause();
		play.value='\u25BA'; //\u25BA
        document.body.style.backgroundColor = '#fff';
        document.body.style.color = 'black';
	}
	else
	{
		medio.play();
		play.value='||';
        document.body.style.backgroundColor = 'black';
        document.body.style.color = 'white';
	}
}
function accionReiniciar()
{
    medio.currentTime = 0;
    medio.pause();
}
function accionRetrasar()
{
	medio.currentTime = medio.currentTime - 10;
}
function accionAdelantar()
{
    medio.currentTime = medio.currentTime + 10;
}
function accionSilenciar()
{
	medio.muted = true;
}
function accionDesSilenciar()
{
	medio.muted = false;
}

function hora(segundos) {
    var d = new Date(segundos * 1000);
    var hora = (d.getHours() == 0) ? 23 : d.getHours() - 1;
    var hora = (hora < 9) ? "0" + hora : hora;
    var minuto = (d.getMinutes() < 9) ? "0" + d.getMinutes() : d.getMinutes();
    var segundo = (d.getSeconds() < 9) ? "0" + d.getSeconds() : d.getSeconds();
    return hora + ":" + minuto + ":" + segundo;
}

function iniciar()
{

	medio=document.getElementById('medio');
	play=document.getElementById('play');
	reiniciar=document.getElementById('reiniciar');
	retrasar=document.getElementById('retrasar');
	adelantar=document.getElementById('adelantar');
	silenciar=document.getElementById('silenciar');
    dessilenciar=document.getElementById('dessilenciar');

	play.addEventListener('click', accionPlay);
	reiniciar.addEventListener('click', accionReiniciar);
	retrasar.addEventListener('click', accionRetrasar);
	adelantar.addEventListener('click', accionAdelantar);
	silenciar.addEventListener('click', accionSilenciar);
    dessilenciar.addEventListener('click', accionDesSilenciar);

    medio.addEventListener("timeupdate", function (ev) {
        document.getElementById("tiempo").innerHTML = hora(medio.currentTime);
        document.getElementById("tiempoTotal").innerHTML = hora(medio.duration);
    }, true);

    function progressLoop() {
        setInterval(function () {
            var tiempoTotal;
            progress.value = Math.round((medio.currentTime / medio.duration) * 100);
            timer.innerHTML = progress.value + " %";

            if (progress.value < 74) {
                document.getElementById("tiempo").style.color = "white";
            }
            if (progress.value >= 75) {
                document.getElementById("tiempo").style.color = "#DC3545";
            }


        });
    }
    medio.addEventListener("play", progressLoop);
}

window.addEventListener('load', iniciar, false);

    medio.addEventListener("timeupdate", function(){

        let modalInicial = new bootstrap.Modal(document.getElementById('modalInicio'), {
            keyboard: false
        });
        let modalVolver = new bootstrap.Modal(document.getElementById('modalVolver'), {
            keyboard: false
        });



    switch (true) {
        case (this.currentTime > 19 && this.currentTime < 21):

            modalInicial.toggle();
            this.pause();
            this.controls = false;

        break;

            case (this.currentTime > 30 && this.currentTime < 31):
            case (this.currentTime > 40 && this.currentTime < 41):
            case (this.currentTime > 54 && this.currentTime < 56):
            case (this.ended):
                modalVolver.toggle();
                this.pause();
                this.controls = false;

                document.getElementById("opcionSeguir").addEventListener("click", function(){
                    modalVolver.hide();
                    modalInicial.toggle();

                },false);

            break;


        default:
            break;
    }





/*
        document.getElementById("opcionVolver").addEventListener("click", function(){

            location.href='../../frontend/games.php'

        },false); */




    document.getElementById("opcion1").addEventListener("click", function(){
            modalInicial.hide();
            medio.currentTime = 22;
            MediaRecorder.play();
        },false);
        document.getElementById("opcion2").addEventListener("click", function(){
            modalInicial.hide();
            medio.currentTime = 33;
            medio.play();
        },false);
        document.getElementById("opcion3").addEventListener("click", function(){
            modalInicial.hide();
            medio.currentTime = 42;
            medio.play();
        },false);
        document.getElementById("opcion4").addEventListener("click", function(){
            modalInicial.hide();
            medio.currentTime = 56;
            medio.play();
        },false);

    })
