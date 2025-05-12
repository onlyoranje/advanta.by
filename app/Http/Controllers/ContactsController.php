<?php

namespace App\Http\Controllers;

use App\Models\Certificates;
use App\Models\Contacts;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function contacts_edit(){
        $contacts = Contacts::first();
        $title = 'Редактирование контактов ';
        return view('contacts.edit',['title'=>$title,'contacts'=>$contacts]);
    }
    public function contacts_update(Request $request){

        $contacts = Contacts::first();
        $data = $request->all();
        foreach ($data as $key=>$item) {
                if (substr($key,0,1)!='_')
                {
                    if (is_array($item))
                    {
                        $contacts->fill([$key=>serialize($item)]);
                        $contacts->save();
                    }
                    else
                    {
                        $contacts->fill([$key=>$item]);
                        $contacts->save();
                    }


                }
        }
        /*if ($request->file) {

            $filename = $request->file->store('media');
            $file_name = explode('/', $filename);
            $post->fill(['image'=> $file_name[1]]);
            $post->save();

        }*/
        return redirect()->route('contacts_dashboard_edit');
    }
}
