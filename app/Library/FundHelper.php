<?php
namespace App\Library; use App\Order; use App\User; use App\FundRecord; use Illuminate\Support\Facades\DB; class FundHelper { public static function orderSuccess($sp33b59d, callable $spd17e03) { $spc52aea = $sp33b59d->user_id; $spa2ca43 = $sp33b59d->income; try { return DB::transaction(function () use($sp33b59d, $spc52aea, $spa2ca43, $spd17e03) { if ($spd17e03() === Order::STATUS_SUCCESS) { $spc6e0c5 = User::where('id', $spc52aea)->lockForUpdate()->firstOrFail(); $spc6e0c5->m_all += $spa2ca43; $spc6e0c5->saveOrFail(); $sp8c0384 = new FundRecord(); $sp8c0384->user_id = $spc52aea; $sp8c0384->type = FundRecord::TYPE_IN; $sp8c0384->amount = $spa2ca43; $sp8c0384->balance = $spc6e0c5->m_balance; $sp8c0384->remark = '订单#' . $sp33b59d->order_no; $sp8c0384->order_id = $sp33b59d->id; $sp8c0384->saveOrFail(); } return true; }); } catch (\Throwable $spfda1c7) { $spcb569a = 'FundHelper.orderSuccess error, user_id:' . $spc52aea . ',amount:' . $spa2ca43 . ',order_no:' . $sp33b59d->order_no; \Illuminate\Support\Facades\Log::error($spcb569a . ' with exception:', array('Exception' => $spfda1c7)); return false; } } public static function orderFreeze($sp33b59d, $spad8bb7) { if ($sp33b59d->status === Order::STATUS_FROZEN || $sp33b59d->status === Order::STATUS_REFUND) { return true; } $spc52aea = $sp33b59d->user_id; try { return DB::transaction(function () use($sp33b59d, $spc52aea, $spad8bb7) { $sp33b59d->status = \App\Order::STATUS_FROZEN; $sp33b59d->frozen_reason = $spad8bb7; $sp33b59d->saveOrFail(); $spc6e0c5 = User::where('id', $spc52aea)->lockForUpdate()->firstOrFail(); if ($sp33b59d->cards()->exists()) { $spc6e0c5->m_frozen += $sp33b59d->income; $spc6e0c5->saveOrFail(); $sp8c0384 = new FundRecord(); $sp8c0384->user_id = $spc52aea; $sp8c0384->type = FundRecord::TYPE_OUT; $sp8c0384->amount = -$sp33b59d->income; $sp8c0384->balance = $spc6e0c5->m_balance; $sp8c0384->remark = $spad8bb7 . ', 冻结订单#' . $sp33b59d->order_no; $sp8c0384->order_id = $sp33b59d->id; $sp8c0384->saveOrFail(); } else { if ($sp33b59d->paid_at === NULL) { $sp8197a8 = '未付款'; } else { $sp8197a8 = '未发货'; } $sp8c0384 = new FundRecord(); $sp8c0384->user_id = $spc52aea; $sp8c0384->type = FundRecord::TYPE_OUT; $sp8c0384->amount = 0; $sp8c0384->balance = $spc6e0c5->m_balance; $sp8c0384->remark = $spad8bb7 . ', 冻结订单(' . $sp8197a8 . ')#' . $sp33b59d->order_no; $sp8c0384->order_id = $sp33b59d->id; $sp8c0384->saveOrFail(); } return true; }); } catch (\Throwable $spfda1c7) { $spcb569a = 'FundHelper.orderFreeze error, user_id:' . $spc52aea . ',amount:' . $sp33b59d->income; if ($sp33b59d) { $spcb569a .= ',order_no:' . $sp33b59d->order_no; } else { $spcb569a .= ',order_no: null'; } \Illuminate\Support\Facades\Log::error($spcb569a . ' with exception:', array('Exception' => $spfda1c7)); return false; } } public static function orderUnfreeze($sp33b59d, $sp5973f0, callable $sp7b7f71 = null, &$sped2879 = null) { $spc52aea = $sp33b59d->user_id; try { return DB::transaction(function () use($sp33b59d, $spc52aea, $sp5973f0, $sp7b7f71, &$sped2879) { if ($sp7b7f71 !== null && $sp7b7f71() === false) { return false; } if ($sp33b59d->status !== Order::STATUS_FROZEN) { $sped2879 = $sp33b59d->status; return true; } $spc6e0c5 = User::where('id', $spc52aea)->lockForUpdate()->firstOrFail(); if ($sp33b59d->cards()->exists()) { $sp33b59d->status = \App\Order::STATUS_SUCCESS; $spc6e0c5->m_frozen -= $sp33b59d->income; $spc6e0c5->saveOrFail(); $sp8c0384 = new FundRecord(); $sp8c0384->user_id = $spc52aea; $sp8c0384->type = FundRecord::TYPE_IN; $sp8c0384->amount = $sp33b59d->income; $sp8c0384->balance = $spc6e0c5->m_balance; $sp8c0384->remark = $sp5973f0 . ', 解冻订单#' . $sp33b59d->order_no; $sp8c0384->order_id = $sp33b59d->id; $sp8c0384->saveOrFail(); } else { if ($sp33b59d->paid_at === NULL) { $sp33b59d->status = \App\Order::STATUS_UNPAY; $sp8197a8 = '未付款'; } else { $sp33b59d->status = \App\Order::STATUS_PAID; $sp8197a8 = '未发货'; } $sp8c0384 = new FundRecord(); $sp8c0384->user_id = $spc52aea; $sp8c0384->type = FundRecord::TYPE_IN; $sp8c0384->amount = 0; $sp8c0384->balance = $spc6e0c5->m_balance; $sp8c0384->remark = $sp5973f0 . ', 解冻订单(' . $sp8197a8 . ')#' . $sp33b59d->order_no; $sp8c0384->order_id = $sp33b59d->id; $sp8c0384->saveOrFail(); } $sped2879 = $sp33b59d->status; $sp33b59d->saveOrFail(); return true; }); } catch (\Throwable $spfda1c7) { $spcb569a = 'FundHelper.orderUnfreeze error, user_id:' . $spc52aea . ',amount:' . $sp33b59d->income; if ($sp33b59d) { $spcb569a .= ',order_no:' . $sp33b59d->order_no; } else { $spcb569a .= ',order_no: null'; } \Illuminate\Support\Facades\Log::error($spcb569a . ' with exception:', array('Exception' => $spfda1c7)); return false; } } }