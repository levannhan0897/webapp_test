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
            Create new account
        </h4>
        <form action="">
            <div class="form-group">
                <label for=""> Email address</label><input class="form-control" placeholder="Enter email" type="email">
                <div class="pre-icon os-icon os-icon-email-2-at2"></div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for=""> Password</label><input class="form-control" placeholder="Password" type="password">
                        <div class="pre-icon os-icon os-icon-fingerprint"></div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="">Confirm Password</label><input class="form-control" placeholder="Password" type="password">
                    </div>
                </div>
            </div>
            <div class="buttons-w">
                <button class="btn btn-primary">Register Now</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>