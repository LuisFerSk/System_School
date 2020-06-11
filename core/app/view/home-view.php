<section class="content">
  <div class="row">
    <div class="col-md-12 ">
      <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-3">

        </div>
      </div>
    </div>
    <br>
    <div class="col-md-12 text-center">

    </div>
    <?php
    $found = true;
    if (isset($_SESSION["user_id"]) && isset($_SESSION["kind"]) == 1) {
    ?>

      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3><?php echo count(EstudiantesData::getAll()); ?></h3>

            <p>Estudiantes</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="./?view=estudiantes&opt=all" class="small-box-footer">Ver mas <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-purple">
          <div class="inner">
            <h3><?php echo count(ProfesoresData::getall()); ?></h3>

            <p>Profesores</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="./?view=profesores&opt=all" class="small-box-footer">Ver mas <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
            <h3><?php echo count(GradosData::getAll()); ?></h3>

            <p>Grados</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="./?view=grados&opt=all" class="small-box-footer">Ver mas <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3><?php echo count(CursosData::getall()); ?></h3>
            <p>Cursos</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="./?view=cursos&opt=all" class="small-box-footer">Ver mas <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
    <?php }
    if (isset($_SESSION["user_id"])) { ?>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3><?php echo count(CursosData::getall()); ?></h3>
            <p>Cursos</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="./?view=asis" class="small-box-footer">Ver mas <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->

      <!-- ./col -->
    <?php } ?>
  </div>
</section>