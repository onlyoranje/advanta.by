@extends('dashboard.dashboard')
@section('title',' Удаление раздела')

@section('main')
    @php
        $title= "Удалить категорию ".$rubric->title;
        $id = ['rubric'=>$rubric->id];
        $route = 'rubric_dashboard_destroy';
        //
        $children = App\Models\Rubrics::descendantsAndSelf($rubric->id)->pluck('id')->toArray();
        $used = App\Models\Products::WhereIn('rubric_id',$children)->pluck('id')->toArray();

        $errors_form=[];
        //if ($rubric->level==0) $errors_form[] = "Нельзя удалять корневую рубрику";
        if (count($used)>0) $errors_form[] = "Данный раздел используется в ".count($used)." продуктах. Удалите их сначала  ";
    @endphp
    @include('delete_form')
@endsection
