@extends('Admin.master')
@section('title')
Add Policy
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
                    <h3 class="mb-0">Add Policy </h3>
                </div>
                <div class="card-body">
                    <table class="table table-light">
                        <tbody>
                            <tr>
                                <td scope="row"><img src="{{ $companyid['logo'] }}"
                                        class="img-fluid|thumbnail rounded-top|rounded-end|rounded-bottom|rounded-start|rounded-circle|"
                                        alt="image" style="height: 50px; width:100px">  <strong style="margin-left: 20px;margin-right:20px">{{ $companyid['name'] }}</strong> </td>
                            </tr>
                        </tbody>
                    </table>
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
                    <form autocomplete="off" action=" {{ URL::to('/addPolicy') }} " method="POST" class="form"
                        role="form">
                        @csrf
                        <fieldset>
                            <input type="hidden" name="companyid" value="{{ $companyid['id'] }}">
                            @error('name')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror

                            <label class="mb-0" for="policyname">Policy Name</label>
                            <div class="row mb-1">
                                <div class="col-lg-12">
                                    <input class="form-control" name="policyname" required="" type="text"
                                        value="{{ old('policyname') }}">
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
                                    <select class="form-control" name="policytype" placeholder="Select Policy" required>
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
                                    <input name="p_desc" class="form-control" type="text" required
                                        value="{{ old('p_desc') }}">
                                </div>
                            </div>


                            @error('p_desc')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror

                            <label class="mb-0" for="p_price">Policy Price</label>
                            <div class="row mb-1">
                                <div class="col-lg-12">
                                    <input name="p_price" class="form-control" type="number" min="0" required min="500"
                                        value="{{ old('p_price') }}">
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
                                    <input name="c_price" class="form-control" type="number" min="0" min="5000" required
                                        value="{{ old('c_price') }}">
                                </div>
                            </div>


                            <label class="mb-0" for="c_price">Month Duration </label>
                            <div class="row mb-1">
                                <div class="col-lg-12">
                                    <input name="policy_period" class="form-control" type="number" min="1" required
                                        value="{{ old('policy_period') }}">
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
