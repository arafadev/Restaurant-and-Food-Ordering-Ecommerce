<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\ProfileUpdateRequest;
use App\Http\Requests\Admin\ProfilePasswordUpdateRequest;
use App\Traits\FileUploadTrait;

class ProfileController extends Controller
{
    use FileUploadTrait;
    public function index()
    {
        return view('admin.profile.index');
    }


    public function updateProfile(ProfileUpdateRequest $request): RedirectResponse
    {

        $user = Auth::user();

        $imagePath = $this->uploadImage($request, 'avatar');

        $user->name = $request->name;
        $user->email = $request->email;
        $user->avatar = isset($imagePath) ? $imagePath : $user->avatar;
        $user->save();

        toastr('Updated Successfully!', 'success');

        return redirect()->back();
    }

    public   function updatePassword(ProfilePasswordUpdateRequest $request): RedirectResponse
    {

        $user = Auth::user();
        $user->password = bcrypt($request->password);
        $user->save();
        toastr()->success('Password Updated Successfully');

        return redirect()->back();
    }
}
