@extends('layouts.app')

@section('sidebar')

@endsection()

@section('main-content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <h5>Filters</h5>
            </div>
            <div class="col-md-5">
                <h5><label>Select a particular period of time</label></h5>
            </div>
        </div>
        <div class="row">
                <div class="col-md-2">
                    <br>
                    <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            Monthly
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <span>From</span>
                    <div class="form-group">
                        <div class='input-group date' id='datetimepicker1'>
                            <input type='text' class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                        </div>
                    </div>
                    <script type="text/javascript">
                        $(function () {
                            $('#datetimepicker1').datetimepicker();
                        });
                    </script>
                </div>
                <div class="col-md-3">
                    <span>To</span>
                    <div class="form-group">
                        <div class='input-group date' id='datetimepicker1'>
                            <input type='text' class="form-control" />
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                        </div>
                    </div>
                    <script type="text/javascript">
                        $(function () {
                            $('#datetimepicker1').datetimepicker();
                        });
                    </script>
                </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md">
                <table class="table table-bordered">
                    <thead>
                    <th data-field="">Date time</th>
                    <th data-field="">Transaction No</th>
                    <th data-field="">Item No</th>
                    <th data-field="">Item Name</th>
                    <th data-field="">Quantity</th>
                    <th data-field="">Remaining Stocks</th>
                    <th data-field="">Price</th>
                    </thead>
                    <tbody>
                    <tr>
                        <td>01/01/2016</td>
                        <td>00001</td>
                        <td>00001</td>
                        <td>Quatro</td>
                        <td>3</td>
                        <td>27</td>
                        <td>900.00</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-push-8">Total Amount Price</div>
            <div class="col-md-3 col-md-push-6"><input></div>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-push-8">Reference Number</div>
            <div class="col-md-3 col-md-push-6"><input></div>
        </div>
        </div>
@endsection