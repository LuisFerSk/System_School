<section class="content clearfix">
  <div class="row">
    <?php
    $found = true;
    if (isset($_SESSION["user_id"])) :
      $user = UserData::getById($_SESSION["user_id"]);
      if ($user->kind == 1) :
    ?>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo count(EstudiantesData::getAll()); ?></h3>
              <p>Estudiantes</p>
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
            <a href="./?view=profesores&opt=all" class="small-box-footer">Ver mas <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo count(ProgramaData::getAll()); ?></h3>
              <p>Programas</p>
            </div>
            <a href="./?view=programa&opt=all" class="small-box-footer">Ver mas <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo count(CursosData::getall()); ?></h3>
              <p>Grupos</p>
            </div>
            <a href="./?view=grupo&opt=all" class="small-box-footer">Ver mas <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo count(FacultadData::getAll()); ?></h3>
              <p>Facultades</p>
            </div>
            <a href="./?view=facultad&opt=all" class="small-box-footer">Ver mas <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-orange">
            <div class="inner">
              <h3><?php echo count(AsignaturaData::getAll()); ?></h3>
              <p>Asignaturas</p>
            </div>
            <a href="./?view=asignatura&opt=all" class="small-box-footer">Ver mas <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      <?php endif;
    endif;
    if (isset($_SESSION["user_id"])) :
      if ($user->kind == 0) :
      ?>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo count(CursosData::getall()); ?></h3>
              <p>Grupos</p>
            </div>
            <a href="./?view=asis" class="small-box-footer">Ver mas <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

        <!-- ./col -->
    <?php endif;
    endif; ?>
  </div>
</section>