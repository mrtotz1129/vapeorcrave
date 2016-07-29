
@extends('layouts.app')

@section('sidebar')

@endsection

@section('main-content')
    <div class="row">
        <h4>Manual Search</h4>
        <div class="col-md-12">
            <select>
                <select ng-model="newProduct.int_volume_id_fk" class="form-control">
                    <option value="" disabled>Volume</option>
                    <option ng-repeat="volume in volumes" value="@{{ volume.int_volume_id }}">@{{ volume.str_volume_name }}</option>
                </select>
            </select>
        </div>
    </div>

    <div class="row">
        <h4>Point of Sales</h4>
        <div class="col-md-6">
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
        <div class="col-md-6">
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
                <tfoot></tfoot>
            </table>
        </div>
    </div>
@endsection