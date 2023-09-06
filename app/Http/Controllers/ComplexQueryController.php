<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class ComplexQueryController extends Controller
{
    public function index()
    {
        return view('complex-query.index');
    }

    public function animalLoversWithDocuments()
    {
        $results = DB::table('personal_details')
            ->join('interests', 'personal_details.id', '=', 'interests.person_id')
            ->join('documents', function ($join) {
                $join->on('interests.id', '=', 'documents.interest_id')
                    ->where('interests.name', 'LIKE', '%Animals%');
            })
            ->select('personal_details.name')
            ->get();

        return view('complex-query.index', compact('results'));
    }


    public function childrenSportLovers()
    {
        $results = DB::table('personal_details')
            ->join('interests', 'personal_details.id', '=', 'interests.person_id')
            ->whereIn('interests.name', ['Children', 'Sport'])
            ->select('personal_details.name')
            ->get();

        return view('complex-query.index', compact('results'));
    }

    public function uniqueInterestsNoDocuments()
    {
        $results = DB::table('interests')
            ->leftJoin('documents', function ($join) {
                $join->on('interests.id', '=', 'documents.interest_id');
            })
            ->leftJoin('personal_details', function ($join) {
                $join->on('interests.person_id', '=', 'personal_details.id');
            })
            ->select('interests.name', DB::raw('COUNT(personal_details.id) AS people_count'))
            ->groupBy('interests.name')
            ->havingRaw('COUNT(documents.id) = 0')
            ->get();

        return view('complex-query.index', compact('results'));
    }


    public function peopleWithMultipleDocuments()
    {
        $results = DB::table('personal_details')
            ->join('interests', 'personal_details.id', '=', 'interests.person_id')
            ->join('documents', 'interests.id', '=', 'documents.interest_id')
            ->select('personal_details.name')
            ->groupBy('personal_details.name')
            ->havingRaw('COUNT(DISTINCT interests.id) BETWEEN 5 AND 6')
            ->havingRaw('COUNT(documents.id) > 1')
            ->get();

        return view('complex-query.index', compact('results'));
    }

}
