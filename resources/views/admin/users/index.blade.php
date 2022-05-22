@include('admin.layout.head')
@include('admin.layout.nav')


    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">All Category</h1>
        @if (!count($allUsers))
        <div class="alert alert-warning">
            <h1 class="h2">No User Available</h1>
        </div>

        @endif
      </div>

      {{-- <h2>Section title</h2> --}}
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Phone</th>
              <th scope="col">Role</th>
              <th scope="col">Date Joined</th>
              <th scope="col">Edit</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($allUsers as $users )
            <tr>
              <td>{{ $users->id }}</td>
              <td>{{ $users->name }}</td>
              <td>{{ $users->email }}</td>
              <td>{{ $users->phone }}</td>
            <td> <button class="btn {{ ($users->role_as === 1 ? 'btn-success': 'btn-warning')}} btn-md">{{ ($users->role_as === 1 ? 'Admin': 'User')}}</button></td>
              <td>{{ $users->created_at->diffForHumans() }}</td>
              {{-- <td>{{ $category->category_id }}</td> --}}
              <td><a href="{{ url('admin/useredit/'. $users->id) }}"><button class="btn btn-primary btn-md">Edit</button> </a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

 @include('admin.layout.footer')
