<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\Tool;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exps = Experience::where('user_id', Auth::id())->orderBy('from')->get();
        $tools = Tool::orderBy('name')->get();
        return view('experiences.index', compact('exps', 'tools'));
    }

    public function indexByTool(int $toolId)
    {
        $experiences = Experience::where('user_id', Auth::id())->orderBy('from')->get();
        $tools = Tool::orderBy('name')->get();
        $exps = [];
        
        foreach($experiences as $experience){
            foreach($experience->tools as $tool){
                if ($tool->id == $toolId) {
                    $exps[] = $experience;
                }
            }
        }

        return view('experiences.index', compact('exps', 'tools'));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tools = Tool::orderBy('name')->get();
        return view('experiences.create', compact('tools'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $exp = new Experience();
        $exp->company = $request->company;
        $exp->role = $request->role;
        $exp->description = $request->description;
        $exp->from = $request->from;
        $exp->to = $request->to;

        $exp->user_id = Auth::id();

        

        $exp->saveOrFail();
        // El attach tiene que ir debajo del saveOrFail, no se puede adjuntar algo sino se guarda antes.
        $exp->tools()->attach($request->tools);
        return redirect()->route('experiences.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function show(Experience $experience)
    {
        return view('experiences.show', compact('experience'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function edit(Experience $experience)
    {
        $tools = Tool::orderBy('name')->get();
        return view('experiences.edit', compact('experience', 'tools'));
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Experience  $experience
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Experience $experience)
    {

        $experience->company = $request->company;
        $experience->role = $request->role;
        $experience->description = $request->description;
        $experience->from = $request->from;
        $experience->to = $request->to;

        $experience->user_id = Auth::id();

        $experience->tools()->sync($request->tools);
        // $experience->tools()->attach(); Se utiliza en el alta o create.
        // $experience->tools()->detach(); Se utiliza en el borrado o delete.

        $experience->saveOrFail();
        return redirect()->route('experiences.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function destroy(Experience $experience)
    {
        $experience->tools()->detach();
        $experience->deleteOrFail();
        return redirect()->route('experiences.index');
    }
}
