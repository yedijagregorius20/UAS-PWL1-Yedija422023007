{{-- START OF HEADER AREA --}}
<nav class="navbar navbar-expand-lg navbar-light bg-light px-5 py-4 header-area">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav" style="gap: 30px">
      @php
        $currentUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $targetUrl = 'http://127.0.0.1:8000/';
      @endphp

      @if ($currentUrl === $targetUrl)
        <a class="nav-custom nav-item nav-link active" href="#">Home</a>
      @else
        <a class="nav-custom nav-item nav-link" href="#">Home</a>
      @endif
      
      <a class="nav-custom nav-item nav-link" href="#">Medicine</a>
      <a class="nav-custom nav-item nav-link" href="#">Reservation</a>
      <a class="nav-custom nav-item nav-link" href="#">Other Services</a>
    </div>
  </div>

  {{-- Wishlist Link --}}
  <div class="header-right-side text-end" style="gap: 15px;">
      <div class="header-right-items d-none d-md-block border p-2" style="margin-right: 20px;">
          <a href="#wishlist" class="header-cart">
              <i class="bi bi-shop h2"></i>
              <span class="item-counter">1</span>
          </a>
      </div>
  </div>

  {{-- Profile Icon --}}
  <div class="header-right-items d-none d-md-block">
    @if(@$_COOKIE['ut'])
        <div class="dropdown">
            <a href="#" class="dropdown-toggle" role="button" data-bs-toggle="dropdown">
                Hello, {{ucwords(substr($_COOKIE['ue'], 0, 3))}}
            </a>

            <ul class="dropdown-menu">
                <li>
                    <a href="#my-profile"><span>My profile</span></a>
                </li>
                <li>
                    <a href="#" id="logout-btn"><span>Logout</span></a>
                </li>
            </ul>
        </div>
    @else
        <a href="#" data-bs-toggle="modal" data-bs-target="#authModal">
            <i class="icon-user h3"></i>
        </a>
    @endif
  </div>

  <div class="header-login-register-wrapper modal fade" id="authModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-box-wrapper">
                <div class="helendo-tabs">
                    <ul class="nav" role="tablist">
                        <li class="tab__item nav_item active">
                            <a href="#tab_list_06" data-bs-toggle="tab" role="tab" class="nav-link active">Login</a>
                        </li>
  
                        <li class="tab__item nav-item">
                            <a href="#tab_list_07" data-bs-toggle="tab" role="tab" class="nav-link">Our Register</a>
                        </li>
                    </ul>
                </div>
  
                <div class="tab-content content-modal-box">
                    <div class="tab-pane fade show active" id="tab_list_06" role="tabpanel">
                        <form action="" id="form-login" class="account-form-box">
                            <h6 class="mb-3">Login your account</h6>
                            <b id="form-login-error" class="text-red"></b>
  
                            <div class="single-input">
                                <input type="text" name="email" placeholder="Email" required>
                            </div>
  
                            <div class="single-input">
                                <input name="password" type="password" placeholder="Password" required>
                            </div>
  
                            <div class="checkbox-wrap mt-10">
                                <label class="label-for-checkbox inline mt-15">
                                    <input type="checkbox" name="rememberme" id="rememberme" value="forever" class="input-checkbox"><span>Remember me</span>
                                </label>
                                <a href="#" class="mt-10">Lost your password?</a>
                            </div>
  
                            <div class="button-box mt-25">
                                <a href="#" class="btn btn--full btn--black" id="form-login-btn">Log in</a>
                            </div>
                        </form>
  
                        <div id="form-login-loading" style="text-align: center;display: none">
                            <img src="{{asset('assets/images/bg/loading.gif')}}" style="width: 300px">
                        </div>
                    </div>
  
                    <div class="tab-pane fade" id="tab_list_07" role="tabpanel">
                        <form action="" class="account-form-box" id="form-register">
                            <h6 class="mb-6">Register An Account</h6>
                            <b id="form-register-error" class="text-red"></b>
  
                            <div class="single-input">
                                <input type="text" name="name" placeholder="Name" required>
                            </div>
  
                            <div class="single-input">
                                <input type="password" name="password" placeholder="Password" required>
                            </div>
  
                            <div class="single-input">
                                <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
                            </div>
  
                            <p class="mt-15">
                                Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our <a href="#" class="text-color-primary" target="_blank">privacy policy</a>
                            </p>
  
                            <div class="button-box mt-25">
                                <a href="" class="btn btn--full btn--black" id="form-register-btn">Log in</a>
                            </div>
                        </form>
  
                        <div id="form-register-loading" style="text-align: center;display: none">
                            <img src="{{asset('assets/images/bg/loading.gif')}}" style="width: 300px">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</nav>

{{-- END OF HEADER AREA --}}
