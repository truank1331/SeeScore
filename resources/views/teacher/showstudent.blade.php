
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous">
    </script>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet">
    <!-- Fonts CSS-->
    <link rel="stylesheet" href="css/heading.css">
    <link rel="stylesheet" href="css/body.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script src="https://pavanpwm.github.io/ImprovedSortInW3ByBtd.js"></script>

</head>
<body>


<div class="py-5">
    <div class="container">
        <div class="row">
        
            <div class="col-md-12">
            <p><h2>{{$data->subjectid}} - {{$data->year}} - {{$data->term}} - {{$data->section}} <br> {{$data->thainame}} -
    {{$data->englishname}}</h2></p>


                <div class="table-responsive">
                    <table id="myTable" class="w3-table-all" cellspacing="0" width="100%">
                        <thead>

                            <tr align="center">

                                <th class="th-sm" scope="col" onclick="w3.sortHTML('#myTable', '.item', 'td:nth-child(1)')" style="cursor:pointer">StudentID <i class="fa fa-sort"></i></th>
                                
                                @for($i=0;$i<$count;$i++) <th scope="col" onclick="w3.sortHTML('#myTable', '.item', 'td:nth-child({{$i+2}})')" style="cursor:pointer">{{$scoreinfo[$i]->info}} <i class="fa fa-sort"></i></th>

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
                                    
                                    @for($i=0;$i<$count;$i++)
                                        @if($i==0)
                                        <td><a href="{{ route('teacher.find',$data2[$run]->studentid) }}">{{$data2[$run]->studentid}}</a></td>
                                        @endif
                                        <td>{{$data2[$run]->point}}</td>
                                        @php
                                            $run++;
                                        @endphp
                                    @endfor
                                </tr>
                            @endforeach



                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>