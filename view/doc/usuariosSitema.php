<?php

$tabla = "usuario";

$tabla2 = "tipo_area";

$respuesta = IngresoModelo::mdlListarUnUsuario($tabla, $tabla2, $_SESSION["admin"], null);

?>
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Usuarios del Sistema</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo URL; ?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="">Sistema</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Usuarios del Sistema</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <?php 
    if ($respuesta["cod_area"] == 1 && $respuesta["nombre_area"] == "GENERAL") {
    ?>

    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <button type="button" class="btn btn-info mb-3" data-toggle="modal" data-target="#crearUSU"><i class="mdi mdi-plus"></i> Agregar</button>
                    </div>
                    <hr>
                    <div class="col-12">
                        <table id="usuarioTB" class="table display responsive nowrap table-striped" width="100%">
                            <thead class="thead-dark">
                                <tr class="bg-info">
                                    <th class="text-light">Codigo</th>
                                    <th class="text-light">Usuario</th>
                                    <th class="text-light">Nombres</th>
                                    <th class="text-light">Estado</th>
                                    <th class="text-light">Rol</th>
                                    <th class="text-light">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!--=====================================================
    REGISTRAR USUARIO
======================================================-->
    <div class="modal fade" id="crearUSU" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form class="modal-content" method="POST" id="agregarUsuario">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pt-0">
                    <p class="mb-2 mt-4 text-center" style="font-size: 1.2em;">Agrega Usuarios para que puedan Ingresar al Sistema.</p>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group input-material">
                                <input type="text" class="form-control" id="codigo_usu" name="codigo_usu" required value="<?php echo autogenera_codigo("USU", "usuario"); ?>" disabled>
                                <label for="codigo_usu">Codigo Usuario (AutoGenerado)</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group input-material">
                                <input type="text" class="form-control" id="usuario" name="usuario" required>
                                <label for="usuario">Usuario</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group input-material">
                                <input type="text" class="form-control" id="nombre_usu" name="nombre_usu" required>
                                <label for="nombre_usu">Nombres</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group input-material">
                                <select name="rol_usu" id="rol_usu" class="form-control form-select">
                                    <option>--Seleccione--</option>
                                    <?php
                                        $response2 = IngresoController::ctrListarArea();
                                        foreach ($response2 as $key => $value):
                                        echo '<option value="'.$value["cod_area"].'">'.$value["nombre_area"].'</option>';
                                        endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group input-material">
                                <input type="password" class="form-control" id="passw_usu" name="passw_usu" required>
                                <label for="passw_usu">Contraseña</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group input-material">
                                <input type="password" class="form-control" id="conpass_usu" name="conpass_usu" required>
                                <label for="conpass_usu">Confirmar Contraseña</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group input-material">
                                <input type="email" class="form-control" id="correo_usu" name="correo_usu">
                                <label for="correo_usu">Correo</label>
                            </div>
                        </div>
                        <div class="col-12 mt-4">
                            <div class="form-group d-flex">
                                <label class="switch">
                                    <input type="checkbox" name="estado_usu" id="estado_usu" checked disabled>
                                    <span class="slider"></span>
                                </label>
                                <label for="estado_usu" id="estado">Habilitado</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
    <!--=====================================================
    EDITAR USUARIO
======================================================-->
    <div class="modal fade" id="editarUsu" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form class="modal-content" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pt-0">
                    <p class="mb-2 mt-4 text-center" style="font-size: 1.2em;">Edita un Usuario si deseas cambiar su contraseña, el rol, entre otros.</p>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group input-material">
                                <input type="text" class="form-control" id="codigoE" required value="" disabled>
                                <label for="codigoE">Codigo Usuario (AutoGenerado)</label>
                                <input type="hidden" name="codigo_usuE" id="codigo_usuE" value="">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group input-material">
                                <input type="text" class="form-control" id="usuarioE" name="usuarioE" required>
                                <label for="usuarioE">Usuario</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group input-material">
                                <input type="text" class="form-control" id="nombre_usuE" name="nombre_usuE" required>
                                <label for="nombre_usuE">Nombres</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group input-material">
                                <select name="rol_usuE" id="rol_usuE" class="form-control form-select">
                                    <option>--Seleccione--</option>
                                    <option value="">Nombre</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group input-material">
                                <input type="password" class="form-control" id="passw_usuE" name="passw_usuE">
                                <label for="passw_usuE">Contraseña</label>
                                <input type="hidden" name="passw_actual" value="" id="passw_actual">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group input-material">
                                <input type="password" class="form-control" id="conpass_usuE" name="conpass_usuE">
                                <label for="conpass_usuE">Confirmar Contraseña</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group input-material">
                                <input type="text" class="form-control" id="correo_usuE" name="correo_usuE">
                                <label for="correo_usuE">Correo</label>
                            </div>
                        </div>
                        <div class="col-12 mt-4">
                            <div class="form-group d-flex">
                                <label class="switch">
                                    <input type="checkbox" name="estado_usuE" id="estado_usuE" checked value="">
                                    <span class="slider"></span>
                                </label>
                                <label for="estado_usuE" id="estado" class="estadoE">Habilitado</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary modal-close" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
    <?php }else{ ?>
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="text-center warnning-vista">
                        <img src="<?php echo URL; ?>view/dist/img/warning.png" alt="warning" class="img-fluid">
                        <h2 class="mt-2">NO TIENE PERMISOS PARA VISUALIZAR ESTA PÁGINA</h2>
                        <a href="<?php echo URL; ?>" class="btn btn-info mt-2">Regresar a Dashboard</a>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

