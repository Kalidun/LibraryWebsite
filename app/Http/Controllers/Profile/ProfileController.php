<?php

namespace App\Http\Controllers\Profile;

use App\Models\User;
use App\Models\UserData;
use App\Models\GenderUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function index()
    {
        $userData = UserData::where('user_id', auth()->user()->id)->first();
        $genders = GenderUser::all();
        return view('pages.profile.index', compact('userData', 'genders'));
    }
    public function updateProfile(Request $request)
    {
        if ($request->username) {
            User::where('id', auth()->user()->id)->update([
                'username' => $request->username
            ]);
        }
        UserData::where('user_id', auth()->user()->id)->update([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'birthday' => $request->birthday,
            'gender_id' => $request->gender,
        ]);
        return redirect()->back()->with('success', 'Profile has been updated');
    }
    public function updatePhoto(Request $request)
    {
        try {
            $userData = UserData::where('user_id', auth()->user()->id)->first();
            $request->validate([
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            if ($request->photo) {
                if ($userData->image) {
                    unlink('storage/images/users/' . $userData->image);
                }
                $imageName = time() . '.' . $request->photo->extension();
                $request->photo->storeAs('public/images/users', $imageName);
            }
            UserData::where('user_id', auth()->user()->id)->update([
                'image' => $imageName
            ]);
            return redirect()->back()->with('success', 'Profile photo has been updated');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function deletePhoto()
    {
        try {
            $userData = UserData::where('user_id', auth()->user()->id)->first();
            unlink('storage/images/users/' . $userData->image);
            UserData::where('user_id', auth()->user()->id)->update([
                'image' => null
            ]);
            return redirect()->back()->with('success', 'Profile photo has been deleted');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
