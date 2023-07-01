<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use App\Models\Jadwal;
use Illuminate\Http\Request;

class JadwalVoting
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $jadwal = Jadwal::findOrFail(1); // trx_jadwal portofolio

        if(Carbon::now()->between($jadwal->start, $jadwal->end))
            return $next($request);
        else
            return redirect()->route('frontend.notify_jadwal');
            // return abort(403, 'Harap melihat jadwal Voting!');
    }
}
