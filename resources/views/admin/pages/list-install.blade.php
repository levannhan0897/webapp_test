@extends('admin.layout.index')
@section('content')
<style>
    div#dataTable1_wrapper {
    clear: right;
}
a.btn.btn-primary.btn-sm.float-right,.edit-ins {
    margin-bottom: .5rem;
}
</style>
        <div class="content-i">
            <div class="content-box">
                <div class="element-wrapper">
                    <h6 class="element-header">
                        Data Tables
                    </h6>
                    <?php
                    $message = Session::get('message');
                    $status = Session::get('status');   
                    if($status == 1 && $message) {
                    $mess = json_encode($message);
                    echo " <div class='alert alert-success text-center'>".$mess." </div>";
                    Session::put('message',null);
                    } 
                    ?>
                    <div class="element-box">
                        <div class="table-responsive">
                            <a class="btn btn-primary btn-sm float-right" href="./show-page-add-install"><span>Add New Installer</span></a>
                            <div id="dataTable1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="dataTable1" width="100%"
                                               class="table table-striped table-lightfont dataTable" role="grid"
                                               aria-describedby="dataTable1_info" style="width: 100%;">
                                            <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="dataTable1"
                                                    rowspan="1" colspan="1" aria-sort="ascending"
                                                    aria-label="Company Name: activate to sort column descending"
                                                    style="width: 251px;">Company Name
                                                </th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="dataTable1"
                                                    rowspan="1" colspan="1" aria-sort="ascending"
                                                    aria-label="Contact Name: activate to sort column descending"
                                                    style="width: 251px;">Contact Name
                                                </th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="dataTable1"
                                                    rowspan="1" colspan="1" aria-sort="ascending"
                                                    aria-label="Phone Number: activate to sort column descending"
                                                    style="width: 251px;">Phone Number
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1"
                                                    colspan="1" aria-label="Email: activate to sort column ascending"
                                                    style="width: 378px;">Email
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1"
                                                    colspan="1" aria-label="City: activate to sort column ascending"
                                                    style="width: 182px;">City
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1"
                                                    colspan="1" aria-label="State: activate to sort column ascending"
                                                    style="width: 87px;">State
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1"
                                                    colspan="1"
                                                    aria-label="PinCode: activate to sort column ascending"
                                                    style="width: 170px;">PinCode
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1"
                                                    colspan="1" aria-label="Action: activate to sort column ascending"
                                                    style="width: 161px;">Action
                                                </th>
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                <th rowspan="1" colspan="1">Company Name</th>
                                                <th rowspan="1" colspan="1">Contact Name</th>
                                                <th rowspan="1" colspan="1">Phone Number</th>
                                                <th rowspan="1" colspan="1">Email</th>
                                                <th rowspan="1" colspan="1">City</th>
                                                <th rowspan="1" colspan="1">State</th>
                                                <th rowspan="1" colspan="1">PinCode</th>
                                                <th rowspan="1" colspan="1">Action</th>
                                            </tr>
                                            </tfoot>
                                            <tbody>
                                            @foreach ($data as $item)
                                            <tr role="row" class="odd list-install-{{$item->id}}">
                                                <td class="sorting_1">{{$item->installer_name}}</td>
                                                <td>{{$item->installer_contact_name}}</td>
                                                <td>{{$item->installer_phone}}</td>
                                                <td>{{$item->installer_email}}</td>
                                                <td>{{$item->city}}</td>
                                                <td>{{$item->name}}</td>
                                                <td>{{$item->installer_pincode}}</td>
                                            <td><a href="./show-page-edit-install/{{$item->id}}"><button class="btn btn-primary edit-ins">Edit</button></a><br><a><button class="btn btn-primary delete-install" data-id="{{$item->id}}">Delete</button></a></td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@section('script')
    <script>
        $(document).ready(function(){
            $('.delete-install').on('click',function(){
                var yese_or_no = confirm('Are you sure you want to delete?');
                if(yese_or_no){
                var id = $(this).data("id");
                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                url: '{{asset("api/delete-install-api")}}',
                method: 'post',
                data: {
                    'id':id,
                },
                success: function (data) {
                $('.delete-install').parents().find('.list-install-'+data.id).remove();
                swal(data.message, "", "success");
                    }
                })
                }
            })
        });
    </script>
@endsection
@endsection