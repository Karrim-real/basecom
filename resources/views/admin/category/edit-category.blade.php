@section('title', 'Edit Category')
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
      <form   method="POST" action="{{ route('admin.updatecategory', $category->id) }}" enctype="multipart/form-data">
        @csrf
        @method('put')

      @include('admin.layout.errors')

          <div class="mb-3">
            <label for="name" class="form-label">Category title</label>
            <input type="text" class="form-control" name="title" value="{{ $category->title }}" id="title" aria-describedby="emailHelp">
          </div>

            <input type="hidden" name="user_id" value="{{ Auth::user()->id}}" id="user_id">

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="desc" name="desc" rows="2"> {{$category->desc }}</textarea>
            </div>
          <div class="mb-6">
              <label for="status" class="form-label">Status</label>
              <input type="checkbox" class="form-check-input" {{( $category->status == 1 ? 'checked' : '') }} name="status" id="status" >
          </div>
          <div class="mb-3">
              <label for="meta_keywords" class="form-label">Slug</label>
              <input type="text" class="form-control" name="slug"  value="{{$category->slug}}" id="slug" >
          </div>

          <div class="mb-3">
            <img class="product-img" src="{{ asset('uploads/categorys/images/'.$category->images)}}" alt="{{ $category->title}}" srcset="">
        </div>
          <div class="mb-3">
              <label for="image" class="form-label">Product Image</label>
              <input type="file" class="form-control" name="images" id="images"  accept="image/*" id="image" >
          </div>
          <br>

          <div class=" text-center">
            <button type="submit" class="btn btn-lg btn-primary" id="addBtn"> <i class="fa fa-cart-plus" aria-hidden="true"></i> Update Category</button>
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
