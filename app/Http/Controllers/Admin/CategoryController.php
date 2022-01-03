<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()) {
            $query = Category::query();

            return DataTables::of($query)->addColumn('action', function($item) {
                return '
                    <div class="btn-group">
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle mr-1" type="button" data-toggle="dropdown">Action</button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="'.route('admin.category.edit', $item->id).'">Edit</a>
                                <form action="'.route('admin.category.destroy', $item->id).'" method="post">
                                    '.method_field('delete').csrf_field().'
                                    <button type="submit" class="dropdown-item text-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                ';
            })->editColumn('photo', function($item) {
                return $item->photo ? '<img src="'.Storage::url($item->photo).'" style="max-height: 40px"/>' : '';
            })->rawColumns(['action', 'photo'])->make();
        }
        return view('pages.dashboard.admin.category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.dashboard.admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        $data['photo'] = $request->file('photo')->store('assets/category', 'public');

        Category::create($data);

        return redirect()->route('admin.category.index');
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
        $item = Category::findOrFail($id);

        $data = ['item' => $item];

        return view('pages.dashboard.admin.category.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        $data['photo'] = $request->file('photo')->store('assets/category', 'public');

        $item = Category::findOrFail($id);
        $item->update($data);

        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Category::findOrFail($id);
        $item->delete();

        return redirect()->route('admin.category.index');
    }
}
