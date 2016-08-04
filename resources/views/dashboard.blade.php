@extends('layouts.app')

@section('htmlheader_title')
    Dashboard
@endsection


@section('main-content')

        <div class="row">
            <div class="col-md-7">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Recently Added Products</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse" type="button">
                                <i class="fa fa-minus"></i>
                            </button>
                            <button class="btn btn-box-tool" data-widget="remove" type="button">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">
                        <ul class="products-list product-list-in-box">
                            <li class="item">
                                <div class="product-img">
                                    <img alt="Product Image" src="dist/img/default-50x50.gif">
                                </div>
                                <div class="product-info">
                                    <a class="product-title" href="javascript:void(0)">
                                        Lucifer
                                        <span class="label label-warning pull-right">$1800</span>
                                    </a>
                                    <span class="product-description"> Samsung 32" 1080p 60Hz LED Smart HDTV. </span>
                                </div>
                            </li>
                            <li class="item">
                                <div class="product-img">
                                    <img alt="Product Image" src="dist/img/default-50x50.gif">
                                </div>
                                <div class="product-info">
                                    <a class="product-title" href="javascript:void(0)">
                                        Bicycle
                                        <span class="label label-info pull-right">$700</span>
                                    </a>
                                    <span class="product-description"> 26" Mongoose Dolomite Men's 7-speed, Navy Blue. </span>
                                </div>
                            </li>
                            <li class="item">
                                <div class="product-img">
                                    <img alt="Product Image" src="dist/img/default-50x50.gif">
                                </div>
                                <div class="product-info">
                                    <a class="product-title" href="javascript:void(0)">
                                        Xbox One
                                        <span class="label label-danger pull-right">$350</span>
                                    </a>
                                    <span class="product-description"> Xbox One Console Bundle with Halo Master Chief Collection. </span>
                                </div>
                            </li>
                            <li class="item">
                                <div class="product-img">
                                    <img alt="Product Image" src="dist/img/default-50x50.gif">
                                </div>
                                <div class="product-info">
                                    <a class="product-title" href="javascript:void(0)">
                                        PlayStation 4
                                        <span class="label label-success pull-right">$399</span>
                                    </a>
                                    <span class="product-description"> PlayStation 4 500GB Console (PS4) </span>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="box-footer text-center">
                        <a class="uppercase" href="javascript:void(0)">View All Products</a>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="info-box bg-black">
                            <span class="info-box-icon bg-green">
                            <i class="fa fa-bar-chart"></i>
                            </span>
                            <div class="info-box-content">
                                <span class="info-box-text">Sales</span>
                                <span class="info-box-number">41,410</span>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 70%"></div>
                                </div>
                                <span class="progress-description"> 70% Increase in 30 Days </span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="info-box bg-black">
                            <span class="info-box-icon bg-green">
                            <i class="fa fa-tags"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Inventory</span>
                                <span class="info-box-number">250</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="info-box bg-black">
                            <span class="info-box-icon bg-green">
                                <i class="fa fa-usd"></i>
                            </span>
                            <div class="info-box-content">
                                <span class="info-box-text">Items Sold</span>
                                <span class="info-box-number">3,652</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Monthly Recap Report</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse" type="button">
                                <i class="fa fa-minus"></i>
                            </button>
                            <div class="btn-group">
                                <button class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown" type="button">
                                    <i class="fa fa-wrench"></i>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="#">Action</a>
                                    </li>
                                    <li>
                                        <a href="#">Another action</a>
                                    </li>
                                    <li>
                                        <a href="#">Something else here</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="#">Separated link</a>
                                    </li>
                                </ul>
                            </div>
                            <button class="btn btn-box-tool" data-widget="remove" type="button">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-8">
                                <p class="text-center">
                                    <strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>
                                </p>
                                <div class="chart">
                                    <canvas id="salesChart" style="height: 176px; width: 691px;" height="176" width="691"></canvas>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <p class="text-center">
                                    <strong>Goal Completion</strong>
                                </p>
                                <div class="progress-group">
                                    <span class="progress-text">Add Products to Cart</span>
                                    <span class="progress-number">
                                    <b>160</b>
                                    /200
                                    </span>
                                    <div class="progress sm">
                                        <div class="progress-bar progress-bar-aqua" style="width: 80%"></div>
                                    </div>
                                </div>
                                <div class="progress-group">
                                    <span class="progress-text">Complete Purchase</span>
                                    <span class="progress-number">
                                    <b>310</b>
                                    /400
                                    </span>
                                    <div class="progress sm">
                                        <div class="progress-bar progress-bar-red" style="width: 80%"></div>
                                    </div>
                                </div>
                                <div class="progress-group">
                                    <span class="progress-text">Send Inquiries</span>
                                    <span class="progress-number">
                                    <b>250</b>
                                    /500
                                    </span>
                                    <div class="progress sm">
                                        <div class="progress-bar progress-bar-yellow" style="width: 80%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <div class="row">
                            <div class="col-sm-3 col-xs-6">
                                <div class="description-block border-right">
                                <span class="description-percentage text-green">
                                <i class="fa fa-caret-up"></i>
                                17%
                                </span>
                                    <h5 class="description-header">$35,210.43</h5>
                                    <span class="description-text">TOTAL REVENUE</span>
                                </div>
                            </div>
                            <div class="col-sm-3 col-xs-6">
                                <div class="description-block border-right">
                                    <span class="description-percentage text-yellow">
                                    <i class="fa fa-caret-left"></i>
                                    0%
                                    </span>
                                    <h5 class="description-header">$10,390.90</h5>
                                    <span class="description-text">TOTAL COST</span>
                                </div>
                            </div>
                            <div class="col-sm-3 col-xs-6">
                                <div class="description-block border-right">
                                    <span class="description-percentage text-green">
                                    <i class="fa fa-caret-up"></i>
                                    20%
                                    </span>
                                    <h5 class="description-header">$24,813.53</h5>
                                    <span class="description-text">TOTAL PROFIT</span>
                                </div>
                            </div>
                            <div class="col-sm-3 col-xs-6">
                                <div class="description-block">
                                    <span class="description-percentage text-red">
                                    <i class="fa fa-caret-down"></i>
                                    18%
                                    </span>
                                    <h5 class="description-header">1200</h5>
                                    <span class="description-text">GOAL COMPLETIONS</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection