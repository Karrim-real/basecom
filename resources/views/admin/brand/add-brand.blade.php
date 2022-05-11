@include('backend.layout.head')
@include('backend.layout.nav')


    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Add Brand</h1>

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
            <tr>
              <td>1</td>
              <td>Petrol Oil</td>
              <td>It is a petrol oil used used used used used</td>
              <td>8.00</td>
              <td>Oil</td>
              <td><a href="{{ url('edit') }}"><button class="btn btn-primary btn-md">Edit</button> </a></td>
              <td><a href="{{ url('delete') }}"><button class="btn btn-danger btn-md">Edit</button> </a></td>


            </tr>

          </tbody>
        </table>
      </div>

 @include('backend.layout.footer')
