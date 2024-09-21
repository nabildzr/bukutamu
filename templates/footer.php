     </div>
     <!-- End of Main Content -->

     <!-- Footer -->
     <footer class="sticky-footer bg-white">
         <div class="container my-auto">
             <div class="copyright text-center my-auto">
                 <span>Copyright &copy; Hotel California 2020</span>
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
     <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
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
                     <a class="btn btn-primary" href="/bukutamu/conf/logout.php">Logout</a>
                 </div>
             </div>
         </div>
     </div>

     <!-- Bootstrap core JavaScript-->
     <script src="/bukutamu/assets/vendor/jquery/jquery.min.js"></script>
     <script src="/bukutamu/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
     <!-- Core plugin JavaScript-->
     <script src="/bukutamu/assets/vendor/jquery-easing/jquery.easing.min.js"></script>
     <!-- Custom scripts for all pages-->
     <script src="/bukutamu/assets/js/sb-admin-2.min.js"></script>
     <!-- Page level plugins -->
     <script src="/bukutamu/assets/vendor/datatables/jquery.dataTables.min.js"></script>
     <script src="/bukutamu/assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
     <!-- Page level custom scripts -->
     <script src="/bukutamu/assets/js/demo/datatables-demo.js"></script>
     <!-- SweetAlert2 -->
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

     <script>
         $(document).ready(() => {
             window.setTimeout(() => {
                 $(".alert").fadeTo(500, 0).slideUp(500, () => {
                     $(this).remove();
                 });
             }, 4000);
         });

         $('#gantiPassword').on('show.bs.modal', function(event) {
             var button = $(event.relatedTarget);
             var id = button.data('id');
             console.log(id);
             var modal = $(this);
             modal.find('.modal-body #id_user').val(id);
         });
     </script>


     <?php

        if ($x = isset($_GET['success'])) {
            if ($x == 1) {
                echo "<script>
            Swal.fire({
                icon: 'success',
                text: 'Data berhasil dihapus!',
                customClass: {
                    popup: 'swal2-popup',
                    title: 'swal2-title',
                    content: 'swal2-content',
                    confirmButton: 'swal2-confirm'
                }
            })
            </script>";
            }
            if ($x == 2) {
                echo "<script>
            Swal.fire({
                icon: 'success',
                text: 'Data berhasil dibuat!',
                customClass: {
                    popup: 'swal2-popup',
                    title: 'swal2-title',
                    content: 'swal2-content',
                    confirmButton: 'swal2-confirm'
                }
            })
            </script>";
            }
            if ($x == 3) {
                echo "<script>
            Swal.fire({
                icon: 'success',
                text: 'Data berhasil disimpan!',
                customClass: {
                    popup: 'swal2-popup',
                    title: 'swal2-title',
                    content: 'swal2-content',
                    confirmButton: 'swal2-confirm'
                }
            })
            </script>";
            }
            if ($x == 4) {
                echo "<script>
            Swal.fire({
                icon: 'success',
                text: 'Password Berhasil di ganti!',
                customClass: {
                    popup: 'swal2-popup',
                    title: 'swal2-title',
                    content: 'swal2-content',
                    confirmButton: 'swal2-confirm'
                }
            })
            </script>";
            }
        }

        ?>


     </body>

     </html>