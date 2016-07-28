@extends('layouts.app')

@section('sidebar')

@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-4">
            <form>
                <div class="form-group">
                    <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            Select Category
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <li><a href="#">E-Juice</a></li>
                            <li><a href="#">Mod</a></li>
                            <li><a href="#">Accesories</a></li>
                            <li><a href="#">Batteries</a></li>
                        </ul>
                    </div>
                </div>
                <div class="form-group">
                    <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            Select Product
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <li><a href="#"></a></li>
                            <li><a href="#">Drips Ahoy</a></li>
                            <li><a href="#">White Wolves</a></li>
                        </ul>
                    </div>
                </div>
                <div class="form-group">
                    <label for="product_name">Product Price</label>
                    <input type="integer" class="form-control" id="product_name" placeholder="Suggested Retail Price">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
        <div class="col-md-8">
            <table class="table table-hover">
                <thead>
                <th data-field="product_name">Product Name</th>
                <th data-field="product_category">Category</th>
                <th data-field="product_price">SRP</th>
                <th data-field="settings">Options</th>
                </thead>

                <tbody>
                <tr>
                    <td><p>Nerdy Watermelon</p></td>
                    <td><p>E-Juice</p></td>
                    <td><p>$14.00</p></td>
                    <td><a><button type="button" class="btn btn-danger">
                                <i class="glyphicon glyphicon-trash"></i>Delete</button></a></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection