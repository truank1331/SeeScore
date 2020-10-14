<!DOCTYPE html>



<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>{{$data->subjectid}}-{{$data->year}}-{{$data->term}}-{{$data->section}} {{$data->thainame}} -
        {{$data->englishname}}</title>
    <!-- Font Awesome icons (free version)-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous">
    </script>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet">
    <!-- Fonts CSS-->
    <link rel="stylesheet" href="css/heading.css">
    <link rel="stylesheet" href="css/body.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://pavanpwm.github.io/ImprovedSortInW3ByBtd.js"></script>

</head>

<body>


    <div class="py-5">
        <div class="container">
            <div class="row">

                <div class="col-md-12">

                    <p>
                        <h2>{{$data->subjectid}} - {{$data->year}} - {{$data->term}} - {{$data->section}} <br>
                            {{$data->thainame}} -
                            {{$data->englishname}}</h2>
                    </p>
                    <button type="button" class="btn btn-success " data-toggle="modal"
                        data-target="#addstudentModal{{$data->subjectid}}-{{ $data->year }}-{{ $data->term }}-{{ $data->section }}"
                        data-modal-id="{{$data->subjectid}}">Add Student</button><br>

                    <div class="table-responsive">
                        <table id="myTable" class="w3-table-all" cellspacing="0" width="100%">
                            <thead>

                                <tr align="center">

                                    <th class="th-sm" scope="col"
                                        onclick="w3.sortHTML('#myTable', '.item', 'td:nth-child(1)')"
                                        style="cursor:pointer">StudentID <i class="fa fa-sort"></i></th>

                                    @for($i=0;$i<$count;$i++) <th scope="col"
                                        onclick="w3.sortHTML('#myTable', '.item', 'td:nth-child({{$i+2}})')"
                                        style="cursor:pointer">{{$scoreinfo[$i]->info}} <i class="fa fa-sort"></i></th>

                                        @endfor
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $run = 0;
                                @endphp
                                @foreach($data2 as $value)
                                @if($count2==$run)
                                @php
                                break;
                                @endphp
                                @endif
                                <tr align="center" class='item'>

                                    @for($i=0;$i<$count;$i++) @if($i==0) <td><a
                                            href="{{ route('teacher.find',$data2[$run]->studentid) }}">{{$data2[$run]->studentid}}</a>
                                        </td>
                                        @endif
                                        <td>{{$data2[$run]->point}}</td>
                                        @php
                                        $run++;
                                        @endphp
                                        @endfor
                                </tr>
                                @endforeach


                                <div class="modal fade"
                                    id="addstudentModal{{$data->subjectid}}-{{ $data->year }}-{{ $data->term }}-{{ $data->section }}"
                                    tabindex="-1" role="dialog" aria-labelledby="addstudentModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="addstudentModalLabel">
                                                    {{$data->subjectid}}-{{ $data->year }}-{{ $data->term }}-{{ $data->section }}<br>
                                                    {{ $data->thainame }} <br> {{ $data->englishname }}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="GET" action='{{ url("teacher/addstudent") }}'>

                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group text-left">
                                                                <input type="hidden" name="subjectid"
                                                                    value="{{ $data->subjectid }}">
                                                                <input type="hidden" name="year"
                                                                    value="{{ $data->year }}">
                                                                <input type="hidden" name="term"
                                                                    value="{{ $data->term }}">
                                                                <input type="hidden" name="section"
                                                                    value="{{ $data->section }}">
                                                                <input type="hidden" name="count"
                                                                    value="{{ $count }}">
                                                                    <input type="hidden" name="thainame" value="{{ $data->thainame }}">
                                                                    <input type="hidden" name="englishname" value="{{ $data->englishname }}">
                                                                <div class="col-md-12">
                                                                    <div class="form-group text-left">
                                                                        <label
                                                                            for="studentid">{{ __('รหัสนักศึกษา') }}</label><input
                                                                            type="text" name='studentid'
                                                                            class="form-control @error('studentid') is-invalid @enderror"
                                                                            id="studentid" placeholder=""
                                                                            value="{{ old('studentid') }}" required
                                                                            autocomplete="studentid" autofocus>
                                                                        @error('studentid')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                        @enderror</div>

                                                                    @for($i=0;$i<$count;$i++)
                                                                        <div class="form-group text-left">
                                                                            <label
                                                                                for={{$i}}>{{ __($scoreinfo[$i]->info) }}</label><input
                                                                                type="text" name={{$i+1}}
                                                                                class="form-control @error('$scoreinfo[$i]->info') is-invalid @enderror"
                                                                                id={{$i}} placeholder=""
                                                                                value="{{ old('$scoreinfo[$i]->info') }}"
                                                                                required
                                                                                autocomplete="$scoreinfo[$i]->info"
                                                                                autofocus>
                                                                            @error('$scoreinfo[$i]->info')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                            @enderror</div>


                                                                        @endfor
                                                                </div>

                                                            </div>


                                                        </div>
                                                    </div>
                                            </div>

                                            <div class="form-group"> <small
                                                    class="form-text text-muted text-right"></small>
                                                <div class="col-md-6"><button type="submit"
                                                        class="btn btn-primary">Submit</button></div>
                                            </div>




                                            </form>
                                        </div>
                                    </div>
                                </div>
                    </div>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
