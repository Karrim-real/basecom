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
          <tbody>
              {{-- {{ dd($prods) }} --}}
              @foreach ($prods as $prod )
                  <input type="hidden" name="prodID" id="prodID">
            <tr>
              <td>{{ $prod->id }}</td>
              <td>{{ $prod->name }}</td>
              <td>{{ $prod->short_desc }}</td>
              <td>{{ $prod->selling_price }}</td>
              <td>{{ $prod->brand_id }}</td>
              <td><a href="{{ url('edit-product/'. $prod->id) }}"><button class="btn btn-primary btn-md">Edit</button> </a></td>
              <td><a href="{{ url('delete-product/'.$prod->id) }}" ><button class="btn btn-danger btn-md" id="deleteBtn">Delete</button> </a></td>

            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

 @include('admin.layout.footer')
