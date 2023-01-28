@extends('admin.master')
@section('admin')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Edit Profile</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item active">Edit Profile</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <form class="form-horizontal mt-3" method="POST" action="{{ route('admin.profile.save') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="name" type="text"
                                               value="{{ $data->name }}" id="input-name">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="email" type="email"
                                               value="{{ $data->email }}" id="input-email">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Username</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="username" type="text"
                                               value="{{ $data->username }}" id="input-username">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Photo</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="profile_image" type="file"
                                               id="input-photo">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <img id="img-photo" class="rounded avatar-lg" src="{{ asset(\App\Models\User::getPathProfileImage()) }}" alt="Card image cap">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="form-group text-right row mt-3 pt-1">
                                    <div class="col-12">
                                        <button class="btn btn-info btn-md waves-effect waves-light" type="submit">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>

        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
           $('#input-photo').change(function(e) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#img-photo').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
           });
        });
    </script>
@endsection
