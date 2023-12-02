@extends('layouts.auth')

@section('body')
    <section class="bg-gray vh-100">
        <div class="container">
            <div class="row pt-5 justify-content-center">
                <div class="col-12 col-lg-6 my-auto mb-5 mb-lg-auto me-0">
                    <div class="d-none d-lg-block">
                        <h2>Join the Temancus Community</h2>
                        <p>
                            <ul>
                                <li>Stuck? Ask in the Discussions</li>
                                <li>Get answers from experienced developers from around the world</li>
                                <li>Contribute by answering questions</li>
                            </ul>
                        </p>
                    </div>
                    <div class="d-block d-lg-none fs-4 text-center">
                        Create your account?. it's Free
                      </div>
                    </div>
                      <div class="col-12 col-lg-3 h-100">
                        <a href="" class="nav-link mb-5 text-center">
                          <img src="{{ url('assets/images/temancuslogop.png')}}" alt="Temancus Logo">
                        </a>
                        <div class="card">
                            <form action="#">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control log" id="email" placeholder="adjiedwisandy@gmail.com" autocomplete="off" autofocus>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control border-end-0 pe-0 rouded-0 rounded-start" id="password" name="password" >
                                        <span class="input-group-text bg-white border-start-o pe-auto">
                                            <a href="javascript:;"  id="password-toggle">
                                                <img src="{{ url('assets/images/eye-slash.png')}}" alt="password toggle" id="password-toggle-img">
                                            </a>
                                        </span>
                                      </div>
                                </div>
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="username" class="form-control log" id="username" placeholder="sandy99">
                                </div>
                                <div class="mb-3 d-grid">
                                    <button type="submit" class="btn btn-primary rounded-2">Sign Up</button>
                                </div>
                            </form>
                        </div>
                        <div class="text-center mb-phone">
                            Don't have an account? <a href="{{ route('login')}}" class="text-underline fw-bold text-purple"><u>Sign In</a>
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