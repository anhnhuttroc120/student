<?php

namespace App\Http\Controllers;
use App\Http\Requests\CreateRequest;
use Illuminate\Http\Request;
use App\Student;
use App\User;
use Auth;
use DateTime;
use DB;
class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
            // $students=DB::table('student')->join('school','student.class_id','school.id')->select(DB::raw('student.name as studentname,student.id as id_student,school.id,school.name'))->get();
            $students=DB::table('student')->join('school', function($join){
                $join->on('student.class_id','=','school.id');
            })->where('school.id','>','0')->select(DB::raw('student.name as studentname,student.id as id_student,school.id,school.name'))->get();
                $role=1;
           // $student = DB::table('student')
           //      ->when($role, function ($query) use ($role) {
           //          return $query->where('class_id', $role);
           //      })
           //      ->get(); closeure
           $students=Student::all();
            
            // return response($user,200) 
        return view('student.list',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
      $data=$request->all(); //lay du lieu tu form,  name cua form bang ten cot trong bang~ 
        $student=new Student(); //them sinh vien
        $student->name=$data['name'];
        $student->address=$data['address'];
        $student->date_of_birth=$data['date_of_birth'];
        $student->class_id=$data['class_id'];
        $student->created_at= new datetime;
        $student->save();
        $student->school->name='NamDaica';
        $student->school->created_at =new datetime;
        $student->school->save();



    return redirect()->back()->with('success','Đã  thêm học sinh thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    $student=Student::find($id); //tim 1 hoc sinh dieu kien id bang nguoi dung kick vao
        
        return view('student.show',compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {      $student=Student::find($id);
    
        return view('student.update',compact('student'));
            
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $student=Student::find($id);
            $data=$request->all();
            $student->update($data);
            return redirect()->back()->with('success','Bạn đã thay đổi thành công phần từ id '.$student->id);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $student=Student::find($id);
         $student->delete();
         return redirect()->back();
    }
    public function school(Request $request){
        $result='';
            if(isset($request->school)){

                if($request->school=='default'){
                        $students=Student::all();
                    foreach ($students as $key => $student) {
                                            $result.='<tr id="item-'.$student->id.'">
                              <td>'.$student->id.'</td>
                              <td><a href="main/'.$student->id.'">'.$student->name.'</a></td>
                              <td>  <a style="color: black"></a>'.$student->school->name.'</td>
                              <td>'.$student->address.'</td>
                              <td>'.$student->date_of_birth.'</td>
                              <td><a href="main/'.$student->id.'/edit" class="demo btn btn-success">
                          Update</a></td>

                              <td><a href="javascript:deleteItem('.$student->id.')" class="btn btn-warning " ><span class="glyphicon glyphicon-remove"></span>Delete</a></td>
                            </tr>';
                    

                        }

                    }else{
                        $students=Student::all()->where('class_id',$request->school);
                    foreach ($students as $key => $student) {
                                            $result.='<tr id="item-'.$student->id.'">
                              <td>'.$student->id.'</td>
                              <td><a href="main/'.$student->id.'">'.$student->name.'</a></td>
                              <td>  <a style="color: black"></a>'.$student->school->name.'</td>
                              <td>'.$student->address.'</td>
                              <td>'.$student->date_of_birth.'</td>
                              <td><a href="main/'.$student->id.'/edit" class="demo btn btn-success">
                          Update</a></td>

                              <td><a href="javascript:deleteItem('.$student->id.')" class="btn btn-warning " ><span class="glyphicon glyphicon-remove"></span>Delete</a></td>
                            </tr>';
                    

                        }

                    }

                    
                

                        return $result;
            }
        }
}
