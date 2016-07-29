@extends('layouts.app')

@section('sidebar')

@endsection

@section('main-content')
    <script src="{!! asset('/product/controller.js') !!}"></script>

    <div ng-controller="ctrl.product">
        <div class="row">
            <div class="col-md-4">
                <form>
                    <div class="form-group">
                        <select ng-model="newProduct.int_category_id_fk" class="form-control">
                            <option value="" disabled>Category</option>
                            <option ng-repeat="category in categories" value="category.int_category_id">@{{ category.str_category_name }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select ng-model="newProduct.int_brand_id_fk" class="form-control">
                            <option value="" disabled>Brand</option>
                            <option ng-repeat="brand in brands" value="brand.int_brand_id">@{{ brand.str_brand_name }}</option>
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
                                    <option ng-repeat="volume in volumes" value="volume.int_volume_id">@{{ volume.str_volume_name }}</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <select ng-model="newProduct.int_nicotine_id_fk" class="form-control">
                                    <option value="" disabled>Nicotine</option>
                                    <option ng-repeat="nicotine in nicotines" value="nicotine.int_nicotine_id">@{{ nicotine.int_nicotine_level }}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>

            <div class="col-md-8">
                <table class="table table-hover">
                    <thead>
                    <th data-field="brand_logo">Logo</th>
                    <th data-field="product_brand">Brand Name</th>
                    <th data-field="product_name">Product Name</th>
                    <th data-field="product_category">Category</th>
                    <th data-field="product_volume">Volume</th>
                    <th data-field="product_nicotine">Nicotine Level</th>
                    <th data-field="settings">Options</th>
                    </thead>

                    <tbody>
                    <tr>
                        <td><img src="img/logo1.png" alt="" class="img-circle" height="60" width="60"></td>
                        <td><p>White Wolves</p></td>
                        <td><p>Nerdy Watermelon</p></td>
                        <td><p>E-Juice</p></td>
                        <td><p>30mL</p></td>
                        <td><p>0</p></td>
                        <td><a><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalUpdate">
                                    <i class="glyphicon glyphicon-trash"></i>Update</button></a>
                            <a><button type="button" class="btn btn-danger">
                                    <i class="glyphicon glyphicon-trash"></i>Delete</button></a></td>
                    </tr>
                    </tbody>
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
                                    <option ng-repeat="category in categories" value="category.int_category_id">@{{ category.str_category_name }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select ng-model="updateProduct.int_brand_id_fk" class="form-control">
                                    <option value="" disabled>Brand</option>
                                    <option ng-repeat="brand in brands" value="brand.int_brand_id">@{{ brand.str_brand_name }}</option>
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
                                            <option ng-repeat="volume in volumes" value="volume.int_volume_id">@{{ volume.str_volume_name }}</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <select ng-model="updateProduct.int_nicotine_id_fk" class="form-control">
                                            <option value="" disabled>Nicotine</option>
                                            <option ng-repeat="nicotine in nicotines" value="nicotine.int_nicotine_id">@{{ nicotine.int_nicotine_level }}</option>
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