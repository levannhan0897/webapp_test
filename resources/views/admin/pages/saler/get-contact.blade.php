@extends('admin.layout.index')
@section('content')
    <div class="content-w">
        <ul class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="index.html">Products</a>
            </li>
            <li class="breadcrumb-item">
                <span>Laptop with retina screen</span>
            </li>
        </ul>
        <!--------------------
        END - Breadcrumbs
        -------------------->
        <div class="content-i">
            <div class="content-box">
                <div class="element-wrapper">
                    <h6 class="element-header">
                        Data Tables
                    </h6>
                    <div class="element-box">
                        <div aria-labelledby="exampleModalLabel" id="exampleModal"
                             class="modal fade bd-example-modal-lg" role="dialog" tabindex="-1" aria-modal="true"
                             style="padding-right: 15px;">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">
                                            Confirm
                                        </h5>
                                        <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                            <span aria-hidden="true"> ×</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <input id="token" type="hidden" name="_token" value="{{csrf_token()}}">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for=""> Create At</label>
                                                        <p id="createAt">20/10</p>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="">Name</label>
                                                        <p id="name">Hoangtrung</p>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="visit">Visit date and time: </label>
                                                        <input id="scheduleDate" type="datetime-local" value=""
                                                               name="scheduleDate">
                                                        {{--<input id="scheduleDate" class="form-control"  type="text" value="" name="scheduleDate">--}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <p>Phone Number:010202020</p>
                                                    <span>Email:</span>
                                                    <p id="email"> xddxx@gmail.com</p>
                                                    <p>Yearly Electricity Usage in kWh: 1 Year</p>
                                                    <p>Pincode: 342311</p>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="">Address 1</label>
                                                        <input class="form-control" id="address1" type="text"
                                                               placeholder="" value="Ha noi" name="address1">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Address 2</label>
                                                        <input class="form-control" type="text" placeholder=""
                                                               value="Ha noi" name="address2">
                                                    </div>
                                                    <p>City:Jodhpur</p>
                                                    <p>State: Rajasthan</p>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer-parent"></div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <div id="dataTable1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                <div class="row">
                                    <div class="col-6" id="step11">
                                        <p style="text-align: center">To be Confirmed</p>
                                        <div class="hr active"
                                             style="width: 100%; height: 3px; background:#047bf8;"></div>
                                    </div>
                                    <div class="col-6" id="step22">
                                        <p style="text-align: center">Confirmed</p>
                                        <div class="hr" style="width: 100%; height: 3px;background:#047bf8;"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12  step" id="step1">
                                        <table id="dataTable1" width="100%"
                                               class="table table-striped table-lightfont dataTable" role="grid"
                                               aria-describedby="dataTable1_info" style="width: 100%;">
                                            <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="dataTable1"
                                                    rowspan="1" colspan="1" aria-sort="ascending"
                                                    aria-label="id: activate to sort column descending"
                                                    style="width: 251px;">ID
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1"
                                                    colspan="1" aria-label="Name: activate to sort column ascending"
                                                    style="width: 378px;">Name
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1"
                                                    colspan="1" aria-label="Email: activate to sort column ascending"
                                                    style="width: 182px;">Email
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1"
                                                    colspan="1" aria-label="Phone: activate to sort column ascending"
                                                    style="width: 87px;">Phone
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1"
                                                    colspan="1"
                                                    aria-label="YEARLY ELECTRICITY USAGE IN KWh: activate to sort column ascending"
                                                    style="width: 170px;">YEARLY ELECTRICITY USAGE IN KWH
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1"
                                                    colspan="1" aria-label="VISIT: activate to sort column ascending"
                                                    style="width: 161px;">VISIT TIME AND DATE
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1"
                                                    colspan="1" aria-label="CONFIRM: activate to sort column ascending"
                                                    style="width: 161px;">CONFIRM
                                                </th>
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                <th rowspan="1" colspan="1">ID</th>
                                                <th rowspan="1" colspan="1">NAME</th>
                                                <th rowspan="1" colspan="1">EMAIL</th>
                                                <th rowspan="1" colspan="1">PHONE</th>
                                                <th rowspan="1" colspan="1">YEARLY ELECTRICITY USAGE IN KWH</th>
                                                <th rowspan="1" colspan="1">VISIT TIME AND DATE</th>
                                                <th rowspan="1" colspan="1">CONFIRM</th>
                                            </tr>
                                            </tfoot>
                                            <tbody>
                                            @if(isset($data['isconfirmed']) >0)
                                                @foreach($data['isconfirmed'] as $user)
                                                    <tr id="link{{$user->id}}" role="row" class="odd">
                                                        <td class="sorting_1">{{$user->id}}</td>
                                                        <td>{{$user->name}}</td>
                                                        <td>{{$user->email}}</td>
                                                        <td>66</td>
                                                        <td>{{$user->created_at}}</td>
                                                        <td>$86,000</td>
                                                        <td>
                                                            <a href="javascript:void(0)" data-id="{{$user->id }}"
                                                               onclick="DetailUser(event.target)" id="exampleModal1"
                                                               class="btn btn-primary confirm-btn">Confirm</a>
                                                        </td>
                                                @endforeach
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-sm-12 step active" id="step2">
                                        <table id="dataTable1" width="100%"
                                               class="table table-striped table-lightfont dataTable" role="grid"
                                               aria-describedby="dataTable1_info" style="width: 100%;">
                                            <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="dataTable1"
                                                    rowspan="1" colspan="1" aria-sort="ascending"
                                                    aria-label="id: activate to sort column descending"
                                                    style="width: 251px;">ID
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1"
                                                    colspan="1" aria-label="Name: activate to sort column ascending"
                                                    style="width: 378px;">Name
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1"
                                                    colspan="1" aria-label="Email: activate to sort column ascending"
                                                    style="width: 182px;">Email
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1"
                                                    colspan="1" aria-label="Phone: activate to sort column ascending"
                                                    style="width: 87px;">Phone
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1"
                                                    colspan="1"
                                                    aria-label="YEARLY ELECTRICITY USAGE IN KWh: activate to sort column ascending"
                                                    style="width: 170px;">YEARLY ELECTRICITY USAGE IN KWH
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1"
                                                    colspan="1" aria-label="VISIT: activate to sort column ascending"
                                                    style="width: 161px;">VISIT TIME AND DATE
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1"
                                                    colspan="1" aria-label="CONFIRM: activate to sort column ascending"
                                                    style="width: 161px;">CONFIRM
                                                </th>
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                <th rowspan="1" colspan="1">ID</th>
                                                <th rowspan="1" colspan="1">NAME</th>
                                                <th rowspan="1" colspan="1">EMAIL</th>
                                                <th rowspan="1" colspan="1">PHONE</th>
                                                <th rowspan="1" colspan="1">YEARLY ELECTRICITY USAGE IN KWH</th>
                                                <th rowspan="1" colspan="1">VISIT TIME AND DATE</th>
                                                <th rowspan="1" colspan="1">CONFIRM</th>
                                            </tr>
                                            </tfoot>
                                            <tbody>
                                            @if(isset($data['notconfirmed']))
                                                @foreach($data['notconfirmed'] as $user)
                                                    <tr id="link{{$user->id}}" role="row" class="odd">
                                                        <td class="sorting_1">{{$user->id}}</td>
                                                        <td>{{$user->name}}</td>
                                                        <td>{{$user->email}}</td>
                                                        <td>66</td>
                                                        <td>{{$user->created_at}}</td>
                                                        <td>$86,000</td>
                                                        <td>
                                                            <a href="javascript:void(0)" data-id="{{$user->id }}"
                                                               onclick="DetailUser(event.target)" id="exampleModal1"
                                                               class="btn btn-primary confirm-btn">Confirm</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--------------------
              START - Color Scheme Toggler
              -------------------->
                <div class="floated-colors-btn second-floated-btn">
                    <div class="os-toggler-w">
                        <div class="os-toggler-i">
                            <div class="os-toggler-pill"></div>
                        </div>
                    </div>
                    <span>Dark </span><span>Colors</span>
                </div>
                <!--------------------
                END - Color Scheme Toggler
                --------------------><!--------------------
              START - Demo Customizer
              -------------------->
                <div class="floated-customizer-btn third-floated-btn">
                    <div class="icon-w">
                        <i class="os-icon os-icon-ui-46"></i>
                    </div>
                    <span>Customizer</span>
                </div>
                <div class="floated-customizer-panel">
                    <div class="fcp-content">
                        <div class="close-customizer-btn">
                            <i class="os-icon os-icon-x"></i>
                        </div>
                        <div class="fcp-group">
                            <div class="fcp-group-header">
                                Menu Settings
                            </div>
                            <div class="fcp-group-contents">
                                <div class="fcp-field">
                                    <label for="">Menu Position</label><select class="menu-position-selector">
                                        <option value="left">
                                            Left
                                        </option>
                                        <option value="right">
                                            Right
                                        </option>
                                        <option value="top">
                                            Top
                                        </option>
                                    </select>
                                </div>
                                <div class="fcp-field">
                                    <label for="">Menu Style</label><select class="menu-layout-selector">
                                        <option value="compact">
                                            Compact
                                        </option>
                                        <option value="full">
                                            Full
                                        </option>
                                        <option value="mini">
                                            Mini
                                        </option>
                                    </select>
                                </div>
                                <div class="fcp-field with-image-selector-w" style="display: none;">
                                    <label for="">With Image</label><select class="with-image-selector">
                                        <option value="yes">
                                            Yes
                                        </option>
                                        <option value="no">
                                            No
                                        </option>
                                    </select>
                                </div>
                                <div class="fcp-field">
                                    <label for="">Menu Color</label>
                                    <div class="fcp-colors menu-color-selector">
                                        <div class="color-selector menu-color-selector color-bright"></div>
                                        <div class="color-selector menu-color-selector color-dark"></div>
                                        <div class="color-selector menu-color-selector color-light"></div>
                                        <div class="color-selector menu-color-selector color-transparent selected"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="fcp-group">
                            <div class="fcp-group-header">
                                Sub Menu
                            </div>
                            <div class="fcp-group-contents">
                                <div class="fcp-field">
                                    <label for="">Sub Menu Style</label><select class="sub-menu-style-selector">
                                        <option value="flyout">
                                            Flyout
                                        </option>
                                        <option value="inside">
                                            Inside/Click
                                        </option>
                                        <option value="over">
                                            Over
                                        </option>
                                    </select>
                                </div>
                                <div class="fcp-field">
                                    <label for="">Sub Menu Color</label>
                                    <div class="fcp-colors">
                                        <div class="color-selector sub-menu-color-selector color-bright selected"></div>
                                        <div class="color-selector sub-menu-color-selector color-dark"></div>
                                        <div class="color-selector sub-menu-color-selector color-light"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="fcp-group">
                            <div class="fcp-group-header">
                                Other Settings
                            </div>
                            <div class="fcp-group-contents">
                                <div class="fcp-field">
                                    <label for="">Full Screen?</label><select class="full-screen-selector">
                                        <option value="yes">
                                            Yes
                                        </option>
                                        <option value="no">
                                            No
                                        </option>
                                    </select>
                                </div>
                                <div class="fcp-field">
                                    <label for="">Show Top Bar</label><select class="top-bar-visibility-selector">
                                        <option value="yes">
                                            Yes
                                        </option>
                                        <option value="no">
                                            No
                                        </option>
                                    </select>
                                </div>
                                <div class="fcp-field">
                                    <label for="">Above Menu?</label><select class="top-bar-above-menu-selector">
                                        <option value="yes">
                                            Yes
                                        </option>
                                        <option value="no">
                                            No
                                        </option>
                                    </select>
                                </div>
                                <div class="fcp-field">
                                    <label for="">Top Bar Color</label>
                                    <div class="fcp-colors">
                                        <div class="color-selector top-bar-color-selector color-bright"></div>
                                        <div class="color-selector top-bar-color-selector color-dark"></div>
                                        <div class="color-selector top-bar-color-selector color-light"></div>
                                        <div class="color-selector top-bar-color-selector color-transparent selected"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--------------------
                END - Demo Customizer
                --------------------><!--------------------
              START - Chat Popup Box
              -------------------->
                <div class="floated-chat-btn">
                    <i class="os-icon os-icon-mail-07"></i><span>Demo Chat</span>
                </div>
                <div class="floated-chat-w">
                    <div class="floated-chat-i">
                        <div class="chat-close">
                            <i class="os-icon os-icon-close"></i>
                        </div>
                        <div class="chat-head">
                            <div class="user-w with-status status-green">
                                <div class="user-avatar-w">
                                    <div class="user-avatar">
                                        <img alt="" src="img/avatar1.jpg">
                                    </div>
                                </div>
                                <div class="user-name">
                                    <h6 class="user-title">
                                        John Mayers
                                    </h6>
                                    <div class="user-role">
                                        Account Manager
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="chat-messages ps ps--theme_default"
                             data-ps-id="57602b18-8145-c64f-cff8-4cda7f6b321d">
                            <div class="message">
                                <div class="message-content">
                                    Hi, how can I help you?
                                </div>
                            </div>
                            <div class="date-break">
                                Mon 10:20am
                            </div>
                            <div class="message">
                                <div class="message-content">
                                    Hi, my name is Mike, I will be happy to assist you
                                </div>
                            </div>
                            <div class="message self">
                                <div class="message-content">
                                    Hi, I tried ordering this product and it keeps showing me error code.
                                </div>
                            </div>
                            <div class="ps__scrollbar-x-rail" style="left: 0px; bottom: 0px;">
                                <div class="ps__scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                            </div>
                            <div class="ps__scrollbar-y-rail" style="top: 0px; right: 0px;">
                                <div class="ps__scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                            </div>
                        </div>
                        <div class="chat-controls">
                            <input class="message-input" placeholder="Type your message here..." type="text">
                            <div class="chat-extra">
                                <a href="#"><span class="extra-tooltip">Attach Document</span><i
                                            class="os-icon os-icon-documents-07"></i></a><a href="#"><span
                                            class="extra-tooltip">Insert Photo</span><i
                                            class="os-icon os-icon-others-29"></i></a><a href="#"><span
                                            class="extra-tooltip">Upload Video</span><i
                                            class="os-icon os-icon-ui-51"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--------------------
                END - Chat Popup Box
                -------------------->
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        // $(document).ready(function () {
        function DetailUser(event) {
            var id = $(event).data("id");
            var _url = "{{asset('user/detail')}}/" + id;
            $.ajax({
                url: _url,
                type: "get",
                success: function (response) {
                    if (response) {
                        var dateObj = new Date(response.data.createAt);
                        var month = dateObj.getUTCMonth() + 1; //months from 1-12
                        var day = dateObj.getDate();
                        var year = dateObj.getUTCFullYear();
                        $("#createAt").html(day + '/' + month + '/' + year);
                        console.log(response.data.scheduleDate);
                        $("input#scheduleDate").val(response.data.scheduleDate);
                        $("#name").html(response.data.name);
                        $("input#address1").val(response.data.address1);
                        $("#email").html(response.data.email);
                        $('#exampleModal').addClass("show");
                        $('#exampleModal').css("display", "block");
                        if (response.data.confirm_status == 0) {
                            $(".modal-footer").remove();
                        } else {
                            $(".modal-footer-parent").append("<div class=\"modal-footer\">\n" +
                                "<button href=\"javascript:void(0)\" data-id=\"\" onclick=\"editUser(event.target)\" id=\"confirm-status\" class=\"btn btn-primary confirm-btn\">Confirm</button>\n" +
                                "</div>");
                            $('.modal-footer button').attr("data-id", response.data.id);

                        }
                    }
                }
            });
        }

        function editUser(event) {
            var id = $(event).data("id");
            var _url = "{{asset('user/edit')}}/" + id;
            var _token = $('meta[name="csrf-token"]').attr('content');
            var address1 = $('#address1').val();
            var scheduleDate = $('#scheduleDate').val();
            // var _token = $("#token").val();
            $.ajax({
                url: _url,
                type: "post",
                data: {
                    _token: _token,
                    address1: address1,
                    scheduleDate: scheduleDate,
                },
                success: function (response) {
                    if (response.data == 'error') {
                        alert('Cant enter schedualDate is not greater than today');
                    } else {
                        var dateObj = new Date(response.data.scheduleDate);
                        var month = dateObj.getUTCMonth() + 1; //months from 1-12
                        var day = dateObj.getDate();
                        var year = dateObj.getUTCFullYear();
                        var hours = dateObj.getHours();
                        var minutes = dateObj.getMinutes();
                        var ampm = hours >= 12 ? 'pm' : 'am';
                        hours = hours % 12;
                        hours = hours ? hours : 12; // the hour '0' should be '12'
                        minutes = minutes < 10 ? '0' + minutes : minutes;
                        $("input#address1").html(response.data.address1);
                        $("input#scheduleDate").val(response.data.scheduleDate);
                        $("#createAt").html(response.data.createAt);
                        $("#name").html(response.data.name);
                        $("#email").html(response.data.email);
                        $("#link" + id).remove();
                        $("#step1 tbody").append('<tr id="link' + response.data.id + '" role="row" class="odd">\n' +
                                '                                                        <td class="sorting_1">' + response.data.id + '</td>\n' +
                                '                                                        <td>' + response.data.name + '</td>\n' +
                                '                                                        <td>' + response.data.email + '</td>\n' +
                                '                                                        <td>66</td>\n' +
                                '                                                        <td>' + day + '/' + month + '/' + year + '-' + hours + ':' + minutes + ampm + '</td>\n' +
                                '                                                        <td>$86,000</td>\n' +
                                '                                                        <td>\n' +
                                '                                                            <a href="javascript:void(0)" data-id="' + response.data.id + '"\n' +
                                '                                                               onclick="DetailUser(event.target)" id="exampleModal1"\n' +
                                '                                                               class="btn btn-primary confirm-btn">Confirm</a>\n' +
                                '                                                        </td>\n' +
                                '                                                    </tr>');

                    }
                }
                ,success:function () {
                    $('#exampleModal').removeClass("show");
                    $('#exampleModal').css("display", "none");
                    alert('Edit successfuly');
                }
                , error: function () {
                    alert('Please enter address1');
                }
            });
        }
    </script>
    <script>
        $(document).ready(function () {
            $('.close').click(
                function () {
                    $(".modal-footer").remove();
                    $('#exampleModal').removeClass("show");
                    $('#exampleModal').css("display", "none");
                }
            );
            $('#step11').click(function () {
                    $('#step1').removeClass("active");
                    $('#step2').addClass("active");
                    $('#step11 .hr').addClass("active");
                    $('#step22 .hr').removeClass("active");
                }
            );
            $('#step22').click(
                function () {
                    $('#step2').removeClass("active");
                    $('#step1').addClass("active");
                    $('#step11 .hr').removeClass("active");
                    $('#step22 .hr').addClass("active");
                }
            );
        });
    </script>
@endsection