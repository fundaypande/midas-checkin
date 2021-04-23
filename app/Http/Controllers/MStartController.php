<?php

namespace App\Http\Controllers;

use App\MPoint;
use App\MQuestion;
use App\MTest;
use App\MUserResult;
use Illuminate\Http\Request;
use App\User;

class MStartController extends Controller
{

    protected $master = 10;
    protected $view = 32;
    protected $store = 33;
    // protected $table = 'm_discussions';

    public function show($id)
    {
        $test = MTest::select('test_name', 'id', 'test_time', 'test_description', 'total', 'free')
                -> where('id', $id)
                -> first();

        if ($test->free == 0) {
            # berbayar
            if (!User::Role($this->view)) return redirect()->back()->with('alert-danger', 'Akses terkunci. Anda adalah Pengujung, tingkatkan level pengguna anda menjadi User. Lihat Panduannya <b><u><a href="/page/upgrade">DISINI</a></u></b>');
        }

        $soalId = MQuestion::select('m_questions.id')
                    -> join('m_test_questions', 'm_test_questions.question_id', 'm_questions.id')
                    -> where('test_id', $id)
                    -> get();

        $soal = MQuestion::select('m_questions.id', 'question', 'correct_answare')
                            -> join('m_test_questions', 'm_test_questions.question_id', 'm_questions.id')
                            -> where('test_id', $id)
                            -> get();

        foreach ($soal as $key => $value) {
            $option = MPoint::select('point', 'point_description')
                        -> where('question_id', $value->id)
                        -> get();

            // $question[$key] = $value;
            $soal[$key]['opsi'] = $option;
        }

        // dd(json_decode($soal));

        return view('midnersi.start.start', [
            'test' => $test,
            'soal' => $soal,
            'soalId' => $soalId
        ]);
    }

    public function store(Request $request)
    {
        // if (!User::Role($this->store)) return redirect()->back()->with('alert-danger', 'You cannot access this page');

        $validatedData = $request->validate([
            'test_id' => 'required',
            'result' => 'required',
        ]);

        MUserResult::create($request->all());

        return response()->json('true');
    }

    public function pembahasan($id)
    {
        if (!User::Role($this->view)) return redirect()->back()->with('alert-danger', 'Akses terkunci. Anda adalah Pengujung, tingkatkan level pengguna anda menjadi User. Lihat Panduannya <b><u><a href="/page/upgrade">DISINI</a></u></b>');

        $test = MTest::select('test_name', 'id', 'test_time', 'test_description', 'total')
                -> where('id', $id)
                -> first();

        $soalId = MQuestion::select('m_questions.id')
                    -> join('m_test_questions', 'm_test_questions.question_id', 'm_questions.id')
                    -> where('test_id', $id)
                    -> get();

        $soal = MQuestion::select('m_questions.id', 'question', 'correct_answare', 'completion')
                            -> join('m_test_questions', 'm_test_questions.question_id', 'm_questions.id')
                            -> where('test_id', $id)
                            -> get();

        foreach ($soal as $key => $value) {
            $option = MPoint::select('point', 'point_description')
                        -> where('question_id', $value->id)
                        -> get();

            // $question[$key] = $value;
            $soal[$key]['opsi'] = $option;
        }

        // dd(json_decode($soal));

        return view('midnersi.start.pembahasan', [
            'test' => $test,
            'soal' => $soal,
            'soalId' => $soalId
        ]);
    }



}
