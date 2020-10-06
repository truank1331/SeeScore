<!DOCTYPE html>
รหัสวิชา {{$data[0] }}-{{ $data[1] }}-{{ $data[2]}} <br>
     <form method='post' action='{{route("teacher.showscore")}}' enctype='multipart/form-data' >
       {{ csrf_field() }}
        <input type='file' name='file' >
        <input type="hidden" name="subjectid" value="{{ $data[0] }}">
        <input type="hidden" name="year" value="{{ $data[1] }}">
        <input type="hidden" name="term" value="{{ $data[2] }}">
        <input type="hidden" name="section" value="{{ $data[3] }}">
       <input type='submit' name='submit' value='Import'>
     </form>