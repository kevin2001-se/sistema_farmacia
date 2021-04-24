
            <footer class="footer text-center">
                All Rights Reserved by Matrix-admin. Designed and Developed by <a
                    href="https://www.wrappixel.com">WrapPixel</a>.
            </footer>

        </div>
    </div>
    <input type="hidden" value="<?php echo URL; ?>" id="url">
<script src="<?php echo URL; ?>view/dist/js/lib/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="<?php echo URL; ?>view/dist/js/lib/bootstrap.bundle.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="<?php echo URL; ?>view/dist/js/lib/perfect-scrollbar.jquery.min.js"></script>
<script src="<?php echo URL; ?>view/dist/js/lib/sparkline.js"></script>
<!--Wave Effects -->
<script src="<?php echo URL; ?>view/dist/js/waves.js"></script>
<!--Menu sidebar -->
<script src="<?php echo URL; ?>view/dist/js/sidebarmenu.js"></script>
<!--Custom JavaScript -->
<script src="<?php echo URL; ?>view/dist/js/custom.min.js"></script>
<script src="<?php echo URL; ?>view/dist/js/sweetalert2/sweetalert2.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="<?php echo URL; ?>view/dist/js/datatable/jquery.dataTables.min.js"></script>
<script src="<?php echo URL; ?>view/dist/js/datatable/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
<script src="<?php echo URL; ?>view/dist/js/inputFloat/materialize-inputs.jquery.js"></script>
<script src="<?php echo URL; ?>view/dist/js/toastr/toastr.min.js"></script>
<!--This page JavaScript -->
<!-- <script src="../../dist/js/pages/dashboards/dashboard1.js"></script> -->
<!-- Charts js Files -->
<?php
if ($ruta[0] != '') :
?>
<script src="<?php echo URL; ?>view/dist/js/Ajax/<?php echo $ruta[0]; ?>.js"></script>
<?php
endif;
?>
<script src="<?php echo URL; ?>view/dist/js/main.js"></script>
</body>

</html>