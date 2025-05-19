<?php

namespace App\Http\Controllers;
use App\Models\Rubrics;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RubricsController extends Controller
{
    private const RUB_VALIDATOR = [
        'title'=> 'required|max:100'
    ];
    private const RUB_ERROR_MESSAGES = [
        'max'=>' Значение не долно быть длиннее :max символов'
    ];
    public function rubrics(){

        $rubrics = Rubrics::orderBy('sort')->orderBy('title')->get()->toTree();
        return view('rubric.dashboard',compact('rubrics'));

    }
    public function addRubric(Request $request){
        $validated = $request->validate(self::RUB_VALIDATOR,self::RUB_ERROR_MESSAGES);
        if ($request->parent_id)
            $level = (Rubrics::find($request->parent_id)->level)+1;
        else
            $level=0;

        Rubrics::create(['title'=>$validated['title'],'sort'=>$request->sort,'parent_id'=>$request->parent_id,'level'=>$level,'description'=>$request->description]);
        return redirect()->route('rubric_dashboard');
    }
    public function addRubricForm(){
        $rubrics = Rubrics::orderBy('sort')->orderBy('title')->get()->toTree();
        $icons      = Storage::disk('public')->allFiles('/categories');
        return view('rubric.add',['rubrics'=>$rubrics, 'icons'=>$icons]);
    }
    public function detail($id){
        $rubric     = Rubrics::find($id);
        $rubrics    = Rubrics::orderBy('sort')->orderBy('title')->get()->toTree();
        $depth      = Rubrics::descendantsAndSelf($id)->toFlatTree();
        return view('rubric.edit', ['rubric'=>$rubric,'rubrics'=>$rubrics,'depth'=>$depth]);

    }
    public function editRubric(Request $request, Rubrics $rubric){
        $validated = $request->validate(self::RUB_VALIDATOR,self::RUB_ERROR_MESSAGES);
        if ($request->parent_id)
            $level = (Rubrics::find($request->parent_id)->level)+1;
        else
            $level=0;
        $rubric->fill(['title'=>$validated['title'],'parent_id'=>$request->parent_id,'description'=>$request->description,'sort'=>$request->sort]);
        $rubric->save();
        return redirect()->route('rubric_dashboard');
    }
    public function delete(Rubrics $rubric){
        return view('rubric.delete', ['rubric'=>$rubric]);
    }
    public function destroyRubric(Rubrics $rubric){

        $rubric->delete();
        return redirect()->route('rubric_dashboard');
    }

    public function rubric(Rubrics $rubric)
    {
        $breadcrumbs['route']= 'rubric';
        $breadcrumbs['list']= Rubrics::ancestorsAndSelf($rubric->id);
        return view('rubric.rubric', ['rubric'=>$rubric,'title'=>$rubric->title,'breadcrumbs'=>$breadcrumbs]);
    }
}
