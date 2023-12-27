<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class CrudController extends Controller
{
    public function showData(){
         //$datas = Student::all();
        $datas = Student::latest()->get();
        $datas = Student::simplePaginate(5); //for pagination

        //dd($data);
        return view('Index',compact('datas'));
        //return view('showData', compact('showData'));
    }

    public function addData(){
        return view ('addData');
    }

    public function storeData(Request $request){
        $rules = [                //validation
            'name'=>'required|max:20',
            'email'=>'required|email',
            'mobileNumber'=>'required|numeric|digits:11',

        ];
      
        $this->validate($request, $rules);   //$cm
        //return $request->all(); //check data pass

      $crud = new Student();     //for data store
        $crud->name = $request->name;
        $crud->email = $request->email;
        $crud->phone = $request->mobileNumber;
        $crud->save();

        //dd($crud);

        return redirect('/')->with('status', 'Data Successfully Added');
    }

    public function editData($id=null){
        $edit_data = Student::find($id);
        return view('editData', compact('edit_data'));

    }

    public function updateData(Request $request, $id){
        $rules = [                //validation
            'name'=>'required|max:20',
            'email'=>'required|email',
            'mobileNumber'=>'required|numeric|digits:11',

        ];
      
        $this->validate($request, $rules); 

      $crud = Student::find($id);   
        $crud->name = $request->name;
        $crud->email = $request->email;
        $crud->phone = $request->mobileNumber;
        $crud->save();

        return redirect('/')->with('status', 'Data Successfully Updated');
    }

    public function deleteData($id=null){
        $delete_data = Student::find($id);
        $delete_data->delete();
        return redirect('/')->with('status', 'Data Successfully Deleted');

    }

}
