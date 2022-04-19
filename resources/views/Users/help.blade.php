@extends('Layout.master')
@section('title')
    Help
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
                        <h3 class="mb-0">Send Us Message For Any Help</h3>
                    </div>
                    <div class="card-body">
                        <form autocomplete="off" action=" {{ URL::to('/help') }} " method="POST" class="form"
                            role="form">
                            @csrf
                            <fieldset>
                                @error('name')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror

                                <label class="mb-0" for="name2">Name</label>
                                <div class="row mb-1">
                                    <div class="col-lg-12">
                                        <input class="form-control" id="name2" name="name" required="" type="text" value="{{ old('name') }}">
                                    </div>
                                </div>
                                @error('email')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror

                                <label class="mb-0" for="email2">Email</label>
                                <div class="row mb-1">
                                    <div class="col-lg-12">
                                        <input class="form-control" name="email" required="" type="email" value="{{ old('email') }}">
                                    </div>
                                </div>
                                @error('message')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                                <label class="mb-0" for="message2">Message</label>
                                <div class="row mb-1">
                                    <div class="col-lg-12">
                                        <textarea class="form-control" name="message" required="" rows="6" value="{{ old('message') }}"></textarea>
                                    </div>
                                </div>
                                <button class="btn btn-secondary btn-lg float-right" type="submit">Send Message</button>
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
