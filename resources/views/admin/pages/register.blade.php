<!DOCTYPE html>
<html>
@include('admin.layout.head')
<body>
<div class="all-wrapper menu-side with-pattern">
    <div class="auth-box-w wider">
        <div class="logo-w">
            <a href="index.html"><img alt="" src="img/logo-big.png"></a>
        </div>
        <h4 class="auth-header">
            Register
        </h4>
        <form id="valiform" action="./register" method="POST">
            @csrf
            <?php
                $message = Session::get('message');
                $error = Session::get('error');   
                if($error == true && $message) {
                $mess = json_encode($message);
                echo $mess;
                Session::put('message',null);
            } 
            ?>
            <div class="form-group">
                <label for="">Name</label><input class="form-control" placeholder="Enter Name" id="name" name="name" type="text">
            </div>
            <div class="form-group">
                <label for="">Address Line-1</label><input class="form-control" placeholder="Enter Address Line-1" id="contact_adr_1" name="contact_adr_1" type="text">
            </div>
            <div class="form-group">
                <label for="">Address Line-2</label><input class="form-control" placeholder="Enter Address Line-2" id="contact_adr_2" name="contact_adr_2" type="text">
            </div>
            <div class="form-group">
                <label for="">Pin Code</label><input class="form-control" placeholder="Enter Pin Code" id="contact_pincode" name="contact_pincode" type="text">
            </div>
            <div class="form-group">
                <label for="">State Select</label>
                <select class="form-control form-control-sm" id="contact_state" name="contact_state">
                    <option value="">Select State</option>
                    @foreach ($data as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">City Select</label>
                <select class="form-control form-control-sm" name="contact_city" id="contact_city">
                    <option value="">City</option>
                </select>
            </div>
            <div class="row">
                <div class="col-sm-7">
                    <div class="form-group">
                        <label for="">Electricity Usage in kWh</label>
                        <input class="form-control" placeholder="Enter Electricity Usage in kWh" id="contact_meu" name="contact_meu" type="text">
                    </div>
                </div>
                <div class="col-sm-4 mg-edit-check">
                    <div class="form-group">
                        <input class="form-check-input" name="type_meu" type="radio" value="Year" checked >Year <br>
                        <input class="form-check-input" name="type_meu" type="radio" value="Month">Month
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="">Phone</label><input class="form-control" placeholder="Enter Phone" type="text" name="phone">
            </div>
            <div class="form-group">
                <label for="">Email</label><input class="form-control" placeholder="Enter email" name="email" type="email" aria-invalid="true">
            </div>
            <div class="form-group">
                <label for="">Visit Date and Time</label><input class="form-control" name="contact_visit" placeholder="Enter Visit Date and Time" type="datetime-local">
            </div>
            <div class="buttons-w">
                <button  class="btn btn-primary btn-contact">Contact Now</button>
                <a href="./login"> <div type="submit" class="btn btn-primary">Login</div></a>
            </div>
        </form>
    </div>
</div>
</body>
@include('admin.layout.script')
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script>
$(document).ready(function(){
    $.validator.addMethod("regx", function(value, element, regexpr) {          
    return regexpr.test(value);
    }, "Please phone india.");

    $("#valiform").validate({
        
		onfocusout: false,
		onkeyup: false,
		onclick: false,
		rules: {
			"name": {
				required: true,
			},
			"contact_adr_1": {
				required: true,
			},
			"contact_adr_2": {
				required: true,
			},
			"contact_pincode": {
				required: true,
			},
			"contact_state": {
				required: true,
			},
			"contact_city": {
				required: true,
			},
			"contact_meu": {
				required: true,
                digits:true
			},
			"phone": {
				required: true,
                regx:/^[6-9]\d{9}$/
			},
			"email": {
				required: true,
                email:true
			},
			"contact_visit": {
				required: true,
			},
		}
	});

$('select[name="contact_state"]').on('change', function(){  
    var call_city = $(this).val();  
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    $.ajax({
    url: './call-city',
    method: 'get',
    data: {
        'city':call_city,
    },
    success: function (data) {
        $('#contact_city').find('option').remove().end().append('<option value="">City</option>');    
        for (let i = 0; i < data.length; ++i){
            $('#contact_city').append($('<option>', {
            value: data[i].id,
            text: data[i].city
        }));
        }
    }
    })
});

// $(".btn-contact").click(function(){
//     // $("form").submit(function(e){
//     // e.preventDefault();
//     // });
//     var name = $('input[name=name]').val();
//     var phone = $('input[name=phone]').val();
//     var email = $('input[name=email').val();
//     var contact_adr_1 = $('input[name=contact_adr_1]').val();
//     var contact_adr_2 = $('input[name=contact_adr_2]').val();
//     var contact_pincode = $('input[name=contact_pincode]').val();
//     var contact_city = $('select[name=contact_city]').val();
//     var contact_state =  $('select[name=contact_state]').val();
//     var contact_meu = $('input[name=contact_meu').val();
//     var type_meu =  $('input[name="type_meu"]:checked').val();
//     var contact_visit = $('input[name=contact_visit').val();
//     $.ajaxSetup({
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         }
//     });
//     $.ajax({
//         url: './register',
//         method: 'post',
//         data: {
//             'name':name,
//             'phone':phone,
//             'email':email,
//             'contact_adr_1':contact_adr_1,
//             'contact_adr_2':contact_adr_2,
//             'contact_pincode':contact_pincode,
//             'contact_city':contact_city,
//             'contact_state':contact_state,
//             'contact_meu':contact_meu,
//             'type_meu':type_meu,
//             'contact_visit':contact_visit,
//         },
//         success: function (data) {
//                 if(data.error == true){
//                 $('.mess-err').hide();
//                     if (data.message.name != undefined) {
//                         $('.name-err').show().text(data.message.name[0]);
//                     }
//                     if (data.message.phone != undefined) {
//                         $('.phone-err').show().text(data.message.phone[0]);
//                     }
//                     if (data.message.email != undefined) {
//                         $('.email-err').show().text(data.message.email[0]);
//                     }
//                     if (data.message.contact_adr_1 != undefined) {
//                         $('.contact-adr-1-err').show().text(data.message.contact_adr_1[0]);
//                     }
//                     if (data.message.contact_pincode != undefined) {
//                         $('.contact-pincode-err').show().text(data.message.contact_pincode[0]);
//                     }
//                     if (data.message.contact_city != undefined) {
//                         $('.contact-city-err').show().text(data.message.contact_city[0]);
//                     }
//                     if (data.message.contact_state != undefined) {
//                         $('.contact-state-err').show().text(data.message.contact_state[0]);
//                     }
//                     if (data.message.contact_meu != undefined) {
//                         $('.contact-meu-err').show().text(data.message.contact_meu[0]);
//                     }
//                     if (data.message.contact_visit != undefined) {
//                         $('.contact-visit-err').show().text(data.message.contact_visit[0]);
//                     }
//                 }else{
//                 //     window.setTimeout(function() {
//                 //     swal({
//                 //         title: "Wow!",
//                 //         text: "Message!",
//                 //         type: "success"
//                 //     }, function() {
//                 //         window.location = "./login";
//                 //     });
//                 // }, 1000);
//                     window.location = './login';
//                 }
//             }
//             })
//         })
})
</script>
</html>