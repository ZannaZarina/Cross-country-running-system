<?php

namespace App\Http\Controllers;

use App\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class RegisterAParticipantController extends Controller
{
    public function __invoke()
    {
        $participants = DB::table('participants')->get();

        Artisan::call('race:points');

        return view('welcome', ['participants' => $participants]);
    }

    public function registerResults(Request $request)
    {
        $request->validate([
            'number' => 'unique:participants'
        ]);

        $participant = Participant::create([
            'name' => $request->get('name'),
            'surname' => $request->get('surname'),
            'number' => $request->get('number'),
            'age_group' => $request->get('age_group'),
        ]);

        for ($i = 1; $i <= 8; $i++) {
            DB::table('races')->insert([
                'participant_id' => $participant->id,
                'time' => $request->get('level_' . $i),
                'level' => $i
            ]);
        }

        Artisan::call('race:points');

        return redirect()->back();
    }
}
