<!-- resources/views/layouts/footer.blade.php -->
        </div>
        <!-- Footer Section -->
        <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">
                    Copyright © 2024. Divisi TI
                </span>
            </div>
        </footer>
        </div>

        <!-- plugins:js -->
        <script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
        <!-- endinject -->

        <!-- Plugin js for this page -->
        <script src="{{ asset('vendors/chart.js/Chart.min.js') }}"></script>
        <!-- End plugin js for this page -->

        <!-- inject:js -->
        <script src="{{ asset('js/off-canvas.js') }}"></script>
        <script src="{{ asset('js/hoverable-collapse.js') }}"></script>
        <script src="{{ asset('js/template.js') }}"></script>
        <script src="{{ asset('js/settings.js') }}"></script>
        <script src="{{ asset('js/todolist.js') }}"></script>
        <!-- endinject -->

        <!-- Custom js for this page -->
        <script src="{{ asset('js/dashboard.js') }}"></script>
        <script src="{{ asset('js/Chart.roundedBarCharts.js') }}"></script>
        <script src="{{ asset('js/logout.js') }}"></script>
        <script src="{{ asset('js/htaccsess.js') }}"></script>
        <script src="{{ asset('js/datatables.min.js') }}"></script>

        <script type="text/javascript">
            $('#sampleTable').DataTable();
        </script>

    </body>
    </html>
