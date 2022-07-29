@section('title', 'Admin Dashboard')
@include('admin.layout.head')
@include('admin.layout.nav')

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">All Products</h1>
        @if (!count($prods))
        <div class="alert alert-warning">
            <h1 class="h2">No Product Available</h1>
        </div>
        @endif

      </div>
@include('admin.layout.message')

<div class="form">
    <form action="{{ route('admin.search.product') }}" method="GET" id="search">
        {{-- <label for="search">Search a product</label> --}}
        <div class="input-search">
         <input class="form-control form-control-dark w-50"
         name="searchname"
         type="text" id="searchbox" placeholder="Search a product by Name or product No" aria-label="Search">
        </div>
    </form>
</div>
<br>

      {{-- <h2>Section title</h2> --}}
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">product Name</th>
              <th scope="col">Short Desc</th>
              <th scope="col">Price ($)</th>
              <th scope="col">Category</th>
              <th scope="col">Edit</th>
              <th scope="col">Delete</th>
            </tr>
          </thead>
          <tbody id="allDatas">
              {{-- {{ dd($prods) }} --}}
              @foreach ($prods as $prod )
            <input type="hidden" name="prodID" id="prodID">
            <tr>
              <td>{{ $prod->id }}</td>
              <td>{{ $prod->title }}</td>
              <td>{{ $prod->desc }}</td>
              <td>{{ $prod->selling_price }}</td>
              <td>{{ $prod->Categorys->title }}</td>
              <td><a href="{{ url('admin/edit-product/'. $prod->id) }}"><button class="btn btn-primary btn-sm">Edit</button> </a></td>
              <td><a href="{{ url('admin/deleteproduct/'.$prod->id) }}" ><button class="btn btn-danger btn-sm" id="delete">Delete</button> </a></td>
            </tr>
            @endforeach
            <tbody id="content">
          </tbody>


        </table>
      </div>
      <br>
      <br>
      <center>{{ $prods->render()}} </center>

 @include('admin.layout.footer')
