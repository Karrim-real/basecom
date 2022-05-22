<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">DropHut</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
    <div class="navbar-nav">
      <div class="nav-item text-nowrap">
        <a class="nav-link px-3" href="{{ url('/logout') }}" >Sign out</a>
      </div>
    </div>
  </header>

<div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{ url('admin/dashboard') }}">
                <span data-feather="home"></span>
                Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('admin/dashboard') }}">
                <span data-feather="file"></span>
                Products
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('admin/add-product') }}">
                <span data-feather="shopping-cart"></span>
                Add Product
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('admin/categorys') }}">
                <span data-feather="users"></span>
                Categorys
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{ url('admin/add-category') }}">
                <span data-feather="bar-chart-2"></span>
                Add Category
              </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/users') }}">
                  <span data-feather="bar-chart-2"></span>
                  Users
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="{{ route('orders') }}">
                  <span data-feather="bar-chart-2"></span>
                  Orders
                </a>
              </li>
          </ul>

        </div>
      </nav>
