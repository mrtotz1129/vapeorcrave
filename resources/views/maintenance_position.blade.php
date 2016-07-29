@extends('layouts.app')

@section('sidebar')

@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-4">
            <form>
                <div class="form-group">
                    <label for="position">Position Type</label>
                    <input type="text" class="form-control" id="position" placeholder="Position Type">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>

        <div class="col-md-8">
            <table id="inventory" class="table table-bordered table-bordered dataTable" role="grid" aria-describedBy="inventory_info">
                <thead>
                <tr role="row">
                    <th class="sorting" tabindex="0" aria-controls="inventory" rowspan="1" colspan="1" style="width: 229px;" aria-label="AssetCode: activate to sort column ascending">Position Type</th>
                    <th class="sorting" tabindex="0" aria-controls="inventory" rowspan="1" colspan="1" style="width: 194px;" aria-label="NewAssetCode: activate to sort column ascending">Option</th>
                </thead>
                <tbody>
                <tr ng-repeat="brand in brands">
                    <td><p>@{{ brand.str_brand_name }}</p></td>
                    <td>
                        <a><button ng-click="getBrand(brand, $index)" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalUpdate">
                                <i class="glyphicon glyphicon-pencil"></i> Update</button></a>
                        <a><button ng-click="deleteBrand(brand, $index)" type="button" class="btn btn-danger">
                                <i class="glyphicon glyphicon-trash"></i> Delete</button></a>
                    </td>
                </tr>
                </tbody>
                <tfoot></tfoot>
            </table>
        </div>

    </div>

@endsection