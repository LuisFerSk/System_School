<?php if (isset($_GET["id"])) :
    $kinds = KindData::getById($_SESSION["id"]);
    foreach ($kinds as $value) :
        if ($value->id_kind != '0') :
            $grupo_estudiante = GrupoEstudianteData::getByGrupo($_GET["id"]);
            break;
        endif;
    endforeach;
?>
    <?php if (isset($grupo_estudiante)) : ?>
        <section class="content-header">
            <h1>
                Listado de estudiantes
                <small>grupo </small>
            </h1>
            <?php foreach ($kinds as $value) :
                if ($value->id_kind == '1') : ?>
                    <br>
                    <a href="./?view=grupo&opt=new" class="btn btn-primary">Agregar estudiante</a>
            <?php break;
                endif;
            endforeach; ?>
        </section>
        <br>
        <section class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body">
                            <?php if (count($grupo_estudiante) > 0) : ?>
                                <table class="table table-bordered table-hover" id="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Identificacion</th>
                                            <th scope="col">Nombres</th>
                                            <th scope="col">Apellidos</th>
                                            <th scope="col">Operaciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($grupo_estudiante as $value) :
                                            $estudiante = UserData::getByDni($value->estudiante);
                                        ?>
                                            <tr>
                                                <td><?= $estudiante->dni; ?></td>
                                                <td><?= $estudiante->nombre; ?></td>
                                                <td><?= $estudiante->apellidos; ?></td>
                                                <td style="width: 100px;">
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Acciones <span class="caret"></span>
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <li><a href="./?view=asistencia&id_estudiante=<?= $estudiante->id; ?>&id_grupo=<?= $_GET["id"] ?>"><i class="fa fa-user"></i> Tomar asistencia</a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            <?php else : ?>
                                <div class="box-body">
                                    <p class="alert alert-warning">Aun no hay grupos registrados!</p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
<?php elseif (isset($_GET["opt"]) && $_GET["opt"] == "new") : ?>
    <section class="content-header">
        <h1>
            Registrar grupo
            <small>Digite la información</small>
        </h1>
    </section>
    <br>
    <section class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <form method="POST" action="./?action=grupo&opt=add">
                            <?php
                            $prof = UserData::getAll();
                            $asignatura = AsignaturaData::getAll();
                            ?>
                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <label>Asignatura:</label>
                                    <select id="asignatura" class="form-control">
                                        <option selected>Seleccione...</option>
                                        <?php foreach ($asignatura as $asig) : ?>
                                            <option value="<?= $asig->nombre; ?>"><?= $asig->nombre; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-7">
                                    <label for="inputState">Profesor:</label>
                                    <select id="inputState" name="profesor" class="form-control">
                                        <option selected>Seleccione....</option>
                                        <?php foreach ($prof as $pro) : ?>
                                            <option value="<?= $pro->id; ?>"><?= $pro->dni . " - " . $pro->nombre . " " . $pro->apellidos ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Numero de clases:</label>
                                    <select name="numero_clases" class="form-control">
                                        <option selected>Seleccione....</option>
                                        <?php for ($count = 1; $count <= 4; $count++) : ?>
                                            <option value="<?= $count; ?>"><?= $count; ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                                <div class=" col-lg-10">
                                    <button type="submit" class="btn btn-success">Agregar</button>
                                    <button type="button" onclick="location='./?view=cursos&opt=all'" class="btn btn-warning">Cancelar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php elseif (isset($_GET["opt"]) && $_GET["opt"] == "edit") :
    $curso = GrupoData::getById($_GET["id"]);
?>
    <section class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Editar grupo</h1>
                <br>
                <form method="POST" action="./?action=grupo&opt=upd">
                    <?php $prof = UserData::getAll(); ?>
                    <div class="form-row clearfix">
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">Nombre:</label>
                            <input type="text" name="nombre" required value="<?= $curso->nombre; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputState">Profesor:</label>
                            <select id="inputState" name="profesor" class="form-control">
                                <option selected>Seleccione....</option>
                                <?php foreach ($prof as $pro) : ?>
                                    <option value="<?php echo ($pro->id_prof); ?>"><?php echo $pro->nombres ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <input type="hidden" name="id" value="<?= $curso->id_curso; ?>">
                    </div>
                    <div class=" col-lg-10">
                        <button type="submit" class="btn btn-success">Actualizar</button>
                        <button type="button" onclick="location='./?view=cursos&opt=all'" class="btn btn-warning">Cancelar</button>
                    </div>
                </form>
    </section>
    <br>
<?php endif; ?>