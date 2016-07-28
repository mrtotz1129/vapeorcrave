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
                            Select Brand
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
                    <label for="product_name">Name</label>
                    <input type="integer" class="form-control" id="product_name" placeholder="Product Name">
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <input type="file" id="exampleInputFile">
                    <p class="help-block">Choose a picture for the product</p>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="dropdown">
                                <button class="btn btn-default dropdown-toggle" type="button" id="dropdown-volume" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    Select Volume
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdown-volume">
                                    <li><a href="#">30mL</a></li>
                                    <li><a href="#">50mL</a></li>
                                    <li><a href="#">90mL</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="dropdown">
                                <button class="btn btn-default dropdown-toggle" type="button" id="dropdown-nicotine" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    Select Nicotine Level
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdown-nicotine">
                                    <li><a href="#">0</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">5</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>

        <div class="col-md-8">
            <table class="table table-hover">
                <thead>
                <th data-field="brand_logo">Logo</th>
                <th data-field="product_brand">Brand Name</th>
                <th data-field="product_name">Product Name</th>
                <th data-field="product_category">Category</th>
                <th data-field="product_volume">Volume</th>
                <th data-field="product_nicotine">Nicotine Level</th>
                <th data-field="settings">Options</th>
                </thead>

                <tbody>
                <tr>
                    <td><img src="img/logo1.png" alt="" class="img-circle" height="60" width="60"></td>
                    <td><p>White Wolves</p></td>
                    <td><p>Nerdy Watermelon</p></td>
                    <td><p>E-Juice</p></td>
                    <td><p>30mL</p></td>
                    <td><p>0</p></td>
                    <td><a><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalUpdate">
                                <i class="glyphicon glyphicon-trash"></i>Update</button></a>
                        <a><button type="button" class="btn btn-danger">
                                <i class="glyphicon glyphicon-trash"></i>Delete</button></a></td>
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
                <form ng-submit="saveUpdate()">
                    <div class="modal-body">
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
                                    Select Brand
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
                            <label for="product_name">Name</label>
                            <input type="integer" class="form-control" id="product_name" placeholder="Product Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">File input</label>
                            <input type="file" id="exampleInputFile">
                            <p class="help-block">Choose a picture for the product</p>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="dropdown">
                                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdown-volume" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            Select Volume
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdown-volume">
                                            <li><a href="#">30mL</a></li>
                                            <li><a href="#">50mL</a></li>
                                            <li><a href="#">90mL</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="dropdown">
                                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdown-nicotine" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            Select Nicotine Level
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdown-nicotine">
                                            <li><a href="#">0</a></li>
                                            <li><a href="#">3</a></li>
                                            <li><a href="#">5</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
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

@endsection