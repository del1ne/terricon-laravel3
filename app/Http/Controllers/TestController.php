<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function show ($id)
    {
      return $id;
    }

    public function detAllSkills ()
    {
      $skills = Skill::all();

      return response()->json($skills);
    }

    public function ReplaceSkills ()
    {
        $title = "Навыки";

        $skills = Skill::all();

        return view('skills',[
           'title' => $title,  
           'skills' => $skills
        ]);
    }
}
