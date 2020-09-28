            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Siktan Provinsi Jawa Barat <?= date('Y'); ?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

            </div>
            <!-- End of Page Wrapper -->

            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>

            <!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bootstrap core JavaScript-->
            <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
            <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

            <!-- Core plugin JavaScript-->
            <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>


            <!-- Vendor script -->
            <script src="<?= base_url('assets/'); ?>vendor/bootstrap-sortable/Scripts/moment.min.js"></script>
            <script src="<?= base_url('assets/'); ?>vendor/bootstrap-sortable/Scripts/bootstrap-sortable.js"></script>

            <!-- Custom scripts for all pages-->
            <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>
            <script src="<?= base_url('assets/'); ?>js/modal_script.js"></script>
            <script src="<?= base_url('assets/'); ?>js/area_script.js"></script>
            <script src="<?= base_url('assets/'); ?>js/filter_script.js"></script>
            <script src="<?= base_url('assets/'); ?>js/script.js"></script>

            <!-- Dashboard Admin -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
            </script>

            <!-- Vendor JS Files -->
            <script src="<?= base_url('assets/'); ?>vendor/jquery.easing/jquery.easing.min.js"></script>
            <script src="<?= base_url('assets/'); ?>vendor/venobox/venobox.min.js"></script>
            <script src="<?= base_url('assets/'); ?>vendor/aos/aos.js"></script>
            <script src="<?= base_url('assets/'); ?>vendor/owl.carousel/owl.carousel.min.js"></script>



            <!-- Custom scripts for all pages-->
            <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

            <!-- Page level plugins -->
            <script src="<?= base_url('assets/'); ?>vendor/chart.js/Chart.min.js"></script>

            <!-- Page level custom scripts -->
            <script src="<?= base_url('assets/'); ?>js/demo/chart-area-demo.js"></script>
            <script src="<?= base_url('assets/'); ?>js/demo/chart-pie-demo.js"></script>
            <script src="<?= base_url('assets/'); ?>js/demo/chart-bar-demo.js"></script>

            <!-- Custom JS File -->
            <script src="<?= base_url('assets/'); ?>js/landingpage_script.js"></script>
            <!-- End Dashboard Admin -->

            <script>
                $('.custom-file-input').on('change', function() {
                    let fileName = $(this).val().split('\\').pop();
                    $(this).next('.custom-file-label').addClass("selected").html(fileName);
                });


                $('.form-check-input').on('click', function() {
                    const menuId = $(this).data('menu');
                    const roleId = $(this).data('role');

                    $.ajax({
                        url: "<?= base_url('admin/changeaccess'); ?>",
                        type: 'post',
                        data: {
                            menuId: menuId,
                            roleId: roleId
                        },
                        success: function() {
                            document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
                        }
                    });

                });
            </script>

            </body>

            </html>