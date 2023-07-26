@extends('backEnd.admin_master')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-10 mt-4">
            <div class="card">
                <div class="card-header bg-light text-dark text-center">
                    <h4> All Products</h4>
                    @if (session('message'))
                    <div class="alert alert-light">
                        {{ session('message') }}
                    </div>
                    @endif
                </div> <!-- card-header -->

                <div class="card-body">
                    @if (count($products)>0)
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th> ID </th>
                                <th> Image </th>
                                <th> Name </th>
                                <th> Category </th>
                                <th> Price </th>
                                <th> Edit </th>
                                {{-- <th> Show </th> --}}
                                <th> DELETE </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($products as  $product)
                            <tr>
                                <td> {{$product->id  }} </td>
                                <td> <img src="{{ Storage::url($product->image)}}" width="160" alt=""> </td>
                                <td> {{ $product->name }} </td>
                                <td> {{ $product->category->name}} </td>
                                <td> {{ $product->price }} </td>
                                <td> <a href="{{ route('adminproduct.edit',$product->id ) }}" class="btn btn-small btn-outline-dark"><i class="fas fa-pen"></i> </a>  </td>
                                {{-- <td> <a href="{" class="btn btn-small btn-danger"><i class="fa-solid fa-trash-can"></i></a> --}}
                                  </td>

                                   <form action="{{ route('adminproduct.destroy',$product->id ) }}"  method="post">
                                    @csrf
                                    @method('DELETE')
                                    <td><button type="submit" class="btn btn-small btn-outline-secondary"><i class="fas fa-trash"></i></button></td>
                                </form>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                            <h1 class="text-center">No Products</h1>
                    @endif
                </div><!--  card-body -->

                 <div class="card-footer">

                </div><!--  card-footer -->

            </div> <!-- card -->
        </div> <!-- col-9 -->
    </div> <!-- row -->
</div> <!--  container -->
@endsection
