@extends('layouts.admin_template')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-primary text-white rounded-top">
                    EDIT ITEM
                </div>
                <div class="card-body">
                    <form id="edit-item-form" action="{{ route('items.update', $item->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="form-group col-md-12">
                                <label>Kode</label>
                                <input type="text" class="form-control" name="code" value="{{ $item->code }}"
                                    placeholder="Kode">
                                @error('code')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="form-group col-md-12">
                                <label>Nama</label>
                                <input type="text" class="form-control" name="name" value="{{ $item->name }}"
                                    placeholder="Nama">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="form-group col-md-12">
                                <label>Harga</label>
                                <input type="number" class="form-control" name="price" value="{{ $item->price }}"
                                    placeholder="Harga">
                                @error('price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="form-group col-md-12">
                                <label>Image</label>
                                <input type="file" class="form-control" name="image" placeholder="Image"
                                    id="imageInput">
                                <img id="imagePreview" src="{{ asset($item->image) }}" alt="Image Preview"
                                    style="display:block; max-width: 200px; margin-top: 10px;">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="form-group col-md-12">
                                <label>Deskripsi</label>
                                <input type="text" class="form-control" name="description"
                                    value="{{ $item->description }}" placeholder="Deskripsi">
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="form-group col-md-12">
                                <label>Stock</label>
                                <input type="text" class="form-control" name="stock" value="{{ $item->stock }}"
                                    placeholder="Stock">
                                @error('stock')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="form-group col-md-12">
                                <a href="{{ route('items.index') }}" class="btn btn-danger"><i
                                        class="fa fa-arrow-left"></i>
                                    Kembali</a>
                                <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Perbarui
                                    Item</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#edit-item-form').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function(response) {
                    window.location.href = "{{ route('items.index') }}";
                },
                error: function(xhr) {
                    let errors = xhr.responseJSON.errors;
                    $.each(errors, function(key, value) {
                        $('input[name="' + key + '"]').next('.text-danger')
                    .remove();
                        $('input[name="' + key + '"]').after(
                            '<span class="text-danger">' + value[0] + '</span>');
                    });
                }
            });
        });

        $('#imageInput').on('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    $('#imagePreview').attr('src', event.target.result).show();
                }
                reader.readAsDataURL(file);
            } else {
                $('#imagePreview').attr('src', "{{ asset($item->image) }}").show();
            }
        });
    });
</script>
