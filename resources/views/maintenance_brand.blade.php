@extends('layouts.app')

@section('sidebar')

@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-4">
            <form>
                <div class="form-group">
                    <label for="product_brand">Brand</label>
                    <input type="integer" class="form-control" id="product_brand" placeholder="Product Brand">
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <input type="file" id="exampleInputFile">
                    <p class="help-block">Choose a logo for the brand</p>
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>

        <div class="col-md-8">
            <table class="table table-hover">
                <thead>
                    <th data-field="brand_logo">Logo</th>
                    <th data-field="brand_name">Brand Name</th>
                    <th data-field="settings">Options</th>
                </thead>

                <tbody>
                    <tr>
                        <td><img src="img/logo1.png" alt="" class="img-circle" height="60" width="60"></td>
                        <td><p>White Wolves</p></td>
                        <td><a><button type="button" class="btn btn-danger">
                                    <i class="glyphicon glyphicon-trash"></i>Delete</button></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection