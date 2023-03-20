<div class="modal fade" id="modal-product" tabindex="-1" role="dialog" aria-labelledby="modal-product">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Choose Product</h4>
            </div>
            <div class="modal-body">
                <table class="table table-striped table-bordered table-product">
                    <thead>
                        <th width="5%">No</th>
                        <th>Product Code</th>
                        <th>Name</th>
                        <th>Buy Price</th>
                        <th><i class="fa fa-cog"></i></th>
                    </thead>
                    <tbody>
                        @foreach ($product as $key => $item)
                            <tr>
                                <td width="5%">{{ $key+1 }}</td>
                                <td><span class="label label-success">{{ $item->code_product }}</span></td>
                                <td>{{ $item->name_product }}</td>
                                <td>{{ $item->buy_price }}</td>
                                <td>
                                    <a href="#" class="btn btn-primary btn-xs btn-flat"
                                        onclick="chooseProduct('{{ $item->id_product }}', '{{ $item->code_product }}')">
                                        <i class="fa fa-check-circle"></i>
                                        Choose Product
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>