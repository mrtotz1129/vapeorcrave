@extends('layouts.app')

@section('sidebar')

@endsection

@section('main-content')
    <script src="{!! asset('/volume/controller.js') !!}"></script>

    <div ng-controller="ctrl.volume">
        <div class="row">
            <div class="col-md-4">
                <form ng-submit="saveVolume()" autocomplete="off">
                    <div class="form-group">
                        <label for="product_volume">Volume</label>
                        <input ng-model="newVolume.str_volume_name" type="text" class="form-control" id="product_volume" placeholder="Volume">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>

            <div class="col-md-8">
                <table class="table table-hover">
                    <thead>
                    <th data-field="product_volume">Volume</th>
                    <th data-field="settings">Options</th>
                    </thead>

                    <tbody>
                    <tr ng-repeat="volume in volumes">
                        <td><p>@{{ volume.str_volume_name }}</p></td>
                        <td><a><button ng-click="getVolume(volume, $index)" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalUpdate">
                                    <i class="glyphicon glyphicon-trash"></i>Update</button></a>
                            <a><button ng-click="deleteVolume(volume, $index)" type="button" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i>Delete</button></a></td>
                    </tr>
                    </tbody>
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
                                <label for="product_volume">Volume</label>
                                <input ng-model="updateVolume.str_volume_name" type="text" class="form-control" id="product_volume" placeholder="Volume">
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