<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Pelanggaran;
use App\Models\Aturan;
use App\Models\Siswa;
use Carbon\Carbon;



class BkController extends Controller
{
    public function index()
    {
        $start = Carbon::today()->firstOfMonth();
        $dupe_start = Carbon::today()->firstOfMonth();
        $daysInMonth = Carbon::today()->daysInMonth;
        $end = $dupe_start->addDays($daysInMonth);

        $data = array(
            'count_siswa' => Siswa::count(),
            'count_aturan' => Aturan::count(),
            'history' => Pelanggaran::select()->where('status','Beres')->orderBy('updated_at','asc')->limit(5)->get(),
            // TODO: Solve Total Minggu
            // 'total_minggu' => Pelanggaran::select()->whereBetween('tgl_pelanggaran',[(7 * $diffInWeek) - 7 + 1, 7 * $diffInWeek])->count(),
            'count_inbox' => Pelanggaran::where('status','Belum')->count(),
            'total_bulan' => Pelanggaran::select()->whereBetween('tgl_pelanggaran',[$start,$end])->count()
        );

        return view('home.dashboard.dashboard-bk', $data);
    }
}
