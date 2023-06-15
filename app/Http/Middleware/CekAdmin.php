<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CekVote
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
        $tr = Vote::where([
            ['pemilih_id', Auth::user()->id],
        ])->first();
        if ($tr || !empty($tr) || $tr != NULL) {
            return redirect()->route('frontend.notify_token');
        }
        return $next($request);
    }
}
