
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | General Form Elements</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('backEnd/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('backEnd/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('backEnd/dist/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<nav class="navbar navbar-expand-lg bg-light">
    <div class="container">
      <a class="navbar-brand" href="#">MCQ Exam</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link active" aria-current="page" href="/">Home</a>
          <a class="nav-link" href="/">Profile</a>

        </div>
      </div>
    </div>
  </nav>
<body class="hold-transition sidebar-mini">

<div class="wrapper">
  <!-- Navbar -->
  <section class="content">
    <div class="container mt-5">
      <div class="row">
        <div class="col-md-12">
          <div class="card bg-light">

            <!-- /.card-header -->
            <div class="card-body">

                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                        {{-- <script src="script.js"></script> --}}


                        <form action="{{ route('test.supmit') }}" method="post">
                            {{ csrf_field()}}
                          {{-- <div id="deadline" class="alert alert-warning w-25"></div> --}}
                         <input type="hidden" value="{{$subject_id}}" name="subjectid">
                        @foreach ($questions as $question)
                        <fieldset class="p-3" id="{{$question->id}}">
                        <h3>{{$question->question}}</h3>

                      <div class="form-check">
                        <input class="form-check-input" type="radio" value="1" name="{{$question->id}}" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            {{$question->answer1}}
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" value="2" name="{{$question->id}}" id="flexRadioDefault2" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            {{$question->answer2}}
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" value="3" name="{{$question->id}}" id="flexRadioDefault2" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            {{$question->answer3}}
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" value="4" name="{{$question->id}}" id="flexRadioDefault2" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            {{$question->answer4}}
                        </label>
                      </div>
                      <hr>
                    </fieldset>
                    @endforeach
                    <button id="submitexam" type="submit" class="btn btn-outline-primary"> Finshed</button>

                </form>
                    </div>

                  </div>
                </div>

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->


  </section>


<script>
        const time=duration;
        const duration ={{$duration}}*60;
        //  var deadline=document.getElementById('deadline');
        const deadline = document.getElementById('deadline');

        setInterval(function(){

        const counter=time--,min=(counter/60)>>0, sec=(counter-min*60)+'';
         deadline.textContent=' Exam closes in '+min+': '+(sec.length>1?'': '0')+sec
        //  time!=0||(time=duration);
        if(counter==0){
            document.getElementById('submitexam').click();
        }
        }
        , 1000);
</script>

 @include('backEnd.admin_footer')
