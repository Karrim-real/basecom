@section('title', $product->title)
@include('admin.layout.head')
@include('admin.layout.nav')


<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

      <div class="btn-toolbar mb-2 mb-md-0">
        <!-- <div class="btn-group me-2">
          <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
          <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
        </div> -->

      </div>
    </div>
    <h4>Edit Category</h4>
    {{-- @include('layouts.error') --}}
    <div class="col-md-6">
      <form   method="POST" action="{{ route('admin.updateproduct',$product->id )}}"  enctype="multipart/form-data">
          @csrf
          @method('put')

      @include('admin.layout.errors')
          <div class="mb-3">
            <label for="name" class="form-label">Product name</label>
            <input type="text" class="form-control" value="{{ $product->title }}" name="title" id="title" aria-describedby="emailHelp">
          </div>
    <input type="hidden" name="user_id" value="{{ Auth::user()->id}}" id="user_id">
    {{-- <input type="hidden" name="prodID" id="prodID" value="{{ $product->id }}"> --}}
          <div class="mb-3">
              <select class="form-control" name="category_id" id="category_id">
                  @foreach ($categorys as $catItems )
                  <option value=" {{ $catItems->id }} ">{{ $catItems->title }}</option>
                  @endforeach
              </select>
          </div>

          <div class="mb-3">
              <label for="description" class="form-label">Description</label>
              <textarea class="form-control" id="small_desc"  name="desc" rows="2">{{ $product->desc }}</textarea>
          </div>

          <div class="mb-3">
              <label for="selling_price" class="form-label">Selling Price</label>
              <input type="number" class="form-control" name="selling_price" value="{{ $product->selling_price }}"id="selling_price" aria-describedby="emailHelp">
          </div>
          <div class="mb-3">
              <label for="discount_price" class="form-label">Discount Price</label>
              <input type="number" class="form-control" value="{{ $product->discount_price }}" name="discount_price" id="discount_price" aria-describedby="emailHelp">
          </div>
          <div class="mb-3">
            <label for="discount_price" class="form-label">Product Quantity</label>
            <input type="number" class="form-control" value="{{ $product->prod_qty }}" name="prod_qty" id="prod_qty" aria-describedby="emailHelp">
        </div>

          <div class="mb-6">
              <label for="status" class="form-label">Status</label>
              {{-- {{dd($product->status)}} --}}
              <input type="checkbox" class="form-check-input" {{($product->status == 1 ? "checked" : '')}} name="status" id="status" >
          </div>
          <div class="mb-3">
              <label for="meta_keywords" class="form-label">Slug</label>
              <input type="text" class="form-control" value="{{ $product->slug }}" name="slug" id="slug" >
          </div>
          <div class="mb-3">
            <img class="product-img" src="{{ asset('uploads/products/images/'.$product->image)}}" alt="{{ $product->title}}" srcset="">
        </div>
          <div class="mb-3">
              <label for="image" class="form-label">Product Image</label>
              <input type="file" class="form-control" name="image" id="image"  accept="image/*" id="image" >
          </div>
        <button type="submit" class="btn btn-primary" id="addBtn">Update Product</button>
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
