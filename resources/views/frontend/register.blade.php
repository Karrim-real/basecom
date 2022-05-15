@include('frontend.layout.includes.head')
@include('frontend.layout.includes.minicart')
@include('frontend.layout.includes.nav')
    <!--header area end-->

    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="index-2.html">home</a></li>
                            <li>Register</li>
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
                                    <h2>Register now</h2>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis consectetur similique deleniti pariatur enim cumque eum</p>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="account-content">
                            <form action="{{ route('register-form') }}" method="POST" id="registerSubmit">
                                {{ @csrf_field() }}
                                @include('frontend.layout.errors')

                                        <div class="single-acc-field">
                                            <label for="name">Name</label>
                                            <input type="text" id="name" name="name" placeholder="Enter Your Name">
                                        </div>
                                        <div class="single-acc-field">
                                            <label for="email">Email</label>
                                            <input type="email" id="email" name="email" placeholder="Enter your Email">
                                        </div>
                                        <div class="single-acc-field">
                                            <label for="phone">Phone</label>
                                            <input type="phone" id="phone" name="phone" placeholder="Enter your Email">
                                        </div>

                                        <div class="single-acc-field">
                                            <label for="password">Password</label>
                                            <input type="password" id="password" name="password" placeholder="At least 8 Charecter">
                                        </div>
                                        <div class="single-acc-field boxes">
                                            <input type="checkbox" id="checkbox" name="remember">
                                            <label for="checkbox">I'm not a robot</label>
                                        </div>
                                        <div class="single-acc-field">
                                            <button type="submit" name="submit">Register now</button>
                                        </div>
                                        <a href="{{ url('login') }}">Already account? Login</a>
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
