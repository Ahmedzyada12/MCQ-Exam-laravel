@extends('backEnd.admin_master')
@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">

        <div class="col-md-12">
            {{-- <div class="card mt-4 "> --}}
                <div class="card-header bg-light text-dark text-center">
                    {{-- <h4>Orders</h4> --}}
                </div> <!-- card-header -->

                  <div class="card-body">
                    @if (session('registersubject'))
                    <div class="alert alert-secondary text-center">
                        {{ session('registersubject') }}
                    </div>
                    @endif
                    @if (session('AlreadyRigester'))
                    <div class="alert alert-primary text-center">
                        {{ session('AlreadyRigester') }}
                    </div>
                    @endif
                    <table class="table table-bordered table-striped">

                        <thead>
                            <tr class="bg-light text-dark">
                                <th class="text-dark"> #  </th>
                                <th class="text-dark"> Subject_Name </th>
                                <th class="text-dark"> Score</th>
                            </tr>
                        </thead>

                        <tbody>
                           @foreach ($Results  as $Result)

                           <tr>
                               <td> {{$Result->id}} </td>
                               <td> {{$Result->subject_name}} </td>
                               <td> {{$Result->score}} </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div><!--  card-body -->

            </div> <!-- card -->
        </div> <!-- col-9 -->
    </div> <!-- row -->
</div> <!--  container -->



@endsection
