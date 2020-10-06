<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Charts;

class TeacherController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:teacher');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $username = Auth::user()->username;

        $myclass =  DB::select('SELECT `course`.`subjectid`, `course`.`year`, `course`.`term`, `course`.`section`, 
                                        `courseinfo`.`thainame`, `courseinfo`.`englishname`, `courseinfo`.`status` 
                                FROM `course` LEFT JOIN `courseinfo` ON `course`.`subjectid` = `courseinfo`.`subjectid` 
                                AND `course`.`subjectid` = `courseinfo`.`subjectid` 
                                AND `course`.`year` = `courseinfo`.`year` 
                                AND `course`.`term` = `courseinfo`.`term` 
                                AND `course`.`section` = `courseinfo`.`section` 
                                WHERE `course`.`teacher` = ?', [$username]);

        $allteacher = DB::select('SELECT username,name,sname from teachers where username not like ?',[$username]);
        //dd($allteacher);
        return view('teacher.home',['myclass'=>$myclass,'allteacher'=>$allteacher]);
    }

    public function showAddclassForm(){
        $username = Auth::user()->username;

        $myclass =  DB::select('SELECT `course`.`subjectid`, `course`.`year`, `course`.`term`, `course`.`section`, 
                                        `courseinfo`.`thainame`, `courseinfo`.`englishname`, `courseinfo`.`status` 
                                FROM `course` LEFT JOIN `courseinfo` ON `course`.`subjectid` = `courseinfo`.`subjectid` 
                                AND `course`.`subjectid` = `courseinfo`.`subjectid` 
                                AND `course`.`year` = `courseinfo`.`year` 
                                AND `course`.`term` = `courseinfo`.`term` 
                                AND `course`.`section` = `courseinfo`.`section` 
                                WHERE `course`.`teacher` = ?', [$username]);

        //dd($myclass);
        return view('teacher.addclass')->with('myclass',$myclass);
    }

    public function addteacher(Request $request){

        $username = $request["username"];

        $subjectid = $request["subjectid"];
        $year = $request["year"];
        $term = $request["term"];
        $section = $request["section"];
        
        DB::insert('insert into course (subjectid, year,term,section,teacher) values (?,?,?,?,?)', [$subjectid, $year,$term,$section,$username]);
        

        return redirect(route('teacher.home'));
    }

    public function addclass(Request $request){

        $username = Auth::user()->username;

        $subjectid = $request["subjectid"];
        $year = $request["year"];
        $term = $request["term"];
        $section = $request["section"];
        $thainame = $request["thainame"];
        $englishname = $request["englishname"];

        $this->subjectValidator($request->all())->validate();


        DB::insert('insert into course (subjectid, year,term,section,teacher) values (?,?,?,?,?)', [$subjectid, $year,$term,$section,$username]);
        DB::insert('insert into courseinfo (subjectid, year,term,section,thainame,englishname,status) values (?,?,?,?,?,?,"0")', [$subjectid, $year,$term,$section,$thainame,$englishname]);
        

        return redirect(route('teacher.home'));
    }

    public function editclass(Request $request){

        $username = Auth::user()->username;

        $subjectid = $request["subjectid"];
        $year = $request["year"];
        $term = $request["term"];
        $section = $request["section"];
        $thainame = $request["thainame"];
        $englishname = $request["englishname"];

        //dd($request);
        $this->subjectValidator($request->all())->validate();

        DB::update('UPDATE courseinfo set thainame = ? where subjectid = ? and year = ? and term = ? and section = ?;',[$thainame,$subjectid, $year,$term,$section]);
        DB::update('UPDATE courseinfo set englishname = ? where subjectid = ? and year = ? and term = ? and section = ?;',[$englishname,$subjectid, $year,$term,$section]);
        

        return redirect(route('teacher.home'));
    }

    protected function subjectValidator(array $data)
    {
        return Validator::make($data, [
            'subjectid' => ['required', 'min:6'],
            'year' => ['required','min:4'],
            'term' => ['required',  'min:1'],
            'section' => ['required', 'min:1'],
            'thainame' => ['required','string','min:1'],
            'englishname' => ['required', 'string', 'min:1'],
        ]);
        
    }

    public function csv(Request $request){
        //dd($request);
        $subjectid = $request["subjectid"];
        $year = $request["year"];
        $term = $request["term"];
        $section = $request["section"];
        return view('teacher.csv')->with('data',[$subjectid, $year,$term,$section]);
    }

    public function showScore(Request $request){
        //dd($request);
        $subjectid = $request["subjectid"];
        $year = $request["year"];
        $term = $request["term"];
        $section = $request["section"];
        $thainame = $request["thainame"];
        $englishname = $request["englishname"];

        //dd($request);
        if ($request->input('submit') != null ){
            $file = $request->file('file'); //อ่านไฟล์ที่รับมาจาก CSV
            
            $tempPath = $file->getRealPath();

            $data = array_map('str_getcsv', file($tempPath));

            return view('teacher.showscore', compact('data'))->with('data2',[$subjectid, $year,$term,$section,$thainame,$englishname]); //ส่ง Data จาก CSV ที่ได้ไปยัง ShowScore เพื่อแสดงเป็นตาราง
        }
    }
    public function store(Request $request){ //รับค่าจากหลังจาก ShowScore ส่งมา
        
        $data = $request->input();//ชี้ไปยังค่าที่รับมาจากหน้าตาราง ShowScore
        $subjectid = $data["subjectid"];
        $year = $data["year"];
        $term = $data["term"];
        $section = $data["section"];

        $check = DB::select('SELECT * FROM scoreinfo WHERE subjectid=? AND year=? AND term=? AND section=?',[$subjectid,$year,$term,$section]);
        //dd($data);
        if(count($check)>0){
            DB::delete('DELETE from scoreinfo where subjectid = ? and year = ? and term = ? and section = ?', [$subjectid, $year,$term,$section]);
            DB::delete('DELETE from score where subjectid = ? and year = ? and term = ? and section = ?', [$subjectid, $year,$term,$section]);
        }
        Self::insertSubject($data);
        
        Self::insertTable($data);//ส่งค่าไป Insert
        
        return redirect(route('teacher.home'));
    }
    public function showstudent(Request $request){ //รับค่าจากหลังจาก ShowScore ส่งมา
        //dd($request);
        $subjectid = $request["subjectid"];
        $year = $request["year"];
        $term = $request["term"];
        $section = $request["section"];
        $thainame = $request["thainame"];
        $englishname = $request["englishname"];
        
        $select = DB::select('SELECT `score`.`studentid`, CAST(`score`.`point` AS DECIMAL(16,2)) point, `scoreinfo`.`scoreid`
                    FROM `score` LEFT JOIN `scoreinfo` ON score.scoreid = scoreinfo.scoreid AND score.subjectid = scoreinfo.subjectid 
                        AND score.year = scoreinfo.year AND score.term = scoreinfo.term AND score.section = scoreinfo.section
                    WHERE score.subjectid = ? AND score.year=? AND score.term=? AND score.section = ?;', [$subjectid, $year,$term,$section]);
        
        $scoreinfo = DB::select('SELECT DISTINCT `scoreinfo`.`scoreid`,scoreinfo.info
                     FROM `score` LEFT JOIN `scoreinfo` ON score.scoreid = scoreinfo.scoreid AND score.subjectid = scoreinfo.subjectid 
                        AND score.year = scoreinfo.year AND score.term = scoreinfo.term AND score.section = scoreinfo.section
                    WHERE score.subjectid = ? AND score.year=? AND score.term=? AND score.section = ?;', [$subjectid, $year,$term,$section]);

        

        //dd($select);
        return view('teacher.showstudent',['data'=>$request,'data2'=>$select,'scoreinfo'=>$scoreinfo,'count'=>count($scoreinfo),'count2'=>count($select)]);
        
    }

    public function deleteclass(Request $request){ //รับค่าจากหลังจาก ShowScore ส่งมา
        //dd($request);
        $subjectid = $request["subjectid"];
        $year = $request["year"];
        $term = $request["term"];
        $section = $request["section"];
        DB::delete('DELETE from course where subjectid = ? and year = ? and term = ? and section = ?', [$subjectid, $year,$term,$section]);
        DB::delete('DELETE from courseinfo where subjectid = ? and year = ? and term = ? and section = ?', [$subjectid, $year,$term,$section]);
        DB::delete('DELETE from scoreinfo where subjectid = ? and year = ? and term = ? and section = ?', [$subjectid, $year,$term,$section]);

        DB::delete('DELETE from score where subjectid = ? and year = ? and term = ? and section = ?', [$subjectid, $year,$term,$section]);

        return redirect(route('teacher.home'));
    }

    public static function insertTable($data){
        $subjectid = $data["subjectid"];
        $year = $data["year"];
        $term = $data["term"];
        $section = $data["section"];

        $ssdid = '00000000';
        $datainsert = array();

        $check = false;
        $count = 0; //ตัวชี้ Colums
        $run = 1;

        foreach($data as $i => $key){
            if($i=="_token" || $i =="fields" || $i=="subjectid" || $i=="year" || $i=="term" || $i=="section")//ไม่นับ "fields" กับ "_token"
                    continue;

            if($data['fields'][substr($i,-1)]=="1"){//กรณีที่ เป็น StudentID ($i ตัวสุดท้ายเป็น _1)

                $key = str_replace('%C2%A0','',urlencode($key));
                
                if(is_numeric(trim($key))){//มีความยาว 8 หรือ 9 เอามาดักว่าเป็นรหัส นศศ หรือไม่ ****** ยังไม่ดีพอ ******

                    $check = true;
                    $ssdid = $key;
                    $run = 1;
                }   
                $count++;
            }
            else if($data['fields'][substr($i,-1)]=="2"){ //กรณีที่ เป็น Score ($i ตัวสุดท้ายเป็น _2)
                //dd('ss');
                if($check){//ต้องไม่ชื่อเดียวกับคอลัมภ์ ไว้ดักว่าเป็นหัวหรือไม่
                    DB::insert('insert into score values (?,?,?,?,?,?,?)',array($subjectid,$year,$term,$section,$run,$ssdid,$key));
                    
                    $run++;
                }
                $count++;
            }
        }
        
    }

    public static function insertSubject($data){
        
        $subjectid = $data["subjectid"];
        $year = $data["year"];
        $term = $data["term"];
        $section = $data["section"];

        $count = 0;
        $run = 1;

        
        foreach($data as $i => $key){
            
            if($count == count($data['fields']))//ครบ จำนวน ครั้ง
                break;
            if($i=="_token" || $i =="fields" || $i=="subjectid" || $i=="year" || $i=="term" || $i=="section"){//ไม่นับ "fields" กับ "_token"
                continue;
            }
            if($data['fields'][$i[2]]=="1"){// ==>> fields index ที่หลัง _ ของ $i

                //$table->string('StudentID');//เจอ fields ที่ = 1 สร้าง STDID
                $count++;
            }
            else if($data['fields'][$i[2]]=="2"){
                //$table->float($key);//เจอ fields ที่ = 2 สร้าง colums ชือ ที่ตั้งมาไว้
                DB::insert('insert into scoreinfo values (?,?,?,?,?,?)',array($subjectid,$year,$term,$section,$run,$key));

                $run++;
                $count++;
            }
            else{
                $count++;//กรณีเป็น 0 หรือ อื่นๆนับต่อไป
            }        
        }
        //$query = DB::insert('insert into score values (?,?,?,?,?)',array($subjectid,$year,$term));
    }

    public function findStudent($id)
    {

        $stdid = $id;


        $score = DB::select('SELECT `score`.`studentid`, `score`.`point`, `scoreinfo`.`info`, `scoreinfo`.`subjectid`, `scoreinfo`.`year`, `scoreinfo`.`term`, `scoreinfo`.`section`
                                FROM `score` LEFT JOIN `scoreinfo` ON score.subjectid = scoreinfo.subjectid AND score.year = scoreinfo.year AND score.term = scoreinfo.term AND score.section = scoreinfo.section
                                AND `score`.`scoreid` = `scoreinfo`.`scoreid` 
                                WHERE studentid=?',array($stdid));

        $subject = DB::select('SELECT DISTINCT  courseinfo.subjectid,courseinfo.year,courseinfo.term,courseinfo.section,courseinfo.thainame,courseinfo.englishname,A.studentid,
                                (SELECT SUM(point) FROM score b WHERE b.studentid = ? AND A.subjectid = b.subjectid) sumscore
                                FROM courseinfo LEFT JOIN score A ON A.subjectid = courseinfo.subjectid AND A.year = courseinfo.year AND A.term = courseinfo.term AND A.section = courseinfo.section
                                WHERE A.studentid = ?',array($stdid,$stdid));


        $stat = DB::select('SELECT DISTINCT`A`.`subjectid`, `A`.`year`, `A`.`term`, `A`.`section`, A.scoreid ,
        (SELECT AVG(point) FROM score B WHERE B.subjectid = A.subjectid AND A.year = B.year AND A.term = B.term AND A.section = B.section AND 
        A.scoreid = B.scoreid) mean ,(SELECT MIN(point) FROM score B WHERE B.subjectid = A.subjectid AND A.year = B.year AND A.term = B.term AND A.section = B.section AND 
        A.scoreid = B.scoreid) min,(SELECT MAX(point) FROM score B WHERE B.subjectid = A.subjectid AND A.year = B.year AND A.term = B.term AND A.section = B.section AND 
        A.scoreid = B.scoreid) max
        FROM score A WHERE A.studentid=?;',array($stdid));
        
        
        
        //dd($users,$score,$subject,$mean);
        //dd($score,$stat);
        

        //
        
        for($i=0;$i<count($subject);$i++){

            $subjectid = $subject[$i]->subjectid;
            $year = $subject[$i]->year;
            $term = $subject[$i]->term;
            $section = $subject[$i]->section;

            $allscore = DB::select('SELECT DISTINCT courseinfo.subjectid,courseinfo.year,courseinfo.term,courseinfo.section,courseinfo.thainame,courseinfo.englishname,A.studentid, 
                                    (SELECT SUM(point) FROM score b WHERE b.studentid = A.studentid AND A.subjectid = b.subjectid) sumscore 
                                FROM courseinfo LEFT JOIN score A ON A.subjectid = courseinfo.subjectid AND A.year = courseinfo.year AND A.term = courseinfo.term 
                                        AND A.section = courseinfo.section 
                                WHERE A.subjectid = ? AND A.year=? AND A.term=? AND A.section = ? 
                                ORDER BY `sumscore`',array($subjectid,$year,$term,$section));
            //dd($allscore);
            $first = $allscore[0]->sumscore;
            $last = $allscore[count($allscore)-1]->sumscore;
        
            $label = range(intval($first),intval($last));
            $value = array();
            $colour = array();
            


            for($j=0;$j<count($label);$j++){
                $value[$label[$j]]=0;
                $colour[$label[$j]] = '#4AA6EA';
            }
            
            foreach($allscore as $key){
                if($key->studentid == $stdid)
                    $colour[$key->sumscore] = '#EAC14A';
                $value[$key->sumscore]++;
            }
            
            $chart[$i] = Charts::create( 'bar', 'highcharts')
			      ->title($subject[$i]->englishname." - ".$subject[$i]->thainame)
                  ->elementLabel("จำนวน(คน)")
                  ->values($value)
                  ->colors($colour)
                  ->dimensions(100, 50)
                  ->labels($label)
                  ->responsive(true);
        }   

        $student = DB::select('SELECT studentid,thainame,thailastname,email FROM users WHERE users.studentid = ?;',array($stdid));

        //dd($student);
        return view('teacher.findstudent',compact('chart'),['student'=>$student,'detail'=>$score,'data'=>$subject,'count'=>count($score),'count2'=>count($subject),'mean'=>$stat]);

        //
    }

    
}
