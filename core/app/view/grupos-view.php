<div class="container">
<div class="row">
<div class="col-md-12">
    <section class="content-header">
       <?php header('Content-Type: text/html; charset= ISO-8859-1');
    date_default_timezone_set('America/Lima');
$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
 
//Salida: Viernes 24 de Febrero del 2012


    $fecha=date('g:ia');
    
include("database/cn.php");



     
?>
<br>
        <script>
            $("#CountDownTimer").TimeCircles({ time: { Days: { show: false }, Hours: { show: false } }});
            var updateTime = function(){
                var date = $("#date").val();
                var time = $("#time").val();
                var datetime = date + ' ' + time + ':00';
            }

        </script>

      <ol class="breadcrumb">
        <li><i class="fa fa-calendar"></i> <?php echo $dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " ".date('Y')?></li>
        <li><i class="fa fa-clock-o"></i><?php echo " Hora: ".$fecha;?></li>
        <li class="active">hora 60 minutos</li>
        <!-- <div id="CountDownTimer" data-timer="3600" style="width: 200px; height: 250px;"></div>-->
      </ol>
</section>
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h4 class="box-title"><h2>al examen de conocimiento de variedades</h2></h4>
        </div>
        <div class="box-body">
      
<?php
$mysqli = new mysqli("localhost", "root", "", "db_holyschools");

/* comprobar la conexión */
if (mysqli_connect_errno()) {
    printf("Falló la conexión: %s\n", mysqli_connect_error());
    exit();
}
$db=mysqli_select_db($conexion,"cursos");
$consulta = "SELECT  curso FROM ". $db." ORDER by id_curso DESC LIMIT 50,5";

if ($resultado = $mysqli->query($consulta)) {

    /* obtener el array de objetos */
    while ($fila = $resultado->fetch_row()) {
        printf ("%s (%s)\n", $fila[0], $fila[1]);
    }

    /* liberar el conjunto de resultados */
    $resultado->close();
}

/* cerrar la conexión */
$mysqli->close();
?>
      </div>
        <!-- /.box-body -->
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    </div>
    </div>
    </div>