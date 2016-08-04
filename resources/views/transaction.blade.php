@extends('layouts.app')

@section('side-bar')

@endsection

@section('main-content')
    <script src="{!! asset('/inventory/controller.js') !!}"></script>

    <h4><label>Inventory</label></h4>
    <div id="box-body">
        <div id="inventory_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
            <div class="row">
                <div class="col-md-6">
                    <div id="inventory_length" class="dataTables_length">
                        <label>
                            Show
                            <select class="form-control input-sm" name="inventory_length" aria-controls="inventory">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                            entries
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>

    <div ng-controller="ctrl.inventory">
        <div class="row">
            <div class="col-md-12">
                <table id="inventory" class="table table-bordered table-responsive dataTable" role="grid" aria-describedBy="inventory_info">
                    <thead>
                    <tr role="row">
                        <th class="sorting" tabindex="0" aria-controls="inventory" rowspan="1" colspan="1" style="width: 229px;" aria-label="AssetCode: activate to sort column ascending">Brand Name</th>
                        <th class="sorting" tabindex="0" aria-controls="inventory" rowspan="1" colspan="1" style="width: 194px;" aria-label="NewAssetCode: activate to sort column ascending">Category</th>
                        <th class="sorting" tabindex="0" aria-controls="inventory" rowspan="1" colspan="1" style="width: 154px;" aria-label="Original Location: activate to sort column ascending">Product Name</th>
                        <th class="sorting" tabindex="0" aria-controls="inventory" rowspan="1" colspan="1" style="width: 111px;" aria-label="Division: activate to sort column ascending">Stocks</th>
                        <th class="sorting" tabindex="0" aria-controls="inventory" rowspan="1" colspan="1" style="width: 111px;" aria-label="Status: activate to sort column ascending">Options</th>
                    </thead>
                    <tbody>
                    <tr ng-repeat="product in products">
                        <td><p>@{{ product.str_brand_name }}</p></td>
                        <td><p>@{{ product.str_category_name }}</p></td>
                        <td><p>@{{ product.str_product_name }}</p></td>
                        <td><p>@{{ product.int_current_value }}</p></td>
                        <td><a><button ng-click="addInventory(product, $index)" type="button" class="btn btn-success" data-toggle="modal" data-target="#modalInventory">
                                    <i class="glyphicon glyphicon-plus"></i> Add</button></a></td>
                    </tr>
                    </tbody>
                    <tfoot></tfoot>
                </table>
            </div>

            <div class="modal fade" id="modalInventory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel">Add to Inventory</h4>
                        </div>
                        <form ng-submit="processInventory()" autocomplete="off">
                            <div class="modal-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p>Brand Name</p>
                                            <p>Category</p>
                                            <p>Product Name</p>
                                            <p>Current Stock</p>
                                            <p>Stocks to add</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p>@{{ productToAdd.str_brand_name }}</p>
                                            <p>@{{ productToAdd.str_category_name }}</p>
                                            <p>@{{ productToAdd.str_product_name }}</p>
                                            <p>@{{ productToAdd.int_current_value }}</p>
                                            <input ng-model="productToAdd.int_quantity" ui-number-mask="0" type="text" class="form-control" id="category_name" placeholder="Input Quantity">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p>Latest stock</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p>@{{ productToAdd.int_current_value + productToAdd.int_quantity }}</p>
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

        <div class="col-md-5">
            <div id="inventory_info" class="dataTables_info" role="status" aria-live="polite">
                Showing 1 to 10 of 100 entries
            </div>
        </div>

        <div class="col-md-7 col-md-offset-3">
            <div id="inventory_paginate" class="dataTables_paginate paging_simple_numbers">
                <ul class="pagination">
                    <li id="inventory_previous" class="paginate_button previous disabled">
                        <a href="#" aria-controls="inventory" data-dt-idx="0" tabindex="0">Previous</a>
                    </li>
                    <li class="paginate_button active">
                        <a href="#" aria-controls="inventory" data-dt-idx="1" tabindex="0">1</a>
                    </li>
                    <li class="paginate_button ">
                        <a href="#" aria-controls="inventory" data-dt-idx="2" tabindex="0">2</a>
                    </li>
                    <li class="paginate_button ">
                        <a href="#" aria-controls="inventory" data-dt-idx="3" tabindex="0">3</a>
                    </li>
                    <li class="paginate_button ">
                        <a href="#" aria-controls="inventory" data-dt-idx="4" tabindex="0">4</a>
                    </li>
                    <li class="paginate_button ">
                        <a href="#" aria-controls="inventory" data-dt-idx="5" tabindex="0">5</a>
                    </li>
                    <li class="paginate_button ">
                        <a href="#" aria-controls="inventory" data-dt-idx="6" tabindex="0">6</a>
                    </li>
                    <li id="inventory_next" class="paginate_button next">
                        <a href="#" aria-controls="inventory" data-dt-idx="7" tabindex="0">Next</a>
                    </li>
                </ul>
            </div>
        </div>

    </div>
@endsection