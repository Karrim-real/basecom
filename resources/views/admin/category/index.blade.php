@include('admin.layout.head')
@include('admin.layout.nav')


    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">All Category</h1>
        @if (!count($categorys))
        <div class="alert alert-warning">
            <h1 class="h2">No Category Available</h1>
        </div>

        @endif
      </div>

      {{-- <h2>Section title</h2> --}}
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Category Name</th>
              <th scope="col">Desc</th>
              <th scope="col">Slug</th>
              {{-- <th scope="col">Category</th> --}}
              <th scope="col">Edit</th>
              <th scope="col">Delete</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($categorys as $category )
            <input type="hidden" name="prodID" id="prodID">
            <tr>
              <td>{{ $category->id }}</td>
              <td>{{ $category->title }}</td>
              <td>{{ $category->desc }}</td>
              <td>{{ $category->slug }}</td>
              {{-- <td>{{ $category->category_id }}</td> --}}
              <td><a href="{{ url('admin/edit-category/'. $category->id) }}"><button class="btn btn-primary btn-md">Edit</button> </a></td>
              <td><a href="{{ url('admin/delete-category/'.$category->id) }}" ><button class="btn btn-danger btn-md" id="delete">Delete</button> </a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

 @include('admin.layout.footer')
