<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Record;

class CheckRecordAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $id = $request->route('id');
        
        $record = Record::where('id', $id)->firstOrFail();

        if(!$record->access) {
            return response()->json(['error' => 'Access denird']);
        }
        return $next($request);
    }
}
