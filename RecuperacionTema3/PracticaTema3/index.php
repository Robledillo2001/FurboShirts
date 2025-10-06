<?php
    session_start();
    if(!isset($_SESSION['prestamos'])){
        $_SESSION['prestamos']=[];
    }
?>

<html>
    <head>
        <title>Calculadora de Prestamos</title>
    </head>
    <body>
        <form method="post">
            <label for="">Capital:(€) </label>
            <input type="text" name="capital"><br>
            <label for="">Interes Anual:(%) </label>
            <input type="text" name="interes"><br>
            <label for="">Amortizacion: </label>
            <input type="text" name="amortizacion"><br>
            <label for="">Interes Posterior:(%) </label>
            <input type="text" name="pos"><br>
            <select name="tipo">
                <option value="personal">Personal</option>
                <option value="hipotecario">Hipotecario</option>
            </select>
            <button type="submit" name="Calcular">Calcular Prestamo</button>
            <button type="submit" name="comparar">Comparar Prestamos</button>
        </form>
    <?php
        
        require_once "clases.php";

        if(isset($_POST['capital'],$_POST['interes'],$_POST['amortizacion'],$_POST['pos'],$_POST['tipo'],$_POST['Calcular'])){
            $capital=(float)$_POST['capital'];
            $interes=(float)$_POST['interes'];
            $amortizacion=(float)$_POST['amortizacion'];
            $posterior=(float)$_POST['pos'];
            $tipo=$_POST['tipo'];
            $prestamo=null;

            if($posterior===null){
                if($tipo==="personal"){
                    $prestamo=new PrestamoPersonal($capital,$interes,$amortizacion,0);
                }elseif($tipo==="hipotecario"){
                    $prestamo=new PrestamoHipotecario($capital,$interes,$amortizacion,0);
                }
            }else{
                if($tipo==="personal"){
                    $prestamo=new PrestamoPersonal($capital,$interes,$amortizacion,$posterior);
                }elseif($tipo==="hipotecario"){
                    $prestamo=new PrestamoHipotecario($capital,$interes,$amortizacion,$posterior);
                }
            }

            $cuotaMensual=$prestamo->calcularCuotaMensual();

            $_SESSION['prestamos'][]=[
                "capital"=>$prestamo->getCapital(),
                "interes_anual"=>$prestamo->getInteresAnual(),
                "amortizacion"=>$prestamo->getAmortizacion(),
                "interes_posterior"=>$prestamo->getInteresPosterior(),
                "cuotaMensual"=>$cuotaMensual,
                "tipo_Prestamo"=>$tipo
            ];
        }

        if(isset($_POST['comparar'])){
            echo"<table border='1'>
                    <tr>
                        <th>Capital</th>
                        <th>Interes Anual</th>
                        <th>Amortizacion</th>
                        <th>Interes Posterior</th>
                        <th>Cuota Mensual</th>
                        <th>Tipo Prestamo</th>
                    </tr>";
            foreach($_SESSION['prestamos']as $prestamo){
                echo"<tr>
                        <td>".$prestamo['capital']."</td>
                        <td>".$prestamo['interes_anual']."</td>
                        <td>".$prestamo['amortizacion']."</td>
                        <td>".$prestamo['interes_anual']."</td>
                        <td>".$prestamo['cuotaMensual']."</td>
                        <td>".$prestamo['tipo_Prestamo']."</td>
                    </tr>";
            }
            echo "</table>";
        }
    ?>
    </body>
</html>