@extends('layouts.admin_template')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-primary text-white rounded-top">
                    MASTER SALES
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-lg-8 col-sm-12">
                            <a href="{{ url('sales/create') }}" class="btn btn-info"><i class="fa fa-plus"></i> Tambah Sale</a>
                        </div>
                        <div class="col-lg-4 col-sm-12 text-end">
                            <input type="text" class="form-control" placeholder="Search">
                        </div>
                    </div>
                    <table id="salesTable" class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Item ID</th>
                                <th>Items</th>
                                <th>Total</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="saleDetailModal" tabindex="-1" role="dialog" aria-labelledby="saleDetailModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="saleDetailModalLabel">Sale Detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <tr>
                            <td><strong>Sale ID</strong></td>
                            <td align="center">:</td>
                            <td><span id="saleId"></span></td>
                        </tr>
                        <tr>
                            <td><strong>Total</strong></td>
                            <td align="center">:</td>
                            <td><span id="saleTotal"></span></td>
                        </tr>
                        <tr>
                            <td colspan="3"><strong>Items</strong></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <div id="saleItems"></div>
                            </td>
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
        $('#salesTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('sales.index') }}',
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false,
                    className: 'text-center'
                },
                {
                    data: 'sale_id',
                    name: 'sale_id',
                    className: 'text-center'
                },
                {
                    data: 'items',
                    name: 'items',
                    className: 'text-right'
                },
                {
                    data: 'total',
                    name: 'total',
                    className: 'text-center',
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

        $('#salesTable').on('click', '.btn-detail', function() {
            var saleId = $(this).data('id');
            $.ajax({
                url: '/sales/' + saleId,
                method: 'GET',
                success: function(data) {
                    $('#saleId').text(data.sale_id);
                    $('#saleTotal').text(new Intl.NumberFormat('id-ID', {
                        style: 'currency',
                        currency: 'IDR'
                    }).format(data.total));
                    var itemsHtml = '';
                    data.items.forEach(function(item) {
                        itemsHtml += '<div><img src="' + item.image + '" alt="' +
                            item.name +
                            '" style="width:100px;"><br>' +
                            'Nama: ' + item.name + '<br>' +
                            'Harga per item: ' + new Intl.NumberFormat('id-ID', {
                                style: 'currency',
                                currency: 'IDR'
                            }).format(item.price) + '<br>' +
                            'Jumlah: ' + item.pivot.qty + '<br>' +
                            'Harga Total per item: ' + new Intl.NumberFormat(
                                'id-ID', {
                                    style: 'currency',
                                    currency: 'IDR'
                                }).format(item.price * item.pivot.qty) + '</div>';
                    });
                    $('#saleItems').html(itemsHtml);
                    $('#saleDetailModal').modal('show');
                }
            });
        });
    });
</script>
