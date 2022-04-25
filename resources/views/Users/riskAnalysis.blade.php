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
                <p class="description">Feel free to contact us if you need any assistance, any help or another question.
                </p>

                <div class="card-header">
                    <h3 class="mb-0">Add Policy </h3>
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
                    <form autocomplete="off" action=" {{ URL::to('/addPolicy') }} " method="POST" class="form" role="form">
                        @csrf
                        <fieldset>
                            <input type="hidden" name="companyid" value="{{ $company['id'] }}">
                            @error('policyname')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror

                            <label class="mb-0" for="policyname">Policy Name</label>
                            <div class="row mb-1">
                                <div class="col-lg-12">
                                    <input class="form-control" name="policyname" type="text" value="{{ old('policyname') }}">
                                </div>
                            </div>

                            @error('policytype')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            <label class="mb-0" for="policytype">Policy Type</label>
                            <div class="row mb-1">
                                <div class="col-lg-12">
                                    <select class="form-control" name="policytype" placeholder="Select Policy">
                                        <option class="form-control" value="">Select Insurance</option>
                                        <option class="form-control" value="Health">Health</option>
                                        <option class="form-control" value="Life">Life</option>
                                        <option class="form-control" value="Bike">Bike</option>
                                        <option class="form-control" value="Car">Car</option>
                                    </select>
                                </div>
                            </div>

                            @error('p_desc')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror

                            <label class="mb-0" for="p_desc">Policy Desc</label>
                            <div class="row mb-1">
                                <div class="col-lg-12">
                                    <input name="p_desc" class="form-control" type="text" value="{{ old('p_desc') }}">
                                </div>
                            </div>


                            @error('p_price')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror

                            <label class="mb-0" for="p_price">Policy Price</label>
                            <div class="row mb-1">
                                <div class="col-lg-12">
                                    <input name="p_price" class="form-control" type="number" min="0" value="{{ old('p_price') }}">
                                </div>
                            </div>


                            @error('c_price')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror

                            <label class="mb-0" for="c_price">Claim Price</label>
                            <div class="row mb-1">
                                <div class="col-lg-12">
                                    <input name="c_price" class="form-control" type="number" min="0" value="{{ old('c_price') }}">
                                </div>
                            </div>


                            @error('policy_period')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror

                            <label class="mb-0" for="policy_period">Month Duration </label>
                            <div class="row mb-1">
                                <div class="col-lg-12">
                                    <input name="policy_period" class="form-control" type="number" value="{{ old('policy_period') }}">
                                </div>
                            </div>
                            <br>
                            <button class="btn btn-secondary btn-lg float-right" type="submit">Register Policy</button>
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
