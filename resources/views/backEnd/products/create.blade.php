@extends('backEnd.admin_master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">


            <div class="col-md-10 mt-4">
                <div class="card">
                    <div class="card-header bg-light text-dark text-center">
                        <h4> Add Product</h4>
                    </div> <!-- card-header -->

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('adminproduct.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class=" mb-3">
                                <label class="form-label"> Name Of Product </label>
                                <input type="text" class="form-control form-control-lg" name="name"
                                    placeholder="Name Of Meal">
                            </div> <!-- name -->

                            <div class=" mb-3">
                                <label class="form-label"> Description Of Product </label>
                                <textarea class="form-control form-control-lg" name="description" rows="5" placeholder="description Of Meal"></textarea>
                            </div> <!-- description -->


                            <div class="mb-3">
                                <label class="form-label"> Product Price($) </label>
                            </div>

                            <div class="row g-4 mb-3"  >

                                <div class="col-auto">
                                    <input type="number"  class="form-control form-control-lg" name="price"
                                        placeholder=" price">
                                </div>
                            </div> <!-- in line prices -->

                            <div class=" mb-3">
                                <label class="form-label"> Category Of Product </label>
                                <select class="form-control form-control-lg" name="category_id">
                                    <option>Select Category</option>
                                    @foreach ($categories as $category)
                                  <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach

                                </select>
                            </div> <!-- categories -->


                            <div class=" mb-3">
                                <label class="form-label">Image Of Product </label>
                                <input type="file" class="form-control form-control-lg" name="image">
                            </div> <!-- image -->


                            <div class=" mb-3 text-center">
                                <button type="submit" class="btn btn-outline-dark btn-lg w-100 ">Add Product</button>
                            </div> <!-- button -->
                        </form>
                    </div><!--  card-body -->

                    {{--  <div class="card-footer">

                </div><!--  card-footer -->  --}}

                </div> <!-- card -->
            </div> <!-- col-9 -->
        </div> <!-- row -->
    </div> <!--  container -->
@endsection
