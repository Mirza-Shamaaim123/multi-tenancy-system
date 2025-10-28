@extends('frontend.layout.main')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="add-item d-flex">
                    <div class="page-title">
                        <h4 class="fw-bold">Sub Category</h4>
                        <h6>Manage your sub categories</h6>
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
                    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-category"><i
                            class="ti ti-circle-plus me-1"></i>Add Sub Category</a>
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
                                Category
                            </a>
                            <ul class="dropdown-menu  dropdown-menu-end p-3">
                                <li>
                                    <a href="javascript:void(0);" class="dropdown-item rounded-1">Computers</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class="dropdown-item rounded-1">Electronics</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class="dropdown-item rounded-1">Shoe</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class="dropdown-item rounded-1">Electronics</a>
                                </li>
                            </ul>
                        </div>
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
                                    <th>Image</th>
                                    <th>Sub Category</th>
                                    <th>Category</th>
                                    <th>Category Code</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th class="no-sort"></th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($subcategories as $subcategory)
                                    <tr>
                                        <td>
                                            <label class="checkboxs">
                                                <input type="checkbox">
                                                <span class="checkmarks"></span>
                                            </label>
                                        </td>

                                        {{-- ✅ Subcategory Image --}}
                                        <td>
                                            <a class="avatar avatar-md me-2">
                                                <img src="{{ asset('storage/' . $subcategory->image) }}" alt="subcategory">
                                            </a>
                                        </td>

                                        {{-- ✅ Subcategory Name --}}
                                        <td>{{ $subcategory->name }}</td>

                                        {{-- ✅ Category Name (relation se) --}}
                                        <td>{{ $subcategory->category->name ?? '—' }}</td>

                                        {{-- ✅ Code --}}
                                        <td>{{ $subcategory->code }}</td>

                                        {{-- ✅ Description --}}
                                        <td>{{ $subcategory->description }}</td>

                                        {{-- ✅ Status --}}

                                        <td>
                                            <span
                                                class="badge {{ strtolower($subcategory->status) === 'active' ? 'bg-success' : 'bg-danger' }} fw-medium fs-10">
                                                {{ ucfirst($subcategory->status) }}
                                            </span>
                                        </td>




                                        {{-- ✅ Action Buttons --}}
                                        <td class="action-table-data">
                                            <div class="edit-delete-action">
                                                <a href="javascript:void(0);" class="p-2 editBtn"
                                                    data-id="{{ $subcategory->id }}" data-name="{{ $subcategory->name }}"
                                                    data-category_id="{{ $subcategory->category_id }}"
                                                    data-code="{{ $subcategory->code }}"
                                                    data-description="{{ $subcategory->description }}"
                                                    data-status="{{ $subcategory->status }}"
                                                    data-image="{{ $subcategory->image }}" data-bs-toggle="modal"
                                                    data-bs-target="#edit-category">
                                                    <i class="fa fa-edit"></i>
                                                </a>


                                                <a data-bs-toggle="modal" data-bs-target="#delete-modal"
                                                    class="p-2 deleteBtn" data-id="{{ $subcategory->id }}"
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

    <!-- Add Category -->
    <div class="modal fade" id="add-category">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="page-title">
                        <h4>Add Sub Category</h4>
                    </div>
                    <button type="button" class="close bg-danger text-white fs-16" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('subcategory.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <div class="add-image-upload">
                                <div class="add-image">
                                    <span class="fw-normal"><i data-feather="plus-circle" class="plus-down-add"></i> Add
                                        Image</span>
                                </div>
                                <div class="new-employee-field">
                                    <div class="mb-0">
                                        <div class="image-upload mb-2">
                                            <input type="file" name="image">
                                            <div class="image-uploads">
                                                <h4 class="fs-13 fw-medium">Upload Image</h4>
                                            </div>
                                        </div>
                                        <span>JPEG, PNG up to 2 MB</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Category <span class="text-danger ms-1">*</span></label>
                            <select class="form-control" name="category_id" required>
                                <option value="">Select</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="mb-3">
                            <label class="form-label">Sub Category<span class="text-danger ms-1">*</span></label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Category Code<span class="text-danger ms-1">*</span></label>
                            <input type="text" name="code" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description<span class="text-danger ms-1">*</span></label>
                            <textarea class="form-control" name="description"></textarea>
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
                        <button type="submit" class="btn btn-primary">Add Sub Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Add Category -->

    <!-- Edit Category -->
    <div class="modal fade" id="edit-category">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="page-title">
                        <h4>Edit Sub Category</h4>
                    </div>
                    <button type="button" class="close bg-danger text-white fs-16" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form id="editSubcategoryForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <div class="add-image-upload">
                                <div class="add-image p-1 border-solid">
                                    <img id="edit_image_preview" src="{{ asset('assets/img/products/laptop.png') }}"
                                        alt="image">
                                    <a href="javascript:void(0);">
                                        <i data-feather="x"
                                            class="x-square-add image-close remove-product fs-12 text-white bg-danger rounded-1"></i>
                                    </a>
                                </div>

                                <div class="new-employee-field">
                                    <div class="mb-0">
                                        <div class="image-upload mb-2">
                                            <input type="file" name="image" id="edit_image">
                                            <div class="image-uploads">
                                                <h4 class="fs-13 fw-medium">Change Image</h4>
                                            </div>
                                        </div>
                                        <span>JPEG, PNG up to 2 MB</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Category <span class="text-danger ms-1">*</span></label>
                            <select class="form-control" name="category_id" id="edit_category_id" required>
                                <option value="">Select</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Sub Category<span class="text-danger ms-1">*</span></label>
                            <input type="text" class="form-control" name="name" id="edit_name">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Category Code<span class="text-danger ms-1">*</span></label>
                            <input type="text" name="code" class="form-control" id="edit_code">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description<span class="text-danger ms-1">*</span></label>
                            <textarea class="form-control" name="description" id="edit_description"></textarea>
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


    <!-- /Edit Category -->
    <!-- delete modal -->
    <div class="modal fade" id="delete-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="page-wrapper-new p-0">
                    <div class="content p-5 px-3 text-center">
                        <span class="rounded-circle d-inline-flex p-2 bg-danger-transparent mb-2">
                            <i class="ti ti-trash fs-24 text-danger"></i>
                        </span>
                        <h4 class="fs-20 fw-bold mb-2 mt-1">Delete Sub Category</h4>
                        <p class="mb-0 fs-16">Are you sure you want to delete this subcategory?</p>

                        <form id="deleteSubcategoryForm" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="modal-footer-btn mt-3 d-flex justify-content-center">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Yes Delete</button>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Delete Modal js --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.deleteBtn');
            const deleteForm = document.getElementById('deleteSubcategoryForm');

            deleteButtons.forEach(btn => {
                btn.addEventListener('click', function() {
                    const id = this.dataset.id;
                    deleteForm.action = `/subcategory/delete/${id}`; // dynamic URL
                });
            });
        });
    </script>




    {{-- Edit Modal js --}}

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const editButtons = document.querySelectorAll('.editBtn');
            const editForm = document.getElementById('editSubcategoryForm');
            const previewImg = document.getElementById('edit_image_preview');

            editButtons.forEach(btn => {
                btn.addEventListener('click', function() {
                    // Get values from data attributes
                    const id = this.dataset.id;
                    const name = this.dataset.name;
                    const categoryId = this.dataset.category_id;
                    const code = this.dataset.code;
                    const description = this.dataset.description;
                    const status = this.dataset.status;
                    const image = this.dataset.image;

                    // ✅ Set form action dynamically
                    editForm.action = `/subcategory/update/${id}`;

                    // Fill form fields
                    document.getElementById('edit_name').value = name;
                    document.getElementById('edit_category_id').value = categoryId;
                    document.getElementById('edit_code').value = code;
                    document.getElementById('edit_description').value = description;
                    document.getElementById('edit_status').checked = (status.toLowerCase() ===
                        'active');

                    // Image preview
                    if (image) {
                        previewImg.src = `/storage/${image}`;
                    } else {
                        previewImg.src = "{{ asset('assets/img/products/laptop.png') }}";
                    }
                });
            });
        });
    </script>
@endsection
