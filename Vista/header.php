<!DOCTYPE html>
<html lang="cat">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wonderful Travel</title>
    <link rel="stylesheet" href="Estils/estilos.css">
</head>
<body>
    <nav class="navbar">
        <div class="navbar-left">
                <a href="index.php?pagina=Vista">Inici</a>
                <a href="index.php?pagina=NouViatge">Crear un nou viatge</a>
                <a href="index.php?pagina=ViatgesGuardats">Viatges guardats</a>
        </div>
        <div class="navbar-center">
            <span class="fixed-title"><?php 
            $opcion = isset($_GET['pagina']) ? $_GET['pagina'] : 'Mostrar';
            switch($opcion){
                case "Vista":
                    echo "VIATGES";
                    break;
                case "NouViatge":
                    echo "NOU VIATGE";
                    break;
                case "ViatgesGuardats":
                    echo "VIATGES GUARDATS";
                    break;
                default:
                    echo "VIATGES";
                
            } ?></span>
        </div>

        <div class="reloj">
        <div class="numero" style="--n:1"><b>1</b></div>
        <div class="numero" style="--n:2"><b>2</b></div>
        <div class="numero" style="--n:3"><b>3</b></div>
        <div class="numero" style="--n:4"><b>4</b></div>
        <div class="numero" style="--n:5"><b>5</b></div>
        <div class="numero" style="--n:6"><b>6</b></div>
        <div class="numero" style="--n:7"><b>7</b></div>
        <div class="numero" style="--n:8"><b>8</b></div>
        <div class="numero" style="--n:9"><b>9</b></div>
        <div class="numero" style="--n:10"><b>10</b></div>
        <div class="numero" style="--n:11"><b>11</b></div>
        <div class="numero" style="--n:12"><b>12</b></div>
        <div class="horas" id="horas"></div>
        <div class="min" id="min"></div>
        <div class="seg" id="seg"></div>
        <div class="centro"></div>
    </div>
    <script>
        const seg = document.getElementById('seg');
        const min = document.getElementById('min');
        const hor = document.getElementById('horas');

        function relojTick(){
            const fecha = new Date();
            const segundos = fecha.getSeconds() / 60;
            const minutos = (segundos + fecha.getMinutes()) / 60;
            const horas = (minutos + fecha.getHours()) / 12;

            rotarManecillas(seg, segundos);
            rotarManecillas(min, minutos);
            rotarManecillas(hor, horas);
        }

        function rotarManecillas(element, rotation){
            element.style.setProperty('--rotate', rotation *360);
        }

        setInterval(relojTick,1000);
    </script>
    </nav>

    
</body>
</html>