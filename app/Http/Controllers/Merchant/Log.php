<?php
namespace App\Http\Controllers\Merchant; use App\Library\Response; use Illuminate\Http\Request; use App\Http\Controllers\Controller; use Illuminate\Support\Facades\Auth; class Log extends Controller { function get(Request $sp2d83a6) { $spc52aea = $sp2d83a6->post('user_id'); $spfdf100 = $sp2d83a6->post('action', \App\Log::ACTION_LOGIN); $spedc15a = \App\Log::where('action', $spfdf100); if ($spc52aea && self::isAdmin()) { $spedc15a->where('user_id', $spc52aea); } else { $spedc15a->where('user_id', Auth::id()); } $sp6eb926 = $sp2d83a6->post('start_at'); if (strlen($sp6eb926)) { $spedc15a->where('created_at', '>=', $sp6eb926 . ' 00:00:00'); } $spdcf8f2 = $sp2d83a6->post('end_at'); if (strlen($spdcf8f2)) { $spedc15a->where('created_at', '<=', $spdcf8f2 . ' 23:59:59'); } $sp9ca635 = $sp2d83a6->post('current_page', 1); $spb53279 = $sp2d83a6->post('per_page', 20); $sp8ea0e0 = $spedc15a->orderBy('created_at', 'DESC')->paginate($spb53279, array('*'), 'page', $sp9ca635); return Response::success($sp8ea0e0); } }