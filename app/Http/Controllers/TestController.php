<?php

namespace App\Http\Controllers;

use App\Models\Test;
// use App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    public function index(Request $request, $subject_id)
    {
        $StudentAlreadyRigester=DB::table('students')->where('user_id',Auth::user()->id)->where('subject_id',$subject_id)->exists();
    if (!$StudentAlreadyRigester) {
    return redirect()->route('student')->with('rigesterFrist',' please rigester Frist');
     }
    else {
     $QhasTaken=DB::table('results')->where('user_id',Auth::user()->id)->where('subject_id',$subject_id)->exists();
        if ($QhasTaken) {

            return redirect()->route('main')->with('hasTahen','this exam has taken');
        }
        $questions= DB::table('tests')->where('subject_id',$subject_id)->get();
        $duration=DB::table('subjects')->where('id',$subject_id)->value('duration');
        $exam_deadline=DB::table('subjects')->where('id',$subject_id)->value('exam_deadline');
        return view('backEnd.test',['questions'=> $questions,'subject_id'=>$subject_id,'exam_deadline'=>$exam_deadline,'duration'=>$duration]);
}

    }
    public function main()
    {
        return view('backEnd.main');
    }

    public function supmit(Request $request )
    {
       $answers= $request->all();
       $point=0;
       $percentage=0;
       $totalQuestion=4;

     $subjectid=$request->input('subjectid');

        foreach ($answers as $questionid => $useranswer) {
            if (is_numeric($questionid )) {

             $questioninfo=DB::table('tests')->where('id',$questionid )->get();
            $correctanswer=$questioninfo[0]->correct_answer;

             if ($correctanswer==$useranswer) {
            $point++;
        }

        }
     }
        $percentage=($point/$totalQuestion)*100;
        $subjectName=DB::table('subjects')->where('id',$subjectid)->value('name');

        $id=Auth::user()->id;
        DB::table('results')->insert( [
            'user_id'=>$id,
            'score'=>$percentage,
            'subject_id'=>$subjectid,
            'subject_name'=>$subjectName,
        ]);
        DB::table('students')->where('user_id',Auth::user()->id)->where('subject_id',$subjectid)->delete();
        return redirect()->route('main')->with('Supmit','this exam has been Submit Successfuly ,Check Your Profile for the Result');
        // dd($percentage);

    }
    public function registersubject(Request $request, $subject_id)
    {
        $AlreadyRigester=DB::table('students')->where('user_id',Auth::user()->id)->where('subject_id',$subject_id)->exists();
        if ($AlreadyRigester) {
            return redirect()->route('student')->with('AlreadyRigester','you have Already Rigester before');
        }

        DB::table('students')->insert( [
            'user_id'=>Auth::user()->id,
            'name'=>Auth::user()->name,
            'subject_id'=>$subject_id,
        ]);
        return redirect()->route('student')->with('registersubject','you have successfuly register');
    }

    public function allresult()
    {
      $Results=DB::table('results')->where('user_id',Auth::user()->id)->get();
      return view('backEnd.allresult',['Results'=> $Results]);
    }
    public function allTest()
    {
   $subjects=DB::table('students')->where('user_id',Auth::user()->id)->join('subjects','students.subject_id','=','subjects.id')->get();
      return view('backEnd.allTest',['subjects'=> $subjects]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Test $test)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Test $test)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Test $test)
    {
        //
    }
}
