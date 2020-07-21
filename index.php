<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Bichos</title>
    </head>
    <body>
        <?php
        include('Tablero.php');
        $partida = new Tablero();
        $partida->iniciar();
        $partida->mostrarTablero();

        for ($contador = 0; $contador < 3; $contador++) {
            $partida->evolucionar();
            $partida->mostrarTablero();
        }
        ?>
    </body>
</html>
