<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todos = Todo::latest()->get();
        return view('todo.index', ['todos' => $todos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('todo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'todo' => 'required|max:30',
            'tanggal' => 'required',
            'jam' => 'required',
            'status' => 'required',
        ]);

        Todo::create($validate);

        return redirect('/todos')->with('success', 'Todo Berhasil Di tambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(Todo $todo)
    {
        return view('todo.show', ['todo' => $todo]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Todo $todo)
    {
        return view('todo.edit', ['todo' => $todo]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Todo $todo)
    {
        $validate = $request->validate([
            'todo' => 'required|max:30',
            'tanggal' => 'required',
            'jam' => 'required',
            'status' => 'required',
        ]);

        Todo::where('id', $todo->id)->update($validate);

        return redirect('/todos')->with('success', "Todo $request->todo  Berhasil Di ubah");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();

        return redirect('/todos')->with('error', "Todo $todo->todo  Berhasil Di Hapus");
    }
}
