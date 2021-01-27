@extends('layouts.front')
@section('header_script')
@endsection

@section('container')
    <div class="row clearifix">
        <div class="col-md-6 social-share">
            <h1 class="text-primary font-weight-bold">Social Share</h1>
            <h4>Social Share helps you connect and share with your Friend</h4>
        </div>
        <div class="col-md-6 form bg-white p-3">
            <div class="results">
                @if(Session::get('success'))
                <div class="alert alert-success">
                {{ Session::get('success') }}
                </div>
                @endif

                @if(Session::get('fail'))
                <div class="alert alert-danger">
                {{ Session::get('fail') }}
                </div>
                @endif
            </div>
            <form class="p-4" id="logIn" action="{{route('user.login')}}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="email" class="form-control p-3" id="email" aria-describedby="emailHelp" placeholder="Enter email" value="{{ old('email') }}" name="email">
                    <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control p-3" id="password" placeholder="Password" value="{{ old('password') }}" name="password">
                    <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                </div>
                <button id="logIn" type="submit" class="btn btn-primary form-control p-3">Log in</button>
            </form>
            <hr>
            <div class="text-center pb-4">
                <button type="button" class="btn btn-success p-2" data-toggle="modal" data-target="#exampleModal">
                    Create An Account
                </button>
            </div>

            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Sign Up Now</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form action="{{route('registration')}}" method="POST" id="signup">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control p-3" id="name" aria-describedby="emailHelp" placeholder="Username" name="name"  value="{{ old('name') }}">
                            <span class="text-danger">@error('name'){{ $message }}@enderror</span>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control p-3" id="email1" aria-describedby="emailHelp" placeholder="Email" name="email" value="{{ old('email') }}">
                            <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control p-3" id="password1" aria-describedby="emailHelp" placeholder="Password" name="password" value="{{ old('password') }}"><i class="glyphicon glyphicon-eye-open"></i>
                            <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>
@endsection

@section('footer_script')
<script>
$(document).ready(function(){
    $("#logIn").validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                password: true
            }
        },
        messages: {
            email: "Please enter a valid email address",
            password: "Please provide a password"
        }
    });
});
$(document).ready(function(){
    $("#signup").validate({
        rules: {
            name: "required",
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 5
            },
            confirm_password: {
                required: true,
                minlength: 5,
                equalTo: "#password"
            }
        },
        messages: {
            name: "Please enter your name",
            email: "Please enter a valid email address",
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long"
            },
            confirm_password: {
                required: "Please provide confirm password",
                minlength: "Your password must be at least 5 characters long",
                equalTo: "Please enter the same password as above"
            }
        }
    });
});

</script>

@endsection