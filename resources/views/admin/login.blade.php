@include('admin.layout.includes.head')
{{-- @include('admin.layout.includes.minicart') --}}
{{-- @include('admin.layout.includes.nav') --}}
    <!--header area end-->

    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="{{ url('')}}">home</a></li>
                            <li>Login</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

	<section class="account">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-10">
					<div class="account-contents" style="background: url('assets/img/about/about1.jpg'); background-size: cover;">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="account-thumb">
                                    <h2>Login now</h2>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis consectetur similique deleniti pariatur enim cumque eum</p>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="account-content">
                                    <form action="{{ route('admin.loginpost') }}" method="POST" id="loginPost">
                                        {{ @csrf_field() }}
                                        @include('frontend.layout.errors')
                                        <div class="single-acc-field">
                                            <label for="email">Email</label>
                                            <input type="email" id="email" name="email" placeholder="Enter your Email">
                                        </div>
                                        <div class="single-acc-field">
                                            <label for="password">Password</label>
                                            <input type="password" id="password" name="password" placeholder="Enter your password">
                                        </div>
                                        <div class="single-acc-field boxes">
                                            <input type="checkbox" id="checkbox">
                                            <label for="checkbox">Remember me</label>
                                        </div>
                                        <div class="single-acc-field">
                                            <button type="submit" name="submit">Login Account</button>
                                        </div>
                                        <a href="{{ url('admin/forgetpassword') }}">Forget Password?</a>
                                        {{-- <a href="{{ url('register') }}">Not Account Yet?</a> --}}
                                    </form>
                                </div>
                            </div>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</section>

    <!--footer area start-->
    @include('frontend.layout.includes.footer')
