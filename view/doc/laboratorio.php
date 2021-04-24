<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Laboratorio</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo URL; ?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="">Almacen</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Laboratorio</li>
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
                        <button type="button" class="btn btn-info mb-3" data-toggle="modal" data-target="#crearLab"><i class="mdi mdi-plus"></i> Agregar</button>
                    </div>
                    <hr>
                    <div class="col-12">
                        <table id="laboratorioTB" class="table display responsive nowrap table-striped" width="100%">
                            <thead class="thead-dark">
                                <tr class="bg-info">
                                    <th class="text-light">Codigo</th>
                                    <th class="text-light">Nombre Lab.</th>
                                    <th class="text-light">Dirección</th>
                                    <th class="text-light">Distrito</th>
                                    <th class="text-light">Ruc</th>
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
    REGISTRAR LABORATORIO
    ======================================================-->
    <div class="modal fade" id="crearLab" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form class="modal-content" method="POST" id="agregarLaboratorio">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Laboratorio</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pt-0">
                    <p class="mb-2 mt-4 text-center" style="font-size: 1.2em;">Los campos que contengan el * son obligatorios.</p>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group input-material">
                                <input type="text" class="form-control" id="codigo_lab" name="codigo_lab" required value="<?php echo autogenera_codigo("LAB", "laboratorio"); ?>" disabled>
                                <label for="codigo_lab">Codigo Laboratorio (AutoGenerado)</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group input-material">
                                <input type="text" class="form-control" id="nombre_lab" name="nombre_lab" required>
                                <label for="nombre_lab">Nombre Laboratorio</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group input-material">
                                <input type="text" class="form-control" id="direccion_lab" name="direccion_lab" required>
                                <label for="direccion_lab">Dirrección Laboratorio</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group input-material">
                                <input type="text" class="form-control" id="distrito_lab" name="distrito_lab" required>
                                <label for="distrito_lab">Distrito Laboratorio</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group input-material">
                                <input type="text" class="form-control" id="ruc_lab" name="ruc_lab" required>
                                <label for="ruc_lab">Ruc Laboratorio</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group input-material">
                                <input type="text" class="form-control" id="telefono_lab" name="telefono_lab">
                                <label for="telefono_lab">Telefono Laboratorio</label>
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
    ACTUALIZAR LABORATORIO
    ======================================================-->
    <div class="modal fade" id="editLab" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form class="modal-content" method="POST" id="editarLaboratorio">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Laboratorio</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pt-0">
                    <p class="mb-2 mt-4 text-center" style="font-size: 1.2em;">Los campos que contengan el * son obligatorios.</p>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group input-material">
                                <input type="text" class="form-control" id="codigo_labE" name="codigo_labE" required value="" disabled>
                                <label for="codigo_labE">Codigo Cliente (AutoGenerado)</label>
                                <input type="hidden" name="codigo" id="codigo">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group input-material">
                                <input type="text" class="form-control" id="nombre_labE" name="nombre_labE" required>
                                <label for="nombre_labE">Nombre Laboratorio</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group input-material">
                                <input type="text" class="form-control" id="direccion_labE" name="direccion_labE" required>
                                <label for="direccion_labE">Dirrección Laboratorio</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group input-material">
                                <input type="text" class="form-control" id="distrito_labE" name="distrito_labE" required>
                                <label for="distrito_labE">Distrito Laboratorio</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group input-material">
                                <input type="text" class="form-control" id="ruc_labE" name="ruc_labE" required>
                                <label for="ruc_labE">Ruc Laboratorio</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group input-material">
                                <input type="text" class="form-control" id="telefono_labE" name="telefono_labE">
                                <label for="telefono_labE">Telefono Laboratorio</label>
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