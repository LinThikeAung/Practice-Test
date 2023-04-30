@extends('public.index')
@section('content')
<main class="signup-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                    </div>
                    @endif
                    @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                    </div>
                    @endif
                    <h3 class="card-header text-center">Survey Form</h3>
                    <div class="card-body">
                    <form action="{{ route('form.create') }}" method="POST">
                        @csrf
                        @if($form->name == 1)
                        <div class="form-group mb-3">
                            <label for="name">Name</label>
                            <input type="text" placeholder="Name" id="name" class="form-control" name="name"
                            required autofocus>
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        @endif
                        @if($form->email == 1)
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="text" placeholder="Email" id="email" class="form-control"
                                name="email" required autofocus>
                            @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        @endif
                        @if($form->phone == 1)
                        <div class="form-group mb-3">
                            <label for="phone">Phone</label>
                            <input type="text" placeholder="Phone" id="phone" class="form-control"
                                name="phone" required autofocus>
                            @if ($errors->has('phone'))
                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                            @endif
                        </div>
                        @endif
                        @if($form->dob == 1)
                        <div class="form-group mb-3">
                            <label for="dob">Date Of Birth</label>
                            <input type="text" placeholder="Date Of Birth" id="dob" class="date form-control"
                            name="dob" required>
                            @if ($errors->has('dob'))
                            <span class="text-danger">{{ $errors->first('dob') }}</span>
                            @endif
                        </div>
                        @endif
                        @if($form->gender == 1)
                        <div class="form-group mb-3">
                            <label for="gender">Gender</label><br>
                            <input type="radio" name="gender" id="gender" value="Male"> Male
                            <input type="radio" name="gender" id="gender" value="Female"> Female
                            @if ($errors->has('gender'))
                            <span class="text-danger">{{ $errors->first('gender') }}</span>
                            @endif
                        </div>
                        @endif
                        <div class="d-grid mx-auto">
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
@section('scripts')
    <script type="text/javascript">
        $('.date').datepicker({
        format: 'yyyy-mm-dd'
        });
    </script>
@endsection
