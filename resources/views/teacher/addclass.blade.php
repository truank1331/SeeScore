@extends('layouts.auth')

@section('content')

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
        type="text/css">
    <link rel="stylesheet" href="https://static.pingendo.com/bootstrap/bootstrap-4.3.1.css">
</head>

<body style="">
    <div class="py-5 text-center bg-dark text-white"
        style="	background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.80), rgba(0, 0, 0, 0.80)), url(&quot;https://res.allmacwallpaper.com/get/macbook-air-wallpapers/Albert-Einstein-Teacher/983-720.jpg&quot;);	background-position: top left, top left;	background-size: 100%, 100%;	background-repeat: repeat, repeat;">
        <div class="container">
            <div class="row">
                <div class="mx-auto border col-lg-10 col-10 p-5" style="">
                    <h1 class="mb-4">ADD CLASS</h1>
                    <form method="GET" action='{{ url("teacher/addtoclass") }}'>
                        <div class="row">
                            <div class="text-left col-md-4"><label class="">SubjectID</label>
                                <div class="form-group"><input type="text" name='subjectid' class="form-control"
                                        placeholder="517XXX" id="form13"></div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group text-left"><label class="text-left">Year</label><input
                                        type="text" name='year' class="form-control" placeholder="2563" id="form13">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group text-left"><label class="text-left">Term</label><input
                                        type="text" name='term' class="form-control" placeholder="1" id="form13"></div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group text-left"><label class="text-left">Section</label><input
                                        type="text" name='section' class="form-control" placeholder="1" id="form13">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-11">
                                <div class="form-group text-left" style="box-shadow: black 0px 0px 4px;">
                                    <label>ชื่อไทย</label><input type="text" name='thainame' class="form-control"
                                        id="form14" placeholder="Thainame"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-11">
                                <div class="form-group text-left" style="box-shadow: black 0px 0px 4px;">
                                    <label>ชื่ออังกฤษ</label><input type="text" name='englishname' class="form-control"
                                        placeholder="Englishname" id="form14"></div>
                            </div>
                        </div>
                        <div class="form-group"> </div>
                        <div class="form-group"> </div>
                        <div class="form-group"> </div>
                        <div class="form-group"> <small class="form-text text-muted text-right"></small> </div>

                        <div class="row">
                            <div class="col-md-6"><button type="submit" class="btn btn-primary">Submit</button></div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-borderless">
                            <thead>

                                <tr>
                                    <th scope="col">subjectid</th>
                                    <th scope="col">year</th>
                                    <th scope="col">term</th>
                                    <th scope="col">section</th>
                                    <th scope="col">thainame</th>
                                    <th scope="col">englishname</th>
                                    <th scope="col">status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($myclass as $key => $data)
                                <tr>
                                    <th>{{$data->subjectid}}</th>
                                    <th>{{$data->year}}</th>
                                    <th>{{$data->term}}</th>
                                    <th>{{$data->section}}</th>
                                    <th>{{$data->thainame}}</th>
                                    <th>{{$data->englishname}}</th>
                                    <th>{{$data->status}}</th>
                                    <th>
                                        <form method="POST" action="{{ route('teacher.csv') }}" >
                                            @csrf
                                            <input type="hidden" name="subjectid" value="{{ $data->subjectid }}">
                                            <input type="hidden" name="year" value="{{ $data->year }}">
                                            <input type="hidden" name="term" value="{{ $data->term }}">
                                            <input type="hidden" name="section" value="{{ $data->section }}">
                                            <button><span class="foo fa fa-star checked">Upload SCV</span></button>
                                        </form>
                                    </th>
                                    <th><a href=""> Edit</a></th>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>

@endsection
