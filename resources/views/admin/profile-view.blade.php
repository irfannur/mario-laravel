@extends('admin.master')
@section('admin')

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Profile</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item active">Profile</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="card"><br>
                        <center>
                            <img class="rounded-circle avatar-xl"
                                 src="{{ asset(\App\Models\User::getPathProfileImage()) }}"
                                 alt="Card image cap">
                        </center>
                        <div class="card-body">
                            <table class="table table-condensed">
                                <tr>
                                    <td width="15%">Name</td>
                                    <td width="5%">:</td>
                                    <td width="60%">{{ $data->name }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td>{{ $data->email }}</td>
                                </tr>
                                <tr>
                                    <td>Username</td>
                                    <td>:</td>
                                    <td>{{ $data->username }}</td>
                                </tr>
                            </table>
                            <a href="{{ route('admin.profile.edit') }}" class="btn btn-primary btn-md">Edit</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
