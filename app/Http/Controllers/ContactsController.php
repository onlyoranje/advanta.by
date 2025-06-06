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
        if ($request->logo) {

            $filename = $request->logo->store('media');
            $file_name = explode('/', $filename);
            $contacts->fill(['logo'=> $file_name[1]]);
            $contacts->save();

        }
        if ($request->banner_img) {

            $filename = $request->banner_img->store('media');
            $file_name = explode('/', $filename);
            $contacts->fill(['banner_img'=> $file_name[1]]);
            $contacts->save();

        }
        return redirect()->route('contacts_dashboard_edit');
    }
    public function detail(){
        $contacts = Contacts::first();
        $phones = unserialize($contacts->phones);
        return view('contacts',['contact'=>$contacts,'phones'=>$phones]);
    }
}
