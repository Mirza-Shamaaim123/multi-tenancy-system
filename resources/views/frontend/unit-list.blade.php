@extends('frontend.layout.main')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="add-item d-flex">
                    <div class="page-title">
                        <h4 class="fw-bold">Units</h4>
                        <h6>Manage your units</h6>
                    </div>
                </div>
                <ul class="table-top-head">
                    <li>
                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="Pdf"><img src="assets/img/icons/pdf.svg"
                                alt="img"></a>
                    </li>
                    <li>
                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="Excel"><img
                                src="assets/img/icons/excel.svg" alt="img"></a>
                    </li>
                    <li>
                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="Refresh"><i
                                class="ti ti-refresh"></i></a>
                    </li>
                    <li>
                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="Collapse" id="collapse-header"><i
                                class="ti ti-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="page-btn">
                    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-units"><i
                            class="ti ti-circle-plus me-1"></i>Add Unit</a>
                </div>
            </div>

            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
                    <div class="btn-search-set">
                        <div class="search-input position-relative">
                            <span class="btn-searchset position-absolute top-50 translate-middle-y ms-2">
                                <i class="ti ti-search fs-14 feather-search"></i>
                            </span>
                            <input type="text" class="form-control ps-5" placeholder="Search here...">
                        </div>
                    </div>
                    <div class="table-dropdown my-xl-auto right-content">
                        <div class="dropdown">
                            <a href="javascript:void(0);"
                                class="dropdown-toggle btn btn-white btn-md d-inline-flex align-items-center"
                                data-bs-toggle="dropdown">
                                Status
                            </a>
                            <ul class="dropdown-menu  dropdown-menu-end p-3">
                                <li>
                                    <a href="javascript:void(0);" class="dropdown-item rounded-1">Active</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class="dropdown-item rounded-1">Inactive</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table datatable">
                            <thead class="thead-light">
                                <tr>
                                    <th class="no-sort">
                                        <label class="checkboxs">
                                            <input type="checkbox" id="select-all">
                                            <span class="checkmarks"></span>
                                        </label>
                                    </th>
                                    <th>Unit</th>
                                    <th>Short name</th>
                                    <th>No of Products</th>
                                    <th>Created Date</th>
                                    <th>Status</th>
                                    <th class="no-sort"></th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($units as $unit)
                                    <tr>
                                        <td>
                                            <label class="checkboxs">
                                                <input type="checkbox" value="{{ $unit->id }}">
                                                <span class="checkmarks"></span>
                                            </label>
                                        </td>
                                        <td class="text-gray-9">{{ $unit->name }}</td>
                                        <td>{{ $unit->short_name }}</td>
                                        <td>{{ $unit->id }}</td> {{-- yahan 25 ke jagah kuch aur show karna hai to change kar lo --}}
                                        <td>{{ $unit->created_at->format('d M Y') }}</td>
                                        <td>
                                            @if ($unit->status === 'active')
                                                <span class="badge table-badge bg-success fw-medium fs-10">Active</span>
                                            @else
                                                <span class="badge table-badge bg-danger fw-medium fs-10">Inactive</span>
                                            @endif
                                        </td>
                                        <td class="action-table-data">
                                            <div class="edit-delete-action">
                                                <a href="javascript:void(0);" class="me-2 p-2 editBtn"
                                                    data-id="{{ $unit->id }}" data-name="{{ $unit->name }}"
                                                    data-short_name="{{ $unit->short_name }}"
                                                    data-status="{{ $unit->status }}" data-bs-toggle="modal"
                                                    data-bs-target="#edit-units">
                                                    <i data-feather="edit" class="feather-edit"></i>
                                                </a>

                                                <a href="javascript:void(0);" class="p-2 deleteBtn"
                                                    data-id="{{ $unit->id }}" data-bs-toggle="modal"
                                                    data-bs-target="#delete-modal">
                                                    <i data-feather="trash-2" class="feather-trash-2"></i>
                                                </a>

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>


                        </table>
                    </div>
                </div>
            </div>
            <!-- /product list -->
        </div>
        <div class="footer d-sm-flex align-items-center justify-content-between border-top bg-white p-3">
            <p class="mb-0 text-gray-9">2014 - 2025 &copy; DreamsPOS. All Right Reserved</p>
            <p>Designed &amp; Developed by <a href="javascript:void(0);" class="text-primary">Dreams</a></p>
        </div>
    </div>
    </div>
    <!-- /Main Wrapper -->

    <!-- Add Unit -->
    <div class="modal fade" id="add-units">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="page-title">
                        <h4>Add Unit</h4>
                    </div>
                    <button type="button" class="close bg-danger text-white fs-16" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('unit.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Unit<span class="text-danger ms-1">*</span></label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Short Name<span class="text-danger ms-1">*</span></label>
                            <input type="text" class="form-control" name="short_name">
                        </div>
                        <div class="mb-0">
                            <div class="status-toggle modal-status d-flex justify-content-between align-items-center">
                                <span class="status-label">Status</span>
                                <input type="checkbox" name="status" id="user2" class="check" checked="">
                                <label for="user2" class="checktoggle"></label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn me-2 btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add Unit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Add Unit -->

    <!-- Edit Unit -->
    <div class="modal fade" id="edit-units">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Edit Unit</h4>
                    <button type="button" class="close bg-danger text-white fs-16"
                        data-bs-dismiss="modal">&times;</button>
                </div>
                <form id="editUnitForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Unit<span class="text-danger ms-1">*</span></label>
                            <input type="text" class="form-control" name="name" id="edit_name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Short Name<span class="text-danger ms-1">*</span></label>
                            <input type="text" class="form-control" name="short_name" id="edit_short_name">
                        </div>
                        <div class="mb-0">
                            <div class="status-toggle modal-status d-flex justify-content-between align-items-center">
                                <span class="status-label">Status</span>
                                <input type="checkbox" name="status" id="edit_status" class="check">
                                <label for="edit_status" class="checktoggle"></label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn me-2 btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- /Edit Unit -->

    <!-- delete modal -->
    <div class="modal fade" id="delete-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="page-wrapper-new p-0">
                    <div class="content p-5 px-3 text-center">
                        <span class="rounded-circle d-inline-flex p-2 bg-danger-transparent mb-2">
                            <i class="ti ti-trash fs-24 text-danger"></i>
                        </span>
                        <h4 class="fs-20 fw-bold mb-2 mt-1">Delete Unit</h4>
                        <p class="mb-0 fs-16">Are you sure you want to delete this unit?</p>

                        {{-- ✅ Delete Form --}}
                        <form id="deleteForm" method="POST" action="">
                            @csrf
                            @method('DELETE')
                            <div class="modal-footer-btn mt-3 d-flex justify-content-center">
                                <button type="button" class="btn me-2 btn-secondary fs-13 fw-medium p-2 px-3 shadow-none"
                                    data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary fs-13 fw-medium p-2 px-3">Yes
                                    Delete</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Delete Modal JS --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.deleteBtn');
            const deleteForm = document.getElementById('deleteForm');

            deleteButtons.forEach(btn => {
                btn.addEventListener('click', function() {
                    const id = this.dataset.id;
                    deleteForm.action = `/unit/delete/${id}`;
                    console.log('Delete URL set to:', deleteForm.action); // 👈 Debug
                });
            });
        });
    </script>



    {{-- Edit Model JS --}}

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const editButtons = document.querySelectorAll('.editBtn');
            const editForm = document.getElementById('editUnitForm');

            editButtons.forEach(btn => {
                btn.addEventListener('click', function() {
                    const id = this.dataset.id;
                    const name = this.dataset.name;
                    const shortName = this.dataset.short_name;
                    const status = this.dataset.status;

                    // Fill inputs
                    document.getElementById('edit_name').value = name;
                    document.getElementById('edit_short_name').value = shortName;
                    document.getElementById('edit_status').checked = (status === 'active');

                    editForm.action = "{{ url('unit/update') }}/" + id;


                });
            });
        });
    </script>
@endsection
