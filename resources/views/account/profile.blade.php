@extends('frontend.layout.main')
@section('content')
    <style>
        input[disabled],
        textarea[disabled] {
            background-color: #f8f9fa;
            cursor: not-allowed;
        }

        .disabled-btn {
            background-color: #ccc !important;
            border-color: #ccc !important;
            cursor: not-allowed;
        }
    </style>

    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Profile</h4>
                    <h6>User Profile</h6>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h4>Profile</h4>
                </div>

                <div class="card-body profile-body">
                    <h5 class="mb-2"><i class="ti ti-user text-primary me-1"></i>Basic Information</h5>
                    <form id="profileForm" action="{{ route('profile.update') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        {{-- Profile Image --}}
                        <div class="profile-pic-upload image-field mb-3">
                            <div class="profile-pic p-2">
                                <img id="profilePreview"
                                    src="{{ $user->image ? asset('storage/' . $user->image) : asset('assets/img/users/user-49.png') }}"
                                    class="object-fit-cover h-100 rounded-1" alt="user">
                            </div>

                            <div class="mb-3">
                                <div class="image-upload mb-0 d-inline-flex">
                                    <input type="file" name="image" id="imageInput" accept="image/*" disabled
                                        style="display: none;">
                                    <div class="btn btn-primary fs-13 disabled-btn" id="changeImageBtn">Change Image</div>
                                </div>
                                <p class="mt-2">Upload an image below 2 MB (JPG, PNG)</p>
                            </div>
                        </div>

                        {{-- Profile Info --}}
                        <div class="row">
                            <div class="col-lg-12 col-sm-12">
                                <div class="mb-3">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ $user->name }}"
                                        disabled>
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-12">
                                <div class="mb-3">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ $user->email }}"
                                        disabled>
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-12">
                                <div class="mb-3">
                                    <label>Phone Number</label>
                                    <input type="text" name="phone_number" class="form-control"
                                        value="{{ $user->phone_number }}" disabled>
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-12">
                                <div class="mb-3">
                                    <label>User Name</label>
                                    <input type="text" class="form-control" value="{{ $user->name }}" disabled>
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-12">
                                <div class="mb-3">
                                    <label>Password</label>
                                    <div class="pass-group">
                                        <input type="password" name="password" class="pass-input form-control"
                                            placeholder="Enter new password (optional)" disabled>
                                        <i class="ti ti-eye-off toggle-password"></i>
                                    </div>
                                </div>
                            </div>

                            {{-- Buttons --}}
                            <div class="col-12 d-flex justify-content-end">
                                <button type="button" id="editBtn" class="btn btn-primary shadow-none">Edit
                                    Profile</button>
                                <button type="submit" id="saveBtn" class="btn btn-success shadow-none d-none">Save
                                    Changes</button>
                                <button type="button" id="cancelBtn"
                                    class="btn btn-secondary shadow-none d-none ms-2">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- Footer --}}
        <div
            class="copyright-footer d-flex align-items-center justify-content-between border-top bg-white gap-3 flex-wrap px-4 py-2">
            <p class="fs-13 text-gray-9 mb-0">2014 - 2025 &copy; DreamsPOS. All Right Reserved</p>
            <p class="mb-0">Designed & Developed By <a href="javascript:void(0);"
                    class="link-primary text-decoration-none">Dreams</a></p>
        </div>
    </div>

    {{-- JavaScript --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const editBtn = document.getElementById('editBtn');
            const saveBtn = document.getElementById('saveBtn');
            const cancelBtn = document.getElementById('cancelBtn');
            const form = document.getElementById('profileForm');
            const inputs = document.querySelectorAll('#profileForm input');
            const imageBtn = document.querySelector('.image-upload .btn');
            let originalData = {};

            // Save initial form values
            inputs.forEach(input => {
                originalData[input.name] = input.value;
            });

            // Edit button click
            editBtn.addEventListener('click', function() {
                inputs.forEach(input => input.disabled = false);
                document.getElementById('imageInput').disabled = false;
                imageBtn.classList.remove('disabled-btn');
                editBtn.classList.add('d-none');
                saveBtn.classList.remove('d-none');
                cancelBtn.classList.remove('d-none');
            });

            // Cancel button click
            cancelBtn.addEventListener('click', function() {
                // Reset input values to original
                inputs.forEach(input => {
                    input.value = originalData[input.name] || '';
                    input.disabled = true;
                });
                document.getElementById('imageInput').disabled = true;
                imageBtn.classList.add('disabled-btn');
                editBtn.classList.remove('d-none');
                saveBtn.classList.add('d-none');
                cancelBtn.classList.add('d-none');
            });

            // Form submit (detect changes)
            form.addEventListener('submit', function(e) {
                let changed = false;

                inputs.forEach(input => {
                    if (input.type === 'file' && input.files.length > 0) {
                        changed = true; // image selected
                    } else if (input.value !== (originalData[input.name] || '')) {
                        changed = true; // text/email/password changed
                    }
                });

                // if no change, just refresh
                if (!changed) {
                    e.preventDefault();
                    location.reload(); // refresh karega
                }
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const changeBtn = document.getElementById('changeImageBtn');
            const inputFile = document.getElementById('imageInput');
            const previewImg = document.getElementById('profilePreview');

            // When user clicks the button → open file input
            changeBtn.addEventListener('click', function() {
                if (!changeBtn.classList.contains('disabled-btn')) {
                    inputFile.click();
                }
            });

            // When image is selected → show preview instantly
            inputFile.addEventListener('change', function(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        previewImg.src = e.target.result; // preview new image
                    }
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
@endsection
