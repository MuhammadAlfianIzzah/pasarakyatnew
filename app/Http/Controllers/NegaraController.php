<?php

namespace App\Http\Controllers;

use App\Models\Negara;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NegaraController extends Controller
{
    public function index()
    {
        $negaras = Negara::paginate(5);
        return view("pages.negara.index", compact("negaras"));
    }
    public function edit(Request $request, Negara $negara)
    {
        return view("pages.negara.edit", compact("negara"));
    }
    public function store(Request $request)
    {
        $attr = $request->validate([
            "nama" => "required",
            "deskripsi" => "required",
            "logo" => "required|mimes:png,jpg,jpeg",
            "lat" => "required",
            "lang" => "required"
        ]);
        $attr["slug"] = Str::slug($attr["nama"] . "-" . uniqid(), '-');
        $attr["logo"] = $request->file("logo")->store("/negara/logo");
        Negara::create($attr);
        return redirect()->route("negara-index")->with("success", "berhasil menambahkan data");
    }
    public function destroy(Request $request, Negara $negara)
    {
        $negara->delete();
        return redirect()->route("negara-index")->with("success", "berhasil menghapus data");
    }
}
