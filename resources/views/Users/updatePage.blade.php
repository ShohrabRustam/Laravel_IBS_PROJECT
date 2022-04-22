@extends('SuperAdmin.master')
@section('title')
    Update User
@endsection
@section('section')
    <div class="container py-3">

        <div class="row justify-content-center">
            <div class="col-md-6">
                <span class="anchor" id="formContact"></span>
                <hr class="my-5">
                <!-- form contact -->
                <div class="card card-outline-secondary">
                    <div class="card-header">
                        <h3 class="mb-0">Update User</h3>
                    </div>
                    <div class="card-body">
                        @if(Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                        @endif
                        @if(Session::has('fail'))
                        <div class="alert alert-danger" role="alert">
                            {{ Session::get('fail') }}
                        </div>
                        @endif
                        <form autocomplete="off" action=" {{ URL::to('/updateUser') }} " method="POST" class="form"
                            role="form">
                            @csrf
                            <fieldset>
                                <input class="form-control"  name="id" type="hidden" value="{{ $user['id'] ?? old('id') }}" >
                                @error('email')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                                <label class="mb-0" for="email">Email</label>
                                <div class="row mb-1">
                                    <div class="col-lg-12">
                                        <input class="form-control"  name="email" required="" type="email" value="{{ $user['email'] ?? old('email') }}" readonly>
                                    </div>
                                </div>
                                @error('name')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                                <label class="mb-0" for="name">Name</label>
                                <div class="row mb-1">
                                    <div class="col-lg-12">
                                        <input class="form-control" name="name" required="" type="text" value="{{ $user['name'] ?? old('name') }}">
                                    </div>
                                </div>

                                @error('mobile')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                                <label class="mb-0" for="mobile">Mobile</label>
                                <div class="row mb-1">
                                    <div class="col-lg-12">
                                        <input class="form-control"  name="mobile" required="" type="number" min="0" value="{{ $user['mobile'] ?? old('mobile') }}">
                                    </div>
                                </div>

                                @error('password')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                                <label class="mb-0" for="password">Password</label>
                                <div class="row mb-1">
                                    <div class="col-lg-12">
                                        <input class="form-control" name="password" required=""
                                            type="password">
                                    </div>
                                </div>
                                @error('confirm_password')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror

                                <label class="mb-0" for="confirm_password">Confirm Password</label>
                                <div class="row mb-1">
                                    <div class="col-lg-12">
                                        <input class="form-control" name="confirm_password"
                                            required="" type="password">
                                    </div>
                                </div>
                                <br>
                                <button class="btn btn-secondary btn-lg float-right" type="submit">Update</button>
                                <br>
                            </fieldset>
                        </form>
                    </div>
                </div><!-- /form contact -->
            </div>
            <!--/col-->
        </div>

    </div>
    <!-- Scroll to Top -->
    <a id="scroll-to-top" href="#" class="btn btn-primary btn-lg" role="button" title="Return to top of page"
        data-toggle="tooltip" data-placement="left"><i class="fa fa-arrow-up"></i></a>


    <style>
        .helpHead {
            color: navy;
        }

        body {
            margin: 0;
        }

        /* Scroll to Top */
        #scroll-to-top {
            cursor: pointer;
            position: fixed;
            bottom: 20px;
            right: 20px;
            display: none;
        }

        button:hover {
            background: #03e9f4;
            color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 5px #03e9f4,
                0 0 25px #03e9f4,
                0 0 50px #03e9f4,
                0 0 100px #03e9f4;
            top: 0;
            background: linear-gradient(90deg, transparent, #03e9f4);
            animation: btn-anim1 1s linear infinite;
        }
    </style>
@endsection
