<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Clientes</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo URL; ?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="">Sistema</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Clientes</li>
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
                        <button type="button" class="btn btn-info mb-3" data-toggle="modal" data-target="#crearCli"><i class="mdi mdi-plus"></i> Agregar</button>
                    </div>
                    <hr>
                    <div class="col-12">
                        <table id="clienteTB" class="table display responsive nowrap table-striped" width="100%">
                            <thead class="thead-dark">
                                <tr class="bg-info">
                                    <th class="text-light">Codigo</th>
                                    <th class="text-light">Nombre Cliente</th>
                                    <th class="text-light">Dirección</th>
                                    <th class="text-light">Distrito</th>
                                    <th class="text-light">Ruc</th>
                                    <th class="text-light">Telefono</th>
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
    REGISTRAR CLIENTE
    ======================================================-->
    <div class="modal fade" id="crearCli" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form class="modal-content" method="POST" id="agregarCliente">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Cliente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pt-0">
                    <p class="mb-2 mt-4 text-center" style="font-size: 1.2em;">Agrega a tus Clientes</p>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group input-material">
                                <input type="text" class="form-control" id="codigo_cli" name="codigo_cli" required value="<?php echo autogenera_codigo("CLI", "clientes"); ?>" disabled>
                                <label for="codigo_cli">Codigo Cliente (AutoGenerado)</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group input-material">
                                <input type="text" class="form-control" id="nombre_cli" name="nombre_cli" required>
                                <label for="nombre_cli">Nombre y Apellidos</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group input-material">
                                <input type="text" class="form-control" id="direccion_cli" name="direccion_cli" required>
                                <label for="direccion_cli">Dirrección</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group input-material">
                                <input type="text" class="form-control" id="distrito_cli" name="distrito_cli" required>
                                <label for="distrito_cli">Distrito</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group input-material">
                                <input type="text" class="form-control" id="ruc_cli" name="ruc_cli" required>
                                <label for="ruc_cli">Ruc</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group input-material">
                                <input type="text" class="form-control" id="telefono_cli" name="telefono_cli" required>
                                <label for="telefono_cli">Telefono</label>
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
    ACTUALIZAR CLIENTE
    ======================================================-->
    <div class="modal fade" id="editCli" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form class="modal-content" method="POST" id="editarCliente">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Cliente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pt-0">
                    <p class="mb-2 mt-4 text-center" style="font-size: 1.2em;">Edita a tus Clientes</p>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group input-material">
                                <input type="text" class="form-control" id="codigo_cliE" name="codigo_cliE" required value="" disabled>
                                <label for="codigo_cliE">Codigo Cliente (AutoGenerado)</label>
                                <input type="hidden" name="codigo" id="codigo">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group input-material">
                                <input type="text" class="form-control" id="nombre_cliE" name="nombre_cliE" required>
                                <label for="nombre_cliE">Nombre y Apellidos</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group input-material">
                                <input type="text" class="form-control" id="direccion_cliE" name="direccion_cliE" required>
                                <label for="direccion_cliE">Dirrección</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group input-material">
                                <input type="text" class="form-control" id="distrito_cliE" name="distrito_cliE" required>
                                <label for="distrito_cliE">Distrito</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group input-material">
                                <input type="text" class="form-control" id="ruc_cliE" name="ruc_cliE" required>
                                <label for="ruc_cliE">Ruc</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group input-material">
                                <input type="text" class="form-control" id="telefono_cliE" name="telefono_cliE" required>
                                <label for="telefono_cliE">Telefono</label>
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