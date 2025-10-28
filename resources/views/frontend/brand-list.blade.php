@extends('frontend.layout.main')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="add-item d-flex">
                    <div class="page-title">
                        <h4 class="fw-bold">Brand</h4>
                        <h6>Manage your brands</h6>
                    </div>
                </div>
                <ul class="table-top-head">
                    <li>
                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="Pdf"><img
                                src="{{ asset('assets/img/icons/pdf.svg') }}" alt="img"></a>
                    </li>
                    <li>
                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="Excel"><img
                                src="{{ asset('assets/img/icons/excel.svg') }}" alt="img"></a>
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
                    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-brand"><i
                            class="ti ti-circle-plus me-1"></i>Add Brand</a>
                </div>
            </div>
            <!-- /product list -->
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
                    <div class="search-set">
                        <div class="search-input">
                            <span class="btn-searchset"><i class="ti ti-search fs-14 feather-search"></i></span>
                        </div>
                    </div>
                    <div class="d-flex table-dropdown my-xl-auto right-content align-items-center flex-wrap row-gap-3">
                        <div class="dropdown me-2">
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
                        <div class="dropdown">
                            <a href="javascript:void(0);"
                                class="dropdown-toggle btn btn-white btn-md d-inline-flex align-items-center"
                                data-bs-toggle="dropdown">
                                Sort By : Latest
                            </a>
                            <ul class="dropdown-menu  dropdown-menu-end p-3">
                                <li>
                                    <a href="javascript:void(0);" class="dropdown-item rounded-1">Latest</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class="dropdown-item rounded-1">Ascending</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class="dropdown-item rounded-1">Desending</a>
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
                                    <th>Brand</th>
                                    <th>Created Date</th>
                                    <th>Status</th>
                                    <th class="no-sort"></th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($brands as $brand)
                                    <tr>
                                        <td>
                                            <label class="checkboxs">
                                                <input type="checkbox">
                                                <span class="checkmarks"></span>
                                            </label>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <a href="javascript:void(0);"
                                                    class="avatar avatar-md bg-light-900 p-1 me-2">
                                                    <img class="object-fit-contain"
                                                        src="{{ $brand->logo ? asset('storage/' . $brand->logo) : asset('assets/img/no-image.png') }}"
                                                        alt="{{ $brand->name }}">
                                                </a>
                                                <a href="javascript:void(0);">{{ $brand->name }}</a>
                                            </div>
                                        </td>
                                        <td>{{ $brand->created_at->format('d M Y') }}</td>
                                        <td>
                                            @if ($brand->status === 'active')
                                                <span class="badge table-badge bg-success fw-medium fs-10">Active</span>
                                            @else
                                                <span class="badge table-badge bg-danger fw-medium fs-10">Inactive</span>
                                            @endif
                                        </td>
                                        <td class="action-table-data">
                                            <div class="edit-delete-action">
                                                <a href="#" class="me-2 p-2 editBrandBtn" data-bs-toggle="modal"
                                                    data-bs-target="#edit-brand" data-id="{{ $brand->id }}"
                                                    data-name="{{ $brand->name }}"
                                                    data-logo="{{ asset('storage/' . $brand->logo) }}"
                                                    data-status="{{ $brand->status }}">
                                                    <i data-feather="edit" class="feather-edit"></i>
                                                </a>

                                                <a data-bs-toggle="modal" data-bs-target="#delete-modal"
                                                    data-id="{{ $brand->id }}" class="p-2 deleteBrandBtn"
                                                    href="javascript:void(0);">
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

    <!-- Add Brand -->
    <div class="modal fade" id="add-brand">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="page-title">
                        <h4>Add Brand</h4>
                    </div>
                    <button type="button" class="close bg-danger text-white fs-16" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('brand.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body new-employee-field">
                        <div class="profile-pic-upload mb-3">
                            <div class="profile-pic brand-pic">
                                <span><i data-feather="plus-circle" class="plus-down-add"></i> Add Image</span>
                            </div>
                            <div>
                                <div class="image-upload mb-0">
                                    <input type="file" name="logo">
                                    <div class="image-uploads">
                                        <h4>Upload Image</h4>
                                    </div>
                                </div>
                                <p class="mt-2">JPEG, PNG up to 2 MB</p>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Brand<span class="text-danger ms-1">*</span></label>
                            <input type="text" name="name" class="form-control">
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
                        <button type="submit" class="btn btn-primary">Add Brand</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Add Brand -->

    <!-- Edit Brand -->
    <div class="modal fade" id="edit-brand">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="page-title">
                        <h4>Edit Brand</h4>
                    </div>
                    <button type="button" class="close bg-danger text-white fs-16" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('brand.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="edit_id">
                    <input type="hidden" name="remove_logo" id="remove_logo_input" value="false">

                    <div class="modal-body new-employee-field">
                        <div class="profile-pic-upload mb-3">
                            <div class="profile-pic brand-pic">
                                <span>
                                    <img id="edit_logo_preview" src="" alt="Logo Preview"
                                        style="display:none; width:100px; height:100px; object-fit:contain;">
                                </span>
                                <a href="javascript:void(0);" id="remove_logo" class="remove-photo">
                                    <i data-feather="x" class="x-square-add"></i>
                                </a>
                            </div>
                            <div>
                                <div class="image-upload mb-0">
                                    <input type="file" name="logo" id="edit_logo_input">
                                    <div class="image-uploads">
                                        <h4>Change Image</h4>
                                    </div>
                                </div>
                                <p class="mt-2">JPEG, PNG up to 2 MB</p>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Brand<span class="text-danger ms-1">*</span></label>
                            <input type="text" name="name" id="edit_name" class="form-control">
                        </div>

                        <div class="mb-0">
                            <div class="status-toggle modal-status d-flex justify-content-between align-items-center">
                                <span class="status-label">Status</span>
                                <input type="checkbox" id="edit_status" name="status" class="check">
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
    <!-- Edit Brand -->

    <!-- delete modal -->
    <!-- delete modal -->
    <div class="modal fade" id="delete-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form id="deleteBrandForm" method="POST" action="{{ route('brand.destroy', 'id') }}">
                    @csrf
                    @method('DELETE')
                    <div class="page-wrapper-new p-0">
                        <div class="content p-5 px-3 text-center">
                            <span class="rounded-circle d-inline-flex p-2 bg-danger-transparent mb-2">
                                <i class="ti ti-trash fs-24 text-danger"></i>
                            </span>
                            <h4 class="fs-20 fw-bold mb-2 mt-1">Delete Brand</h4>
                            <p class="mb-0 fs-16">Are you sure you want to delete this brand?</p>
                            <div class="modal-footer-btn mt-3 d-flex justify-content-center">
                                <button type="button" class="btn me-2 btn-secondary fs-13 fw-medium p-2 px-3 shadow-none"
                                    data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary fs-13 fw-medium p-2 px-3">Yes
                                    Delete</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    {{-- Edit Model JS --}}


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Edit button click
            document.querySelectorAll('.editBrandBtn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const idInput = document.getElementById('edit_id');
                    const nameInput = document.getElementById('edit_name');
                    const statusInput = document.getElementById('edit_status');
                    const logoPreview = document.getElementById('edit_logo_preview');
                    const removeInput = document.getElementById('remove_logo_input');

                    idInput.value = this.dataset.id || '';
                    nameInput.value = this.dataset.name || '';
                    statusInput.checked = this.dataset.status === 'active';

                    if (this.dataset.logo && this.dataset.logo.trim() !== '') {
                        logoPreview.src = this.dataset.logo;
                        logoPreview.style.display = 'block';
                    } else {
                        logoPreview.style.display = 'none';
                    }

                    removeInput.value = 'false'; // reset remove flag on open
                });
            });

            // Remove image
            const removeBtn = document.getElementById('remove_logo');
            removeBtn.addEventListener('click', function() {
                const logoPreview = document.getElementById('edit_logo_preview');
                const logoInput = document.getElementById('edit_logo_input');
                const removeInput = document.getElementById('remove_logo_input');

                logoPreview.src = '';
                logoPreview.style.display = 'none';
                logoInput.value = '';
                removeInput.value = 'true'; // mark for deletion
            });
        });
    </script>

    {{-- Delete Model JS --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.deleteBrandBtn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const id = this.dataset.id;
                    const form = document.getElementById('deleteBrandForm');
                    form.action = `/brand/delete/${id}`;
                });
            });
        });
    </script>
@endsection
