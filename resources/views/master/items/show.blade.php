@extends('layouts.admin_template')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-primary text-white rounded-top">
                    DETAIL ITEM
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="form-group col-md-12">
                            <label>Kode</label>
                            <input type="text" class="form-control" value="{{ $item->code }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="form-group col-md-12">
                            <label>Nama</label>
                            <input type="text" class="form-control" value="{{ $item->name }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="form-group col-md-12">
                            <label>Harga</label>
                            <input type="text" class="form-control" value="{{ $item->price }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="form-group col-md-12">
                            <label>Deskripsi</label>
                            <input type="text" class="form-control" value="{{ $item->description }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="form-group col-md-12">
                            <label>Stock</label>
                            <input type="text" class="form-control" value="{{ $item->stock }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="form-group col-md-12">
                            <a href="{{ route('items.index') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i>
                                Kembali</a>
                            <a href="{{ route('items.edit', $item->id) }}" class="btn btn-info"><i class="fa fa-edit"></i>
                                Edit Item</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
