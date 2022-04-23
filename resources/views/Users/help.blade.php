@extends('Layout.master')
@section('title')
    Help
@endsection

@section('section')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<div>
  <div class="contact-form-wrapper d-flex justify-content-center">
    <form action=" {{ URL::to('/help') }} " method="POST" class="contact-form">
        @csrf
      <h5 class="title">Contact us</h5>
      @if(Session::has('success'))
      <div class="alert alert-success" role="alert">
          {{ Session::get('success') }}
      </div>
      @endif
      @if(Session::has('fail'))
      <div class="alert alert-alert" role="alert">
          {{ Session::get('fail') }}
      </div>
      @endif
      <p class="description">Feel free to contact us if you need any assistance, any help or another question.
      </p>
      @error('name')
      <div class="alert alert-danger" role="alert">
          {{ $message }}
      </div>
        @enderror

      <div>
        <input type="text" class="form-control rounded border-white mb-3 form-input" name="name" id="name" value="{{ old('name') }}" placeholder="Name" required>
      </div>
      @error('email')
      <div class="alert alert-danger" role="alert">
          {{ $message }}
      </div>
        @enderror
      <div>
        <input type="email" class="form-control rounded border-white mb-3 form-input" name="email" value="{{ old('email') }}" placeholder="Email" required>
      </div>
      @error('email')
      <div class="alert alert-danger" role="alert">
          {{ $message }}
      </div>
        @enderror
      <div>
        <textarea id="message" name="message" aria-valuetext="{{ old('value') }}" class="form-control rounded border-white mb-3 form-text-area" rows="5" cols="30" placeholder="Message" required></textarea>
      </div>
      <div class="submit-button-wrapper">
        <input type="submit" value="Send">
      </div>
    </form>
  </div>
</div>
<style>
    body {
  background-color: #f5e0e5 !important;
  font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
}

.contact-form-wrapper {
  padding: 100px 0;
}

.contact-form {
  padding: 30px 40px;
  background-color: #ffffff;
  border-radius: 12px;
  max-width: 400px;
}

.contact-form textarea {
  resize: none;
}

.contact-form .form-input,
.form-text-area {
  background-color: #f0f4f5;
  height: 50px;
  padding-left: 16px;
}

.contact-form .form-text-area {
  background-color: #f0f4f5;
  height: auto;
  padding-left: 16px;
}

.contact-form .form-control::placeholder {
  color: #aeb4b9;
  font-weight: 500;
  opacity: 1;
}

.contact-form .form-control:-ms-input-placeholder {
  color: #aeb4b9;
  font-weight: 500;
}

.contact-form .form-control::-ms-input-placeholder {
  color: #aeb4b9;
  font-weight: 500;
}

.contact-form .form-control:focus {
  border-color: #f33fb0;
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.07), 0 0 8px #f33fb0;
}

.contact-form .title {
  text-align: center;
  font-size: 24px;
  font-weight: 500;
}

.contact-form .description {
  color: #aeb4b9;
  font-size: 14px;
  text-align: center;
}

.contact-form .submit-button-wrapper {
  text-align: center;
}

.contact-form .submit-button-wrapper input {
  border: none;
  border-radius: 4px;
  background-color: #f23292;
  color: white;
  text-transform: uppercase;
  padding: 10px 60px;
  font-weight: 500;
  letter-spacing: 2px;
}

.contact-form .submit-button-wrapper input:hover {
  background-color: #d30069;
}

</style>
    {{-- <div class="container py-3">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <span class="anchor" id="formContact"></span>
                <hr class="my-5">
                <!-- form contact -->
                <div class="card card-outline-secondary">
                    <div class="card-header">
                        <h3 class="mb-0">Any Help</h3>
                    </div>
                    <div class="card-body">
                        @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                    @endif
                    @if(Session::has('fail'))
                    <div class="alert alert-alert" role="alert">
                        {{ Session::get('fail') }}
                    </div>
                    @endif
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
                                <br>
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

    </style> --}}
@endsection
