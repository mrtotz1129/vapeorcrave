@extends('layouts.app')

@section('sidebar')

@endsection

@section('main-content')
    <script src="{!! asset('/pos/controller.js') !!}"></script>

    <h4><label>Point of Sales</label></h4>
    <div ng-controller="ctrl.pos">
        <h4>Manual Search</h4>
        <div class="row">
            <div class="col-md-2">
                <select ng-model="newProduct.int_volume_id_fk" class="form-control">
                    <option value="" disabled>Brand</option>
                    <option ng-repeat="volume in volumes" value="@{{ volume.int_volume_id }}">@{{ volume.str_volume_name }}</option>
                </select>
            </div>
            <div class="col-md-2">
                <select ng-model="newProduct.int_volume_id_fk" class="form-control">
                    <option value="" disabled>Category</option>
                    <option ng-repeat="volume in volumes" value="@{{ volume.int_volume_id }}">@{{ volume.str_volume_name }}</option>
                </select>
            </div>
            <div class="col-md-2">
                <select ng-model="newProduct.int_volume_id_fk" class="form-control">
                    <option value="" disabled>Product Name</option>
                    <option ng-repeat="volume in volumes" value="@{{ volume.int_volume_id }}">@{{ volume.str_volume_name }}</option>
                </select>
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <!-- Default panel contents -->
                    <div class="panel-heading">List of Products</div>
                        <div id="inventory_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                            <br>
                            <div class="row">
                                <div class="col-sm-6">
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
                                <div class="col-sm-6 col-md-push-2">
                                    <div id="inventory_filter" class="dataTables_filter">
                                        <label>
                                            Search:
                                            <input class="form-control input-sm" type="search" placeholder="" aria-controls="inventory">
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <table id="inventory" class="table table-bordered table-responsive dataTable" role="grid" aria-describedBy="inventory_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting" tabindex="0" aria-controls="inventory" rowspan="1" colspan="1" style="width: 111px;" aria-label="AssetCode: activate to sort column ascending">Brand Name</th>
                                            <th class="sorting" tabindex="0" aria-controls="inventory" rowspan="1" colspan="1" style="width: 111px;" aria-label="NewAssetCode: activate to sort column ascending">Product Name</th>
                                            <th class="sorting" tabindex="0" aria-controls="inventory" rowspan="1" colspan="1" style="width: 154px;" aria-label="Original Location: activate to sort column ascending">Category</th>
                                            <th class="sorting" tabindex="0" aria-controls="inventory" rowspan="1" colspan="1" style="width: 111px;" aria-label="Equipment: activate to sort column ascending">Volume</th>
                                            <th class="sorting" tabindex="0" aria-controls="inventory" rowspan="1" colspan="1" style="width: 111px;" aria-label="Division: activate to sort column ascending">Nicotine Level</th>
                                            <th class="sorting" tabindex="0" aria-controls="inventory" rowspan="1" colspan="1" style="width: 111px;" aria-label="Division: activate to sort column ascending">Available Stocks</th>
                                            <th class="sorting" tabindex="0" aria-controls="inventory" rowspan="1" colspan="1" style="width: 111px;" aria-label="Department: activate to sort column ascending">Price</th>
                                            <th class="sorting" tabindex="0" aria-controls="inventory" rowspan="1" colspan="1" style="width: 111px;" aria-label="Status: activate to sort column ascending">Options</th>
                                        </thead>
                                        <tbody>
                                        <tr ng-repeat="product in products">
                                            <td><p>@{{ product.str_brand_name }}</p></td>
                                            <td><p>@{{ product.str_product_name }}</p></td>
                                            <td><p>@{{ product.str_category_name }}</p></td>
                                            <td><p>@{{ product.str_volume_name }}</p></td>
                                            <td><p>@{{ product.int_nicotine_level }}</p></td>
                                            <td><p>@{{ product.int_current_value }}</p></td>
                                            <td><p>@{{ product.deci_price | currency: 'P' }}</p></td>
                                            <td><a><button ng-click="openAddToCart(product, $index)" type="button" class="btn btn-warning" data-toggle="modal" data-target="#addToCart">
                                                        <i class="glyphicon glyphicon-shopping-cart"></i> Add to Cart</button></a></td>
                                        </tr>
                                        </tbody>
                                        <tfoot>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-5">
                                    <div id="inventory_info" class="dataTables_info" role="status" aria-live="polite">
                                        Showing 1 to 10 of 100 entries
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8 col-md-push-6">
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
                        </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Cart</h3>
                    </div>
                    <div class="box-body">
                        <div id="inventory_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">

                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <table id="inventory" class="table table-bordered table-responsive dataTable" role="grid" aria-describedBy="inventory_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting" tabindex="0" aria-controls="inventory" rowspan="1" colspan="1" style="width: 194px;" aria-label="NewAssetCode: activate to sort column ascending">Product Desc</th>
                                            <th class="sorting" tabindex="0" aria-controls="inventory" rowspan="1" colspan="1" style="width: 111px;" aria-label="Department: activate to sort column ascending">Total Price</th>
                                            <th class="sorting" tabindex="0" aria-controls="inventory" rowspan="1" colspan="1" style="width: 111px;" aria-label="Department: activate to sort column ascending">Quantity</th>
                                            <th class="sorting" tabindex="0" aria-controls="inventory" rowspan="1" colspan="1" style="width: 111px;" aria-label="Status: activate to sort column ascending">Options</th>
                                        </thead>
                                        <tbody>
                                        <tr ng-repeat="product in cartProducts">
                                            <td><p>@{{ product.str_product_name }}</p></td>
                                            <td><p>@{{ product.deci_price * product.int_quantity | currency: 'P' }}</p></td>
                                            <td><p>@{{ product.int_quantity }}</p></td>
                                            <td><a><button ng-click="deleteProduct(product, $index)" type="button" class="btn btn-danger" data-toggle="modal" data-target="#removeToCart">
                                                        <i class="glyphicon glyphicon-trash"></i></button></a></td>
                                        </tr>
                                        </tbody>
                                        <tfoot>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>

                            <a><button ng-click="checkOut()" type="button" class="btn btn-success" data-toggle="modal" data-target="#checkoutmodal">
                                    <i class="glyphicon glyphicon-ok"></i> Checkout</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="addToCart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Add Item to Cart</h4>
                    </div>
                    <form ng-submit="addToCart()" autocomplete="off">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-5">
                                    <p>Brand Name</p>
                                    <p>Product Name</p>
                                    <p>Category</p>
                                    <p>Volume</p>
                                    <p>Nicotine Level</p>
                                    <p>Price</p>
                                    <p>Quantity</p>
                                </div>
                                <div class="col-md-7">
                                    <p>@{{ addToCartProduct.str_brand_name }}</p>
                                    <p>@{{ addToCartProduct.str_product_name }}</p>
                                    <p>@{{ addToCartProduct.str_category_name }}</p>
                                    <p>@{{ addToCartProduct.str_volume_name }}</p>
                                    <p>@{{ addToCartProduct.int_nicotine_level }}</p>
                                    <p>@{{ addToCartProduct.deci_price | currency : 'P' }}</p>
                                    <input ng-model="addToCartProduct.int_quantity" ui-number-mask="0" type="text" class="col-md-8" id="quantity" placeholder="Enter Quantity">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-5">
                                    <p>Total Price</p>
                                </div>
                                <div class="col-md-7">
                                    <p>@{{ addToCartProduct.int_quantity * addToCartProduct.deci_price | currency : 'P' }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" value="Submit" class="btn btn-warning">Add to Cart</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="removeToCart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Add Item to Cart</h4>
                    </div>
                    <form ng-submit="addToCart()" autocomplete="off">
                        <div class="modal-body">
                            <div class="row">
                                <div class=col-md-6>
                                    <label for="quantity">Select Quantity</label>
                                    <input id="quantity">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" value="Submit" class="btn btn-warning">Remove to Cart</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="checkoutmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Official Receipt</h4>
                    </div>
                    <form ng-submit="processPayment()" autocomplete="off">
                        <div class="modal-body">
                            <div class="row">
                                <table id="inventory" class="table table-bordered table-responsive dataTable" role="grid" aria-describedBy="inventory_info">
                                    <thead>
                                    <tr role="row">
                                        <th class="sorting" tabindex="0" aria-controls="inventory" rowspan="1" colspan="1" style="width: 194px;" aria-label="NewAssetCode: activate to sort column ascending">Product Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="inventory" rowspan="1" colspan="1" style="width: 111px;" aria-label="Department: activate to sort column ascending">Quantity</th>
                                        <th class="sorting" tabindex="0" aria-controls="inventory" rowspan="1" colspan="1" style="width: 111px;" aria-label="Department: activate to sort column ascending">Total Price</th>
                                    </thead>
                                    <tbody>
                                    <tr ng-repeat="product in cartProducts">
                                        <td><p>@{{ product.str_product_name }}</p></td>
                                        <td><p>@{{ product.int_quantity }}</p></td>
                                        <td><p>@{{ product.deci_price * product.int_quantity | currency: 'P' }}</p></td>
                                    </tr>
                                    </tbody>
                                    <tfoot>
                                    </tfoot>
                                </table>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <p>Discount</p>
                                </div>
                                <div class="col-md-6">
                                    <input ng-model="checkout.deci_amount_paid" class="col-md-12" ui-number-mask="2" type="text" placeholder="5%">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <p>Grand Price</p>
                                </div>
                                <div class="col-md-6">
                                    <p>@{{ deciTotalPrice | currency : 'P' }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <p>Cash Amount</p>
                                </div>
                                <div class="col-md-6">
                                    <input ng-model="checkout.deci_amount_paid" class="col-md-12" ui-number-mask="2" type="text" placeholder="00.00">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" value="Submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

@endsection