<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\User_role;
use App\Models\Video;
use App\Models\Relasivideo;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index()
    {
        $cekuser = User::where('id', auth()->user()->id)->first();
        if ($cekuser->user_role_id == 1) {
            return view('dashboard/index', [
                'user' => User::all()
            ]);
        } else {
            return redirect('/user');
        }
    }

    public function video()
    {
        $cekuser = User::where('id', auth()->user()->id)->first();
        if ($cekuser->user_role_id == 1) {
            return view('dashboard/video', [
                'video' => Video::all()
            ]);
        } else {
            return redirect('/user');
        }
    }

    public function create()
    {
        $cekuser = User::where('id', auth()->user()->id)->first();
        if ($cekuser->user_role_id == 1) {
            return view('dashboard/create', [
                'urole' => User_role::all()
            ]);
        } else {
            return redirect('/user');
        }
    }

    public function buatakun(Request $request)
    {
        $cek = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'user_role_id' => 'required'
        ]);

        $cek['is_active'] = '1';
        $cek['password'] = Hash::make($request->password);

        User::create($cek);
        return redirect('/dashboard');
        // dd('gagal');
    }

    public function hapusakun(Request $request)
    {
        // dd($request);
        User::destroy($request->id);
        return redirect('/dashboard');
    }

    public function editakun(Request $request)
    {
        $cekuser = User::where('id', auth()->user()->id)->first();
        if ($cekuser->user_role_id == 1) {
            return view('dashboard/edit', [
                'user' => User::where('id', $request->id)->first(),
                'urole' => User_role::all()
            ]);
        } else {
            return redirect('/user');
        }
    }

    public function edituser(Request $request)
    {
        $cek = $request->validate([
            'name' => 'required',
            'user_role_id' => 'required'
        ]);


        User::where('id', $request->id)->update($cek);
        return redirect('/dashboard');
        // dd('gagal');
    }

    public function createvideo()
    {
        $cekuser = User::where('id', auth()->user()->id)->first();
        if ($cekuser->user_role_id == 1) {
            return view('dashboard/createvideo');
        } else {
            return redirect('/user');
        }
    }

    public function buatvideo(Request $request)
    {
        $data = new video();
        $file = $request->video;
        $filee = $request->thumb;
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $filenamee = time() . '.' . $filee->getClientOriginalExtension();
        $request->video->move('assets', $filename);
        $request->thumb->move('assets', $filenamee);
        $data->video_thumb = $filenamee;
        $data->video_label = $filename;
        $data->video_title = $request->name;
        $data->video_deskripsi = $request->deskripsi;
        $data->save();
        return redirect('/video');
    }

    public function hapusvideo(Request $request)
    {
        $cekvideo = Video::where('id', $request->id)->first();
        $file = public_path('/assets/') . $cekvideo->video_label;
        $filee = public_path('/assets/') . $cekvideo->video_thumb;
        if (file_exists($file and $filee)) {
            @unlink($file);
            @unlink($filee);
        }
        Video::destroy($request->id);
        return redirect('/video');
    }

    public function editvideo(Request $request)
    {
        $cekuser = User::where('id', auth()->user()->id)->first();
        if ($cekuser->user_role_id == 1) {
            return view('dashboard/editvideo', [
                'video' => Video::where('id', $request->id)->first(),
            ]);
        } else {
            return redirect('/user');
        }
    }

    public function rubahvideo(Request $request)
    {
        $cekvideo = Video::where('id', $request->id)->first();

        if ($request->thumb == null and $request->video == null) {
            $data = new Video();
            $filename = $cekvideo->video_label;
            $filenamee = $cekvideo->video_thumb;
            $data->video_deskripsi = $request->deskripsi;
            $data->video_title = $request->name;
        } else if ($request->video == null) {
            $filee = public_path('/assets/') . $cekvideo->video_thumb;
            if (file_exists($filee)) {
                @unlink($filee);
            }
            $data = new video();
            $filee = $request->thumb;
            $filenamee = time() . '.' . $filee->getClientOriginalExtension();
            $request->thumb->move('assets', $filenamee);
            $file = $cekvideo->video_label;
            $data->video_deskripsi = $request->deskripsi;
            $data->video_title = $request->name;
            $filename = $cekvideo->video_label;
        } else if ($request->thumb == null) {
            $file = public_path('/assets/') . $cekvideo->video_label;
            if (file_exists($file)) {
                @unlink($file);
            }
            $data = new video();
            $file = $request->video;
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $request->video->move('assets', $filename);
            $filee = $cekvideo->video_thumb;
            $data->video_deskripsi = $request->deskripsi;
            $data->video_title = $request->name;
            $filenamee = $cekvideo->video_thumb;
        } else {
            $file = public_path('/assets/') . $cekvideo->video_label;
            $filee = public_path('/assets/') . $cekvideo->video_thumb;
            if (file_exists($file and $filee)) {
                @unlink($file);
                @unlink($filee);
            }
            $data = new video();
            $file = $request->video;
            $filee = $request->thumb;
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $filenamee = time() . '.' . $filee->getClientOriginalExtension();
            $request->video->move('assets', $filename);
            $request->thumb->move('assets', $filenamee);
        }




        $cek = [
            'video_title' => $request->name,
            'video_label' => $filename,
            'video_deskripsi' => $request->deskripsi,
            'video_thumb' => $filenamee,
        ];
        Video::where('id', $request->id)->update($cek);
        return redirect('/video');
    }

    public function activateuser(Request $request)
    {
        return view('dashboard/relasi', [
            'relasi' => Relasivideo::where('video_id', $request->id)->get(),
        ]);
    }

    public function active(Request $request)
    {
        return view('dashboard/active', [
            'relasi' => Relasivideo::where('id', $request->id)->first(),
        ]);
    }

    public function simpanvideo(Request $request)
    {
        $cek = [
            'durasi' => $request->durasi,
        ];
        Relasivideo::where('id', $request->id)->update($cek);
        return redirect('/video');
    }
}
