<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Productos</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo URL; ?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="">Almacen</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Productos</li>
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
                        <button type="button" class="btn btn-info mb-3" data-toggle="modal" data-target="#crearPro"><i class="mdi mdi-plus"></i> Agregar</button>
                        <button type="button" class="btn btn-primary mb-3"><i class="far fa-file-pdf"></i> Pdf</button>
                        <button type="button" class="btn btn-primary mb-3"><i class="far fa-file-excel"></i> Excel</button>
                        <button type="button" class="btn btn-primary mb-3"><i class="far fa-file-word"></i> Word</button>
                        <button type="button" class="btn btn-dark mb-3"><i class="fas fa-chart-pie"></i> Grafica</button>
                    </div>
                    <hr>
                    <div class="col-12">
                        <table id="productoTB" class="table display responsive nowrap table-striped" width="100%">
                            <thead class="thead-dark">
                                <tr class="bg-info">
                                    <th class="text-light">#</th>
                                    <th class="text-light">Producto</th>
                                    <th class="text-light">Laboratorio</th>
                                    <th class="text-light">P.V.F.</th>
                                    <th class="text-light">Caja</th>
                                    <th class="text-light">Fracc</th>
                                    <th class="text-light">Codigo Barra</th>
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
    <div class="modal fade" id="crearPro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form class="modal-content" method="POST" id="agregarProducto">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Producto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pt-0">
                    <p class="mb-2 mt-4 text-center" style="font-size: 1.2em;">Los campos que contengan el * son obligatorios.</p>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group input-material">
                                <input type="text" class="form-control" id="codigo_pro" name="codigo_pro" required value="<?php echo autogenera_codigo("PRO", "producto"); ?>" disabled>
                                <label for="codigo_pro">Codigo Producto (AutoGenerado)</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group input-material">
                                <input type="text" class="form-control" id="nombre_pro" name="nombre_pro" required>
                                <label for="nombre_pro">Nombre Producto</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group input-material">
                                <select name="laboratorio" id="laboratorio" class="form-control form-select">
                                    <option>Seleccione Laboratorio</option>
                                    <?php
                                        $response2 = IngresoController::ctrListarArea();
                                        foreach ($response2 as $key => $value):
                                        echo '<option value="'.$value["cod_area"].'">'.$value["nombre_area"].'</option>';
                                        endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group input-material">
                                <select name="generico" id="generico" class="form-control form-select">
                                    <option>Seleccione Generico</option>
                                    <?php
                                        $response2 = IngresoController::ctrListarArea();
                                        foreach ($response2 as $key => $value):
                                        echo '<option value="'.$value["cod_area"].'">'.$value["nombre_area"].'</option>';
                                        endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="form-group input-material">
                                <input type="number" class="form-control" id="factor" name="factor" required>
                                <label for="factor">Factor</label>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="form-group input-material">
                                <input type="number" class="form-control" id="vvf_pro" name="vvf_pro" step="any">
                                <label for="vvf_pro">V.V.F (ejm: 55.32)</label>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="form-group input-material">
                                <input type="number" class="form-control" id="igv" name="igv" step="any" disabled value="18.00">
                                <label for="igv">I.G.V.</label>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="form-group input-material">
                                <input type="number" class="form-control" id="pvf_pro" name="pvf_pro" step="any">
                                <label for="pvf_pro">P.V.F (ejm: 55.32)</label>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="form-group input-material">
                                <input type="number" class="form-control" id="pvp_pro" name="pvp_pro" step="any">
                                <label for="pvp_pro">P.V.P (ejm: 55.32)</label>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="form-group input-material">
                                <input type="text" class="form-control" id="cod_barra" name="cod_barra" required>
                                <label for="cod_barra">Codigo Barra</label>
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