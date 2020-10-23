@extends('layouts.nav_student')
<!DOCTYPE html>
<html>
<main class="py-4">
    <header class="masthead bg-primary text-white text-center">
        <div class="container d-flex align-items-center flex-column">
            <!-- Masthead Avatar Image--><img class="masthead-avatar mb-5" src="assets/img/avataaars_student1.svg"
                alt="">
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- Masthead Heading-->
            <h1 class="masthead-heading mb-0">Welcome Student</h1>
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
    
    {!! Charts::scripts() !!}
    <section class="page-section portfolio" id="class">
        <div class="container">
            <!-- Portfolio Section Heading-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <div class="text-center">
                <h2 class="page-section-heading text-secondary mb-0 d-inline-block">CLASS</h2>
            </div>
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            
            <!-- Portfolio Grid Items-->
            <div class="row justify-content-center">
                <!-- Portfolio Items-->
                @php
                    $check = 0
                @endphp
                @for($i=0;$i<$count2;$i++) <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">{{$data[$i]->subjectid}} - {{$data[$i]->year}} -
                                    {{$data[$i]->term}} - {{$data[$i]->section}} - {{$data[$i]->thainame}} [
                                    {{$data[$i]->englishname}}]</div>
                                <div class="card-body">
                                    Now Your Score is {{$data[$i]->sumscore}} 
                                    @if($grade[$i])
                                    <button type="button" class="btn btn-success float-right" data-toggle="modal"
                                        data-target="#gradeModal{{$data[$i]->subjectid}}-{{ $data[$i]->year }}-{{ $data[$i]->term }}-{{ $data[$i]->section }}"
                                        data-modal-id="{{$data[$i]->subjectid}}">Grade!!</button>

                                    @endif
                                    


                                    

                                    

                                    <button type="button" class="btn btn-primary float-right" data-toggle="modal"
                                        data-target="#exampleModal{{$data[$i]->subjectid}}-{{ $data[$i]->year }}-{{ $data[$i]->term }}-{{ $data[$i]->section }}"
                                        data-modal-id="{{$data[$i]->subjectid}}">รายละเอียด</button>
                                    
                                        {!! $chart[$i]->html() !!}
                                        {!! $chart[$i]->script() !!}
                                </div>
                            </div><br>
                        </div>
                    </div>
            </div>
            <div class="modal fade"
                id="exampleModal{{$data[$i]->subjectid}}-{{ $data[$i]->year }}-{{ $data[$i]->term }}-{{ $data[$i]->section }}"
                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">
                                {{$data[$i]->subjectid}}-{{ $data[$i]->year }}-{{ $data[$i]->term }}-{{ $data[$i]->section }} - {{$data[$i]->thainame}}
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            
                        </div>

                        <div class="modal-body">
                        
                            <div class="container">
                            <div class="row justify-content-center">
                            
                            <!-- <div style="height:100%"> -->
                            
                                        
                            {!! $donut[$i]->html() !!}
                            {!! $donut[$i]->script() !!}
                            <table class="table table-center table-striped">
                            <thead>
                                    <tr>
                                    <th>
                                    </th>
                                    <th>
                                        Your Score
                                    </th>
                                    <th>
                                        MEAN
                                    </th>
                                    <th>
                                        MIN
                                    </th>
                                    <th>
                                        MAX
                                    </th>
                                    </tr>
                                    </thead>
                            @for($j=$check;$j<$count;$j++) 
                            
                                @if($data[$i]->subjectid==$detail[$j]->subjectid)


                                    
                                    

                                    <tr>
                                    <th>
                                        {{$detail[$j]->info}}
                                    </th>
                                    <td>{{$detail[$j]->point}}
                                    </td>
                                    <td>{{$mean[$j]->mean}}
                                    </td>
                                    <td>{{$mean[$j]->min}}
                                    </td>
                                    <td>{{$mean[$j]->max}}
                                    </td>
                                    </tr>
                                    
                                    @php
                                        $check = $j
                                    @endphp    
                                @endif
                            @endfor
                            @if($donut[$i]->labels[count($donut[$i]->labels)-1]=="เช็คชื่อ")
                                    <tr>
                                    <th>
                                        เช็คชื่อ
                                    </th>
                                    <td>{{$donut[$i]->values[count($donut[$i]->values)-1]}}

                                    </tr>
                            @endif
                            </table>
                            <!-- </div> -->
                            </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade"
                id="gradeModal{{$data[$i]->subjectid}}-{{ $data[$i]->year }}-{{ $data[$i]->term }}-{{ $data[$i]->section }}"
                tabindex="-1" role="dialog" aria-labelledby="gradeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="gradeModalLabel">
                                {{$data[$i]->subjectid}}-{{ $data[$i]->year }}-{{ $data[$i]->term }}-{{ $data[$i]->section }} - {{$data[$i]->thainame}}
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            
                        </div>
                        
                        <div class="modal-body">
                        
                            <div class="container">
                            <div class="row justify-content-center">
                            <h3>Your Grade is {{$grade[$i]}}!!</h3>
                            <!-- <div style="height:100%"> -->
                            
                                        
                            
                            <!-- </div> -->
                            </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                        </div>
                    </div>
                </div>
            </div>
            @endfor
        </div>
        </div>
    </section>


    @extends('layouts.footer')

</main>

</html>
