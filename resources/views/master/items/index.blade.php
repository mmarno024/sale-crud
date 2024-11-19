@extends('layouts.admin_template')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-primary text-white rounded-top">
                    MASTER ITEM
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-lg-12 col-sm-12">
                            <a href="{{ url('items/create') }}" class="btn btn-info"><i class="fa fa-plus"></i> Tambah Item</a>
                        </div>
                    </div>

                    <table id="itemsTable" class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Harga (Rp)</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="itemDetailModal" tabindex="-1" role="dialog" aria-labelledby="itemDetailModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="itemDetailModalLabel">Item Detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <tr>
                            <td colspan="3" align="center">
                                <img id="itemImagePreview" src="" alt="Item Image"
                                    style="max-width: 300px; height: auto;">
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Kode</strong></td>
                            <td align="center">:</td>
                            <td><span id="itemCode"></span></td>
                        </tr>
                        <tr>
                            <td><strong>Nama</strong></td>
                            <td align="center">:</td>
                            <td><span id="itemName"></span></td>
                        </tr>
                        <tr>
                            <td><strong>Deskripsi</strong></td>
                            <td align="center">:</td>
                            <td><span id="itemDescription"></span></td>
                        </tr>
                        <tr>
                            <td><strong>Stock</strong></td>
                            <td align="center">:</td>
                            <td><span id="itemStock"></span></td>
                        </tr>
                        <tr>
                            <td><strong>Harga</strong></td>
                            <td align="center">:</td>
                            <td><span id="itemPrice"></span></td>
                        </tr>
                        <tr>
                            <td><strong>Tanggal Dibuat</strong></td>
                            <td align="center">:</td>
                            <td><span id="itemCreatedAt"></span></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    function confirmDelete(event, form) {
        event.preventDefault();
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Data yang dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    }

    jQuery.noConflict();
    jQuery(document).ready(function($) {
        $('#itemsTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('items.index') }}',
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false,
                    className: 'text-center'
                },
                {
                    data: 'image',
                    name: 'image',
                    render: function(data) {
                        return '<img src="' + data +
                            '" alt="Gambar" style="width: 100px; height: 100px;">';
                    },
                    className: 'text-center'
                },
                {
                    data: 'code',
                    name: 'code',
                    className: 'text-center'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'price',
                    name: 'price',
                    render: function(data) {
                        return new Intl.NumberFormat('id-ID', {
                            style: 'currency',
                            currency: 'IDR'
                        }).format(data);
                    },
                    className: 'text-right'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    className: 'text-center'
                }
            ]
        });

        $('#itemsTable').on('click', '.btn-detail', function() {
            var itemId = $(this).data('id');
            $.ajax({
                url: '/items/' + itemId,
                method: 'GET',
                success: function(data) {
                    $('#itemCode').text(data.code);
                    $('#itemName').text(data.name);
                    $('#itemDescription').text(data.description);
                    $('#itemStock').text(data.stock);
                    $('#itemPrice').text(new Intl.NumberFormat('id-ID', {
                        style: 'currency',
                        currency: 'IDR',
                        minimumFractionDigits: 2
                    }).format(data.price));
                    var createdAt = new Date(data.created_at);
                    $('#itemCreatedAt').text(createdAt.toISOString().split('T')[0]);
                    $('#itemImagePreview').attr('src', data.image);
                    $('#itemDetailModal').modal('show');
                }
            });
        });
    });
</script>
