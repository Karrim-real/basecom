@include('admin.layout.head')
@include('admin.layout.nav')


    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">All Orders</h1>
        @if (!count($allAdminOrders))
        <div class="alert alert-warning">
            <h1 class="h2">No Order Available</h1>
        </div>

        @endif
      </div>

      {{-- <h2>Section title</h2> --}}
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">User Email</th>
              <th scope="col">User Name</th>
              <th scope="col">Products Name</th>
              <th scope="col">Message</th>
              <th scope="col">Image Uploaded</th>
              {{-- <th scope="col">Category</th> --}}
              <th scope="col">Status</th>
              <th scope="col">Check</th>
              <th scope="col">Delete</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($allAdminOrders as $orders )
            <tr>
            <td>{{ $orders->id}}</td>
            <td>{{ $orders->users->email}}</td>
            <td>{{ $orders->users->name}}</td>
            <td>{{ $orders->products->title}}</td>
            <td>{{ $orders->message}}</td>
            <td> <img src="{{ asset('uploads/orders/images/'.$orders->image)}}" class="image thumbnail" alt="my image" sizes="10px" height="60px" width="50px" srcset=""> </td>
            <td> <button class="btn {{ ($orders->status === 1 ? 'btn-success': 'btn-warning')}} btn-md">{{ ($orders->status === 1 ? 'Success': 'Pending')}}</button></td>
            <td> <a href="{{ url('admin/edit-order/'.$orders->id) }}"> <button class="btn btn-primary btn-md">Check</button> </a></td>
            <td><a href="{{ url('admin/delete-order/'.$orders->id) }}"> <button class="btn btn-danger btn-md">Remove Order</button> </a> </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

 @include('admin.layout.footer')
