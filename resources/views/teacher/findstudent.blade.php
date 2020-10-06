
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Font Awesome icons (free version)-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet">
    <!-- Fonts CSS-->
    <link rel="stylesheet" href="css/heading.css">
    <link rel="stylesheet" href="css/body.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script src="https://www.w3schools.com/lib/w3.js"></script>

</head>
<main class="py-5"> 
    
    <section class="page-section portfolio" id="class">
        <div class="container">
            <!-- Portfolio Section Heading-->     
            <!-- Portfolio Grid Items-->
            <div class="row justify-content-center">
            @foreach($student as $tt)
            <p><h1>[{{$tt->studentid}}] {{$tt->thainame}} {{$tt->thailastname}}</h1></p>
            @endforeach
                <!-- Portfolio Items-->
                @php
                    $check = 0
                @endphp
                @for($i=0;$i<$count2;$i++) <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8"><br>
                            <div class="card">
                                <div class="card-header">{{$data[$i]->subjectid}} - {{$data[$i]->year}} -
                                    {{$data[$i]->term}} - {{$data[$i]->section}} - {{$data[$i]->thainame}} [
                                    {{$data[$i]->englishname}}]</div>
                                <div class="card-body">
                                    Sum Score is {{$data[$i]->sumscore}}<br>
                                    @for($j=$check;$j<$count;$j++) 
                                        @if($data[$i]->subjectid==$detail[$j]->subjectid)
                                        
                                            {{$detail[$j]->info}} --- ได้ {{$detail[$j]->point}}--(ค่า MEAN = {{$mean[$j]->mean}}, MIN ={{$mean[$j]->min}} , MAX = {{$mean[$j]->max}})  <br>
                                            @php
                                                $check = $j
                                            @endphp    
                                        @endif
                                    @endfor<br>

                                        {!! $chart[$i]->html() !!}
                                        {!! Charts::scripts() !!}
                                        {!! $chart[$i]->script() !!}
                                </div>
                            </div><br>
                        </div>
                    </div>
            </div>

            @endfor
        </div>
        </div>
    </section>

</main>

</html>
