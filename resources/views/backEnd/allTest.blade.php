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

                {{-- @if (count($orders)>0) --}}
                    <table class="table table-bordered table-striped">

                        <thead>
                            <tr class="bg-light text-dark">
                            <th class="text-dark"> name  </th>
                                <th class="text-dark"> exam_availability </th>
                                <th class="text-dark"> exam_start</th>
                                <th class="text-dark"> exam_deadline </th>
                                <th class="text-dark"> Register </th>
                                <th class="text-dark"> Start Exam  </th>
                            </tr>
                        </thead>

                        <tbody>
                        @foreach ($subjects  as $subject)
                        {{-- @if ($subject->exam_start  < $subject->exam_deadline) --}}
                           <tr>
                               <td> {{$subject->name}} </td>
                               @if ($subject->exam_availability == 1)
                               <td>Yes</td>
                               @else
                               <td> No</td>
                               @endif
                               <td>{{$subject->exam_start}}  </td>
                               <td> {{$subject->exam_deadline}} </td>

                               @if ($subject->exam_start  < $subject->exam_deadline  )
                               <td> <a href="{{ route('registersubject', ['subject_id'=>$subject->id]) }}" class="btn btn-outline-primary"> Register</a> </td>
                               @else ($subject->exam_start > $subject->exam_deadline )
                               <td>deadline passed</td>
                               @endif

                               @if ($subject->exam_start  < $subject->exam_deadline  )
                               <td> <a href="{{ route('test.index', ['subject_id'=>$subject->id]) }}" class="btn btn-outline-danger"> Start Exam </a> </td>
                               @elseif ($subject->exam_start > $subject->exam_deadline )
                                <td>deadline passed</td>
                               <!-- {{-- <td> <a href="" class="btn btn-outline-danger"> Start Exam </a> </td> --}} -->
                               @else
                               <td> deadline passed</td>
                               @endif
                               <!-- {{-- <td><a href=" "  class="btn btn-outline-primary">details </a></td> --}} -->
                            </tr>
                            {{-- @else --}}
                            {{-- <div></div> --}}
                            {{-- @endif --}}
                            @endforeach
                        </tbody>
                    </table>
                </div><!--  card-body -->

            </div> <!-- card -->
        </div> <!-- col-9 -->
    </div> <!-- row -->
</div> <!--  container -->



@endsection
