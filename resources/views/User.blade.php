<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Starter</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
</head>
<style>
    .container{
        margin-top: 50px
    }
</style>
<body>
    <div class="container">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Welcome to our distinguished site
                </h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->

            @if ($errors->any())
                <br>
                <div class="alert alert-danger" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }} </li>
                        @endforeach

                    </ul>
                </div>
            @endif

            <form action="{{ route('save') }}" method="POST" enctype="multipart/form-data">

                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Title </label>
                        <input type="text" class="form-control" id="Title" name="title" placeholder="Title"
                            value="{{ old('title') }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Message</label>

                        <textarea class="form-control" rows="3" id="message" name="message" placeholder="message....">  {{ old('message') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Your student number
                        </label>
                        <input maxlength="9" type="text" class="form-control" id="student_number"
                            name="Your_student_number" value="{{ old('Your_student_number') }}"
                            placeholder="Your student number">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name </label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="name"
                            value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">email </label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="email"
                            value="{{ old('email') }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Image</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="form-control" id="img" name="img">
                            <label class="custom-file-label" for="img">Choose file</label>
                          </div>
                        </div>
                      </div>

                    <div class="form-group ">
                        <label class="">Type</label>
                        <div class="form-check ml-3">
                            <input class="form-check-input" id="complaints" value="complaints" type="radio"
                                name="radio1" {{ old('radio1') == 'complaints' ? 'checked' : '' }}>
                            <label class="form-check-label">complaints</label>
                        </div>
                        <div class="form-check ml-3 ">
                            <input class="form-check-input" type="radio" value="Suggestion" name="radio1"
                                id="Suggestion" {{ old('radio1') == 'Suggestion' ? 'checked' : '' }}>
                            <label class="form-check-label">Suggestion </label>
                        </div>
                    </div>

              {{-- <div class="col-sm-12">
                  <!-- select -->
                  <div class="form-group">
                    <label>Type</label>
                    <select class="form-control">
                      <option id="complaints" value="complaints" type="radio"
                                name="radio1" {{ old('radio1') == 'complaints' ? 'checked' : '' }}>complaints</option>
                      <option type="radio" value="Suggestion" name="radio1"
                                id="Suggestion" {{ old('radio1') == 'Suggestion' ? 'checked' : '' }}>Suggestion</option>
                    </select>
                  </div>
                </div> --}}
 
                    <div class="form-group">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" name="urgent" id="customSwitch1"
                                checked="{{ old('urgent') }}">
                            <label class="custom-control-label" for="customSwitch1">Is the case urgent?
                            </label>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Submit</button>
                </div>
        </div>
        <!-- /.card-body -->


        </form>
    </div>
    </div>
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios@1.1.2/dist/axios.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="{{asset('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
    {{--  اعداد ملف الانبوت --}}
    <script>
      $(function () {
        bsCustomFileInput.init();
      });
      </script>
</body>
