@extends('Layout.master')
@section('title')
    SignUp
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
                        <h3 class="mb-0">Register With Us</h3>
                    </div>
                    <div class="card-body">
                        <form autocomplete="off" action=" {{ URL::to('/signup') }} " method="POST" class="form"
                            role="form">
                            @csrf
                            <fieldset>
                                <label class="mb-0" for="name2">Name</label>
                                <div class="row mb-1">
                                    <div class="col-lg-12">
                                        <input class="form-control" id="name2" name="name" required="" type="text">
                                    </div>
                                </div>
                                <label class="mb-0" for="email2">Email</label>
                                <div class="row mb-1">
                                    <div class="col-lg-12">
                                        <input class="form-control" id="email2" name="email" required="" type="email">
                                    </div>
                                </div>

                                <label class="mb-0" for="password2">Password</label>
                                <div class="row mb-1">
                                    <div class="col-lg-12">
                                        <input class="form-control" id="password2" name="password" required="" type="password">
                                    </div>
                                </div>

                                <label class="mb-0" for="confirm_password">Confirm Password</label>
                                <div class="row mb-1">
                                    <div class="col-lg-12">
                                        <input class="form-control" id="comfirm_password" name="confirm_password" required="" type="password">
                                    </div>
                                </div>
                                <button class="btn btn-secondary btn-lg float-right" type="submit">Signup</button>
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
            background-color: #ecfab6;
        }

        /* Scroll to Top */
        #scroll-to-top {
            cursor: pointer;
            position: fixed;
            bottom: 20px;
            right: 20px;
            display: none;
        }

    </style>
@endsection
