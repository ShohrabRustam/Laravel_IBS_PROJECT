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
                <p class="description custom" style="margin-top: 30px">Please provide the correct details for best price
                    it will be varified.
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
                    <form autocomplete="off" action=" {{ URL::to('/riskAnalysis') }} " method="POST" class="form"
                        role="form">
                        @csrf
                        <fieldset>
                             <label class="mb-0" for="smoke">Do You Smoke ? </label>
                            <div class="row mb-1">
                                <div class="col-lg-12">
                                    <select class="form-control" name="smoke" required>
                                        <option class="form-control" value="">Select Field</option>
                                        <option class="form-control" value="10">Yes</option>
                                        <option class="form-control" value="0">No</option>
                                        <option class="form-control" value="5">Sometimes</option>

                                    </select>
                                </div>
                            </div>

                            <br>

                            <label class="mb-0" for="drink">Do you Drink ? </label>
                            <div class="row mb-1">
                                <div class="col-lg-12">
                                    <select class="form-control" name="drink" placeholder="Select Policy" required>
                                        <option class="form-control" value="">Select Field</option>
                                        <option class="form-control" value="10">Yes</option>
                                        <option class="form-control" value="0">No</option>
                                        <option class="form-control" value="5">Sometimes</option>

                                    </select>
                                </div>
                            </div>

                            <br>
                            <label class="mb-0" for="health">Do you encountered with any type of health problems in the
                                past ?</label>
                            <div class="row mb-1">
                                <div class="col-lg-12">
                                    <select class="form-control" name="health" placeholder="Select Policy" required>
                                        <option class="form-control" value="">Select Field</option>
                                        <option class="form-control" value="10">Yes</option>
                                        <option class="form-control" value="0">No</option>
                                    </select>
                                </div>
                            </div>

                            <br>
                            <label class="mb-0" for="disease">Cancer or Tumor or Maliganncy ?</label>
                            <div class="row mb-1">
                                <div class="col-lg-12">
                                    <select class="form-control" name="cancer" placeholder="Select Policy" required>
                                        <option class="form-control" value="">Select Field</option>
                                        <option class="form-control" value="100">Yes</option>
                                        <option class="form-control" value="0">No</option>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <label class="mb-0" for="disease">Bleeding or Blood Disoder ?</label>
                            <div class="row mb-1">
                                <div class="col-lg-12">
                                    <select class="form-control" name="blood" placeholder="Select Policy" required>
                                        <option class="form-control" value="">Select Field</option>
                                        <option class="form-control" value="20">Yes</option>
                                        <option class="form-control" value="0">No</option>
                                    </select>
                                </div>
                            </div>

                            <br>


                            @error('DOB')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror

                            <label class="mb-0" for="dob">D O B </label>
                            <div class="row mb-1">
                                <div class="col-lg-12">
                                    <input name="dob" class="form-control" type="date"
                                        value="{{ old('policy_period') }}" required>
                                </div>
                            </div>
                            <br>
                            <br><br>
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
