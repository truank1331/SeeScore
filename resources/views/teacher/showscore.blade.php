<h2>รหัสวิชา {{$data2[0] }}- ภาคเรียนที่ {{ $data2[1] }}/{{ $data2[2]}} section{{ $data2[3] }}</h2>
<h3>{{ $data2[4] }} - {{ $data2[5] }}</h3>
<form method="POST" action='{{route("teacher.store")}}'>
    @csrf
        <input type="hidden" name="subjectid" value="{{ $data2[0] }}">
        <input type="hidden" name="year" value="{{ $data2[1] }}">
        <input type="hidden" name="term" value="{{ $data2[2] }}">
        <input type="hidden" name="section" value="{{ $data2[3] }}">
    <table>
        @foreach ($data as $rows => $row)
        <tr>
            @if($rows==1)
            @foreach ($row as $key => $value)

                @if($value != null)
                    <td><select name="fields[{{ $key }}]">
                        @foreach (config('app.db_fields') as $db_field)
                            <option value="{{ $loop->index }}">{{ $db_field }}</option>
                        @endforeach
                    </select></td>
                @endif
            @endforeach
            </tr>
            @endif
            @foreach ($row as $key => $value)

                @if($value != null)
                <td><input type="text" class="form-control" name = "{{$rows}}.{{$key}}" value="<?php echo(trim(utf8_encode($value)))?>"></td>
                @endif
            @endforeach
        </tr>
        @endforeach
    </table>

    <button type="submit" class="btn btn-primary">
        Import Data
    </button>

</form>
