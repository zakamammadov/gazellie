<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Backend\UserDetal;
use Auth;
use Hash;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        if (request()->filled('search')) {
            request()->flash();
            $search = request('search');
            $users = User::where('name', 'like', "%$search%")
                ->orWhere('email', 'like', "%$search%")
                ->orderByDesc('created_at')
                ->paginate(8)
                ->appends('search', $search);
        } else{
            $users=User::orderByDesc('created_at')->paginate(10);

        }
return view('backend.users.users')->with('users',$users);

    }

public function AdminLogin(){

    if (request()->isMethod('POST')) {
        $this->validate(request(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = [
            'email'       => request()->get('email'),
            'password'    => request()->get('password'),
            'is_admin' => 1,
            'is_active'    => 1
        ];

        if (Auth::guard('admin')->attempt($credentials, request()->has('rememberme'))) {
            return redirect()->route('admin.homepage');
        } else {
            return back()->withInput()->withErrors(['email' => 'Email or password incorrect!']);
        }
    }

return view('backend.login.login');
}

public function logout(){
    Auth::guard('admin')->logout();

    return redirect()->route('admin.login');
}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

public function form($id=0){
$entry= new User;
if($id>0){
    $entry=User::find($id);
}
       return view ('backend.users.form',compact('entry'));

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
            'email'   => 'required|email|unique:users'
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);

        return redirect()
            ->route('admin.users')
            ->with('message', 'Deleted')
            ->with('message_type', 'success');
    }
}
