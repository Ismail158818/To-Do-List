<?php
namespace App\Http\Controllers;
use App\Models\Complaint;
use App\Models\Task;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;
class PController extends Controller
{
    public function store_comp(Request $request)
    {
        $user = auth()->user();

        $comps = Complaint::create([
            'email' => $user->email,
            'message' => $request->message,
            'user_id' => auth()->id()
        ]);

            return redirect()->back()->with('message','Your suggestion has been added and will be considered and responded to soon, thank you');
    }
    public function req()
    {
        $comps=Complaint::with('user')->where('user_id',auth()->id())->get();
        return view('YourPage',compact('comps'));
    }
    public function store_task(Request $request)
    {
        $task=Task::create([
                'task_name' =>$request->task_name,
                'content' =>$request->content,
                'start_time' =>$request->start_time,
                'end_time'=>$request->end_time,
                'type_id' =>$request->type_id,
                'user_id' =>auth()->id()
            ]
        );
        return redirect()->back()->with('success','add success');
    }
    public function store_type(Request $request)
    {
        $stor_type= Type::create(
            [
                'type_name' => $request->type_name,
                'user_id' =>auth()->id()
            ]
        );
        return redirect()->back()->with('success','add success');
    }
    public function insert_task()
    {
        $tasks = Task::where('status', '!=', '1')
        ->where('end_time', '<', now())
        ->update(['is_overdue' => true]);

        $getTask = Task::with('type')->where('user_id', auth()->id())->where('status', '!=', 1)->where('is_overdue','false')->get();
        $getTaskCompleted = Task::with('type')->where('user_id', auth()->id())->where('status', '=', 1)->get();
        $getTaskIsOverdue = Task::with('type')->where('user_id', auth()->id())->where('is_overdue', '=', 1)->get();
            $types=Type::with('tasks')->where('user_id',auth()->id())->get();
        
 
        return view('ViewandShow',compact('types','getTask','getTaskCompleted','getTaskIsOverdue'));
    }

    public function delete_task(string $id)
    {
        $task = Task::where('id', $id)->first();
        $task->delete();
        return redirect()->back()->with('success','delete success');
    }
    public function admin()
    {
        $req= User::with('complaints');
        return $req;
    }
    public function complete_task(Request $request)
    {
        $task=Task::where('id',$request->id)->first();
        if($task)
        {
            if($task->status==0)
            {
                $task->update(['status'=>1]);
            }
            else{
                $task->update(['status'=>0]);

            }
           
        }
        return redirect()->back();
    }
}
//public function show_all(Request $request)
// {
//   $typeId = $request->input('type_id');
// $result_show = Type::with('tasks')->where('id', $typeId)->get();
// return $typeWithTasks;
// return view('ResultShow',compact('result_show'));
//}
