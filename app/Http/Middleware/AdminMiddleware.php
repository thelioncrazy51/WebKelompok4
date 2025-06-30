public function handle(Request $request, Closure $next)
{
    if (Auth::check() && Auth::user()->role === 'admin') {
        return $next($request);
    }
    
    return redirect('/member/dashboard')->with('error', 'Unauthorized access');
}
