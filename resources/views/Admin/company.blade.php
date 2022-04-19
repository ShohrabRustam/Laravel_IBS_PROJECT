@extends('Admin.master')
@section('title')
    Add Company
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
                        <h3 class="mb-0">Company Registration </h3>
                    </div>
                    <div class="card-body">
                        <form autocomplete="off" action=" {{ URL::to('/addCompany') }} " method="POST"
                            class="form" role="form">
                            @csrf
                            <fieldset>
                                @error('r_no')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <label class="mb-0" for="r_no">Register Number</label>
                                <div class="row mb-1">
                                    <div class="col-lg-12">
                                        <input class="form-control" name="r_no" required="" type="number" min="0">
                                    </div>
                                </div>

                                @error('name')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <label class="mb-0" for="name">Company Name</label>
                                <div class="row mb-1">
                                    <div class="col-lg-12">
                                        <input class="form-control" name="name" required="" type="text">
                                    </div>
                                </div>
                                @error('link')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror

                                <label class="mb-0" for="link">Link for Logo Optional</label>
                                <div class="row mb-1">
                                    <div class="col-lg-12">
                                        <textarea class="form-control" name="link" type="text"></textarea>
                                    </div>
                                </div>

                                @error('about')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror

                                <label class="mb-0" for="about">About</label>
                                <div class="row mb-1">
                                    <div class="col-lg-12">
                                        <textarea class="form-control" name="about" required="" type="text"></textarea>
                                    </div>
                                </div>


                                <br>
                                <button class="btn btn-secondary btn-lg float-right" type="submit">Register</button>
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
