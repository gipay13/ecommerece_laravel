<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Validation\Rules\Password as RulesPassword;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       if(request()->ajax()) {
            $query = User::query();

            return DataTables::of($query)->addColumn('action', function($item) {
                return '
                    <div class="btn-group">
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle mr-1" type="button" data-toggle="dropdown">Action</button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="'.route('admin.user.edit', $item->id).'">Edit</a>
                                <form action="'.route('admin.user.destroy', $item->id).'" method="post">
                                    '.method_field('delete').csrf_field().'
                                    <button type="submit" class="dropdown-item text-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                ';
            })->rawColumns(['action'])->make();
        }
        return view('pages.dashboard.admin.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.dashboard.admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $data = $request->all();
        $data['password'] = Hash::make($request->password);

        User::create($data);

        return redirect()->route('admin.user.index');
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
        // edit bisa menggunakan slug juga daripada id

        $item = User::findOrFail($id);

        $data = ['item' => $item];

        return view('pages.dashboard.admin.user.edit', $data);
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
        $item = User::findOrFail($id);

        $data = $request->all();

        if($request->password) {
            $request->validate([
                'name'  => 'required|string',
                'email' => 'required|email|unique:users,email,'.$item->id,
                'password'  => RulesPassword::min(8)->mixedCase()->numbers(),
                'roles' => 'required|in:admin,user'
            ]);

            $data['password'] = Hash::make($request->password);
        } else {
            $request->validate([
                'name'  => 'required|string',
                'email' => 'required|email|unique:users,email,'.$item->id,
                'roles' => 'required|in:admin,user'
            ]);

            unset($data['password']);
        }


        $item->update($data);

        return redirect()->route('admin.user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = User::findOrFail($id);
        $item->delete();

        return redirect()->route('admin.user.index');
    }
}
