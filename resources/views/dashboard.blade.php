@extends('layouts.app')

@section('htmlheader_title')
    Dashboard
@endsection


@section('main-content')


        <div class=row>
            <div class="col-md-6">
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
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="info-box bg-black">
                            <span class="info-box-icon bg-green">
                            <i class="fa fa-usd"></i>
                            </span>
                            <div class="info-box-content">
                                <span class="info-box-text">Item Sold</span>
                                <span class="info-box-number">41,410</span>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 30%"></div>
                                </div>
                                <span class="progress-description"> 70% Increase in 30 Days </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
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
                </div>
            </div>

            <div class="col-md-6">
                <div class="box box-success" style="position: relative; left: 0px; top: 0px;">
                    <div class="box-header ui-sortable-handle bg-green" style="cursor: move;">
                        <i class="fa fa-exclamation"></i>
                        <h3 class="box-title">Stocks Running Low</h3>
                        <div class="box-tools pull-right">
                            <ul class="pagination pagination-sm inline">
                                <li>
                                    <a href="#">«</a>
                                </li>
                                <li>
                                    <a href="#">1</a>
                                </li>
                                <li>
                                    <a href="#">2</a>
                                </li>
                                <li>
                                    <a href="#">3</a>
                                </li>
                                <li>
                                    <a href="#">»</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="box-body">
                        <ul class="todo-list ui-sortable">
                            <li>
                                <span class="handle ui-sortable-handle">
                                    <i class="fa fa-ellipsis-v"></i>
                                    <i class="fa fa-ellipsis-v"></i>
                                </span>
                                <input type="checkbox" value="">
                                    <span class="text">Watermelon</span>
                                    <small class="label label-danger">
                                        10 available stocks
                                    </small>
                                    <div class="tools">
                                        <i class="fa fa-edit"></i>
                                        <i class="fa fa-trash-o"></i>
                                    </div>
                            </li>
                            <li>
                                <span class="handle ui-sortable-handle">
                                    <i class="fa fa-ellipsis-v"></i>
                                    <i class="fa fa-ellipsis-v"></i>
                                </span>
                                <input type="checkbox" value="">
                                    <span class="text">Lucifer</span>
                                    <small class="label label-danger">
                                        3 available stocks
                                    </small>
                                    <div class="tools">
                                        <i class="fa fa-edit"></i>
                                        <i class="fa fa-trash-o"></i>
                                    </div>
                            </li>
                            <li>
                                <span class="handle ui-sortable-handle">
                                    <i class="fa fa-ellipsis-v"></i>
                                    <i class="fa fa-ellipsis-v"></i>
                                </span>
                                <input type="checkbox" value="">
                                    <span class="text">Drips Ahoy</span>
                                    <small class="label label-danger">
                                        5 available stocks
                                    </small>
                                    <div class="tools">
                                        <i class="fa fa-edit"></i>
                                        <i class="fa fa-trash-o"></i>
                                    </div>
                            </li>
                        </ul>
                    </div>
                    <div class="box-footer clearfix no-border">
                        <button class="btn btn-success pull-right" type="button">
                            <i class="fa fa-plus"></i>
                            Add Stocks
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="box box-success">
                    <div class="box-header with-border bg-green">
                        <i class="fa fa-plus-square"></i>
                        <h3 class="box-title">Recently Added Products</h3>
                        <div class="box-tools pull-right">
                            <button class="btn bg-green btn-sm" data-widget="collapse" type="button">
                                <i class="fa fa-minus"></i>
                            </button>
                            <button class="btn bg-green btn-sm" data-widget="remove" type="button">
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

            <div class="col-md-6">
                <div class="box box-solid bg-teal-gradient" style="position: relative; left: 0px; top: 0px;">
                    <div class="box-header ui-sortable-handle bg-green" style="cursor: move;">
                        <i class="fa fa-money"></i>
                        <h3 class="box-title">Top Sellers</h3>
                        <div class="box-tools pull-right">
                            <button class="btn bg-green btn-sm" data-widget="collapse" type="button">
                                <i class="fa fa-minus"></i>
                            </button>
                            <button class="btn bg-green btn-sm" data-widget="remove" type="button">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body border-radius-none bg-black">
                        <div id="line-chart" class="chart" style="height: 250px;">
                            <svg height="250" version="1.1" width="416" xmlns="http://www.w3.org/2000/svg" style="overflow: hidden; position: relative; left: -0.75px; top: -0.383362px;">
                                <desc>Created with Raphaël 2.1.0</desc>
                                <defs>
                                    <text style="text-anchor: end; font: 10px Open Sans;" x="43.5" y="213" text-anchor="end" font="10px "Arial"" stroke="none" fill="#ffffff" font-size="10px" font-family="Open Sans" font-weight="normal">
                                    <tspan dy="3.5">0</tspan>
                                    </text>
                                    <path style="" fill="none" stroke="#efefef" d="M56,213H391" stroke-width="0.4">
                                        <text style="text-anchor: end; font: 10px Open Sans;" x="43.5" y="166" text-anchor="end" font="10px "Arial"" stroke="none" fill="#ffffff" font-size="10px" font-family="Open Sans" font-weight="normal">
                                        <tspan dy="3.5">5,000</tspan>
                                        </text>
                                        <path style="" fill="none" stroke="#efefef" d="M56,166H391" stroke-width="0.4">
                                            <text style="text-anchor: end; font: 10px Open Sans;" x="43.5" y="119" text-anchor="end" font="10px "Arial"" stroke="none" fill="#ffffff" font-size="10px" font-family="Open Sans" font-weight="normal">
                                            <tspan dy="3.5">10,000</tspan>
                                            </text>
                                            <path style="" fill="none" stroke="#efefef" d="M56,119H391" stroke-width="0.4">
                                                <text style="text-anchor: end; font: 10px Open Sans;" x="43.5" y="72" text-anchor="end" font="10px "Arial"" stroke="none" fill="#ffffff" font-size="10px" font-family="Open Sans" font-weight="normal">
                                                <tspan dy="3.5">15,000</tspan>
                                                </text>
                                                <path style="" fill="none" stroke="#efefef" d="M56,72H391" stroke-width="0.4">
                                                    <text style="text-anchor: end; font: 10px Open Sans;" x="43.5" y="25" text-anchor="end" font="10px "Arial"" stroke="none" fill="#ffffff" font-size="10px" font-family="Open Sans" font-weight="normal">
                                                    <tspan dy="3.5">20,000</tspan>
                                                    </text>
                                                    <path style="" fill="none" stroke="#efefef" d="M56,25H391" stroke-width="0.4">
                                                        <text style="text-anchor: middle; font: 10px Open Sans;" x="329.53584447144596" y="225.5" text-anchor="middle" font="10px "Arial"" stroke="none" fill="#ffffff" font-size="10px" font-family="Open Sans" font-weight="normal" transform="matrix(1,0,0,1,0,6)">
                                                        <tspan dy="3.5">2013</tspan>
                                                        </text>
                                                        <text style="text-anchor: middle; font: 10px Open Sans;" x="180.55650060753342" y="225.5" text-anchor="middle" font="10px "Arial"" stroke="none" fill="#ffffff" font-size="10px" font-family="Open Sans" font-weight="normal" transform="matrix(1,0,0,1,0,6)">
                                                        <tspan dy="3.5">2012</tspan>
                                                        </text>
                                                        <path style="" fill="none" stroke="#efefef" d="M56,187.93959999999998C65.36208991494533,187.6764,84.08626974483596,189.52585,93.44835965978129,186.8868C102.81044957472662,184.24775,121.53462940461725,167.99562513661203,130.89671931956258,166.8272C140.15704738760633,165.67147513661203,158.67770352369382,179.82035,167.93803159173757,177.59019999999998C177.19835965978132,175.36004999999997,195.71901579586878,151.209806284153,204.97934386391253,148.986C214.34143377885786,146.737756284153,233.0656136087485,157.36375,242.42770352369382,159.702C251.78979343863915,162.04025000000001,270.5139732685298,178.80089945355192,279.87606318347514,167.692C289.1363912515189,156.70384945355192,307.6570473876063,78.24561187845302,316.9173754556501,71.31379999999999C326.07594167679224,64.45816187845301,344.3930741190766,104.82477417582416,353.55164034021874,112.5422C362.91373025516407,120.43112417582417,381.63791008505467,128.43994999999998,391,133.73919999999998" stroke-width="2">
                                                            <circle cx="56" cy="187.93959999999998" r="4" fill="#efefef" stroke="#efefef" style="" stroke-width="1">
                                                                <circle cx="93.44835965978129" cy="186.8868" r="4" fill="#efefef" stroke="#efefef" style="" stroke-width="1">
                                                                    <circle cx="130.89671931956258" cy="166.8272" r="4" fill="#efefef" stroke="#efefef" style="" stroke-width="1">
                                                                        <circle cx="167.93803159173757" cy="177.59019999999998" r="4" fill="#efefef" stroke="#efefef" style="" stroke-width="1">
                                                                            <circle cx="204.97934386391253" cy="148.986" r="4" fill="#efefef" stroke="#efefef" style="" stroke-width="1">
                                                                                <circle cx="242.42770352369382" cy="159.702" r="4" fill="#efefef" stroke="#efefef" style="" stroke-width="1">
                                                                                    <circle cx="279.87606318347514" cy="167.692" r="4" fill="#efefef" stroke="#efefef" style="" stroke-width="1">
                                                                                        <circle cx="316.9173754556501" cy="71.31379999999999" r="4" fill="#efefef" stroke="#efefef" style="" stroke-width="1">
                                                                                            <circle cx="353.55164034021874" cy="112.5422" r="4" fill="#efefef" stroke="#efefef" style="" stroke-width="1">
                                                                                                <circle cx="391" cy="133.73919999999998" r="4" fill="#efefef" stroke="#efefef" style="" stroke-width="1">
                            </svg>
                            <div class="morris-hover morris-default-style" style="left: 46.9484px; top: 112px; display: none;">
                                <div class="morris-hover-row-label">2011 Q2</div>
                                <div class="morris-hover-point" style="color: #efefef"> Item 1: 2,778 </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer no-border">
                        <div class="row">
                            <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                                <div style="display:inline;width:60px;height:60px;">
                                    <canvas width="60" height="60"></canvas>
                                    <input class="knob" type="text" data-fgcolor="#39CCCC" data-height="60" data-width="60" value="20" data-readonly="true" readonly="readonly" style="width: 34px; height: 20px; position: absolute; vertical-align: middle; margin-top: 20px; margin-left: -47px; border: 0px none; background: transparent none repeat scroll 0% 0%; font: bold 12px Arial; text-align: center; color: rgb(57, 204, 204); padding: 0px;">
                                </div>
                                <div class="knob-label">Accesories</div>
                            </div>
                            <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                                <div style="display:inline;width:60px;height:60px;">
                                    <canvas width="60" height="60"></canvas>
                                    <input class="knob" type="text" data-fgcolor="#39CCCC" data-height="60" data-width="60" value="50" data-readonly="true" readonly="readonly" style="width: 34px; height: 20px; position: absolute; vertical-align: middle; margin-top: 20px; margin-left: -47px; border: 0px none; background: transparent none repeat scroll 0% 0%; font: bold 12px Arial; text-align: center; color: rgb(57, 204, 204); padding: 0px;">
                                </div>
                                <div class="knob-label">E-Juice</div>
                            </div>
                            <div class="col-xs-4 text-center">
                                <div style="display:inline;width:60px;height:60px;">
                                    <canvas width="60" height="60"></canvas>
                                    <input class="knob" type="text" data-fgcolor="#39CCCC" data-height="60" data-width="60" value="30" data-readonly="true" readonly="readonly" style="width: 34px; height: 20px; position: absolute; vertical-align: middle; margin-top: 20px; margin-left: -47px; border: 0px none; background: transparent none repeat scroll 0% 0%; font: bold 12px Arial; text-align: center; color: rgb(57, 204, 204); padding: 0px;">
                                </div>
                                <div class="knob-label">Mod</div>
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