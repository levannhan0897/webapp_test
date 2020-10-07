@extends('admin.layout.index')
@section('content')
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
.icon-arrow-down{
    display: flex;
    align-items: center;
}
.fl-left{
    margin-left: 90%;
}
h6.filter-header {
    font-weight: 700;
}   
.filter-header::after {
    content:'\2713';
    display:inline-block;
    color:white;
    background-color: green;
    border-radius: 50%;
    margin-left: .5rem;
    padding:0 6px 0 0;
}
.modal-content.text-center {
    height: 34rem;
}
input#favcolor {
    height: 2.5rem;
    width: 6rem;
    margin: 1rem;
}
.controller-draw {
    width: 100%;
    /* margin-top: -16rem; */
    text-align: left;
}
.color-controller {
    display: flex;
    align-items: center;
}
.size-draw {
    margin-right: 1rem;
}
.size-control {
    margin-top: 1rem;
}
.udr {
    margin: 1rem 0;
    margin-right: 1rem;
}
.undo,.upload,.dowload,.clear,.repo{
    width: 100%;
}
.clear {
    margin-top: 1rem;
    width: 100%;
}
.upload-dow {
    display: flex;
}
.upload-dow-save{
    margin-top: 1rem;
    margin-right: 1rem;
}
.save {
    margin-top: 1rem;
    width: 100%;
}
/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
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
                        <div class="filter-w basic">
                            <div class="filter-toggle">
                                <h6 class="filter-header">
                                    Basic
                                </h6>
                                    <i class="icon-arrow-down"></i>
                            </div>
                            <div class="filter-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Average Monthly Usage in kWh</label><input class="form-control" name="average_monthly_usage" type="number">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Potential Install area (shadow free in SQFT)</label><input class="form-control" name="potential_install_area" type="number">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Average Sun Hours</label><input class="form-control" name="average_sun_hours" type="number">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Bill Offset</label><input class="ion-range-slider" name="bill_offset" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div>Capture Location: <button class="btn btn-primary">Cature</button></div>
                                <div class="far-number-kw">Estimated System Size <br><div class="number-kw" id="system_size">0</div><span>Kw</span></div>
                            </div>
                        </div>
                        <div class="filter-w">
                            <div class="filter-toggle">
                                <h6 class="filter-header">
                                    Design
                                </h6>
                                <i class="icon-arrow-down"></i>
                            </div>
                            <div class="filter-body">
                                <div>Panel Array (Installation)<button class="btn btn-primary" data-backdrop="static" data-keyboard="false" data-target="#drawSlideModal" data-toggle="modal" >DRAW</button></div>
                                <div aria-hidden="true" class="onboarding-modal modal fade animated" id="drawSlideModal" role="dialog" tabindex="-1">
                                    <div class="modal-dialog modal-lg modal-centered" role="document">
                                      <div class="modal-content text-center">
                                        <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span class="os-icon os-icon-close"></span></button>
                                        <div class="onboarding-side-by-side">
                                          <div class="onboarding-media">
                                              <h3>Design Panel</h3>
                                            <canvas id="myCanvas" width="500" height="400" style="border:2px solid #a7a7a7; margin: 0 2rem; border-radius: .5rem;"></canvas>
                                          </div>
                                          <div class="controller-draw">
                                            <div>Set Line Color</div>
                                            <div class="color-controller">
                                                <input type="text" class="form-control" id="value-color" value="">
                                                <input type="color" id="favcolor" name="favcolor" value="#ff0000"><br><br>
                                            </div>
                                            <div class="size-draw">
                                                <div>Set Line Size</div>
                                                <input type="text" class="form-control size-control">
                                            </div>
                                            <div class="udr">
                                                <div class="ur" style="display: flex">
                                                    <input type="button" value="Undo" class="btn btn-primary undo">
                                                    <input type="button" value="Repo" class="btn btn-primary repo">
                                                </div>
                                                <input type="button" value="Clear" class="btn btn-primary clear">
                                            </div>
                                            <div style="text-align: center">Read and write sketchpad data</div>
                                            <div class="upload-dow-save">
                                            <div class="upload-dow">
                                                <input type="button" value="Upload" class="btn btn-primary upload">
                                                <input type="button" value="Dowload" class="btn btn-primary dowload">
                                            </div>
                                            <input type="button" value="Save" class="btn btn-primary save">
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Small Leg (in IN)</label><input class="form-control" name="small_leg" type="number">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Large Leg (in IN)</label><input class="form-control" name="large_leg" type="number">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Number of Rows</label><input class="form-control" name="number_of_rows" type="number">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Approx Panel to Inverter Length (in meters)</label><input class="form-control" name="inverter_length" type="number">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="filter-w">
                        <div class="filter-toggle">
                            <h6 class="filter-header">
                                Payment Plan
                            </h6>
                            <i class="icon-arrow-down"></i>
                        </div>
                        <div class="filter-body">
                            <div class="far-number-kw">Total Project Cost (includes 2 years of AMC) <br><div class="number-kw" id="tpc">Rs. 0</div></div>
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
                                            <label for="">Approx Panel to Inverter Length (in meters)</label><input class="form-control" name="deposit" type="number">
                                            <div class="">Remaining<br><div id="remaining" class="number-kw">Rs. 0</div></div>
                                        </div>
                                    </div>
                                    <div class="container tab-pane fade" id="tab_emi">
                                        <div>
                                            <label for="">Down Payment</label><input class="form-control" name="down_payment" type="number">
                                            <div class="form-group">
                                                <label for="">No. of Months</label><input class="ion-range-slider" name="of_months" type="text">
                                            </div>
                                            <label for="">Interest (est.)</label><input class="form-control" name="interest" type="number">
                                            <label for="">EMI:</label>
                                            <div class="number-kw">Rs. 0</div>
                                            <label for="">Existing Home Loan</label>
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" name="existing_home" id="customSwitch1">
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
                                <i class="icon-arrow-down"></i>
                        </div>
                        <div class="filter-body">
                            <div>
                                <label class="db_block">No. of Months</label>
                                <input type="button" value="Upload" class="btn btn-primary">
                                <input type="file" value="Upload" class="btn btn-primary" style="display: none">
                            </div>
                            <div>
                                <label class="db_block">Document - 2</label>
                                <input type="button" value="Upload" class="btn btn-primary">
                                <input type="file" value="Upload" class="btn btn-primary" style="display: none">
                            </div>
                            <div>
                                <label class="db_block">Document - 3</label>
                                <input type="button" value="Upload" class="btn btn-primary">
                                <input type="file" value="Upload" class="btn btn-primary" style="display: none">
                            </div>
                        </div>
                        </div>
                        <div class="filter-w">
                            <div class="filter-toggle">
                                <h6 class="filter-header">
                                    Site Picture
                                </h6>
                                <i class="icon-arrow-down"></i>
                            </div>
                            <div class="filter-body">
                                <div>
                                    <label class="db_block">Panel Area</label>
                                    <input type="button" value="Upload" class="btn btn-primary">
                                    <input type="file" value="Upload" class="btn btn-primary" style="display: none">
                                </div>
                                <div>
                                    <label  class="db_block">Inverter Area</label>
                                    <input type="button" value="Upload" class="btn btn-primary">
                                    <input type="file" value="Upload" class="btn btn-primary" style="display: none">
                                </div>
                                <div>
                                    <label class="db_block">Wiring Path Video</label>
                                    <input type="button" value="Upload" class="btn btn-primary">
                                    <input type="file" value="Upload" class="btn btn-primary" style="display: none">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <a href="#" class="btn btn-primary fl-left"> <i class="fa fa-angle-double-left" aria-hidden="true"></i> Back </a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function(){
        $('.filter-body').hide();
        $('.filter-w').addClass('collapsed');
        $('.filter-w').parent().find('.basic>.filter-body').slideDown();
        $('.basic').find('.icon-arrow-down').addClass('icon-arrow-up');
        $('.filter-toggle').on('click', function(){
            $(this).parent().siblings().find('.filter-body').slideUp();
            $(this).find('.icon-arrow-down').addClass('icon-arrow-up');
            $(this).parent().siblings().find('.icon-arrow-down').removeClass('icon-arrow-up')
            $('.filter-w').addClass('collapsed');
        });

        $('input').on('change',function(){
            // console.log($(this).val());
            // console.log($(this).attr("name"));
            val = $(this).val();
            name = $(this).attr("name");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: './update-inspection-detail',
                method: 'post',
                data: {
                    'id':'2',
                    'name':name,
                    'val':val
                },
                success: function (data) {
                        system_size = Math.round((data[0].system_size) * 100) / 100
                        $('#system_size').text(system_size);
                    }
                })
        });
    });
</script>
@endsection