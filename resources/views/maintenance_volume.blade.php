@extends('layouts.app')

@section('sidebar')

@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-4">
            <form>
                <div class="form-group">
                    <label for="product_volume">Volume</label>
                    <input type="integer" class="form-control" id="product_volume" placeholder="Volume">
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
                <tr>
                    <td><p>30mL</p></td>
                    <td><a><button type="button" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i>Delete</button></a></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection