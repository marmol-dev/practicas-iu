<?php
    require_once './horarios.php';
    //asignaturas
    //lunes
    $iu2 = array('IU_2', 9, 0, 11, 0);
    $cd = array('CD', 11, 0, 12, 30);

    //martes
    $bdii = array('BDII', 11, 0, 12, 30);
    $cd2 = array('CD_2', 12, 30, 14, 30);

    //miercoles
    $lc = array('LC', 11, 0, 12, 30);
    $bdii2 = array('BDII_2', 12, 30, 14, 30);

    //jueves
    $rcii2 = array('RCII_2', 9, 0, 11, 0);
    $rcii = array('RCII', 11, 0, 12, 30);

    //viernes
    $lc2 = array('LC_2', 9, 0, 11, 0);
    $iu = array('IU', 11, 0, 12, 30);

    //dias
    $lunes = array($iu2, $cd);
    $martes = array($bdii, $cd2);
    $miercoles = array($lc, $bdii2);
    $jueves = array($rcii2, $rcii);
    $viernes = array($lc2, $iu);
    $sabado = array();
    $domingo = array();
    $dias = array($lunes, $martes, $miercoles, $jueves, $viernes, $sabado, $domingo);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Tablas en HTML</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
</head>

<body>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Hora</th>
                <th>Lunes</th>
                <th>Martes</th>
                <th>Miércoles</th>
                <th>Jueves</th>
                <th>Viernes</th>
                <th>Sábado</th>
                <th>Domingo</th>
            </tr>
        </thead>
        <tbody>
            <?php printTablaTiempo($dias, 30); ?>
        </tbody>
    </table>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>

</html>
