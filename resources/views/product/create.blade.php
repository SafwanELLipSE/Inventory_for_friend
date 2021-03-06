@extends('layouts.app')

@section('content')
<div class="content">
    <!-- content HEADER -->
    <!-- ========================================================= -->
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><a href=""><i class="fa fa-columns" aria-hidden="true"></i>Create Product</a></li>
            </ul>
        </div>
    </div>
    <div class="col-sm-12">
        <h4 class="section-subtitle">Create New Product</h4>
        <div class="panel">
            <div class="panel-content">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('product.save_created') }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label for="name">Name</label>
                                  <input type="text" class="form-control" id="name" name="name" placeholder="Full Name">
                              </div>
                              <div class="form-group">
                                 <label class="control-label">Category</label>
                                 <select id="category" name="category" class="form-control" style="width: 100%">
                                   <option value="none" selected="" disabled="">Select Category</option>
                                   @foreach($categories as $category)
                                      <option data-category="{{$category->id}}" value="{{ $category->id }}">{{ $category->name }}</option>
                                   @endforeach
                                 </select>
                              </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">Color</label>
                                    <input type="text" class="form-control" id="color" name="color" placeholder="Color of product">
                                </div>

                                <div class="form-group">
                                   <label class="control-label">Sub-category</label>
                                   <select id="subCategory" name="sub_category" class="form-control" style="width: 100%">
                                     <option value="none" selected="" disabled="">Select Sub-category</option>
                                     @foreach($categories as $category)
                                         @foreach($category->subcategory as $item)
                                           <option data-category="{{$item->category_id}}" value="{{$item->id}}">{{ $item->name }}</option>
                                         @endforeach
                                     @endforeach
                                   </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                  <label for="product detail">Product Detail</label>
                                  <textarea type="text" class="form-control" rows="5" name="desc" placeholder="Details"></textarea>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                  <label for="file">Upload Image</label>
                                  <input type="file" name="photo" id="file" placeholder="no file selected">
                              </div>
                              <div class="form-group">
                                  <button type="submit" class="btn btn-primary">Submit</button>
                              </div>
                            </div>
                          </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('additional_scripts')
  <script src="{{ asset('javascripts/create_product.js') }}"></script>
@endsection
