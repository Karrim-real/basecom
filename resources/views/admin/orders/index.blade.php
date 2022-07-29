@section('title', 'All Orders')
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
      @include('admin.layout.message')
      <input class="form-control form-control-dark w-50"
      name="searchname"
      type="search" id="searchorders" placeholder="Search order by ID No or Reference No" aria-label="Search">
      <br>
      {{-- <h2>Section title</h2> --}}
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Billing Email</th>
              <th scope="col">Billing Name</th>
              <th scope="col">Products Name</th>
              <th scope="col">Message</th>
              <th scope="col">Payment Ref</th>
              <th scope="col">Ordered At</th>
              <th scope="col">Status</th>
              <th scope="col">Check</th>
              <th scope="col">Delete</th>
            </tr>
          </thead>
          <tbody id="allOrders">
            @foreach ($allAdminOrders as $orders )
            <tr>
            <td>{{ $orders->id}}</td>
            <td>{{ $orders->users->email}}</td>
            <td>{{ $orders->users->name}}</td>
            <td>{{ $orders->Products->title}}</td>
            <td>{{ $orders->message}}</td>
            <td>{{ $orders->payment_ref}}</td>
            <td>{{ $orders->created_at->diffForHumans()}}</td>
            <td> <button class="btn {{ ($orders->status === 1 ? 'btn-success': 'btn-warning')}} btn-sm">{{ ($orders->status === 1 ? 'success': 'pending')}}</button></td>
            <td> <a class="btn btn-primary btn-sm" href="{{ url('admin/edit-order/'.$orders->id) }}"> check </a></td>
            <td><a class="btn btn-danger btn-sm" href="{{ url('admin/delete-order/'.$orders->id) }}"> Remove </a></td>
            </tr>
            @endforeach
          </tbody>
        </tbody>
        <tbody id="content-order">
      </tbody>
        </table>
      </div>
      <br>
      <br>
      <center>{{ $allAdminOrders->render()}} </center>
 @include('admin.layout.footer')
