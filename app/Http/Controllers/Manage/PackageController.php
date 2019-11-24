<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Package\CreatePackageRequest;
use App\Http\Requests\Package\UpdatePackageRequest;
use App\Http\Requests\Package\DeletePackageRequest;
use App\Package;
use Session;
use Image;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $packages = Package::all();

        return view('manage.package.index')->withPackages($packages);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        //
        $packages = Package::all();

        return view('customer.packages')->withPackages($packages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('manage.package.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePackageRequest $request)
    {
        if ($image = $request->file('image')) {
            $filename = $image->hashName();
            $path_thumb = public_path('media/thumbnails/' . $filename);
            Image::make($image->getRealPath())->resize(350, null, function ($constraint) {
                $constraint->aspectRatio();
            })->crop(350, 177)->save($path_thumb);

            $path = public_path('media/images/' . $filename);
            Image::make($image->getRealPath())->save($path);
        }
        //
        if (Package::create(array_merge($request->all(), ['image' => $filename]))) {
            Session::flash('success', Sprintf('%s has been created', $request->get('name')));
        }

        return redirect()->route('manage:package:index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Package $package)
    {
        return view('manage.package.show')
                ->withPackage($package);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Package $package)
    {
        return view('manage.package.edit')
                ->withPackage($package);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePackageRequest $request, Package $package)
    {
        $package->update($request->all());

        Session::flash('success', Sprintf('%s has been updated', $package->name));

        return redirect()->route('manage:package:show', $package->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeletePackageRequest $request, Package $package)
    {

        $oldImage = $package->image;
        if ($oldImage) {
            if (file_exists(public_path('media/images/' . $oldImage))) {
                unlink('media/images/' . $oldImage);
            }
            if (file_exists(public_path('media/thumb/' . $oldImage))) {
                unlink('media/thumb/' . $oldImage);
            }
        }
        $package->delete();

        Session::flash('success', Sprintf('%s has been deleted', $package->name));

        return redirect()->route('manage:package:index');
    }
}
