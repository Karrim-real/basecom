@section('title', $user->name)
@include('admin.layout.head')
@include('admin.layout.nav')


<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

      <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
          <button type="button" class="btn btn-sm btn-outline-secondary">You Logged As</button>
          <button type="button" class="btn btn-md btn-primary">{{ Auth::user()->name}}</button>
        </div>

      </div>
    </div>
    <h4>Update User Info</h4>
    {{-- @include('layouts.error') --}}
    <div class="col-md-6">
      <form   method="POST" action="{{ route('admin.updateuser', $user->id) }}" enctype="multipart/form-data">
        @csrf
        @method('put')

      @include('admin.layout.errors')

      <div class="mb-3">
        <label for="name" class="form-label">User Fullname</label>
        <input type="text" class="form-control" name="name" value="{{ $user->name }}"  aria-describedby="emailHelp">
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" class="form-control" name="email" value="{{ $user->email }}"  aria-describedby="emailHelp">
      </div>

        <div class="mb-3">
              <label for="phone" class="form-label">Phone</label>
              <input type="text" class="form-control" name="phone"  value="{{$user->phone}}" id="phone" >
          </div>
          <div class="mb-3">
              <label for="role_as"> Role</label>
            <select class="form-control" name="role_as" >
                @if ($user->role_as === 1)
                <option value="1">Admin</option>
                @endif
                <option value="0">User</option>
                <option value="1">Admin</option>
            </select>
        </div>

          <div class="mb-3">
            <label for="Date joined" class="form-label">Date Joine</label>
            <input type="text" class="form-control" name="phone"  value="{{$user->created_at->diffForHumans()}}" id="date" disabled >
        </div>

          <br>

          <div class=" text-center">
            <button type="submit" class="btn btn-lg btn-primary" id="addBtn"> <i class="fa fa-cart-plus" aria-hidden="true"></i> Update Profile</button>
          </div>
      </form>
      </div>

  </main>
</div>
</div>
<br>
<br>
<br>
<br>
 @include('admin.layout.footer')
