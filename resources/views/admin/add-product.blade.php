@section('title', 'Add Product')
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
    <h4>Add Product</h4>
    {{-- @include('layouts.error') --}}
    <div class="col-md-6">
      <form   method="POST" action="{{ route('admin.addproduct') }}" enctype="multipart/form-data">
          {{csrf_field()}}

      @include('admin.layout.errors')

          <div class="mb-3">
            <label for="name" class="form-label">Product name</label>
            <input type="text" class="form-control" name="title" id="title" aria-describedby="emailHelp">
          </div>

            <input type="hidden" name="user_id" value="{{ Auth::user()->id}}" id="user_id">
          <div class="mb-3">
              <select class="form-control" name="category_id" id="category_id">
                  @foreach ($categorys as $catItems )
                  <option value=" {{ $catItems->id }} ">{{ $catItems->title }}</option>
                  @endforeach
                  {{-- <option value="1">Select a brand</option>
                  <option value="2">Benz</option>
                  <option value="3">Chevorlote</option>
                  <option value="4">Toyota</option> --}}
              </select>
          </div>

          <div class="mb-3">
              <label for="description" class="form-label">Small Description</label>
              <textarea class="form-control" id="desc" name="desc" rows="2"></textarea>
          </div>

          <div class="mb-3">
              <label for="selling_price" class="form-label">Selling Price</label>
              <input type="number" class="form-control" name="selling_price" id="sell ing_price" aria-describedby="emailHelp">
          </div>
          <div class="mb-3">
              <label for="discount_price" class="form-label">Discount Price</label>
              <input type="number" class="form-control" name="discount_price" id="discount_price" aria-describedby="emailHelp">
          </div>
          <div class="mb-3">
            <label for="discount_price" class="form-label">Product Quantity</label>
            <input type="number" class="form-control" name="prod_qty" id="qty" aria-describedby="emailHelp">
        </div>

          <div class="mb-6">
              <label for="status" class="form-label">Status</label>
              <input type="checkbox" class="form-check-input" name="status" id="status" >
          </div>
          <div class="mb-3">
              <label for="meta_keywords" class="form-label">Slug</label>
              <input type="text" class="form-control" name="slug" id="slug" >
          </div>

          <div class="mb-3">
              <label for="image" class="form-label">Product Image</label>
              <input type="file" class="form-control" name="image" id="image"  accept="image/*" id="image" >
          </div>
          <br>

          <div class=" text-center">
            <button type="submit" class="btn btn-lg btn-primary" id="addBtn"> <i class="fa fa-cart-plus" aria-hidden="true"></i> Add Product</button>
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

