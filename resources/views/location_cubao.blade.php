@extends('layouts.app')

@section('sidebar')

@endsection

@section('main-content')

    <h4><label>Cubao Branch</label></h4>
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
    </div>

    <br>

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
                <th data-field="">Remaining Stocks</th>
                <th data-field="">Location</th>
                </thead>
                <tbody>
                <tr>
                    <td><p>Watermelon</p></td>
                    <td><p>E-Juice</p></td>
                    <td>00001</td>
                    <td>Watermelon</td>
                    <td>30mL</td>
                    <td>0</td>
                    <td>250.00</td>
                    <td>50</td>
                    <td>Cubao</td>
                </tr>
                </tbody>
            </table>
        </div>


        <div class="col-md-5">
            <div id="inventory_info" class="dataTables_info" role="status" aria-live="polite">
                Showing 1 to 10 of 100 entries
            </div>
        </div>

        <div class="col-md-8 col-md-offset-3">
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