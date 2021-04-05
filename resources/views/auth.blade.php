@extends('layouts.login')
@section('title')
Welcome to App
@endsection
@section('content')
 <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-6 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Sistem Pengaduan Masyarakat</h1>

                  </div>
                 @include('layouts.alert')
                <form method="POST" action="{{url('/login')}}" class="user">
                        @csrf
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" id="exampleInputEmail" name="email" aria-describedby="emailHelp" placeholder="Enter Email Address..." required=""
                      value="{{session('email')}}
                      ">
                      </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="exampleInputPassword" value="{{session('password')}}" placeholder="Password..." name="password" required="" minlength="8">
                       </div>

                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Login
                    </button>

                  </form>
                  <hr>
                  <div class="text-center">
                  <a class="small" href="#"  data-toggle="modal" data-target="#exampleModal">Forgot password!</a>

                  </div>
                  <div class="text-center">
                  {{-- <a class="small" href="{{route('register')}}">Create an Account!</a> --}}

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Forgot Password</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{url('login/1')}}" method="POST">
              @csrf
              @method('DELETE')
            <div class="form-group">
              {{-- <label>I :</label> --}}

                        <input type="Email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Email@mymail.com" maxlength="50" name="email">

            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Next</button>
        </div>
      </div>
      </div>
      </div>
      </form>



  @endsection
