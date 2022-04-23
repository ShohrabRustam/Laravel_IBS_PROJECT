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
                    <table class="table table-light">
                        <tbody>
                            <tr>
                                <td scope="row"><img src="{{ $company['logo'] }}" class="img-fluid|thumbnail rounded-top|rounded-end|rounded-bottom|rounded-start|rounded-circle|" alt="image" style="height: 50px; width:100px"> <strong style="margin-left: 20px;margin-right:20px">{{ $company['name'] }}</strong>
                                </td>
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
<!-- Scroll to Top -->
<a id="scroll-to-top" href="#" class="btn btn-primary btn-lg" role="button" title="Return to top of page" data-toggle="tooltip" data-placement="left"><i class="fa fa-arrow-up"></i></a>


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

    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Lato', 'Arial', sans-serif;
  }

  /* HEADINGS */

  h1, p {
    color: #fff;
    text-align: center;
    line-height: 1.4;
  }

  h1 {
    font-size: 2.2rem;
  }

  h2 {
    color: #000;
    font-size: 1.3rem;
    text-align: center;
    line-height: 1.4;
    margin-bottom: 10px;
  }

  /* BASIC SETUP */

  .page-wrapper {
    width: 100%;
    height: auto;
  }

  .nav-wrapper {
    width: 100%;
    position: -webkit-sticky; /* Safari */
    position: sticky;
    top: 0;
    background-color: #fff;
  }

  .grad-bar {
    width: 100%;
    height: 5px;
    background: linear-gradient(-45deg, #EE7752, #E73C7E, #23A6D5, #23D5AB);
    background-size: 400% 400%;
        -webkit-animation: gradbar 15s ease infinite;
      -moz-animation: gradbar 15s ease infinite;
      animation: gradbar 15s ease infinite;
  }

  /* NAVIGATION */

  .navbar {
    display: grid;
    grid-template-columns: 1fr 3fr;
    align-items: center;
    height: 50px;
    overflow: hidden;
  }

  .navbar img {
    height: 30px;
    width: auto;
    justify-self: start;
    margin-left: 20px;
  }

  .navbar ul {
    list-style: none;
    display: grid;
    grid-template-columns: repeat(6,1fr);
    justify-self: end;

  }

  .nav-item a {
    color: #000;
    font-size: 0.9rem;
    font-weight: 400;
    text-decoration: none;
    transition: color 0.3s ease-out;
  }

  .nav-item a:hover {
    color: #3498db;
  }


  .features {
    width: 100%;
    height: auto;
    background-color: #f1f1f1;
    display: flex;
    padding: 50px 20px;
    justify-content: space-around;
  }

  .feature-container {
    flex-basis: 30%;
    margin-top: 10px;
  }

  .feature-container p {
    color: #000;
    text-align: center;
    line-height: 1.4;
    margin-bottom: 15px;
  }

  .feature-container img {
    width: 100%;
    margin-bottom: 15px;
  }

  /* SEARCH FUNCTION */

  #search-icon {
    font-size: 0.9rem;
    margin-top: 3px;
    margin-left: 15px;
    transition: color 0.3s ease-out;
  }

  #search-icon:hover {
    color: #3498db;
    cursor: pointer;
  }

  .search {
    transform: translate(-35%);
    -webkit-transform: translate(-35%);
    transition: transform 0.7s ease-in-out;
    color: #3498db;
  }

  .no-search {
    transform: translate(0);
    transition: transform 0.7s ease-in-out;
  }

  .search-input {
    position: absolute;
    top: -4px;
    right: -125px;
    opacity: 0;
    z-index: -1;
    transition: opacity 0.6s ease;
  }

  .search-active {
    opacity: 1;
    z-index: 0;
  }

  input {
    border: 0;
    border-left: 1px solid #ccc;
    border-radius: 0; /* FOR SAFARI */
    outline: 0;
    padding: 5px;
  }

  /* MOBILE MENU & ANIMATION */

  .menu-toggle .bar{
    width: 25px;
    height: 3px;
    background-color: #3f3f3f;
    margin: 5px auto;
    -webkit-transition: all 0.3s ease-in-out;
    -o-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
  }

  .menu-toggle {
    justify-self: end;
    margin-right: 25px;
    display: none;
  }

  .menu-toggle:hover{
    cursor: pointer;
  }

  #mobile-menu.is-active .bar:nth-child(2){
    opacity: 0;
  }

  #mobile-menu.is-active .bar:nth-child(1){
    -webkit-transform: translateY(8px) rotate(45deg);
    -ms-transform: translateY(8px) rotate(45deg);
    -o-transform: translateY(8px) rotate(45deg);
    transform: translateY(8px) rotate(45deg);
  }

  #mobile-menu.is-active .bar:nth-child(3){
    -webkit-transform: translateY(-8px) rotate(-45deg);
    -ms-transform: translateY(-8px) rotate(-45deg);
    -o-transform: translateY(-8px) rotate(-45deg);
    transform: translateY(-8px) rotate(-45deg);
  }

  /* KEYFRAME ANIMATIONS */

  @-webkit-keyframes gradbar {
      0% {
          background-position: 0% 50%
      }
      50% {
          background-position: 100% 50%
      }
      100% {
          background-position: 0% 50%
      }
  }

  @-moz-keyframes gradbar {
      0% {
          background-position: 0% 50%
      }
      50% {
          background-position: 100% 50%
      }
      100% {
          background-position: 0% 50%
      }
  }

  @keyframes gradbar {
      0% {
          background-position: 0% 50%
      }
      50% {
          background-position: 100% 50%
      }
      100% {
          background-position: 0% 50%
      }
  }

  /* Media Queries */

    /* Mobile Devices - Phones/Tablets */

  @media only screen and (max-width: 720px) {
    .features {
      flex-direction: column;
      padding: 50px;
    }

    /* MOBILE HEADINGS */

    h1 {
      font-size: 1.9rem;
    }

    h2 {
      font-size: 1rem;
    }

    p {
      font-size: 0.8rem;
    }

    /* MOBILE NAVIGATION */

    .navbar ul {
      display: flex;
      flex-direction: column;
      position: fixed;
      justify-content: start;
      top: 55px;
      background-color: #fff;
      width: 100%;
      height: calc(100vh - 55px);
      transform: translate(-101%);
      text-align: center;
      overflow: hidden;
    }

    .navbar li {
      padding: 15px;
    }

    .navbar li:first-child {
      margin-top: 50px;
    }

    .navbar li a {
      font-size: 1rem;
    }

    .menu-toggle, .bar {
      display: block;
      cursor: pointer;
    }

    .mobile-nav {
    transform: translate(0%)!important;
  }

    /* SECTIONS */

    .headline {
      height: 20vh;
    }

    .feature-container p {
      margin-bottom: 25px;
    }

    .feature-container {
      margin-top: 20px;
    }

    .feature-container:nth-child(2) {
      order: -1;
    }

    /* SEARCH DISABLED ON MOBILE */

    #search-icon {
      display: none;
    }

    .search-input {
    display: none;
   }

  }

  .contact h1{

        clear: both;
        color: gray;
  }
  .contact p{
    clear: both;
    color: blue;
}

body
{
      background-color: #181828;
}


</style>
@endsection
