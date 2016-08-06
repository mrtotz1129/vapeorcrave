@extends('layouts.app')

@section('sidebar')

@endsection()

@section('main-content')

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><label>Reports</label></h3>
                </div>

                <div class="box-body">

                    <label>Date Range</label>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <p>From</p>
                                <div class='input-group date' id='datetimepicker6'>
                                    <input type='date' class="form-control" />
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <p>To</p>
                                <div class='input-group date' id='datetimepicker7'>
                                    <input type='date' class="form-control" />
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                </div>
                            </div>
                        </div>
                        <script type="text/javascript">
                            $(function () {
                                $('#datetimepicker6').datetimepicker();
                                $('#datetimepicker7').datetimepicker({
                                    useCurrent: false //Important! See issue #1075
                                });
                                $("#datetimepicker6").on("dp.change", function (e) {
                                    $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
                                });
                                $("#datetimepicker7").on("dp.change", function (e) {
                                    $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
                                });
                            });
                        </script>
                    </div>

                    <div id="inventory_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row">
                            <div class="col-md-4">
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
                            <div class="col-md-4 col-md-push-5">
                                <div id="inventory_filter" class="dataTables_filter">
                                    <label>
                                        Search:
                                        <input class="form-control input-sm" type="search" placeholder="" aria-controls="inventory">
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <table id="inventory" class="table table-bordered table-striped dataTable" role="grid" aria-describedBy="inventory_info">
                                    <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="inventory" rowspan="1" colspan="1" style="width: 130px;" aria-sort="ascending" aria-label="ItemID: activate to sort column descending">Date time</th>
                                        <th class="sorting" tabindex="0" aria-controls="inventory" rowspan="1" colspan="1" style="width: 210px;" aria-label="AssetCode: activate to sort column ascending">Category</th>
                                        <th class="sorting" tabindex="0" aria-controls="inventory" rowspan="1" colspan="1" style="width: 194px;" aria-label="NewAssetCode: activate to sort column ascending">Brand</th>
                                        <th class="sorting" tabindex="0" aria-controls="inventory" rowspan="1" colspan="1" style="width: 154px;" aria-label="Original Location: activate to sort column ascending">Item Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="inventory" rowspan="1" colspan="1" style="width: 111px;" aria-label="Equipment: activate to sort column ascending">Quantity</th>
                                        <th class="sorting" tabindex="0" aria-controls="inventory" rowspan="1" colspan="1" style="width: 111px;" aria-label="Division: activate to sort column ascending">Price</th>
                                        <th class="sorting" tabindex="0" aria-controls="inventory" rowspan="1" colspan="1" style="width: 180px;" aria-label="Department: activate to sort column ascending">Available Stocks</th>
                                        <th class="sorting" tabindex="0" aria-controls="inventory" rowspan="1" colspan="1" style="width: 111px;" aria-label="Status: activate to sort column ascending">Location</th>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><p>00001</p></td>
                                        <td><p>Wolves</p></td>
                                        <td><p>E-Juice</p></td>
                                        <td><p>Watermelon</p></td>
                                        <td><p>3</p></td>
                                        <td><p>250</p></td>
                                        <td><p>50</p></td>
                                        <td><p>Cubao</p></td>
                                    </tr>
                                    <tr>
                                        <td><p>00002</p></td>
                                        <td><p>Wolves</p></td>
                                        <td><p>E-Juice</p></td>
                                        <td><p>Earthmelon</p></td>
                                        <td><p>3</p></td>
                                        <td><p>250</p></td>
                                        <td><p>50</p></td>
                                        <td><p>Cubao</p></td>
                                    </tr>
                                    <tr>
                                        <td><p>00003</p></td>
                                        <td><p>Wolves</p></td>
                                        <td><p>E-Juice</p></td>
                                        <td><p>Windmelon</p></td>
                                        <td><p>3</p></td>
                                        <td><p>250</p></td>
                                        <td><p>50</p></td>
                                        <td><p>Cubao</p></td>
                                    </tr>
                                    <tr>
                                        <td><p>00004</p></td>
                                        <td><p>Wolves</p></td>
                                        <td><p>E-Juice</p></td>
                                        <td><p>Airrmelon</p></td>
                                        <td><p>3</p></td>
                                        <td><p>250</p></td>
                                        <td><p>50</p></td>
                                        <td><p>Cubao</p></td>
                                    </tr>
                                    <tr>
                                        <td><p>00005</p></td>
                                        <td><p>Wolves</p></td>
                                        <td><p>E-Juice</p></td>
                                        <td><p>Watermelon</p></td>
                                        <td><p>3</p></td>
                                        <td><p>250</p></td>
                                        <td><p>50</p></td>
                                        <td><p>Cubao</p></td>
                                    </tr>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th  style="width: 130px;" >Date time</th>
                                        <th  style="width: 210px;" >Category</th>
                                        <th  style="width: 194px;" >Brand</th>
                                        <th  style="width: 154px;" >Item Name</th>
                                        <th  style="width: 111px;" >Quantity</th>
                                        <th  style="width: 111px;" >Price</th>
                                        <th  style="width: 180px;" >Available Stocks</th>
                                        <th  style="width: 111px;" >Location</th>
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
            </div>
        </div>
    </div>

    <script>
        $('#datetimepicker').data("DateTimePicker").FUNCTION()
    </script>
@endsection