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

    <div class="header-right-side text-end" style="gap: 15px;">
        <div class="header-right-items d-none d-md-block border p-2">
            <a href="#wishlist" class="header-cart">
                <i class="bi bi-shop h2"></i>
                <span class="item-counter">1</span>
            </a>
        </div>

        <button type="button" class="btn" style="background-color: #01525D; color: white;">Consult Now</button>
    </div>
</nav>