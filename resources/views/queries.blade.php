@extends('layouts.app')

@section('side-bar')

@endsection

@section('main-content')

    <h5><label>Filters</label></h5>
    <div class="row">
        <div class="col-md-3">
            <select ng-model="newProduct.int_category_id_fk" class="form-control">
                <option value="" disabled>Category</option>
                <option ng-repeat="category in categories" value="@{{ category.int_category_id }}">@{{ category.str_category_name }}</option>
            </select>
        </div>
        <div class="col-md-3">
            <select ng-model="newProduct.int_category_id_fk" class="form-control">
                <option value="" disabled>Brand</option>
                <option ng-repeat="category in categories" value="@{{ category.int_category_id }}">@{{ category.str_category_name }}</option>
            </select>
        </div>
        <div class="col-md-3">
            <select ng-model="newProduct.int_category_id_fk" class="form-control">
                <option value="" disabled>Item Name</option>
                <option ng-repeat="category in categories" value="@{{ category.int_category_id }}">@{{ category.str_category_name }}</option>
            </select>
        </div>
        <div class="col-md-3">
            <select ng-model="newProduct.int_category_id_fk" class="form-control">
                <option value="" disabled>Location</option>
                <option ng-repeat="category in categories" value="@{{ category.int_category_id }}">@{{ category.str_category_name }}</option>
            </select>
        </div>
    </div>

    <br>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered table-responsive">
                <thead>
                    <th data-field="">Brand</th>
                    <th data-field="">Category</th>
                    <th data-field="">Item No.</th>
                    <th data-field="">Item Name</th>
                    <th data-field="">Volume</th>
                    <th data-field="">Nicotine Level</th>
                    <th data-field="">Price</th>
                    <th data-field="">Available Stocks</th>
                    <th data-field="">Location</th>
                </thead>
            </table>
            <tbody>
                <tr>
                    <td>White wolves</td>
                    <td>E-Juice</td>
                    <td>00001</td>
                    <td>Watermelon</td>
                    <td>30mL</td>
                    <td>0</td>
                    <td>250.00</td>
                    <td>50</td>
                    <td>Cubao</td>
                </tr>
            </tbody>
        </div>
    </div>

@endsection