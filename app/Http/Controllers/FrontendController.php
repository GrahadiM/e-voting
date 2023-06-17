<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vote;
use App\Models\Kandidat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    private $voteModel;
    private $userModel;
    private $kandidatModel;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->voteModel     = new Vote();
        $this->userModel     = new User();
        $this->kandidatModel = new Kandidat();
    }

    public function index() {
        $data['pemilih']    = $this->userModel->where('id','!=',1)->count();
        $data['kandidat']   = $this->kandidatModel->count();
        $data['vote']       = $this->voteModel->count();
        return view('user.index');
    }

    public function vote() {
        $data['kandidat'] = $this->kandidatModel->all();

        return view('user.vote', $data);
    }

    public function votePost(Request $request)
    {
        $data = $this->voteModel;
        $data->kandidat_id = $request->id;
        $data->pemilih_id  = Auth::user()->id;
        $data->lat         = $request->lat;
        $data->long        = $request->long;
        $data->save();

        return redirect()->route('frontend.notify_success');
    }

    public function perolehan_suara() {
        $data['users'] = $this->userModel->where('id','!=',1)->count();
        $data['kandidats'] = $this->kandidatModel->all();
        $data['total'] = 0;
        foreach($data['kandidats'] as $item){
            $data['voting'][] = $this->voteModel->where('kandidat_id', $item->id)->count();
            $data['total'] += $this->voteModel->where('kandidat_id', $item->id)->count();
        }
        // dd($data);

        return view('user.perolehan_suara', $data);
    }

    public function notify_success() {
        return view('user.notify');
    }

    public function notify_token() {
        return view('user.notif_token');
    }
}
