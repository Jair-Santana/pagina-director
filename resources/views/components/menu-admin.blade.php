<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

<style>

  .navbar {
    padding: 0 1em;
    display: flex !important;
    justify-content: space-between;
    align-items: center ;
    margin: 1em;
    border-radius: 10px;
  }

  .nav-item {
    display: flex;
    align-items: center;
  }

  .navbar-logo-centered .navbar-nav .nav-link {
    padding: .5em 1em;
  }

  a {
    color: #fff !important;
    text-decoration: none;
  }

  @media (min-width: 992px) {
     .img-centered {
      margin-left: 30%;
    }
  }

</style>

<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #101011;">
  <a class="navbar-brand d-lg-none" href="#"><img src="{{ URL::asset('assets/images/logo.png')}}" alt="Logo" width="100px"></a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#myNavbarToggler7" aria-controls="myNavbarToggler7" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="myNavbarToggler7">
    <ul class="navbar-nav mx-auto">
      <li class="nav-item">
        <a class="nav-link" href="{{ action('App\Http\Controllers\WorkController@displayWork') }}">ir a home</a>
      </li>
      <a class="img-centered d-none d-lg-block" href="{{ action('App\Http\Controllers\WorkController@displayWork') }}"> <img src="{{ URL::asset('assets/images/logo.png')}}" alt="Logo" width="50%"></a>
      <li class="nav-item">
      </li>
    </ul>
  </div>
</nav>