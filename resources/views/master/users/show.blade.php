@extends('layouts.admin_template')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-primary text-white rounded-top">
                    DETAIL USER
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="form-group col-md-12">
                            <label>Nama</label>
                            <input type="text" class="form-control" value="{{ $user->name }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="form-group col-md-12">
                            <label>Alamat</label>
                            <input type="text" class="form-control" value="{{ $user->address }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="form-group col-md-12">
                            <label>Jenis Kelamin</label>
                            <input type="text" class="form-control" value="{{ $user->gender }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="form-group col-md-12">
                            <label>No. HP/WA</label>
                            <input type="text" class="form-control" value="{{ $user->phone }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="form-group col-md-12">
                            <label>Email</label>
                            <input type="email" class="form-control" value="{{ $user->email }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="form-group col-md-12">
                            <a href="{{ route('users.index') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i>
                                Kembali</a>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info"><i class="fa fa-edit"></i>
                                Edit User</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
