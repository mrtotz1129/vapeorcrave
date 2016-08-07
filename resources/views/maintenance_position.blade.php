@extends('layouts.app')

@section('sidebar')

@endsection

@section('main-content')

<script type="text/javascript" src="{!! asset('/position/controller.js') !!}"></script>

<div ng-controller='ctrl.position'>
    <div class="row">
        <div class="col-md-4">
            <div class="box box-success collapsed-box">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Position</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" type="button">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <form ng-submit='savePosition()'>
                        <div class="form-group">
                            <label for="position">Position Type</label>
                            <input ng-model='newPosition.str_position_name' type="text" class="form-control" id="position" placeholder="Position Type">
                        </div>
                        <div class="form-group">
                            <label for="userAccess">User Access</label>
                            <input ng-model='newPosition.int_user_access' type="number" class="form-control" id="userAccess" placeholder="User Access">
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <table id="inventory" class="table table-bordered table-bordered dataTable" role="grid" aria-describedBy="inventory_info">
                <thead>
                    <th class="sorting" tabindex="0" aria-controls="inventory" rowspan="1" colspan="1" style="width: 229px;" aria-label="AssetCode: activate to sort column ascending">Position Type</th>
                    <th class="sorting" tabindex="0" aria-controls="inventory" rowspan="1" colspan="1" style="width: 229px;" aria-label="AssetCode: activate to sort column ascending">User Access</th>
                    <th class="sorting" tabindex="0" aria-controls="inventory" rowspan="1" colspan="1" style="width: 194px;" aria-label="NewAssetCode: activate to sort column ascending">Option</th>
                </thead>
                <tbody>
                <tr ng-repeat="position in positions">
                    <td><p>@{{ position.str_position_name }}</p></td>
                    <td><p>@{{ position.int_user_access }}</p></td>
                    <td>
                        <a><button ng-click="getBrand(brand, $index)" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalUpdate">
                                <i class="glyphicon glyphicon-pencil"></i> Update</button></a>
                        <a><button ng-click="deletePosition(position, $index)" type="button" class="btn btn-danger">
                                <i class="glyphicon glyphicon-trash"></i> Delete</button></a>
                    </td>
                </tr>
                </tbody>
                <tfoot></tfoot>
            </table>
        </div>

    </div>

</div>
@endsection