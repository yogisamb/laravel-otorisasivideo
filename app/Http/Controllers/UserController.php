<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\User;
use App\Models\Relasivideo;

class UserController extends Controller
{
    public function index()
    {
        return view('user/index', [
            'video' => Video::all(),
        ]);
    }

    public function requestvideo(Request $request)
    {
        $cekvideo = Video::where('id', $request->video_id)->first();
        // dd($request);
        $cek = $request->validate([
            'video_id' => 'required',
        ]);
        $cek['user_id'] = auth()->user()->id;
        $cek['durasi'] = null;
        $cek['timeup'] = null;
        Relasivideo::create($cek);
        return redirect('/user');
    }

    public function bukavideo(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $cekvideo = Relasivideo::where('video_id', $request->video_id)->where('user_id', auth()->user()->id)->first();
        if ($cekvideo) {
            if ($cekvideo->durasi) {

                // cek timeup
                if (!$cekvideo->timeup) {
                    $date =  date_create(date("Y-m-d H:i:s"));
                    date_add($date, date_interval_create_from_date_string($cekvideo->durasi));
                    $timeup = $date;
                    $ceksekarang = [
                        'timeup' => $timeup,
                    ];
                    Relasivideo::where('id', $cekvideo->id)->update($ceksekarang);
                } else {
                    if (date("Y-m-d H:i:s") > date("Y-m-d H:i:s", strtotime($cekvideo->timeup))) {
                        Relasivideo::destroy($cekvideo->id);
                        return redirect('/user');
                    }
                }
                return view('user/bukavideoaproval', [
                    'video' => Video::where('id', $request->video_id)->first()
                ]);
            } else {
                return view('user/bukavideowaiting', [
                    'video' => Video::where('id', $request->video_id)->first()
                ]);
            }
        } else {
            return view('user/bukavideo', [
                'video' => Video::where('id', $request->video_id)->first()
            ]);
        }
    }
}
