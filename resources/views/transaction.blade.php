@extends('layouts.app')

@section('side-bar')

@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <table id="inventory" class="table table-bordered table-responsive dataTable" role="grid" aria-describedBy="inventory_info">
                <thead>
                <tr role="row">
                    <th class="sorting" tabindex="0" aria-controls="inventory" rowspan="1" colspan="1" style="width: 229px;" aria-label="AssetCode: activate to sort column ascending">Brand Name</th>
                    <th class="sorting" tabindex="0" aria-controls="inventory" rowspan="1" colspan="1" style="width: 194px;" aria-label="NewAssetCode: activate to sort column ascending">Category</th>
                    <th class="sorting" tabindex="0" aria-controls="inventory" rowspan="1" colspan="1" style="width: 154px;" aria-label="Original Location: activate to sort column ascending">Product Name</th>
                    <th class="sorting" tabindex="0" aria-controls="inventory" rowspan="1" colspan="1" style="width: 111px;" aria-label="Equipment: activate to sort column ascending">Price</th>
                    <th class="sorting" tabindex="0" aria-controls="inventory" rowspan="1" colspan="1" style="width: 111px;" aria-label="Division: activate to sort column ascending">Stocks</th>
                    <th class="sorting" tabindex="0" aria-controls="inventory" rowspan="1" colspan="1" style="width: 111px;" aria-label="Status: activate to sort column ascending">Options</th>
                </thead>
                <tbody>
                <tr ng-repeat="product in products">
                    <td><p>@{{ product.str_product_name }}</p></td>
                    <td><p>@{{ product.str_category_name }}</p></td>
                    <td><p>@{{ product.str_volume_name }}</p></td>
                    <td><p>@{{ product.int_nicotine_level }}</p></td>
                    <td><p>@{{ product.deci_price | currency: 'P' }}</p></td>
                    <td><a><button ng-click="getCategory(category, $index)" type="button" class="btn btn-success" data-toggle="modal" data-target="#modalUpdate">
                                <i class="glyphicon glyphicon-plus"></i> Add</button></a></td>
                </tr>
                </tbody>
                <tfoot></tfoot>
            </table>
        </div>

        <div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Add to Inventory</h4>
                    </div>
                    <form ng-submit="saveUpdate()" autocomplete="off">
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p>Brand Name</p>
                                        <p>Category</p>
                                        <p>Product Name</p>
                                        <p>Price</p>
                                        <p>Current Stock</p>
                                        <p>Stocks to add</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p>White Wolves</p>
                                        <p>E-Juice</p>
                                        <p>Watermelon</p>
                                        <p>20.00</p>
                                        <p>0</p>
                                        <input ng-model="newCategory.str_category_name" type="integer" class="form-control" id="category_name" placeholder="Input Quantity">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p>Latest stock</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p>0</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" value="Submit" class="btn btn-success">Add to stocks</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection