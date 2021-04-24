<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Generico</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo URL; ?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="">Almacen</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Generico</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <button type="button" class="btn btn-info mb-3" data-toggle="modal" data-target="#crearGen"><i class="mdi mdi-plus"></i> Agregar</button>
                    </div>
                    <hr>
                    <div class="col-12">
                        <table id="genericoTB" class="table display responsive nowrap table-striped" width="100%">
                            <thead class="thead-dark">
                                <tr class="bg-info">
                                    <th class="text-light">Codigo</th>
                                    <th class="text-light">Nombre Generico</th>
                                    <th class="text-light">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $response = GenericoController::ctrListarGenerico();
                                foreach ($response as $key => $value):                    
                            ?>
                                <tr>
                                    <td><?php echo $value["cod_gen"] ?><input type="hidden" class="codigoG" name="codigoG" value="<?php echo $value["codigo"] ?>"></td>
                                    <td><?php echo $value["nom_gen"] ?></td>
                                    <td>
                                        <button type="button" class="btn btn-primary editarGen">
                                            <i class=" mdi mdi-pencil"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger text-light eliminarGen">
                                            <i class="mdi mdi-delete"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php
                            endforeach;
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--=====================================================
    REGISTRAR GENERICO
    ======================================================-->
    <div class="modal fade" id="crearGen" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form class="modal-content" method="POST" id="agregarGenerico">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Generico</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pt-0">
                    <p class="mb-2 mt-4 text-center" style="font-size: 1.2em;">Los campos que contengan el * son obligatorios.</p>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group input-material">
                                <input type="text" class="form-control" id="codigo_gen" name="codigo_gen" required value="<?php echo autogenera_codigo("GEN", "generico"); ?>" disabled>
                                <label for="codigo_gen">Codigo Generico (AutoGenerado)</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group input-material">
                                <input type="text" class="form-control" id="nombre_gen" name="nombre_gen" required>
                                <label for="nombre_gen">Nombre Generico</label>
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
    ACTUALIZAR GENERICO
    ======================================================-->
    <div class="modal fade" id="editGen" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form class="modal-content" method="POST" id="editarGenerico">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Generico</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pt-0">
                    <p class="mb-2 mt-4 text-center" style="font-size: 1.2em;">Los campos que contengan el * son obligatorios.</p>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group input-material">
                                <input type="text" class="form-control" id="codigo_genE" name="codigo_genE" required value="" disabled>
                                <label for="codigo_genE">Codigo Generico (AutoGenerado)</label>
                                <input type="hidden" name="codigo" id="codigo">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group input-material">
                                <input type="text" class="form-control" id="nombre_genE" name="nombre_genE" required>
                                <label for="nombre_genE">Nombre Generico</label>
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