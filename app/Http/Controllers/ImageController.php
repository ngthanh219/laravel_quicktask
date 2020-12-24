<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\User;
use App\Http\Requests\CreateImageRequest;
use App\Http\Requests\UpdateImageRequest;

class ImageController extends Controller
{
    public function index()
    {
        $images = Image::with('user')->get();

        return view('components.image.content', compact('images'));
    }

    public function create()
    {
        $users = User::all();

        return view('components.image.create_form', compact('users'));
    }

    public function store(CreateImageRequest $request)
    {
        $data = $request->all();
        $image = time() . '_' . $data['image']->getClientOriginalName();
        $data['image']->move('images', $image);
        $data['image'] = $image;
        Image::create($data);
        $request->session()->flash('infoMessage', trans('image.create_image_success'));

        return redirect()->route('image.index');
    }

    public function edit($id)
    {
        $images = Image::with('user')->find($id);
        $users = User::with('images')->get();
        if ($images) {
            return view('components.image.edit_form', compact('users', 'images'));
        } else {
            session()->flash('infoMessage', trans('image.isset_id'));

            return redirect()->route('image.index');
        }
    }

    public function update(UpdateImageRequest $request, $id)
    {
        $images = Image::find($id);
        if ($images) {
            $data = $request->all();
            if (isset($data['image'])) {
                $image = time() . '_' . $data['image']->getClientOriginalName();
                $data['image']->move('images', $image);
                $data['image'] = $image;
            } else {
                $data['image'] = $images->image;
            }
            $images->update($data);
            $request->session()->flash('infoMessage', trans('image.update_image_success'));

            return redirect()->route('image.index');
        } else {
            session()->flash('infoMessage', trans('image.isset_id'));

            return redirect()->route('image.index');
        }
    }

    public function destroy(Request $request, $id)
    {
        $images = Image::find($id);
        if ($images) {
            $images->delete();
            $request->session()->flash('infoMessage', trans('image.delete_image_success'));

            return redirect()->route('image.index');
        } else {
            session()->flash('infoMessage', trans('image.isset_id'));

            return redirect()->route('image.index');
        }
    }
}
