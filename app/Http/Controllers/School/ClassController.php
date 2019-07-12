<?php

namespace App\Http\Controllers\School;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SchoolClass;
use App\Http\Requests\School\Classes\AddClass;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // find the classes
        $classes = SchoolClass::when($request->filled('search'), function ($query) use ($request) {
            $query->where('name', 'like', '%' . $request->input('search') . '%');
        })
            ->when($request->filled('sort_type'), function ($query) use ($request) {
                $query->where('status', $request->input('sort_type'));
            })
            ->latest()
            ->paginate(10);

        $index = ($classes->currentPage() - 1) * $classes->perPage() + 1;

        // request is ajax?
        if ($request->ajax()) {
            return response()->json(['data' => view('school.class.list', compact(['active', 'classes', 'index']))->render()], 200);
        }

        return view('school.class.index', compact(['active', 'classes', 'index']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('school.class.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddClass $request)
    {
        // get the request data
        $class = new SchoolClass($request->only('name', 'incharge_name', 'cp_index', 'order_by_index'));
        $class->status = 1;

        // save the class
        if ($class->save()) {
            return response()->json(['message' => 'Class added successfully!', 'redirectTo' => route('school.class.index')], 200);
        }
        return response()->json(['message' => 'Something went wrong!'], 400);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        // find the class
        $class = SchoolClass::where('id', $id)->first();

        if (!$class) {
            if ($request->ajax()) {
                return response()->json(['message' => 'Class does not exists!'], 400);
            }

            return redirect()->route('school.class.index');
        }

        return response()->json(['data' => view('school.class.details', compact('class'))->render()], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        // find the class
        $class = SchoolClass::where('id', $id)->first();

        if (!$class) {
            if ($request->ajax()) {
                return response()->json(['message' => 'Class does not exists!'], 400);
            }

            return redirect()->route('school.class.index');
        }

        return view('school.class.edit', compact('class'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AddClass $request, $id)
    {
        // find the class
        $class = SchoolClass::where('id', $id)->first();

        if (!$class) {
            if ($request->ajax()) {
                return response()->json(['message' => 'Class does not exists!'], 400);
            }

            return redirect()->route('school.class.index');
        }

        // Update the class
        if ($request->isMethod('put')) {
            $class->fill($request->only('name', 'incharge_name', 'cp_index', 'order_by_index'));
        } else {
            $class->status = !$class->status;
        }

        if ($class->save()) {
            return response()->json(['message' => 'Class data updated successfully!', 'redirectTo' => route('school.class.index')], 200);
        }

        return response()->json(['message' => 'Something went wrong!'], 400);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        // find the class
        $class = SchoolClass::where('id', $id)->first();

        if (!$class) {
            if ($request->ajax()) {
                return response()->json(['message' => 'Class does not exists!'], 400);
            }

            return redirect()->route('school.class.index');
        }

        if ($class->delete()) {
            return response()->json(['message' => 'Class deleted successfully!'], 200);
        }
        return response()->json(['message' => 'Something went wrong!'], 400);
    }
}
