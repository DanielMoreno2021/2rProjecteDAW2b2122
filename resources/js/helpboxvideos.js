    let video = document.getElementById("videoAyuda");
    let stops = [false,false,false,false,false,false,false,false,false,false,false,false];

    video.addEventListener("timeupdate", function(){

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
            video.controls = true;
            video.currentTime = 22;
            video.play();
        },false);
        document.getElementById("opcion2").addEventListener("click", function(){
            modalInicial.hide();
            video.controls = true;
            video.currentTime = 33;
            video.play();
        },false);
        document.getElementById("opcion3").addEventListener("click", function(){
            modalInicial.hide();
            video.controls = true;
            video.currentTime = 42;
            video.play();
        },false);
        document.getElementById("opcion4").addEventListener("click", function(){
            modalInicial.hide();
            video.controls = true;
            video.currentTime = 56;
            video.play();
        },false);

    })
