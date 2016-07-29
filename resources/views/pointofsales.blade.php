
@extends('layouts.app')

@section('sidebar')

@endsection

@section('main-content')
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
        <div class="col-md-6">
        <div class="row responsive">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">List of Products</h3>
                    </div>
                    <div class="box-body">
                        <div id="inventory_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
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
                                <div class="col-sm-6">
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
                                            <th class="sorting_asc" tabindex="0" aria-controls="inventory" rowspan="1" colspan="1" style="width: 180px;" aria-sort="ascending" aria-label="ItemID: activate to sort column descending">Logo</th>
                                            <th class="sorting" tabindex="0" aria-controls="inventory" rowspan="1" colspan="1" style="width: 229px;" aria-label="AssetCode: activate to sort column ascending">Brand Name</th>
                                            <th class="sorting" tabindex="0" aria-controls="inventory" rowspan="1" colspan="1" style="width: 194px;" aria-label="NewAssetCode: activate to sort column ascending">Product Name</th>
                                            <th class="sorting" tabindex="0" aria-controls="inventory" rowspan="1" colspan="1" style="width: 154px;" aria-label="Original Location: activate to sort column ascending">Category</th>
                                            <th class="sorting" tabindex="0" aria-controls="inventory" rowspan="1" colspan="1" style="width: 111px;" aria-label="Equipment: activate to sort column ascending">Volume</th>
                                            <th class="sorting" tabindex="0" aria-controls="inventory" rowspan="1" colspan="1" style="width: 111px;" aria-label="Division: activate to sort column ascending">Nicotine Level</th>
                                            <th class="sorting" tabindex="0" aria-controls="inventory" rowspan="1" colspan="1" style="width: 111px;" aria-label="Department: activate to sort column ascending">Price</th>
                                            <th class="sorting" tabindex="0" aria-controls="inventory" rowspan="1" colspan="1" style="width: 111px;" aria-label="Status: activate to sort column ascending">Options</th>
                                        </thead>
                                        <tbody>
                                        <tr ng-repeat="product in products">
                                            <td><img src="img/logo1.png" alt="" class="img-circle" height="60" width="60"></td>
                                            <td><p>@{{ product.str_brand_name }}</p></td>
                                            <td><p>@{{ product.str_product_name }}</p></td>
                                            <td><p>@{{ product.str_category_name }}</p></td>
                                            <td><p>@{{ product.str_volume_name }}</p></td>
                                            <td><p>@{{ product.int_nicotine_level }}</p></td>
                                            <td><p>@{{ product.deci_price | currency: 'P' }}</p></td>
                                            <td><a><button ng-click="getProduct(product, $index)" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalUpdate">
                                                        <i class="glyphicon glyphicon-pencil"></i> Update</button></a>
                                                <a><button ng-click="deleteProduct(product, $index)" type="button" class="btn btn-danger">
                                                        <i class="glyphicon glyphicon-trash"></i> Delete</button></a></td>
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
                                <div class="col-md-8 col-md-offset-2">
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
            </div>
        </div>
        <div class="col-md-6">
            <div class="row responsive">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Cart</h3>
                    </div>
                    <div class="box-body">
                        <div id="inventory_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
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
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <table id="inventory" class="table table-bordered table-responsive dataTable" role="grid" aria-describedBy="inventory_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="inventory" rowspan="1" colspan="1" style="width: 180px;" aria-sort="ascending" aria-label="ItemID: activate to sort column descending">Logo</th>
                                            <th class="sorting" tabindex="0" aria-controls="inventory" rowspan="1" colspan="1" style="width: 229px;" aria-label="AssetCode: activate to sort column ascending">Brand Name</th>
                                            <th class="sorting" tabindex="0" aria-controls="inventory" rowspan="1" colspan="1" style="width: 194px;" aria-label="NewAssetCode: activate to sort column ascending">Product Name</th>
                                            <th class="sorting" tabindex="0" aria-controls="inventory" rowspan="1" colspan="1" style="width: 154px;" aria-label="Original Location: activate to sort column ascending">Category</th>
                                            <th class="sorting" tabindex="0" aria-controls="inventory" rowspan="1" colspan="1" style="width: 111px;" aria-label="Equipment: activate to sort column ascending">Volume</th>
                                            <th class="sorting" tabindex="0" aria-controls="inventory" rowspan="1" colspan="1" style="width: 111px;" aria-label="Division: activate to sort column ascending">Nicotine Level</th>
                                            <th class="sorting" tabindex="0" aria-controls="inventory" rowspan="1" colspan="1" style="width: 111px;" aria-label="Department: activate to sort column ascending">Price</th>
                                            <th class="sorting" tabindex="0" aria-controls="inventory" rowspan="1" colspan="1" style="width: 111px;" aria-label="Department: activate to sort column ascending">Quantity</th>
                                            <th class="sorting" tabindex="0" aria-controls="inventory" rowspan="1" colspan="1" style="width: 111px;" aria-label="Status: activate to sort column ascending">Options</th>
                                        </thead>
                                        <tbody>
                                        <tr ng-repeat="product in products">
                                            <td><img src="img/logo1.png" alt="" class="img-circle" height="60" width="60"></td>
                                            <td><p>@{{ product.str_brand_name }}</p></td>
                                            <td><p>@{{ product.str_product_name }}</p></td>
                                            <td><p>@{{ product.str_category_name }}</p></td>
                                            <td><p>@{{ product.str_volume_name }}</p></td>
                                            <td><p>@{{ product.int_nicotine_level }}</p></td>
                                            <td><p>@{{ product.deci_price | currency: 'P' }}</p></td>
                                            <td><p>10</p></td>
                                            <td><a><button ng-click="getProduct(product, $index)" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalUpdate">
                                                        <i class="glyphicon glyphicon-pencil"></i> Update</button></a>
                                                <a><button ng-click="deleteProduct(product, $index)" type="button" class="btn btn-danger">
                                                        <i class="glyphicon glyphicon-trash"></i> Delete</button></a></td>
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
                                <div class="col-md-8 col-md-offset-2">
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
                            <a><button ng-click="getCategory(category, $index)" type="button" class="btn btn-success" data-toggle="modal" data-target="#modalUpdate">
                                    <i class="glyphicon glyphicon-ok"></i> Checkout</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection