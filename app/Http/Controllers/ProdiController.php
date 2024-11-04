<?php

namespace App\Http\Controllers;

use App\Models\Prodi;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
class ProdiController extends Controller
{
    public function index()
    {
        $prodis = Prodi::all();
        return view('prodi.index',compact("prodis"));
    }

    public function create() {
        return view('prodi.create');
    }

     /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "nama" => "required|string|max:255|unique:App\Models\Prodi,nama",
        ]);
        
        Prodi::create(["nama" => Str::upper($request->nama)]);
        return Redirect::route('prodi')->with('message', "Data berhasil disimpan");
    }

    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $prodis = Prodi::findOrFail($id);
        
        return view('prodi.create',compact("prodis"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "nama" => ['required',
                'string',
                'max:255',
                Rule::unique('prodis', 'nama')->ignore($id)],
        ]);
        $posts = Prodi::findOrFail($id);
        $posts->update(["nama" => Str::upper($request->nama)]);
        
        return Redirect::route('prodi')->with('message', "Data berhasil di update");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Prodi::findOrFail($id);
        $post->delete();
        return Redirect::route('prodi')->with('message', "Data berhasil dihapus");
    }
}
