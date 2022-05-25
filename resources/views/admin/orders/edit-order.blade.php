@section('title', $Orders->products->title)
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
    <h4>Edit Category</h4>
    {{-- @include('layouts.error') --}}
    <div class="col-md-6">
      <form   method="POST" action="{{ route('admin.updateorder', $Orders->id) }}" enctype="multipart/form-data">
        @csrf
        @method('put')

      @include('admin.layout.errors')

          <div class="mb-3">
            <label for="name" class="form-label">Product title</label>
            <input type="text" class="form-control" name="title" value="{{ $Orders->products->title }}" disabled aria-describedby="emailHelp">
          </div>
          <div class="mb-3">
            <label for="name" class="form-label">Product title</label>
            <input type="text" class="form-control" name="title" value="{{ $Orders->products->title }}" disabled aria-describedby="emailHelp">
          </div>
            <div class="mb-3">
                <label for="description" class="form-label">Order Message</label>
                <textarea class="form-control" id="desc" name="desc" rows="2"> {{$Orders->message }}</textarea>
            </div>

            <div class="mb-3">
                <select class="form-control" name="status" >
                    @if ($Orders->status === 1)
                    <option value="1">Approved</option>
                    @endif
                    <option value="0">Pending</option>
                    <option value="1">Approved</option>
                </select>
            </div>

          <div class="mb-3">
            <img class="product-img" src="{{ asset('uploads/orders/images/'.$Orders->image)}}" alt="{{ $Orders->image}}" srcset="">
        </div>

          <div class=" text-center">
            <button type="submit" class="btn btn-lg btn-primary" id="addBtn"> <i class="fa fa-cart-plus" aria-hidden="true"></i> Submit</button>
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
