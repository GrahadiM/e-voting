<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Vote;
use App\Models\Jadwal;
use App\Models\Kandidat;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    private $voteModel;
    private $userModel;
    private $pemilihModel;
    private $kandidatModel;
    private $jadwalModel;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->voteModel     = new Vote();
        $this->userModel     = new User();
        $this->pemilihModel  = new User();
        $this->kandidatModel = new Kandidat();
        $this->jadwalModel   = new Jadwal();
    }

    public function dashboard() {
        $data['total']      = 0;
        $data['title']      = 'Dashboard';
        $data['pemilih']    = $this->userModel->where('id','!=',1)->count();
        $data['kandidat']   = $this->kandidatModel->count();
        $data['kandidats']  = $this->kandidatModel->all();
        $data['vote']       = $this->voteModel->count();
        foreach($data['kandidats'] as $item){
            $data['name'][]     = $item->name;
            $data['voting'][]   = $this->voteModel->where('kandidat_id', $item->id)->count();
            $data['total']      += $this->voteModel->where('kandidat_id', $item->id)->count();
        }
        $data['name']       = json_encode($data['name']);
        $data['total_vote'] = json_encode($data['voting']);
        return view('admin.dashboard', $data);
    }

    public function thumbnail() {
        $data['title']      = 'Foto Profile';
        $data['user']       = $this->userModel->where('id', Auth::user()->id)->first();
        return view('admin.thumbnail', $data);
    }

    public function thumbnail_store(Request $request) {
        $data           = $this->userModel->where('id', Auth::user()->id)->first();
        $thumbnail      = $request->thumbnail;
        if ($thumbnail) {
            $destinationPath    = 'images/thumbnail/';
            $thumbnailImage     = date('YmdHis') . "." . $thumbnail->getClientOriginalExtension();
            $thumbnail->move($destinationPath, $thumbnailImage);
            $data->thumbnail    = $thumbnailImage;
        }
        $data->save();
        return redirect()->route('admin.thumbnail');
    }

    public function data_pemilih() {
        $data['title']      = 'Data Pemilih';
        $data['pemilih']    = $this->userModel->where('id','!=',1)->get();
        return view('admin.data-pemilih', $data);
    }

    public function data_pemilih_create() {
        $data['title']      = 'Tambah Data Pemilih';
        $data['edit']       = false;
        $data['users']      = User::where('id','!=','1')->get();
        return view('admin.data-pemilih-addEdit', $data);
    }

    public function data_pemilih_store(Request $request) {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $data           = $this->pemilihModel;

        $data->name     = $request->name;
        $data->email    = $request->email;
        $data->password = Hash::make($request->password);
        $data->nisn     = $request->nisn;
        $data->gender   = $request->gender;
        $data->jurusan  = $request->jurusan;
        $data->kelas    = $request->kelas;
        // $data->phone = $this->gantiformat($request->phone);

        $data->save();
        $data->syncRoles([2]);

        return redirect()->route('admin.data_pemilih.index');
    }

    public function data_pemilih_edit($id) {
        $data['title']      = 'Ubah Data Pemilih';
        $data['edit']       = true;
        $data['pemilih']    = $this->pemilihModel->where('id', $id)->first();
        $data['users']      = $this->userModel->where('id','!=','1')->get();
        return view('admin.data-pemilih-addEdit', $data);
    }

    public function data_pemilih_update(Request $request, $id) {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // 'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $data           = $this->pemilihModel->where('id', $id)->first();

        $data->name     = $request->name;
        $data->nisn     = $request->nisn;
        $data->gender   = $request->gender;
        $data->jurusan  = $request->jurusan;
        $data->kelas    = $request->kelas;
        // $data->email    = !empty($request->email) ? $request->email : $data->email;
        // $data->password = !empty($request->password) ? Hash::make($request->password) : $data->password;

        $data->save();
        $data->syncRoles([2]);

        return redirect()->route('admin.data_pemilih.index');
    }

    public function data_pemilih_delete($id) {
        $data = $this->pemilihModel->where('id', $id)->first();
        $data->delete();

        return redirect()->route('admin.data_pemilih.index');
    }

    public function data_kandidat() {
        $data['title']      = 'Data Kandidat';
        $data['kandidat']   = $this->kandidatModel->all();
        return view('admin.data-kandidat', $data);
    }

    public function data_kandidat_create() {
        $data['title']      = 'Tambah Data Kandidat';
        $data['edit']       = false;
        $data['users']      = User::where('id','!=','1')->get();
        return view('admin.data-kandidat-addEdit', $data);
    }

    public function data_kandidat_store(Request $request) {
        $data           = $this->kandidatModel;

        $data->name     = $request->name;
        $data->jabatan  = $request->jabatan;
        $data->jurusan  = $request->jurusan;
        $data->kelas    = $request->kelas;
        $data->visi     = $request->visi;
        $data->misi     = $request->misi;
        $thumbnail      = $request->thumbnail;
        if ($thumbnail) {
            $destinationPath    = 'images/kandidat/';
            $thumbnailImage     = date('YmdHis') . "." . $thumbnail->getClientOriginalExtension();
            $thumbnail->move($destinationPath, $thumbnailImage);
            $data->photo    = $thumbnailImage;
        }

        $data->save();

        return redirect()->route('admin.data_kandidat.index');
    }

    public function data_kandidat_edit($id) {
        $data['title']      = 'Ubah Data Kandidat';
        $data['edit']       = true;
        $data['kandidat']   = $this->kandidatModel->where('id', $id)->first();
        $data['users']      = $this->userModel->where('id','!=','1')->get();
        return view('admin.data-kandidat-addEdit', $data);
    }

    public function data_kandidat_update(Request $request, $id) {
        $data           = $this->kandidatModel->where('id', $id)->first();

        $data->name     = $request->name;
        $data->jabatan  = $request->jabatan;
        $data->jurusan  = $request->jurusan;
        $data->kelas    = $request->kelas;
        $data->visi     = $request->visi;
        $data->misi     = $request->misi;
        $thumbnail      = $request->thumbnail;
        if ($thumbnail) {
            $destinationPath    = 'images/kandidat/';
            $thumbnailImage     = date('YmdHis') . "." . $thumbnail->getClientOriginalExtension();
            $thumbnail->move($destinationPath, $thumbnailImage);
            $data->photo    = $thumbnailImage;
        }

        $data->save();

        return redirect()->route('admin.data_kandidat.index');
    }

    public function data_kandidat_delete($id) {
        $data = $this->kandidatModel->where('id', $id)->first();
        $data->delete();

        return redirect()->route('admin.data_kandidat.index');
    }

    public function data_voting() {
        $data['title']  = 'Data Voting';
        $data['vote']   = $this->voteModel->all();
        return view('admin.data-voting', $data);
    }

    public function data_jadwal() {
        $data['title']  = 'Data Jadwal';
        $id             = 1;
        $data['jadwal'] = $this->jadwalModel->find($id);
        return view('admin.data-jadwal', $data);
    }

    public function data_jadwal_update(Request $request) {
        $id             = 1;
        $data           = $this->jadwalModel->where('id', $id)->first();

        $data->start    = $request->jadwal_start;
        $data->end      = $request->jadwal_end;
        // dd($data);

        $data->save();

        return redirect()->route('admin.data_jadwal.index');
    }

    public function gantiformat($nomorhp) {
        $nomorhp = trim($nomorhp);
        $nomorhp = strip_tags($nomorhp);
        $nomorhp = str_replace(" ","",$nomorhp);
        $nomorhp = str_replace("(","",$nomorhp);
        $nomorhp = str_replace(".","",$nomorhp);

        if(!preg_match('/[^+0-9]/',trim($nomorhp))){
            if(substr(trim($nomorhp), 0, 3) == '+62'){
                $nomorhp = trim($nomorhp);
            }
            elseif(substr($nomorhp, 0, 1) == '0'){
                $nomorhp = '+62'.substr($nomorhp, 1);
            }
        }
        return $nomorhp;
    }
}
