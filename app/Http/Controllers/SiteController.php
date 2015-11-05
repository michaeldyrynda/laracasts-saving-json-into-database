<?php

namespace App\Http\Controllers;

use App\Site;
use Illuminate\Http\Request;

class SiteController extends Controller
{

    public function index()
    {
        $sites = Site::all();

        return view('list_sites', compact('sites'));
    }

    public function create()
    {
        return view('create_site');
    }


    public function edit($site_id)
    {
        $site = Site::findOrFail($site_id);

        return view('edit_site', compact('site'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
          'name'     => 'required',
          'features' => 'required',
        ]);

        Site::create($request->only(['name', 'features',]));

        return redirect()->route('sites.index');
    }


    public function update(Request $request, $site_id)
    {
        $site = Site::findOrFail($site_id);
        $site->update($request->all());

        return redirect()->route('sites.edit', $site->id);
    }
}
