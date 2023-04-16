<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function index (){
        return Course::all();
    }
    public function show ($id){
        return Course::find($id);
    }
    public function create (request $request){
        $course = new Course();
        $course->name = $request->input('name');
        $course->email = $request->input('email');
        $course->password = $request->input('password');
        $course->save();
        return json_encode(['msg' => 'Agregado exitosamente']);

    }
    public function destroy ($id){

        Course::destroy($id);
        return json_encode(['msg'=>'Eliminado correctamente']);

    }

    public function edit (request $request, $id){

        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');

        Course::where('id', $id)->update(
            [
            'name'=>$name,
            'email'=>$description,
            'password'=>$password]
        
        );
        return json_encode(['msg'=>'Editado correctamente']);
    }
}
