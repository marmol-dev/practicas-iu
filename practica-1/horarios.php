<?php

function randomColor(){
    $rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
    $color = '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];
    return $color;
}

function getTiempoFormateado($hora, $minuto){
    $horaFormateada = $hora < 10 ? '0' . $hora : '' . $hora;
    $minutoFormateado = $minuto < 10 ? '0' . $minuto : '' . $minuto;

    return $horaFormateada . ':' . $minutoFormateado;
}

function getSiguienteHora($hora, $minuto, $intervalo){
    $horasIntervalo = floor($intervalo / 60);
    $minutosIntervalo = $intervalo % 60;

    if ($minutosIntervalo + $minuto >= 60){
        $minutoResultado = ($minuto + $minutosIntervalo) - 60;
        $hora ++;
    } else {
        $minutoResultado = $minuto + $minutosIntervalo;
    }

    $horaResultado = $hora + $horasIntervalo;

    return getTiempoFormateado($horaResultado, $minutoResultado);
}

function estaDentroDeRango($horaInicio, $minutoInicio, $horaFin, $minutoFin, $horaActual, $minutoActual){
    $inicio = $horaInicio + $minutoInicio / 60;
    $fin = $horaFin + $minutoFin / 60;
    $actual = $horaActual + $minutoActual / 60;

    return $actual >= $inicio && $actual < $fin;
}

function getAsignaturaActual($dia, $horaActual, $minutoActual){
    $asignaturaActual = null;

    foreach($dia as $asignatura){
        if (estaDentroDeRango($asignatura[1], $asignatura[2], $asignatura[3], $asignatura[4], $horaActual, $minutoActual)){
            $asignaturaActual = $asignatura;
            break;
        }
    }

    return $asignaturaActual;
}

function getVecesIntervaloEnRango($horaInicio, $minutoInicio, $horaFin, $minutoFin, $intervalo){
    $inicio = $horaInicio + $minutoInicio / 60;
    $fin = $horaFin + $minutoFin / 60;
    $rango = $fin - $inicio;
    return $rango / ($intervalo / 60);
}

/**
 * Dibuja una tabla (filas y columnas) con un horario recibido como parámetro
 * @param array de array de asignatura
 * @param el intervalo del horario
 * @return string
 */
function printTablaTiempo($dias, $intervalo){
    $horaComienzo = 9;
    $horaFin = 15;
    $asignaturaActual = null;

    for ($hora = $horaComienzo; $hora < $horaFin; $hora++ ){
        for ($minuto = 0; $minuto < 60; $minuto += 30){
            echo '<tr>';
            echo '<td>' . getTiempoFormateado($hora, $minuto) . ' - ' . getSiguienteHora($hora, $minuto, 30) . '</td>';
            foreach($dias as $dia){
                $asignaturaActual = getAsignaturaActual($dia, $hora, $minuto);


                if($asignaturaActual != null){
                    $color = count($asignaturaActual) >= 6 ? $asignaturaActual[5] : randomColor();
                    if ($asignaturaActual[1] == $hora && $asignaturaActual[2] == $minuto){
                        echo '<td style="background-color: '. $color .';" rowspan="'. getVecesIntervaloEnRango($asignaturaActual[1], $asignaturaActual[2], $asignaturaActual[3], $asignaturaActual[4], $intervalo) .'">';
                            echo $asignaturaActual[0];
                        echo '</td>';
                    }
                } else {
                    echo '<td></td>';
                }

            }
            echo '</tr>';
        }
    }
}

?>
