<div class="modal fade" id="add-stock">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div class="page-title">
                    <h4>Add Stock</h4>
                </div>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="https://dreamspos.dreamstechnologies.com/html/template/index.html">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label">Warehouse <span class="text-danger ms-1">*</span></label>
                                <select class="select">
                                    <option>Select</option>
                                    <option>Lobar Handy</option>
                                    <option>Quaint Warehouse</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label">Store <span class="text-danger ms-1">*</span></label>
                                <select class="select">
                                    <option>Select</option>
                                    <option>Selosy</option>
                                    <option>Logerro</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label">Responsible Person <span
                                        class="text-danger ms-1">*</span></label>
                                <select class="select">
                                    <option>Select</option>
                                    <option>Steven</option>
                                    <option>Gravely</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="search-form mb-0">
                                <label class="form-label">Product <span class="text-danger ms-1">*</span></label>
                                <div class="position-relative">
                                    <input type="text" class="form-control" placeholder="Select Product">
                                    <i data-feather="search" class="feather-search"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-md btn-dark me-2" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-md btn-primary">Add Stock</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /Add Stock -->

<!-- jQuery -->
{{-- <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}" type="1c7c51a37a311fed5f477439-text/javascript"></script>

	<!-- Feather Icon JS -->
	<script src="{{ asset('assets/js/feather.min.js') }}" type="1c7c51a37a311fed5f477439-text/javascript"></script>

	<!-- Slimscroll JS -->
	<script src="{{ asset('assets/js/jquery.slimscroll.min.js') }}" type="1c7c51a37a311fed5f477439-text/javascript"></script>

	<!-- Bootstrap Core JS -->
	<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}" type="1c7c51a37a311fed5f477439-text/javascript"></script>

	<!-- ApexChart JS -->
	<script src="{{ asset('assets/plugins/apexchart/apexcharts.min.js') }}" type="1c7c51a37a311fed5f477439-text/javascript"></script>
	<script src="{{ asset('assets/plugins/apexchart/chart-data.js') }}" type="1c7c51a37a311fed5f477439-text/javascript"></script>

	<!-- Chart JS -->
	<script src="{{ asset('assets/plugins/chartjs/chart.min.js') }}" type="1c7c51a37a311fed5f477439-text/javascript"></script>
	<script src="{{ asset('assets/plugins/chartjs/chart-data.js') }}" type="1c7c51a37a311fed5f477439-text/javascript"></script>

	<!-- Daterangepikcer JS -->
	<script src="{{ asset('assets/js/moment.min.js') }}" type="1c7c51a37a311fed5f477439-text/javascript"></script>
	<script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.js') }}" type="1c7c51a37a311fed5f477439-text/javascript"></script>

	<!-- Select2 JS -->
	<script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}" type="1c7c51a37a311fed5f477439-text/javascript"></script>

	<!-- Color Picker JS -->
	<script src="" type="1c7c51a37a311fed5f477439-text/javascript"></script>

	<!-- Custom JS -->
	<script src="{{ asset('assets/js/theme-colorpicker.js') }}" type="1c7c51a37a311fed5f477439-text/javascript"></script>
	<script src="{{ asset('assets/js/script.js') }}" type="1c7c51a37a311fed5f477439-text/javascript"></script> --}}

<!-- jQuery -->
{{-- <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}" type="text/javascript"></script> --}}
<script src="{{ global_asset('assets/js/jquery-3.7.1.min.js') }}"></script>




<!-- Bootstrap (jQuery ke baad hi hona chahiye) -->
<script src="{{ global_asset('assets/js/bootstrap.bundle.min.js') }}" type="text/javascript"></script>

<!-- Slimscroll -->
<script src="{{ global_asset('assets/js/jquery.slimscroll.min.js') }}" type="text/javascript"></script>

<!-- Feather Icons -->
<script src="{{ global_asset('assets/js/feather.min.js') }}" type="text/javascript"></script>

<!-- Moment JS -->
<script src="{{ global_asset('assets/js/moment.min.js') }}" type="text/javascript"></script>

<!-- Date Range Picker -->
<script src="{{ global_asset('assets/plugins/daterangepicker/daterangepicker.js') }}" type="text/javascript"></script>

<!-- Select2 -->
<script src="{{ global_asset('assets/plugins/select2/js/select2.min.js') }}" type="text/javascript"></script>

<!-- DataTables (Important: add before script.js) -->
{{-- <script src="{{ asset('assets/plugins/datatables/datatables.min.js') }}" type="text/javascript"></script> --}}

<!-- ApexCharts -->
<script src="{{ global_asset('assets/plugins/apexchart/apexcharts.min.js') }}" type="text/javascript"></script>
<script src="{{ global_asset('assets/plugins/apexchart/chart-data.js') }}" type="text/javascript"></script>

<!-- Chart.js -->
<script src="{{ global_asset('assets/plugins/chartjs/chart.min.js') }}" type="text/javascript"></script>
<script src="{{ global_asset('assets/plugins/chartjs/chart-data.js') }}" type="text/javascript"></script>

<!-- Theme Color Picker -->
<script src="{{ global_asset('assets/js/theme-colorpicker.js') }}" type="text/javascript"></script>

<!-- Custom Script (Always Last) -->
<script src="{{ global_asset('assets/js/script.js') }}" type="text/javascript"></script>











    
    <!-- Custom JS -->
    {{-- <script src="assets/js/script.js" type="46921e623244ff12dfe97efb-text/javascript"></script>


    <script src="../../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js"
        data-cf-settings="46921e623244ff12dfe97efb-|49" defer></script>
    <script defer
        src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015"
        integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ=="
        data-cf-beacon='{"version":"2024.11.0","token":"3ca157e612a14eccbb30cf6db6691c29","server_timing":{"name":{"cfCacheStatus":true,"cfEdge":true,"cfExtPri":true,"cfL4":true,"cfOrigin":true,"cfSpeedBrain":true},"location_startswith":null}}'
        crossorigin="anonymous"></script> --}}





















{{-- <script src="../../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js"
    data-cf-settings="1c7c51a37a311fed5f477439-|49" defer></script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015"
    integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ=="
    data-cf-beacon='{"version":"2024.11.0","token":"3ca157e612a14eccbb30cf6db6691c29","server_timing":{"name":{"cfCacheStatus":true,"cfEdge":true,"cfExtPri":true,"cfL4":true,"cfOrigin":true,"cfSpeedBrain":true},"location_startswith":null}}'
    crossorigin="anonymous"></script> --}}
</body>


<!-- Mirrored from dreamspos.dreamstechnologies.com/html/template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Oct 2025 11:00:05 GMT -->

</html>
