<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;

use App\User;
use App\FeatureCategory;
use App\History;
use App\MDiscussion;
use Auth;

class MDiscussionController extends Controller
{
    protected $master = 8;
    protected $view = 28;
    protected $store = 29;
    protected $table = 'm_discussions';

    public function show()
    {
        if (!User::Role($this->view)) return redirect()->back()->with('alert-danger', 'Akses terkunci. Anda adalah Pengujung, tingkatkan level pengguna anda menjadi User. Lihat Panduannya <b><u><a href="/page/upgrade">DISINI</a></u></b>');

        return view('midnersi.discussion.discussion');
    }

    public function showIdUserAjax()
    {
        if (Auth::user()->role_id == 1) return redirect()->back()->with('alert-danger', 'You cannot access this page');

        $userId = Auth::user()->id;
        $pesan = MDiscussion::where('profile_id', $userId)
                            -> where('readed', 0)
                            -> where('is_admin', '!=', null)
                            -> get();
        if ($pesan) {
            foreach ($pesan as $key => $value) {
                $value->update([
                    'readed' => 1
                ]);
            }
        }

        $data = MDiscussion::select('user_id', 'profile_id', 'chat', 'is_admin', 'is_user', 'created_at')
                            -> where('profile_id', $userId)
                            -> orderBy('id', 'ASC')
                            -> limit(20)
                            -> get();

        return view('midnersi.discussion.ajax-discussion-detail-user', ['data' => $data]);
    }

    public function showUser()
    {
        if (!User::Role($this->view)) return redirect()->back()->with('alert-danger', 'Akses terkunci. Anda adalah Pengujung, tingkatkan level pengguna anda menjadi User. Lihat Panduannya <b><u><a href="/page/upgrade">DISINI</a></u></b>');
        if (Auth::user()->role_id == 1) return redirect()->back()->with('alert-danger', 'You cannot access this page');

        return view('midnersi.discussion.discussion-detail-user');
    }

    public function showId($id)
    {
        if (!User::Role($this->view)) return redirect()->back()->with('alert-danger', 'You cannot access this page');
        if (Auth::user()->role_id == 3) return redirect()->back()->with('alert-danger', 'Akses terkunci. Anda adalah Pengujung, tingkatkan level pengguna anda menjadi User. Lihat Panduannya <b><u><a href="/page/upgrade">DISINI</a></u></b>');

        $user = User::select('name', 'id')
                        -> where('id', $id)
                        -> first();

        return view('midnersi.discussion.discussion-detail', ['user' => $user]);
    }

    public function detail($id)
    {
        if (!User::Role($this->view)) return redirect()->back()->with('alert-danger', 'You cannot access view feature management page');
        if (Auth::user()->role_id == 3) return redirect()->back()->with('alert-danger', 'You cannot access this page');

        // jika sudah lihat data maka artinya semua pesan telah dibaca
        $pesan = MDiscussion::where('profile_id', $id)
                            -> where('readed', 0)
                            -> where('is_user', '!=', null)
                            -> get();
        if ($pesan) {
            foreach ($pesan as $key => $value) {
                $value->update([
                    'readed' => 1
                ]);
            }
        }


        $data = MDiscussion::select('user_id', 'profile_id', 'chat', 'is_admin', 'is_user', 'created_at')
                            -> where('profile_id', $id)
                            -> orderBy('id', 'ASC')
                            -> limit(20)
                            -> get();

        // dd($data);

        return view('midnersi.discussion.ajax-discussion-detail', ['data' => $data]);
    }

    public function data()
    {
        if (!User::Role($this->view)) return redirect()->back()->with('alert-danger', 'You cannot access this page');

        $data = MDiscussion::select('users.name', 'users.readed', 'users.id')
                            -> join('users', 'users.id', 'm_discussions.profile_id')
                            -> latest('m_discussions.created_at')
                            -> orderBy('m_discussions.profile_id')
                            -> distinct('m_discussions.profile_id');

        return Datatables::of($data)
        -> addColumn('action', function($data){
            $detail = '<a id="btn-a-' . $data-> profile_id . '" onclick="detail(' . $data-> id . ')" class="mb-2 mr-2 btn btn-success fun-color-button nde-white"><i class="fun-icon pe-7s-edit"></i>Detail</a>';
          return $detail;
        })
        -> addColumn('nama_pesan', function($data){
            $readed = MDiscussion::select('readed')
                                    -> where('profile_id', $data->id)
                                    -> where('is_admin', null)
                                    -> where('readed', 0)
                                    -> first();
            $name = $data->name;
            if ($readed) {
                $name = $data->name . " - <span style='color:red'>Pesan baru</span>";
            }

            return $name;
        })
        ->rawColumns(['action', 'nama_pesan'])
        ->make(true);
    }

    public function store(Request $request)
    {

        if (!User::Role($this->store)) return redirect()->back()->with('alert-danger', 'You cannot access this page');

        // dd($request->all());

        $validatedData = $request->validate([
            'profile_id' => 'required',
            'is_admin' => 'required',
            'chat' => 'required'
        ]);

        $data = MDiscussion::create([
            'profile_id' => $request->profile_id,
            'is_admin' => $request->is_admin,
            'chat' => $request->chat,
        ]);

        // History::MStore($this->master, $data->id, 'New chat: '. $data->id);

        return response()->json('true');;
    }

    public function storeUser(Request $request)
    {
        if (!User::Role($this->store)) return redirect()->back()->with('alert-danger', 'You cannot access this page');
        if (Auth::user()->role_id == 1) return redirect()->back()->with('alert-danger', 'You cannot access this page');

        // dd($request->all());

        $validatedData = $request->validate([
            'profile_id' => 'required',
            'is_user' => 'required',
            'chat' => 'required'
        ]);

        $data = MDiscussion::create([
            'profile_id' => $request->profile_id,
            'is_user' => $request->is_user,
            'chat' => $request->chat,
        ]);

        // History::MStore($this->master, $data->id, 'New chat: '. $data->id);

        return response()->json('true');
    }

}
