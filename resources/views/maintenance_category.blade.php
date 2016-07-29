@extends('layouts.app')

@section('sidebar')

@endsection

@section('main-content')
    <script src="{!! asset('/category/controller.js') !!}"></script>

    <div ng-controller="ctrl.category">
        <div class="row">
            <div class="col-md-4">
                <form ng-submit="saveCategory()" autocomplete="off">
                    <div class="form-group">
                        <label for="category_name">Category Name</label>
                        <input ng-model="newCategory.str_category_name" type="text" class="form-control" id="category_name" placeholder="Category Name">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>
            <div class="col-md-8">
                <div class="col-md-8">
                    <table class="table table-hover">
                        <thead>
                        <th data-field="product_volume">Category Name</th>
                        <th data-field="settings">Options</th>
                        </thead>

                        <tbody>
                        <tr ng-repeat="category in categories">
                            <td><p>@{{ category.str_category_name }}</p></td>
                            <td><a><button ng-click="getCategory(category, $index)" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalUpdate">
                                        <i class="glyphicon glyphicon-trash"></i>Update</button></a>
                                <a><button ng-click="deleteCategory(category, $index)" type="button" class="btn btn-danger">
                                        <i class="glyphicon glyphicon-trash"></i>Delete</button></a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
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
                                <label for="category_name">Category Name</label>
                                <input ng-model="updateCategory.str_category_name" type="text" class="form-control" id="category_name" placeholder="Category Name">
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