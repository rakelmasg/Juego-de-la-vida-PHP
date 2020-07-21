<?php

include('Bicho.php');

class Tablero {

    public $tablero;
    static $NUEVE = 9;

    public function __construct() {
        $this->tablero = array();
    }

    public function iniciar() {
        for ($fila = 0; $fila < 10; $fila++) {
            for ($columna = 0; $columna < 10; $columna++) {
                $aleatorio = rand(0, 1);
                if ($aleatorio == 0) {
                    $estado = false;
                } else {
                    $estado = true;
                }
                $this->tablero[$fila][$columna] = new Bicho($estado);
            }
        }
    }

    public function mostrarTablero() {
        for ($fila = 0; $fila < 10; $fila++) {
            for ($columna = 0; $columna < 10; $columna++) {
                if ($this->tablero[$fila][$columna]->getIsViva() == false) {
                    echo' ☻ ';
                } else {
                    echo' ☺ ';
                }
            }
            echo '<br/>';
        }
        echo '<br/>';
    }

    public function contarVecinos($fila, $col) {
        $nVecinos = 0;

        $fmin = $this->fila_min($fila);
        $fmax = $this->fila_max($fila);
        $cmin = $this->col_min($col);
        $cmax = $this->col_max($col);

        for ($i = $fmin; $i <= $fmax; $i++) {
            for ($j = $cmin; $j <= $cmax; $j++) {
                if (!($i == $fila && $j == $col)) {

                    if ($this->tablero[$i][$j]->getIsViva() == true) {
                        $nVecinos++;
                    }
                }
            }
        }
        return $nVecinos;
    }

    private function fila_min($f) {
        if ($f == 0)
            return $f;
        else
            return $f - 1;
    }

    private function fila_max($f) {
        if ($f == Tablero::$NUEVE)
            return $f;
        else
            return $f + 1;
    }

    private function col_min($f) {
        if ($f == 0)
            return $f;
        else
            return $f - 1;
    }

    private function col_max($f) {
        if ($f == Tablero::$NUEVE)
            return $f;
        else
            return $f + 1;
    }

    public function evolucionar() {
        $tablero_array_nuevo = array();
        for ($fila = 0; $fila < 10; $fila++) {
            for ($columna = 0; $columna < 10; $columna++) {
                $amigos = $this->contarVecinos($fila, $columna);

                if ($this->tablero[$fila][$columna]->getIsViva() == false) {
                    if ($amigos == 3) {
                        $tablero_array_nuevo[$fila][$columna] = new Bicho(true);
                    } else {
                        $tablero_array_nuevo[$fila][$columna] = new Bicho(false);
                    }
                } else {
                    if ($amigos != 2 && $amigos != 3) {
                        $tablero_array_nuevo[$fila][$columna] = new Bicho(false);
                    } else {
                        $tablero_array_nuevo[$fila][$columna] = new Bicho(true);
                    }
                }
            }
        }
        $this->tablero = $tablero_array_nuevo;
    }

}

?>
