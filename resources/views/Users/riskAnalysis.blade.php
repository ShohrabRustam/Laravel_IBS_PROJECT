@extends('Layout.master')
@section('title')
Risk Analysis
@endsection
@section('section')
<div class="container py-3">

    <div class="row justify-content-center">
        <div class="col-md-6">
            <span class="anchor" id="formContact"></span>
            <hr class="my-5">
            <!-- form contact -->
            <div class="card card-outline-secondary">
                <p class="description custom" style="margin-top: 30px">Please provide the correct details for best price it will be varified.
                </p>

                <div class="card-header">
                    <h3 class="mb-0">More Details </h3>
                </div>
                <div class="card-body">
                    @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('suceess') }}
                    </div>
                    @endif
                    @if (Session::has('fail'))
                    <div class="alert alert-danger" role="alert">
                        {{ Session::get('fail') }}
                    </div>
                    @endif
                    <form autocomplete="off" action=" {{ URL::to('/riskAnalysis') }} " method="POST" class="form" role="form">
                        @csrf
                        <fieldset>
                            @error('name')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror

                            <label class="mb-0" for="policyname">Full Name</label>
                            <div class="row mb-1">
                                <div class="col-lg-12">
                                    <input class="form-control" name="name" type="text" value="{{ old('name') }}">
                                </div>
                            </div>

                            @error('smoke')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            <label class="mb-0" for="policytype">Smoke</label>
                            <div class="row mb-1">
                                <div class="col-lg-12">
                                    <select class="form-control" name="smoke" placeholder="Select Policy">
                                        <option class="form-control" value="">Select Field</option>
                                        <option class="form-control" value="Health">Yes</option>
                                        <option class="form-control" value="Life">No</option>
                                        <option class="form-control" value="Bike">Sometimes</option>

                                    </select>
                                </div>
                            </div>


                            @error('smoke')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            <label class="mb-0" for="policytype">Alchol</label>
                            <div class="row mb-1">
                                <div class="col-lg-12">
                                    <select class="form-control" name="smoke" placeholder="Select Policy">
                                        <option class="form-control" value="">Select Field</option>
                                        <option class="form-control" value="Health">Yes</option>
                                        <option class="form-control" value="Life">No</option>
                                        <option class="form-control" value="Bike">Sometimes</option>

                                    </select>
                                </div>
                            </div>




                            @error('DOB')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror

                            <label class="mb-0" for="policy_period">D O B </label>
                            <div class="row mb-1">
                                <div class="col-lg-12">
                                    <input name="dob" class="form-control" type="date" value="{{ old('policy_period') }}">
                                </div>
                            </div>
                            <br>
                            <button class="btn btn-secondary btn-lg float-right" type="submit">Show Policies</button>
                            <br>
                        </fieldset>
                    </form>
                </div>
            </div><!-- /form contact -->
        </div>
        <!--/col-->
    </div>

</div>
@endsection
