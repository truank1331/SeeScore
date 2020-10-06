@extends('layouts.nav_teacher')
<!DOCTYPE html>
<html>

<main class="py-4">

    <header class="masthead bg-primary text-white text-center">
        @if ($errors->any())
		    <div class="alert alert-danger">
		    	<strong>Whoops!</strong> Please correct errors and try again!.
						<br/>
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif
        <div class="container d-flex align-items-center flex-column">
            <!-- Masthead Avatar Image--><img class="masthead-avatar mb-5" src="assets/img/avataaars_teacher.svg"
                alt="">
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- Masthead Heading-->
            <h1 class="masthead-heading mb-0">Welcome Teacher</h1>
            <!-- Icon Divider-->
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- Masthead Subheading-->
            <p class="pre-wrap masthead-subheading font-weight-light mb-0">Classroom Assessment Information System for
                Lecturers and Students&nbsp;<br>Case Study: Department of Computing, Faculty of Science, Silpakorn
                University</p>
        </div>
    </header>
    <section class="page-section" id="myclass">
        <div class="container">
            <!-- Contact Section Heading-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <div class="text-center">
                <h2 class="page-section-heading text-secondary d-inline-block mb-0">MYCLASS</h2>
            </div>
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            
            <!-- Contact Section Content-->
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
                        <th scope="col">Upload File</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                        <th scope="col">AddTeacher</th>
                        <th scope="col">ShowStudent</th>
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
                            <form method='post' action='{{route("teacher.showscore")}}' enctype='multipart/form-data'>
                                {{ csrf_field() }}
                                <input type='file' name='file'>
                                <input type='submit' name='submit' value='Import' formtarget="_blank">
                                <input type="hidden" name="subjectid" value="{{ $data->subjectid }}">
                                <input type="hidden" name="year" value="{{ $data->year }}">
                                <input type="hidden" name="term" value="{{ $data->term }}">
                                <input type="hidden" name="section" value="{{ $data->section }}">
                                <input type="hidden" name="thainame" value="{{ $data->thainame }}">
                                <input type="hidden" name="englishname" value="{{ $data->englishname }}">
                            </form>
                        </th>
                        <th><button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#exampleModal{{$data->subjectid}}-{{ $data->year }}-{{ $data->term }}-{{ $data->section }}"
                                data-modal-id="{{$data->subjectid}}">Edit</button></th>
                        <th><button type="button" class="btn btn-danger" data-toggle="modal"
                                data-target="#deleteModal{{$data->subjectid}}-{{ $data->year }}-{{ $data->term }}-{{ $data->section }}"
                                data-modal-id="{{$data->subjectid}}">Delete</button></th>
                        <th><button type="button" class="btn btn-info " data-toggle="modal"
                                data-target="#addteacherModal{{$data->subjectid}}-{{ $data->year }}-{{ $data->term }}-{{ $data->section }}"
                                data-modal-id="{{$data->subjectid}}" >Add Teacher</button></th>
                        <th><form method='get' action='{{route("teacher.showstudent")}}'>
                                <input type='submit' class="btn btn-warning " name='submit' value='Showstudent' formtarget="_blank">
                                <input type="hidden" name="subjectid" value="{{ $data->subjectid }}">
                                <input type="hidden" name="year" value="{{ $data->year }}">
                                <input type="hidden" name="term" value="{{ $data->term }}">
                                <input type="hidden" name="section" value="{{ $data->section }}">
                                <input type="hidden" name="thainame" value="{{ $data->thainame }}">
                                <input type="hidden" name="englishname" value="{{ $data->englishname }}">
                            </form></th>

                    </tr>
                    <div class="modal fade"
                        id="exampleModal{{$data->subjectid}}-{{ $data->year }}-{{ $data->term }}-{{ $data->section }}"
                        tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">
                                        {{$data->subjectid}}-{{ $data->year }}-{{ $data->term }}-{{ $data->section }}<br>
                                        {{ $data->thainame }} <br> {{ $data->englishname }}
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="GET" action='{{ url("teacher/editclass") }}'>
                                        <div class="row">
                                            <div class="text-left col-md-4"><label class=""
                                                    for="subjectid">{{ __('SubjectID') }}</label>
                                                <div class="form-group"><input type="text" name='subjectid'
                                                        class="form-control @error('subjectid') is-invalid @enderror"
                                                        placeholder="517XXX" id="subjectid"
                                                        value="{{ $data->subjectid }}" required autocomplete="subjectid"
                                                        autofocus readonly>
                                                    @error('subjectid')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror</div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group text-left"><label class="text-left"
                                                        for="year">{{ __('Year') }}</label><input type="text"
                                                        name='year'
                                                        class="form-control @error('year') is-invalid @enderror"
                                                        placeholder="2563" id="year" value="{{ $data->year }}" required
                                                        autocomplete="year" autofocus readonly>
                                                    @error('year')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group text-left"><label class="text-left"
                                                        for="term">{{ __('Term') }}</label><input type="text"
                                                        name='term'
                                                        class="form-control @error('term') is-invalid @enderror"
                                                        placeholder="1" id="term" value="{{ $data->term }}" required
                                                        autocomplete="term" autofocus readonly>
                                                    @error('term')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror</div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group text-left"><label class="text-left"
                                                        for="section">{{ __('Section') }}</label><input type="text"
                                                        name='section'
                                                        class="form-control @error('section') is-invalid @enderror"
                                                        placeholder="1" id="section" value="{{ $data->section }}"
                                                        required autocomplete="section" autofocus readonly>
                                                    @error('section')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-11">
                                                <div class="form-group text-left">
                                                    <label for="thainame">{{ __('ThaiSubjectname') }}</label><input
                                                        type="text" name='thainame'
                                                        class="form-control @error('thainame') is-invalid @enderror"
                                                        id="thainame" placeholder="Thainame"
                                                        value="{{ $data->thainame }}" required autocomplete="thainame"
                                                        autofocus>
                                                    @error('thainame')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror</div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-11">
                                                <div class="form-group text-left">
                                                    <label
                                                        for="englishname">{{ __('EnglishSubjectname') }}</label><input
                                                        type="text" name='englishname'
                                                        class="form-control @error('englishname') is-invalid @enderror"
                                                        placeholder="Englishname" id="englishname"
                                                        value="{{ $data->englishname }}" required
                                                        autocomplete="englishname" autofocus>
                                                    @error('englishname')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror</div>
                                            </div>
                                        </div>
                                        <div class="form-group"> </div>
                                        <div class="form-group"> </div>
                                        <div class="form-group"> </div>
                                        <div class="form-group"> <small class="form-text text-muted text-right"></small>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6"><button type="submit"
                                                    class="btn btn-primary" >Submit</button></div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="modal fade"
                        id="addteacherModal{{$data->subjectid}}-{{ $data->year }}-{{ $data->term }}-{{ $data->section }}"
                        tabindex="-1" role="dialog" aria-labelledby="addteacherModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addteacherModalLabel">
                                        {{$data->subjectid}}-{{ $data->year }}-{{ $data->term }}-{{ $data->section }}<br>
                                        {{ $data->thainame }} <br> {{ $data->englishname }}
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="GET" action='{{ url("teacher/addteacher") }}'>
                                        
                                        <div class="row">
                                            <div class="col-md-11">
                                                <div class="form-group text-left">
                                                <input type="hidden" name="subjectid" value="{{ $data->subjectid }}">
                                <input type="hidden" name="year" value="{{ $data->year }}">
                                <input type="hidden" name="term" value="{{ $data->term }}">
                                <input type="hidden" name="section" value="{{ $data->section }}">
                                                <select class="form-control" name="username">
                                                        <option>--เลือกอาจารย์ที่ต้องการเพิ่ม--</option>
                                                        @foreach ($allteacher as $key)
                                                            <option value="{{ $key->username }}" }}> 
                                                                อาจารย์ {{ $key->name }} {{ $key->sname }} 
                                                            </option>
                                                        @endforeach    
                                                    </select>
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="form-group"> </div>
                                        <div class="form-group"> </div>
                                        <div class="form-group"> </div>
                                        <div class="form-group"> <small class="form-text text-muted text-right"></small>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6"><button type="submit"
                                                    class="btn btn-primary" >Submit</button></div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="modal fade" id="deleteModal{{$data->subjectid}}-{{ $data->year }}-{{ $data->term }}-{{ $data->section }}" tabindex="-1" role="dialog"
                        aria-labelledby="deleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel">ต้องการลบวิชา {{ $data->thainame }} {{ $data->englishname }} <br>{{$data->subjectid}}-{{ $data->year }}-{{ $data->term }}-{{ $data->section }} <br>ใช่หรือไม่</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-footer">
                                <form method="GET" action='{{ url("teacher/deleteclass") }}'>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <input type="hidden" name="subjectid" value="{{ $data->subjectid }}">
                                <input type="hidden" name="year" value="{{ $data->year }}">
                                <input type="hidden" name="term" value="{{ $data->term }}">
                                <input type="hidden" name="section" value="{{ $data->section }}">
                                    <input type='submit' class="btn btn-danger " name='submit' value='Delete'>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </tbody>


            </table>
        </div>
    </section>

    <section class="page-section bg-primary text-white mb-0" id="addclass">
        <div class="container">
            <!-- About Section Heading-->
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <div class="text-center">
                <h2 class="page-section-heading d-inline-block text-white">ADD CLASS</h2>
            </div>
            <!-- Icon Divider-->
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- About Section Content-->
            <div class="row justify-content-center">
                <!-- Portfolio Items-->
                <form method="GET" action='{{ url("teacher/addtoclass") }}'>
                    <div class="row">
                        <div class="text-left col-md-4"><label class="" for="subjectid">{{ __('SubjectID') }}</label>
                            <div class="form-group"><input type="text" name='subjectid'
                                    class="form-control @error('subjectid') is-invalid @enderror" placeholder="517XXX"
                                    id="subjectid" value="{{ old('subjectid') }}" required autocomplete="subjectid"
                                    autofocus>
                                @error('subjectid')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror</div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group text-left"><label class="text-left"
                                    for="year">{{ __('Year') }}</label><input type="text" name='year'
                                    class="form-control @error('year') is-invalid @enderror" placeholder="2563"
                                    id="year" value="{{ old('year') }}" required autocomplete="year" autofocus>
                                @error('year')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group text-left"><label class="text-left"
                                    for="term">{{ __('Term') }}</label><input type="text" name='term'
                                    class="form-control @error('term') is-invalid @enderror" placeholder="1" id="term"
                                    value="{{ old('term') }}" required autocomplete="term" autofocus>
                                @error('term')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror</div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group text-left"><label class="text-left"
                                    for="section">{{ __('Section') }}</label><input type="text" name='section'
                                    class="form-control @error('section') is-invalid @enderror" placeholder="1"
                                    id="section" value="{{ old('section') }}" required autocomplete="section" autofocus>
                                @error('section')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-11">
                            <div class="form-group text-left">
                                <label for="thainame">{{ __('ThaiSubjectname') }}</label><input type="text"
                                    name='thainame' class="form-control @error('thainame') is-invalid @enderror"
                                    id="thainame" placeholder="Thainame" value="{{ old('thainame') }}" required
                                    autocomplete="thainame" autofocus>
                                @error('thainame')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-11">
                            <div class="form-group text-left">
                                <label for="englishname">{{ __('EnglishSubjectname') }}</label><input type="text"
                                    name='englishname' class="form-control @error('englishname') is-invalid @enderror"
                                    placeholder="Englishname" id="englishname" value="{{ old('englishname') }}" required
                                    autocomplete="englishname" autofocus>
                                @error('englishname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror</div>
                        </div>
                    </div>
                    <div class="form-group"> </div>
                    <div class="form-group"> </div>
                    <div class="form-group"> </div>
                    <div class="form-group"> <small class="form-text text-muted text-right"></small> </div>

                    <div class="row">
                        <div class="col-md-6"><button type="submit" class="btn btn-secondary">Submit</button></div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    

    {{--<section class="page-section portfolio" id="addclass">
        <div class="container">
            <!-- Portfolio Section Heading-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <div class="text-center">
                <h2 class="page-section-heading text-secondary mb-0 d-inline-block">ADDCLASS</h2>
            </div>
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- Portfolio Grid Items-->
            
        </div>
    </section> --}}



    
    
    @extends('layouts.footer')

</main>

</html>
