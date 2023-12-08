@extends('layouts.auth')

@section('body')
    <section class="bg-gray vh-100">
        <div class="container h-100 pt-5">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-3">
                    <a href="" class="nav-link mb-5 text-center">
                        <img class="h-32px" src="{{ url('assets/images/temancuslogop.png')}}" alt="">
                    </a>
                    <div class="card mb-5">
                        <form action="{{ route('auth.login')}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control log @error('email') is-invalid @enderror @error('credentials') is-invalid @enderror" name="email"
                                 id="email" placeholder="adjiedwisandy@gmail.com" value="{{ old('email')}}" autocomplete="off" autofocus>
                            @error('email')
                                <div class="invalid-feedback">{{ $message}}</div>
                            @enderror
                            @error('credentials')
                            <div class="invalid-feedback">{{ $message}}</div>
                        @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control border-end-0 pe-0 rouded-0 rounded-start @error('password') is-invalid @enderror" id="password" name="password" >
                                    <span class="input-group-text bg-white border-start-o pe-auto @error('password') border-danger rounded-end @enderror">
                                        <a href="javascript:;"  id="password-toggle">
                                            <img src="{{ url('assets/images/eye-slash.png')}}" alt="password toggle" id="password-toggle-img">
                                        </a>
                                    </span>
                                    @error('password')
                                    <div class="invalid-feedback">{{ $message}}</div>
                                @enderror
                                  </div>
                            </div>
                            <div class="mb-3 d-grid">
                                <button type="submit" class="btn btn-primary rounded-2">Log In</button>
                            </div>
                        </form>
                    </div>
                    <div class="text-center">
                        Don't have an account? <a href="{{ route('auth.sign-up')}}" class="text-underline fw-bold text-purple"><u>Sign Up</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('after-script')
    <script>
        var isPasswordRevealed = false;

        $('#password-toggle').on('click', function(){
            isPasswordRevealed = !isPasswordRevealed;

            if (isPasswordRevealed) {
                $('#password-toggle-img').attr('scr', "{{ url('assets/images/eye.png') }}");
                $('#password').attr('type', 'text');
            }
            else {
                $('#password-toggle-img').attr('scr', "{{ url('assets/images/eye-slash.png') }}");
                $('#password').attr('type', 'password');
            }
        });
    </script>
@endsection