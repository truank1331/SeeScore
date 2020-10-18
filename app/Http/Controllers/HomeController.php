<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Charts;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $stdid = Auth::user()->studentid;

        $score = DB::select('SELECT `score`.`studentid`, `score`.`point`, `scoreinfo`.`info`, `scoreinfo`.`subjectid`, `scoreinfo`.`year`, `scoreinfo`.`term`, `scoreinfo`.`section`
                                FROM `score` LEFT JOIN `scoreinfo` ON score.subjectid = scoreinfo.subjectid AND score.year = scoreinfo.year AND score.term = scoreinfo.term AND score.section = scoreinfo.section
                                AND `score`.`scoreid` = `scoreinfo`.`scoreid` 
                                WHERE studentid=?',array($stdid));

        $subject = DB::select('SELECT DISTINCT  courseinfo.subjectid,courseinfo.year,courseinfo.term,courseinfo.section,courseinfo.thainame,courseinfo.englishname,A.studentid,
                                (SELECT SUM(point) FROM score b WHERE b.studentid = ? AND A.subjectid = b.subjectid) sumscore
                                FROM courseinfo LEFT JOIN score A ON A.subjectid = courseinfo.subjectid AND A.year = courseinfo.year AND A.term = courseinfo.term AND A.section = courseinfo.section
                                WHERE A.studentid = ? AND courseinfo.status = 1',array($stdid,$stdid));


        $stat = DB::select('SELECT DISTINCT`A`.`subjectid`, `A`.`year`, `A`.`term`, `A`.`section`, A.scoreid ,
        (SELECT AVG(point) FROM score B WHERE B.subjectid = A.subjectid AND A.year = B.year AND A.term = B.term AND A.section = B.section AND 
        A.scoreid = B.scoreid) mean ,(SELECT MIN(point) FROM score B WHERE B.subjectid = A.subjectid AND A.year = B.year AND A.term = B.term AND A.section = B.section AND 
        A.scoreid = B.scoreid) min,(SELECT MAX(point) FROM score B WHERE B.subjectid = A.subjectid AND A.year = B.year AND A.term = B.term AND A.section = B.section AND 
        A.scoreid = B.scoreid) max
        FROM score A WHERE A.studentid=?;',array($stdid));
        
        
        
        //dd($users,$score,$subject,$mean);
        //dd($score,$stat);
        

        //
        $chart=array();
        $donut=array();
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
            
                // for($i=0;$i<count($score);$i++){
                    
                // }
            $chart[$i] = Charts::create( 'bar', 'highcharts')
			      ->title($subject[$i]->englishname." - ".$subject[$i]->thainame)
                  ->elementLabel("จำนวน(คน)")
                  ->values($value)
                  ->colors($colour)
                  ->dimensions(1000,500)
                  ->labels($label)
                  ->responsive(true);
            
            $coo = DB::select('SELECT `score`.`studentid`, `score`.`point`, `scoreinfo`.`info`, `scoreinfo`.`subjectid`, `scoreinfo`.`year`, `scoreinfo`.`term`, `scoreinfo`.`section`
                                FROM `score` LEFT JOIN `scoreinfo` ON score.subjectid = scoreinfo.subjectid AND score.year = scoreinfo.year AND score.term = scoreinfo.term AND score.section = scoreinfo.section
                                AND `score`.`scoreid` = `scoreinfo`.`scoreid` 
                                WHERE studentid=? AND score.subjectid = ? AND score.year=? AND score.term=? AND score.section = ?',array($stdid,$subjectid,$year,$term,$section));
            $labelcoo=array();
            $valuecoo=array();
            for($j=0;$j<count($coo);$j++){
                $labelcoo[$j]=$coo[$j]->info;
                $valuecoo[$j]=$coo[$j]->point;
            }
            //dd($coo);
            $donut[$i] = Charts::create('donut', 'highcharts')
                        ->title($subject[$i]->englishname." - ".$subject[$i]->thainame)
                        ->labels($labelcoo)
                        ->values($valuecoo)
                        ->dimensions(500,500)
                        ->responsive(true);
        }  
         

       //dd($chart);
        
        
            

        return view('student.home',['donut'=>$donut,'chart'=>$chart,'detail'=>$score,'data'=>$subject,'count'=>count($score),'count2'=>count($subject),'mean'=>$stat]);

        //
    }
}
