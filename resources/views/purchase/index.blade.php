@extends('layouts.master')

@section('title')
    Purchase
@endsection

@section('breadcrumb')
    @parent
    <li class="active">Purchase List</li>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-header with-border">
                <button onclick="addForm()" class="btn btn-success btn-xs btn-flat"><i class="fa fa-plus-circle"></i>New Purchase</button>
                @empty(! session('id_purchase'))
                <a href="{{ route('purchase_detail.index') }}" class="btn btn-info btn-xs btn-flat"><i class="fa fa-pencil"></i>Active Purchase</a>
                @endempty
            </div>
            <div class="box-body table-responsive">
                <table class="table table-stiped table-bordered table-purchase">
                    <thead>
                        <th width="5%">No.</th>
                        <th>Date</th>
                        <th>Supplier</th>
                        <th>Total Item</th>
                        <th>Total Price</th>
                        <th>Discount</th>
                        <th>Cost</th>
                        <th>Total Pay</th>
                        <th width="15%"><i class="fa fa-cog"></i></th>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

@includeIf('purchase.supplier')
@includeIf('purchase.detail')
@endsection

@push('scripts')
<script>
    let table, table1;
    $(function () {
        table = $('.table-purchase').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            autoWidth: false,
            ajax: {
                url: '{{ route('purchase.data') }}',
            },
            columns: [
                {data: 'DT_RowIndex', searchable: false, sortable: false},
                {data: 'date'},
                {data: 'supplier'},
                {data: 'total_item'},
                {data: 'total_price'},
                {data: 'discount'},
                {data: 'cost'},
                {data: 'pay'},
                {data: 'action', searchable: false, sortable: false},
            ]
        });
        $('.table-supplier').DataTable();
        table1 = $('.table-detail').DataTable({
            processing: true,
            bSort: false,
            dom: 'Brt',
            columns: [
                {data: 'DT_RowIndex', searchable: false, sortable: false},
                {data: 'code_product'},
                {data: 'name_product'},
                {data: 'buy_price'},
                {data: 'total'},
                {data: 'subtotal'},
            ]
        })
    });
    function addForm() {
        $('#modal-supplier').modal('show');
    }
    function showDetail(url) {
        $('#modal-detail').modal('show');
        table1.ajax.url(url);
        table1.ajax.reload();
    }
    function deleteData(url) {
        if (confirm('Are you sure want to delete selected data?')) {
            $.post(url, {
                    '_token': $('[name=csrf-token]').attr('content'),
                    '_method': 'delete'
                })
                .done((response) => {
                    table.ajax.reload();
                })
                .fail((errors) => {
                    alert('Could not delete data');
                    return;
                });
        }
    }
</script>
@endpush