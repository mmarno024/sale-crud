@extends('layouts.admin_template')

@section('content')
    <div class="container">
        <h1>Edit Penjualan</h1>
        <form id="salesForm">
            @csrf
            @method('PUT')
            <div id="itemsContainer">
                @foreach ($sale->items as $item)
                    <div class="row mb-3 item-row">
                        <div class="form-group col-md-5">
                            <label>Nama Barang</label>
                            <select class="form-control item-select" name="item_id[]">
                                <option value="{{ $item->id }}" data-price="{{ $item->pivot->price }}">
                                    {{ $item->name }}</option>
                                @foreach ($items as $availableItem)
                                    <option value="{{ $availableItem->id }}" data-price="{{ $availableItem->price }}">
                                        {{ $availableItem->name }}</option>
                                @endforeach
                            </select>
                            @error('item_id.*')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-2">
                            <label>Jumlah</label>
                            <input type="number" class="form-control qty" name="qty[]" value="{{ $item->pivot->qty }}"
                                placeholder="Jumlah" min="1">
                            @error('qty.*')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        {{-- @dd($sale->items) --}}
                        <div class="form-group col-md-2">
                            <label>Harga per Item</label>
                            {{-- <input type="number" class="form-control text-right p-1 price" name="price[]" value="{{ $item->pivot->price }}" placeholder="Harga" step="0.01" readonly> --}}
                            <input type="number" class="form-control text-right p-1 price" name="price[]"
                                value="{{ $item->pivot ? $item->pivot->price : '' }}" placeholder="Harga" step="0.01"
                                readonly>
                        </div>
                        <div class="form-group col-md-2">
                            <label>Total per Item</label>
                            <input type="text" class="form-control text-right p-1 total-per-item" name="total_per_item[]"
                                value="{{ $item->pivot->qty * $item->pivot->price }}" placeholder="Total per Item"
                                readonly>
                        </div>
                        <div class="form-group text-right col-md-1">
                            <label>&nbsp;</label>
                            <div>
                                <button type="button" class="btn btn-danger pb-3 remove-item">Hapus</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <button type="button" class="btn btn-success text-white" id="addItem"><i class="fa fa-plus"></i> Tambah
                Item</button>
            <div class="row mb-3 mt-5">
                <div class="form-group col-md-12">
                    <label>TOTAL KESELURUHAN</label>
                    <input type="text" class="form-control text-right" style="font-weight: bold; font-size:20px"
                        name="total" id="total" value="{{ $sale->total }}" placeholder="Total" readonly>
                    @error('total')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="form-group col-md-12">
                    <a href="{{ route('sales.index') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i>
                        Kembali</a>
                    <button type="button" class="btn btn-info" id="submitSale"><i class="fa fa-save"></i> Simpan
                        Penjualan</button>
                </div>
            </div>
        </form>
    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        function calculateTotal() {
            let total = 0;
            $('.item-row').each(function() {
                const qty = parseFloat($(this).find('.qty').val()) || 0;
                const price = parseFloat($(this).find('.price').val()) || 0;
                const totalPerItem = qty * price;
                $(this).find('.total-per-item').val(totalPerItem.toFixed(2));
                total += totalPerItem;
            });
            $('#total').val(total.toFixed(2));
        }

        $('.item-row').each(function() {
            const qty = parseFloat($(this).find('.qty').val()) || 0;
            const price = parseFloat($(this).find('.price').val()) || 0;
            const totalPerItem = qty * price;
            $(this).find('.total-per-item').val(totalPerItem.toFixed(2));
        });

        $(document).on('change', '.item-select', function() {
            const selectedItemPrice = parseFloat($(this).find('option:selected').data('price'));
            $(this).closest('.item-row').find('.price').val(selectedItemPrice.toFixed(2));
            calculateTotal(); // Hitung total setelah memilih item
        });

        $(document).on('input', '.qty', function() {
            const price = parseFloat($(this).closest('.item-row').find('.price').val()) || 0;
            const qty = parseFloat($(this).val()) || 0;
            const totalPerItem = qty * price;
            $(this).closest('.item-row').find('.total-per-item').val(totalPerItem.toFixed(2));
            calculateTotal(); // Hitung total keseluruhan
        });

        $('#addItem').on('click', function() {
            const newItemRow = `
                <div class="row mb-3 item-row">
                    <div class="form-group col-md-5">
                        <label>Nama Barang</label>
                        <select class="form-control item-select" name="item_id[]">
                            <option value="">Pilih Barang</option>
                            @foreach ($items as $item)
                                <option value="{{ $item->id }}" data-price="{{ $item->price }}">
                                    {{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('item_id.*')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-md-2">
                        <label>Jumlah</label>
                        <input type="number" class="form-control qty" name="qty[]" placeholder="Jumlah" min="1">
                        @error('qty.*')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-md-2">
                        <label>Harga per Item</label>
                            <input type="number" class="form-control text-right p-1 price" name="price[]" value="{{ $item->pivot ? $item->pivot->price : '' }}" placeholder="Harga" step="0.01" readonly>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Total per Item</label>
                        <input type="text" class="form-control text-right p-1 total-per-item" name="total_per_item[]" placeholder="Total per Item" readonly>
                    </div>
                    <div class="form-group text-right col-md-1">
                        <label>&nbsp;</label>
                        <div>
                            <button type="button" class="btn btn-danger pb-3 remove-item">Hapus</button>
                        </div>
                    </div>
                </div>`;
            $('#itemsContainer').append(newItemRow);
        });

        $(document).on('click', '.remove-item', function() {
            $(this).closest('.item-row').remove();
            calculateTotal(); // Hitung total setelah menghapus item
        });

        $('#submitSale').on('click', function() {
            $.ajax({
                url: "{{ route('sales.update', $sale->id) }}",
                method: 'POST',
                data: $('#salesForm').serialize(),
                success: function(response) {
                    window.location.href = "{{ route('sales.index') }}";
                },
                error: function(xhr) {
                    let errors = xhr.responseJSON.errors;
                    $('.text-danger').remove();
                    $.each(errors, function(key, value) {
                        const inputField = $('input[name="' + key + '"]');
                        inputField.next('.text-danger').remove();
                        inputField.after('<span class="text-danger">' + value[0] +
                            '</span>');
                    });
                    Swal.fire({
                        icon: 'error',
                        title: 'Kesalahan',
                        html: 'Lengkapi data dengan benar!'
                    });
                }
            });
        });

        calculateTotal(); // Hitung total keseluruhan saat halaman dimuat
    });
</script>
