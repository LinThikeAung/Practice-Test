<!DOCTYPE html>
<html>
<head>
<title>Practical Test Laravel</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-light navbar-expand-lg mb-5" style="background-color: #e3f2fd;">
        <div class="container">
            <a class="navbar-brand mr-auto" href="#">Practical Test</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register.user') }}">Register</a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <main class="signup-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="card">
                    <h3 class="card-header text-center">Dynamic Forms</h3>
                    @php
                        $form = \App\Models\Form::first();
                    @endphp
                    <div class="card-body">
                        <h5 class="mb-3">Fields On Form</h5>
                        <form action="{{ route('dynamic.form') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-2 form-group">
                                    <input type="checkbox" class="mr-3" name="name"   id="name"  value="1" @if($form) @if($form->name == 1) checked @endif @endif> Name
                                    @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-2 form-group">
                                    <input type="checkbox" class="mr-3" name="email"  id="email" value="1" @if($form) @if($form->email == 1) checked @endif @endif> Email
                                    @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-2 form-group">
                                    <input type="checkbox" class="mr-3" name="phone"  id="phone" value="1" @if($form) @if($form->phone == 1) checked @endif @endif> Phone
                                </div>
                                <div class="col-md-2 form-group">
                                    <input type="checkbox" class="mr-3" name="dob"    id="dob" value="1" @if($form) @if($form->dob == 1) checked @endif @endif> Date Of Birth
                                </div>
                                <div class="col-md-2 form-group">
                                    <input type="checkbox" class="mr-3" name="gender" id="gender" value="1" @if($form) @if($form->gender == 1) checked @endif @endif> Gender
                                </div>
                                <div class="col-md-2 form-group">
                                    <input type="submit" class="btn btn-primary border" value="Update" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
</html>
