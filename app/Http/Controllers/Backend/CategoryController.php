<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use Hash;
class CategoryController extends Controller
{

    public function index()
    {


        if (request()->filled('search')) {
            request()->flash();
            $search = request('search');
            $list = User::where('slug', 'like', "%$search%")
                ->orderByDesc('created_at')
                ->paginate(10)
                ->appends('search', $search);
        } else{
            $list=Category::orderByDesc('created_at')->paginate(10);

        }
return view('backend.category.category')->with('list',$list);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

public function form($id=0){
$entry= new Category;
if($id>0){
    $entry=Category::find($id);
}
$category=Category::all();

       return view ('backend.category.form',compact('entry','category'));

}



    public function save($id=0)
    {
        if($id>0){
        $this->validate(request(), [
            'name' => 'required',
            'email'   => 'required|email'
        ]);
    }else{
        $this->validate(request(), [
            'name' => 'required',
            'email'   => 'required|email|unique:users',
            'password'=>'required'
        ]);
    }
        $data = request()->only('name', 'email');
        if (request()->filled('password')) {
            $data['password'] = Hash::make(request('password'));
        }
        $data['is_active'] = request()->has('is_active') && request('is_active') == 1 ? 1 : 0;
        $data['is_admin'] = request()->has('is_admin') && request('is_admin') == 1 ? 1 : 0;

        if ($id > 0) {
            $entry = User::where('id', $id)->firstOrFail();
            $entry->update($data);
        } else {
            $entry = User::create($data);
        }


        UserDetal::updateOrCreate(
            ['user_id' => $entry->id],
            [
                'adress'       => request('adress'),
                'phone'     => request('phone'),
                'mob_phone' => request('mob_phone')
            ]
        );

        return redirect()
            ->route('admin.users')
            ->with('message', ($id > 0 ? 'Updated' : 'Saved'))
            ->with('message_type', 'success');



    }


    public function destroy($id)
    {
        User::destroy($id);

        return redirect()
            ->route('admin.users')
            ->with('message', 'Deleted')
            ->with('message_type', 'success');
    }
}
