<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Vote;
use App\Models\Kandidat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    private $voteModel;
    private $userModel;
    private $pemilihModel;
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
        $this->pemilihModel  = new User();
        $this->kandidatModel = new Kandidat();
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

    public function pendaftaran() {
        $data['title']      = 'Pendaftaran Pasien';
        return view('admin.pendaftaran', $data);
    }

    public function pendaftaran_post(Request $request) {
        $data = new Pasien;
        $data->number_register = 'REG-'.date("dmYhis");
        $data->name = $request->name;
        $data->nik = $request->nik;
        $data->birthday = date('d/m/Y', strtotime($request->birthday));
        $data->address = $request->address;
        $data->gender = $request->gender;
        $data->phone = $this->gantiformat($request->phone);
        $data->father_name = $request->father_name;
        $data->mother_name = $request->mother_name;
        $data->save();
        return redirect()->back();
    }

    public function data_pemilih() {
        $data['title']      = 'Data Pemilih';
        $data['pemilih']    = $this->userModel->where('id','!=',1)->get();
        return view('admin.data-pemilih', $data);
    }

    public function data_kandidat() {
        $data['title']      = 'Data Kandidat';
        $data['kandidat']   = $this->kandidatModel->all();
        return view('admin.data-kandidat', $data);
    }

    public function data_voting() {
        $data['title']  = 'Data Voting';
        $data['vote']   = $this->voteModel->all();
        return view('admin.data-voting', $data);
    }

    public function data_pasien() {
        $data['title']  = 'Menu Data Pasien';
        $data['pasien'] = Pasien::all();
        return view('admin.data-pasien', $data);
    }

    public function data_pasien_create() {
        $data['title'] = 'Tambah Data Pasien';
        return view('admin.data-pasien-add', $data);
    }

    public function data_pasien_store(Request $request) {
        dd($request->all());
        $data = new Pasien;
        $data->number_register = 'REG-'.date("dmYhis");
        $data->name = $request->name;
        $data->nik = $request->nik;
        $data->birthday = date('d/m/Y', strtotime($request->birthday));
        $data->address = $request->address;
        $data->gender = $request->gender;
        $data->phone = $this->gantiformat($request->phone);
        $data->father_name = $request->father_name;
        $data->mother_name = $request->mother_name;
        dd($data);
        $data->save();
        return redirect()->back();
    }

    public function data_pasien_edit($id) {
        $data['title']  = 'Ubah Data Pasien';
        $data['pasien'] = Pasien::where('id', $id)->first();
        return view('admin.data-pasien-edit', $data);
    }

    public function data_pasien_update(Request $request) {
        $data = Pasien::where('id', $request->id)->first();
        $data->name = $request->name;
        $data->nik = $request->nik;
        $data->birthday = date('d/m/Y', strtotime($request->birthday));
        $data->address = $request->address;
        $data->gender = $request->gender;
        $data->phone = $this->gantiformat($request->phone);
        $data->father_name = $request->father_name;
        $data->mother_name = $request->mother_name;
        $data->save();
        return redirect()->back();
    }

    public function data_pasien_delete(Request $request) {
        $data = Pasien::where('id', $request->id)->first();
        $data->delete();
        return redirect()->back();
    }

    public function data_dokter() {
        $data['title']  = 'Menu Data Dokter';
        $data['dokter'] = Dokter::all();
        return view('admin.data-dokter', $data);
    }

    public function data_dokter_create() {
        $data['title'] = 'Tambah Data Dokter';
        $data['users'] = User::where('id','!=','1')->get();
        return view('admin.data-dokter-add', $data);
    }

    public function data_dokter_store(Request $request) {
        $data['title'] = 'Tambah Data Dokter';
        $data = new Dokter;
        $data->dokter_id = $request->dokter_id;
        $data->nik = $request->nik;
        $data->birthday = date('d/m/Y', strtotime($request->birthday));
        $data->address = $request->address;
        $data->gender = $request->gender;
        $data->phone = $this->gantiformat($request->phone);
        $data->father_name = $request->father_name;
        $data->mother_name = $request->mother_name;
        $data->save();
        return redirect()->back();
    }

    public function data_dokter_edit($id) {
        $data['title']  = 'Ubah Data Dokter';
        $data['dokter'] = Dokter::with('dokter')->where('id', $id)->first();
        $data['users'] = User::where('id','!=','1')->get();
        return view('admin.data-dokter-edit', $data);
    }

    public function data_dokter_update(Request $request) {
        $data = Dokter::with('dokter')->where('id', $request->id)->first();
        $data->nik = $request->nik;
        $data->birthday = date('d/m/Y', strtotime($request->birthday));
        $data->address = $request->address;
        $data->gender = $request->gender;
        $data->phone = $this->gantiformat($request->phone);
        $data->father_name = $request->father_name;
        $data->mother_name = $request->mother_name;
        $data->save();
        return redirect()->back();
    }

    public function data_dokter_delete(Request $request) {
        $data = Dokter::with('dokter')->where('id', $request->id)->first();
        $data->delete();
        return redirect()->back();
    }

    public function gantiformat($nomorhp) {
        $nomorhp = trim($nomorhp);
        $nomorhp = strip_tags($nomorhp);
        $nomorhp= str_replace(" ","",$nomorhp);
        $nomorhp= str_replace("(","",$nomorhp);
        $nomorhp= str_replace(".","",$nomorhp);

        if(!preg_match('/[^+0-9]/',trim($nomorhp))){
            if(substr(trim($nomorhp), 0, 3)=='+62'){
                $nomorhp= trim($nomorhp);
            }
            elseif(substr($nomorhp, 0, 1)=='0'){
                $nomorhp= '+62'.substr($nomorhp, 1);
            }
        }
        return $nomorhp;
    }
}
