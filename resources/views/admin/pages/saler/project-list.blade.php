@extends('admin.layout.index')
@section('content')
    <div class="container">
        <br>
        <br>
        <br>
        <div class="row">
            <div class="col-7">
                <div class="rentals-list-w">
                    <div class="filter-side">
                        <div class="row">
                            <div class="col-8">
                                <p>Project ID-888</p>
                                <p style="color: #0a7cf8">Survey-111</p>
                            </div>
                            <div class="col-4">
                                <p>Effective System Size</p>
                                <h3>4 kW</h3>
                            </div>
                        </div>
                        <div class="filter-w">
                            <div class="filter-toggle">
                                <i class="os-icon os-icon-arrow-down4"></i>
                            </div>
                            <h6 class="filter-header">
                                DISCOM Application
                            </h6>
                            <div class="filter-body" style="display: block;">
                                <h4 style="color: #0a7cf8">Dowload Forms</h4>
                                <div class="right-retals">
                                    <p>Submitted<i class="icon-feather-check"></i></p>
                                    <p>Scheduled <i class="icon-feather-clock"></i></p>
                                    <p>Denied <i class="icon-feather-check"></i></p>
                                </div>
                                <div class="row">
                                    <div class="col-8">
                                        Application Submited
                                    </div>
                                    <div class="col-4">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="customSwitches">
                                            <label class="custom-control-label" for="customSwitches"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        Status
                                    </div>
                                    <div class="col-6">
                                        <select class="browser-default custom-select">
                                            <option selected>Open this select menu</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="filter-w">
                            <div class="filter-toggle">
                                <i class="os-icon os-icon-arrow-down4"></i>
                            </div>
                            <h6 class="filter-header">
                                Finance Application
                            </h6>
                            <div class="filter-body" style="display: block;">
                                <h4 style="color: #0a7cf8">Dowload Finance Package</h4>
                                <div class="right-retals">
                                    <p>Scheduled <i class="icon-feather-check"></i></p>
                                    <p>Completed<i style="color: green" class="icon-feather-check"></i></p>
                                    <p>Denied<i class="icon-feather-check"></i></p>
                                </div>
                                <div class="row">
                                    <div class="col-8">
                                        Application Submited
                                    </div>
                                    <div class="col-4">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="customSwitches">
                                            <label class="custom-control-label" for="customSwitches"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="filter-w">
                            <div class="filter-toggle">
                                <i class="os-icon os-icon-arrow-down4"></i>
                            </div>
                            <h6 class="filter-header">
                                Components
                            </h6>
                            <div class="filter-body" style="display: block;">
                                <div class="right-retals">
                                    <p>Ordered <i class="icon-feather-check"></i></p>
                                    <p>Received <i class="icon-feather-check"></i></p>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                    </div>
                                    <div class="col-3">Ordered</div>
                                    <div class="col-3">Received</div>
                                </div>
                                <div class="row">
                                    <div class="col-8">
                                        Panels
                                    </div>
                                    <div class="col-2">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="customSwitches">
                                            <label class="custom-control-label" for="customSwitches"></label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="customSwitches">
                                            <label class="custom-control-label" for="customSwitches"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8">
                                        Inverters
                                    </div>
                                    <div class="col-2">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="customSwitches">
                                            <label class="custom-control-label" for="customSwitches"></label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="customSwitches">
                                            <label class="custom-control-label" for="customSwitches"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8">
                                        Frame
                                    </div>
                                    <div class="col-2">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="customSwitches">
                                            <label class="custom-control-label" for="customSwitches"></label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="customSwitches">
                                            <label class="custom-control-label" for="customSwitches"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8">
                                        Wire
                                    </div>
                                    <div class="col-2">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="customSwitches">
                                            <label class="custom-control-label" for="customSwitches"></label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="customSwitches">
                                            <label class="custom-control-label" for="customSwitches"></label>
                                        </div>
                                    </div>
                                </div>
                                    <div class="row">
                                        <div class="col-8">
                                            Accessiores
                                        </div>
                                        <div class="col-2">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" id="customSwitches">
                                                <label class="custom-control-label" for="customSwitches"></label>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" id="customSwitches">
                                                <label class="custom-control-label" for="customSwitches"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="filter-w">
                                <div class="filter-toggle">
                                    <i class="os-icon os-icon-arrow-down4"></i>
                                </div>
                                <h6 class="filter-header">
                                    Installation
                                </h6>
                                <div class="filter-body" style="display: block;">
                                    <div class="right-retals">
                                        <p>Submitted <i class="icon-feather-check"></i></p>
                                        <p>Approved <i  style="color: green" class="icon-feather-check"></i></p>
                                        <p>Denied <i class="icon-feather-check"></i></p>
                                    </div>
                                    <div class="row">
                                        <div class="col-8">
                                            Assign Installer
                                        </div>
                                        <div class="col-4">
                                            <select name="" id=""></select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            Date Scheduled
                                        </div>
                                        <div class="col-6">
                                            <input type="text">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-8">
                                            Application Submited
                                        </div>
                                        <div class="col-4">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" id="customSwitches">
                                                <label class="custom-control-label" for="customSwitches"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="filter-w">
                                <div class="filter-toggle">
                                    <i class="os-icon os-icon-arrow-down4"></i>
                                </div>
                                <h6 class="filter-header">
                                    Compliance
                                </h6>
                                <div class="filter-body" style="display: block;">
                                    <div class="right-retals">
                                        <p>Submitted <i class="icon-feather-check"></i></p>
                                        <p>Approved <i class="icon-feather-clock"></i></p>
                                        <p>Denied<i class="icon-feather-clock"></i></p>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            Date Scheduled
                                        </div>
                                        <div class="col-6">
                                            <input type="text">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-8">
                                            Compliance Completed
                                        </div>
                                        <div class="col-4">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" id="customSwitches">
                                                <label class="custom-control-label" for="customSwitches"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="filter-w">
                                <div class="filter-toggle">
                                    <i class="os-icon os-icon-arrow-down4"></i>
                                </div>
                                <h6 class="filter-header">
                                    DISCOM Commisioning Aplication
                                </h6>
                                <div class="filter-body" style="display: block;">
                                    <div class="right-retals">
                                        <p>Submitted
                                            <i class="icon-feather-check"></i>
                                        </p>
                                        <p>Scheduled <i class="icon-feather-clock"></i></p>
                                    </div>
                                    <div class="row">
                                        <div class="col-8">
                                            Application Submited
                                        </div>
                                        <div class="col-4">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" id="customSwitches">
                                                <label class="custom-control-label" for="customSwitches"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            Date Scheduled
                                        </div>
                                        <div class="col-6">
                                            <input type="text">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="filter-w">
                                <div class="filter-toggle">
                                    <i class="os-icon os-icon-arrow-down4"></i>
                                </div>
                                <h6 class="filter-header">
                                    Commission
                                </h6>
                                <div class="filter-body" style="display: block;">
                                    <div class="right-retals">
                                        <p>Commmisioned <i style="color: green" class="icon-feather-check"></i></p>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            Commmisioned
                                        </div>
                                        <div class="col-6">
                                            <input type="text">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="right" style="background: #8080803d;-webkit-box-flex: 0;flex: 1 0 200px">
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection