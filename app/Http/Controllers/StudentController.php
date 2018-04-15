<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\School;
use App\User;
use App\Http\Requests\CreateRequest;

use Illuminate\Support\Facades\Input;
class StudentController extends Controller
{
	public function index(Request $request){

			
			
			$students=Student::all();
			$users=User::all();
			
			
		return view('student.list',compact('students'));

	}
	public function ajax(){
		$students=Student::all();
		return response()->json($students,200);
	}



	public function show($id){
		$student=Student::find($id); //tim 1 hoc sinh dieu kien id bang nguoi dung kick vao
		
		return view('student.show',compact('student'));
	}//form add student
	public function create(){
		

		return view('student.add');
	}
	//them sinh vien
	public function add(CreateRequest $request){
			
		$data=$request->all(); //lay du lieu tu form,  name cua form bang ten cot trong bang~ 
		$student=Student::create($data); //them sinh vien
   	return redirect()->back()->with('success','Đã  thêm con mèo thành công');
	}

	public function getUpdate($id){
		$student=Student::find($id);
	
		return view('student.update',compact('student'));


	}
	public function update($id, CreateRequest $request){
	
			$student=Student::find($id);
			$data=Input::all();
			$student->update($data);
			return redirect()->back()->with('success','Bạn đã thay đổi thành công phần từ id '.$student->id);
	}
	public function delete($id){

		$student=Student::find($id);
		$student->delete();
		return redirect()->back();
	}
	// public function ajax(Request $request){
	// 	$result=['id'=>'1','name'=>'NamNguyen'];
	// 	  return \Response::json($result);
	// }
	public function school(Request $request){
		$result='';
			if(isset($request->school)){

				if($request->school=='default'){
						$students=Student::all();
					foreach ($students as $key => $student) {
											$result.='<tr id="item-'.$student->id.'">
						      <td>'.$student->id.'</td>
						      <td><a href="show/'.$student->id.'">'.$student->name.'</a></td>
						      <td>  <a style="color: black"></a>'.$student->school->name.'</td>
						      <td>'.$student->address.'</td>
						      <td>'.$student->date_of_birth.'</td>
						      <td><a href="update/'.$student->id.'" class="demo btn btn-success">
						  Update</a></td>

						      <td><a href="javascript:deleteItem('.$student->id.')" class="btn btn-warning " ><span class="glyphicon glyphicon-remove"></span>Delete</a></td>
						    </tr>';
					

						}

					}else{
						$students=Student::all()->where('class_id',$request->school);
					foreach ($students as $key => $student) {
											$result.='<tr id="item-'.$student->id.'">
						      <td>'.$student->id.'</td>
						      <td><a href="show/'.$student->id.'">'.$student->name.'</a></td>
						      <td>  <a style="color: black"></a>'.$student->school->name.'</td>
						      <td>'.$student->address.'</td>
						      <td>'.$student->date_of_birth.'</td>
						      <td><a href="update/'.$student->id.'" class="demo btn btn-success">
						  Update</a></td>

						      <td><a href="javascript:deleteItem('.$student->id.')" class="btn btn-warning " ><span class="glyphicon glyphicon-remove"></span>Delete</a></td>
						    </tr>';
					

						}

					}

					
				

						return $result;
			}
				 
	}
}

