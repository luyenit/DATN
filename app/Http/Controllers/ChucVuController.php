<?php

namespace App\Http\Controllers;

use App\Models\chuc_vu;
use App\Http\Requests\Storechuc_vuRequest;
use App\Http\Requests\Updatechuc_vuRequest;

class ChucVuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $chucvus = chuc_vu::query()->latest('id')->paginate(5);
        $title = "Danh sách chức vụ";
        return view('admin.chucvu.index', compact('chucvus', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $title = "Thêm mới chức vụ";
        return view('admin.chucvu.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Storechuc_vuRequest $request)
    {
        //
        if ($request->isMethod('POST')) {
            $param = $request->except('_token');
            chuc_vu::create($param);
        }
        return redirect()->route('chucvus.index')->with('success', 'Thêm chức vụ thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(chuc_vu $chuc_vu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(chuc_vu $chuc_vu, string $id)
    {
        //
        $title = "Cập nhật chức vụ";
        $chuc_vu = chuc_vu::query()->findOrFail($id);
        return view('admin.chucvu.edit', compact('title', 'chuc_vu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updatechuc_vuRequest $request, chuc_vu $chuc_vu, string $id)
    {
        //
        if ($request->isMethod('PUT')) {
            $param = $request->except('_token', '_method');
            $chucvu = chuc_vu::findOrFail($id);
            $chucvu->update($param);
        }

        return redirect()->route('chucvus.index')->with('success', 'Cập nhật chức vụ thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(chuc_vu $chuc_vu, string $id)
    {

        $chucvu = chuc_vu::findOrFail($id);
        if ($chucvu) {
            $chucvu->delete();
            return redirect()->route('chucvus.index')->with('success', 'Xóa chức vụ thành công');
        } else {
            return redirect()->back()->with('success', 'Không tồn tại người dùng');
        }
    }
}