@extends('admin.header_footer')
@section('content')

    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Create User</h4>
                            <div class="basic-form">
                                @if (Session::has('message'))
                                    <div class="alert alert-success">
                                        <i class="fa-lg fa fa-warning"></i>
                                        {!! session('message') !!}
                                    </div>
                                @elseif(Session::has('error'))
                                    <div class="alert alert-danger">
                                        <i class="fa-lg fa fa-warning"></i>
                                        {!! session('error') !!}
                                    </div>
                                @endif
                              
                                <div class="alert alert-danger" id="error" style="display: none;"></div>

                                <form class="mt-5 mb-5 login-input" action="{{ url('addregister') }}" method="post"
                                    enctype='multipart/form-data'>
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name" placeholder="Username"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" placeholder="Email"
                                            required>
                                    </div>

                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password" placeholder="Password"
                                            required>
                                    </div>
                                    <div class="alert alert-success" id="successAuth" style="display: none;"></div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="mobileno" id="number" placeholder="+91 **********"
                                            required>
                                    </div>
                                    <div id="recaptcha-container"></div>
                                    <button type="button" class="btn btn-primary mt-3" onclick="sendOTP();">Send OTP</button>
                                   
                               
                                <div class="mb-5 mt-5">
                                    <h3>Add verification code</h3>
                                    
                                   
                                    <div class="alert alert-success" id="successOtpAuth" style="display: none;"></div>
                                   
                                        <input type="text" name="number_verify" id="verification" class="form-control" placeholder="Verification code" required>
                                        {{-- <button type="button" class="btn btn-danger mt-3" onclick="verify()">Verify code</button> --}}
                                   
                                </div>

                                <button type="submit" class="btn btn-primary mt-3"  onclick="verify()">Create User</button>

                            </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Firebase App (the core Firebase SDK) is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>
    
    <script>
        var firebaseConfig = {
            apiKey: "AIzaSyD6vWdFcG1HQj1LEvAyYgNyDbA2uK5-k1E",
            authDomain: "fir-demo-d9840.firebaseapp.com",
            databaseURL: "https://PROJECT_ID.firebaseio.com",
            projectId: "fir-demo-d9840",
            storageBucket: "fir-demo-d9840.appspot.com",
            messagingSenderId: "926873394003",
            appId: "1:926873394003:web:e0b5432e127c6c2431dfa6",
            measurementId: "G-V2LYS5G369"
        };
        firebase.initializeApp(firebaseConfig);

    </script>

    <script type="text/javascript">
        window.onload = function () {
            render();
        };
        function render() {
            window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
            recaptchaVerifier.render();
        }
        function sendOTP() {
            var number = $("#number").val();
            firebase.auth().signInWithPhoneNumber(number, window.recaptchaVerifier).then(function (confirmationResult) {
                window.confirmationResult = confirmationResult;
                coderesult = confirmationResult;
                console.log(coderesult);
                $("#successAuth").text("Message sent");
                $("#successAuth").show();
            }).catch(function (error) {
                $("#error").text(error.message);
                $("#error").show();
            });
         
        }
        function verify() {
            var code = $("#verification").val();
            coderesult.confirm(code).then(function (result) {
                var user = result.user;
                console.log(user);
                $("#successOtpAuth").text("Auth is successful");
                $("#successOtpAuth").show();
            }).catch(function (error) {
                $("#error").text(error.message);
                $("#error").show();
            });
        }
    </script>

@endsection
