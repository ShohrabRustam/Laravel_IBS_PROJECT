@extends('Admin.master')
@section('title')
Admin Login
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
                    <h3 class="mb-0">Admin Login Here </h3>
                </div>
                <div class="card-body">
                    <form autocomplete="off" action=" {{ URL::to('/adminLogin') }} " method="POST" class="form"
                        role="form">
                        @csrf
                        <fieldset>
                            <label class="mb-0" for="email2">Email</label>
                            <div class="row mb-1">
                                <div class="col-lg-12">
                                    <input class="form-control" id="email2" name="email" required="" type="email">
                                </div>
                            </div>

                            <label class="mb-0" for="password2">Password</label>
                            <div class="row mb-1">
                                <div class="col-lg-12">
                                    <input class="form-control" id="password2" name="password" required=""
                                        type="password">
                                </div>
                            </div>
                            <br>
                            <button class="btn btn-secondary btn-lg float-right" type="submit">Login</button>
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