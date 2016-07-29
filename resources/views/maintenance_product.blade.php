@extends('layouts.app')

@section('sidebar')

@endsection

@section('main-content')
    <script src="{!! asset('/product/controller.js') !!}"></script>

    <div ng-controller="ctrl.product">
        <div class="row">
            <div class="col-md-4">
                <form ng-submit="saveProduct()" autocomplete="off">
                    <div class="form-group">
                        <select ng-model="newProduct.int_category_id_fk" class="form-control">
                            <option value="" disabled>Category</option>
                            <option ng-repeat="category in categories" value="@{{ category.int_category_id }}">@{{ category.str_category_name }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select ng-model="newProduct.int_brand_id_fk" class="form-control">
                            <option value="" disabled>Brand</option>
                            <option ng-repeat="brand in brands" value="@{{ brand.int_brand_id }}">@{{ brand.str_brand_name }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="product_name">Name</label>
                        <input ng-model="newProduct.str_product_name" type="text" class="form-control" id="product_name" placeholder="Product Name">
                    </div>
                    <div class="input-group">
                        <label for="product_price">Price</label>
                        <span class="input-group-addon">P</span>
                        <input ng-model="newProduct.deci_price" id="product_price" type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                        <span class="input-group-addon">.00</span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <input type="file" id="exampleInputFile">
                        <p class="help-block">Choose a picture for the product</p>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <select ng-model="newProduct.int_volume_id_fk" class="form-control">
                                    <option value="" disabled>Volume</option>
                                    <option ng-repeat="volume in volumes" value="@{{ volume.int_volume_id }}">@{{ volume.str_volume_name }}</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <select ng-model="newProduct.int_nicotine_id_fk" class="form-control">
                                    <option value="" disabled>Nicotine</option>
                                    <option ng-repeat="nicotine in nicotines" value="@{{ nicotine.int_nicotine_id }}">@{{ nicotine.int_nicotine_level }}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>

            <div class="col-md-8">
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
                    <tfoot></tfoot>
                </table>
            </div>

        </div>

        <div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Update Brand</h4>
                    </div>
                    <form ng-submit="saveUpdate()" autocomplete="off">
                        <div class="modal-body">
                            <div class="form-group">
                                <select ng-model="updateProduct.int_category_id_fk" class="form-control">
                                    <option value="" disabled>Category</option>
                                    <option ng-repeat="category in categories" value="@{{ category.int_category_id }}">@{{ category.str_category_name }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select ng-model="updateProduct.int_brand_id_fk" class="form-control">
                                    <option value="" disabled>Brand</option>
                                    <option ng-repeat="brand in brands" value="@{{ brand.int_brand_id }}">@{{ brand.str_brand_name }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="product_name">Name</label>
                                <input ng-model="updateProduct.str_product_name" type="text" class="form-control" id="product_name" placeholder="Product Name">
                            </div>
                            <div class="input-group">
                                <label for="product_price">Price</label>
                                <span class="input-group-addon">P</span>
                                <input ng-model="updateProduct.deci_price" id="product_price" type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                                <span class="input-group-addon">.00</span>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">File input</label>
                                <input type="file" id="exampleInputFile">
                                <p class="help-block">Choose a picture for the product</p>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <select ng-model="updateProduct.int_volume_id_fk" class="form-control">
                                            <option value="" disabled>Volume</option>
                                            <option ng-repeat="volume in volumes" value="@{{ volume.int_volume_id }}">@{{ volume.str_volume_name }}</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <select ng-model="updateProduct.int_nicotine_id_fk" class="form-control">
                                            <option value="" disabled>Nicotine</option>
                                            <option ng-repeat="nicotine in nicotines" value="@{{ nicotine.int_nicotine_id }}">@{{ nicotine.int_nicotine_level }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" value="Submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection