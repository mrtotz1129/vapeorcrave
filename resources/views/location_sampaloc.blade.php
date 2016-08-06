@extends('layouts.app')

@section('sidebar')

@endsection

@section('main-content')

    <h4><label>Sampaloc Branch</label></h4>
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
                <div class="col-md-12">
                    <table id="inventory" class="table table-bordered table-striped dataTable" role="grid" aria-describedBy="inventory_info">
                        <thead>
                        <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="inventory" rowspan="1" colspan="1" style="width: 130px;" aria-sort="ascending" aria-label="ItemID: activate to sort column descending">Brand</th>
                            <th class="sorting" tabindex="0" aria-controls="inventory" rowspan="1" colspan="1" style="width: 210px;" aria-label="AssetCode: activate to sort column ascending">Category</th>
                            <th class="sorting" tabindex="0" aria-controls="inventory" rowspan="1" colspan="1" style="width: 154px;" aria-label="Original Location: activate to sort column ascending">Item No.</th>
                            <th class="sorting" tabindex="0" aria-controls="inventory" rowspan="1" colspan="1" style="width: 111px;" aria-label="Equipment: activate to sort column ascending">Item Name</th>
                            <th class="sorting" tabindex="0" aria-controls="inventory" rowspan="1" colspan="1" style="width: 111px;" aria-label="Division: activate to sort column ascending">Volume</th>
                            <th class="sorting" tabindex="0" aria-controls="inventory" rowspan="1" colspan="1" style="width: 180px;" aria-label="Department: activate to sort column ascending">Nicotine Level</th>
                            <th class="sorting" tabindex="0" aria-controls="inventory" rowspan="1" colspan="1" style="width: 111px;" aria-label="Status: activate to sort column ascending">Price</th>
                            <th class="sorting" tabindex="0" aria-controls="inventory" rowspan="1" colspan="1" style="width: 111px;" aria-label="Status: activate to sort column ascending">Remaining Stocks</th>
                        </thead>
                        <tbody>
                        <tr>
                            <td><p>Wolves</p></td>
                            <td><p>E-Juice</p></td>
                            <td><p>00001</p></td>
                            <td><p>Watermelon</p></td>
                            <td><p>3</p></td>
                            <td><p>250</p></td>
                            <td><p>P50.00</p></td>
                            <td><p>20</p></td>
                        </tr>
                        <tr>
                            <td><p>Wolves</p></td>
                            <td><p>E-Juice</p></td>
                            <td><p>00002</p></td>
                            <td><p>Earthmelon</p></td>
                            <td><p>3</p></td>
                            <td><p>250</p></td>
                            <td><p>P50.00</p></td>
                            <td><p>20</p></td>
                        </tr>
                        <tr>
                            <td><p>Wolves</p></td>
                            <td><p>E-Juice</p></td>
                            <td><p>00003</p></td>
                            <td><p>Windmelon</p></td>
                            <td><p>3</p></td>
                            <td><p>250</p></td>
                            <td><p>P50.00</p></td>
                            <td><p>20</p></td>
                        </tr>
                        <tr>
                            <td><p>Wolves</p></td>
                            <td><p>E-Juice</p></td>
                            <td><p>00004</p></td>
                            <td><p>Airrmelon</p></td>
                            <td><p>3</p></td>
                            <td><p>250</p></td>
                            <td><p>P50.00</p></td>
                            <td><p>20</p></td>
                        </tr>
                        <tr>
                            <td><p>Wolves</p></td>
                            <td><p>E-Juice</p></td>
                            <td><p>00005</p></td>
                            <td><p>Watermelon</p></td>
                            <td><p>3</p></td>
                            <td><p>250</p></td>
                            <td><p>P50.00</p></td>
                            <td><p>20</p></td>
                        </tr>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th  style="width: 130px;" >Brand</th>
                            <th  style="width: 210px;" >Category</th>
                            <th  style="width: 194px;" >Item No.</th>
                            <th  style="width: 154px;" >Item Name</th>
                            <th  style="width: 111px;" >Volume</th>
                            <th  style="width: 111px;" >Nicotine Level</th>
                            <th  style="width: 180px;" >Price</th>
                            <th  style="width: 111px;" >Remaining Stocks</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <div id="inventory_info" class="dataTables_info" role="status" aria-live="polite">
                        Showing 1 to 10 of 100 entries
                    </div>
                </div>

                <div class="col-md-5 col-md-push-3">
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
@endsection