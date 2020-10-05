@extends('admin.layout.index')
@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
<style>
    .card-header,.card{
    border-radius: 0 !important;
}
.filter-toggle{
    background: #F4F4F4;
    display: flex;
    padding: 10px 30px;
    padding-top: 1rem;
    justify-content: space-between;
    border: 1px solid;
    border-color: #e9e9e9;
}
.filter-body {
    margin: 1rem;
}
.far-number-kw{
    text-align: center;
}
.number-kw{
    font-size: 20px;
}
.db_block{
    display: block;
}
/* .filter-header{
content: "\f106";
    font-family: "FontAwesome";
    position: absolute;
    right: 15px;
    top: 50%;
    transform: translateY(-50%);
} */
</style>
<div class="content-i" style="width: 100%">
<div class="content-box">
    <div class="row">
        <div class="col-sm-12 col-xxxl-9">
            <div class="element-wrapper">
                <h6 class="element-header">
                    Site Inspection Detail
                </h6>
                <div class="element-box">
                    <div class="filter-side">
                        <div class="filter-w">
                            <div class="filter-toggle">
                                <h6 class="filter-header">
                                    Basic
                                </h6>
                                <i class="os-icon-minus os-icon"></i>
                            </div>
                            <div class="filter-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Average Monthly Usage in kWh</label><input class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Potential Install area (shadow free in SQFT)</label><input class="form-control" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Average Sun Hours</label><input class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Bill Offset</label><input class="ion-range-slider" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div>Capture Location: <button class="btn btn-primary">Cature</button></div>
                                <div class="far-number-kw">Estimated System Size <br><div class="number-kw">0 kW</div></div>
                            </div>
                        </div>
                        <div class="filter-w">
                            <div class="filter-toggle">
                                <h6 class="filter-header">
                                    Design
                                </h6>
                                <i class="os-icon-minus os-icon"></i>
                            </div>
                            <div class="filter-body">
                                <div>Panel Array (Installation)<button class="btn btn-primary">DRAW</button></div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Small Leg (in IN)</label><input class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Large Leg (in IN)</label><input class="form-control" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Number of Rows</label><input class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Approx Panel to Inverter Length (in meters)</label><input class="form-control" type="text">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="filter-w">
                        <div class="filter-toggle">
                            <h6 class="filter-header">
                                Design
                            </h6>
                            <i class="os-icon-minus os-icon"></i>
                        </div>
                        <div class="filter-body">
                            <div class="far-number-kw">Total Project Cost (includes 2 years of AMC) <br><div class="number-kw">Rs. 0</div></div>
                            <div class="">
                                <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a aria-expanded="false" class="nav-link active" data-toggle="tab" href="#tab_cash">Cash</a>
                                </li>
                                <li class="nav-item">
                                    <a aria-expanded="false" class="nav-link" data-toggle="tab" href="#tab_emi">EMI</a>
                                </li>
                                </ul><br>
                                <div class="tab-content">
                                    <div class="container tab-pane in active" id="tab_cash">
                                        <div>
                                            <label for="">Approx Panel to Inverter Length (in meters)</label><input class="form-control" type="text">
                                            <div class="">Remaining<br><div class="number-kw">Rs. 0</div></div>
                                        </div>
                                    </div>
                                    <div class="container tab-pane fade" id="tab_emi">
                                        <div>
                                            <label for="">Down Payment</label><input class="form-control" type="text">
                                            <div class="form-group">
                                                <label for="">No. of Months</label><input class="ion-range-slider" type="text">
                                            </div>
                                            <label for="">Interest (est.)</label><input class="form-control" type="text">
                                            <label for="">EMI:</label>
                                            <div class="number-kw">Rs. 0</div>
                                            <label for="">Existing Home Loan</label>
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                                <label class="custom-control-label" for="customSwitch1"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="filter-w">
                        <div class="filter-toggle">
                            <h6 class="filter-header">
                                Documents
                            </h6>
                            <i class="os-icon-minus os-icon"></i>
                        </div>
                        <div class="filter-body">
                            <div>
                                <label class="db_block">No. of Months</label>
                                <input type="button" value="Upload" class="btn btn-primary upload">
                            </div>
                            <div>
                                <label class="db_block">Document - 2</label>
                                <input type="button" value="Upload" class="btn btn-primary upload">
                            </div>
                            <div>
                                <label class="db_block">Document - 3</label>
                                <input type="button" value="Upload" class="btn btn-primary upload">
                            </div>
                        </div>
                        </div>
                        <div class="filter-w collapsed">
                            <div class="filter-toggle">
                                <h6 class="filter-header">
                                    Site Picture
                                </h6>
                                <i class="os-icon-minus os-icon"></i>
                            </div>
                            <div class="filter-body">
                                <div>
                                    <label class="db_block">Panel Area</label>
                                    <input type="button" value="Upload" class="btn btn-primary upload">
                                </div>
                                <div>
                                    <label  class="db_block">Inverter Area</label>
                                    <input type="button" value="Upload" class="btn btn-primary upload">
                                </div>
                                <div>
                                    <label class="db_block">Wiring Path Video</label>
                                    <input type="button" value="Upload" class="btn btn-primary upload">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection