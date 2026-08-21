<?php

namespace App\Http\Controllers;

use App\Models\Certification;
use App\Models\Education;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Skill;
use App\Models\WorkExperience;

class PortfolioController extends Controller
{
    public function index()
    {
        return view('portfolio.index', [
            'profile' => Profile::first(),
            'educations' => Education::orderBy('sort_order')->get(),
            'workExperiences' => WorkExperience::orderBy('sort_order')->get(),
            'projects' => Project::orderBy('sort_order')->get(),
            'softSkills' => Skill::where('category', 'soft')->orderBy('sort_order')->get(),
            'hardSkills' => Skill::where('category', 'hard')->orderBy('sort_order')->get(),
            'languages' => Skill::where('category', 'language')->orderBy('sort_order')->get(),
            'certifications' => Certification::orderBy('sort_order')->get(),
            'featuredCertification' => Certification::where('is_featured', true)->first(),
        ]);
    }
}
