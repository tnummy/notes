<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Note;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::id();

        $noteCollection = Note::where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->get();

        $count = 1;
        $notes = [];
        $subArray = [];
        foreach($noteCollection as $note) {
            array_push($subArray, $note);
            if($count%3 == 0) {
                array_push($notes, $subArray);
                $subArray = [];
                $count = 0;
            }
            $count++;
        }

        if(sizeof($subArray) > 0) {
            array_push($notes, $subArray);
        }

        return view('home')->with(['notes' => $notes]);
    }
}
