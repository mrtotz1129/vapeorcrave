@extends('layouts.app')

@section('sidebar')

@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-4">
            <div class="box box-success collapsed-box">
                <div class="box-header with-border">
                    <h3 class="box-title">Add User</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" type="button">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <form>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Fullname">
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label for="passwor">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <select ng-model="newProduct.int_nicotine_id_fk" class="form-control">
                                <option value="" disabled>Postion Type</option>
                                <option ng-repeat="nicotine in nicotines" value="@{{ nicotine.int_nicotine_id }}">@{{ nicotine.int_nicotine_level }}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select ng-model="newProduct.int_nicotine_id_fk" class="form-control">
                                <option value="" disabled>Branch</option>
                                <option ng-repeat="nicotine in nicotines" value="@{{ nicotine.int_nicotine_id }}">@{{ nicotine.int_nicotine_level }}</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <table id="inventory" class="table table-bordered table-responsive dataTable" role="grid" aria-describedBy="inventory_info">
                <thead>
                <tr role="row">
                    <th class="sorting_asc" tabindex="0" aria-controls="inventory" rowspan="1" colspan="1" style="width: 180px;" aria-sort="ascending" aria-label="ItemID: activate to sort column descending">Name</th>
                    <th class="sorting" tabindex="0" aria-controls="inventory" rowspan="1" colspan="1" style="width: 229px;" aria-label="AssetCode: activate to sort column ascending">Email</th>
                    <th class="sorting" tabindex="0" aria-controls="inventory" rowspan="1" colspan="1" style="width: 194px;" aria-label="NewAssetCode: activate to sort column ascending">Username</th>
                    <th class="sorting" tabindex="0" aria-controls="inventory" rowspan="1" colspan="1" style="width: 154px;" aria-label="Original Location: activate to sort column ascending">Position Type</th>
                    <th class="sorting" tabindex="0" aria-controls="inventory" rowspan="1" colspan="1" style="width: 111px;" aria-label="Equipment: activate to sort column ascending">Branch</th>
                    <th class="sorting" tabindex="0" aria-controls="inventory" rowspan="1" colspan="1" style="width: 111px;" aria-label="Division: activate to sort column ascending">Option</th>
                </thead>
                <tbody>
                    <tr ng-repeat="brand in brands">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><p>@{{ brand.str_brand_name }}</p></td>
                        <td></td>
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
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Fullname">
                            </div>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <label for="passwor">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <select ng-model="newProduct.int_nicotine_id_fk" class="form-control">
                                    <option value="" disabled>Postion Type</option>
                                    <option ng-repeat="nicotine in nicotines" value="@{{ nicotine.int_nicotine_id }}">@{{ nicotine.int_nicotine_level }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select ng-model="newProduct.int_nicotine_id_fk" class="form-control">
                                    <option value="" disabled>Branch</option>
                                    <option ng-repeat="nicotine in nicotines" value="@{{ nicotine.int_nicotine_id }}">@{{ nicotine.int_nicotine_level }}</option>
                                </select>
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

