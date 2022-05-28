@section('title', 'Reset Password')
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
                            <li><a href="{{ url('/')}}">home</a></li>
                            <li>Reset Password</li>
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
                                    <h2>Reset password?</h2>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis consectetur similique deleniti pariatur enim cumque eum</p>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="account-content">
                                    <form action="{{  route('changepasspost',$verifyToken) }}" method="POST" id="forgetForm">
                                        {{ @csrf_field() }}
                                        @include('frontend.layout.errors')
                                        <div class="single-acc-field">
                                            <label for="password">New Password</label>
                                            <input type="password" id="password" name="password"  placeholder="Enter your New Password">
                                        </div>
                                        <div class="single-acc-field">
                                            <label for="password_confirmation">Confirm Password</label>
                                            <input type="password" id="password_confirmation" name="password_confirmation"  placeholder="Enter Confirm Password">
                                        </div>
                                        <div class="single-acc-field">
                                            <button type="submit">Reset Password</button>
                                        </div>
                                        <a href="{{ url('login') }}">Login now</a>
                                    </form>
                                </div>
                            </div>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</section>
    @include('frontend.layout.includes.footer')
   @include('frontend.layout.includes.alert-message')

