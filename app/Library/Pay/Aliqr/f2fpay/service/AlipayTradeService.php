<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . './../../AopSdk.php'; require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . './../model/result/AlipayF2FPayResult.php'; require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../model/result/AlipayF2FQueryResult.php'; require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../model/result/AlipayF2FRefundResult.php'; require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../model/result/AlipayF2FPrecreateResult.php'; require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../model/builder/AlipayTradeQueryContentBuilder.php'; require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../model/builder/AlipayTradeCancelContentBuilder.php'; require dirname(__FILE__) . DIRECTORY_SEPARATOR . '../config/config.php'; class AlipayTradeService { public $gateway_url = 'https://openapi.alipay.com/gateway.do'; public $notify_url; public $sign_type; public $alipay_public_key; public $private_key; public $appid; public $charset = 'UTF-8'; public $token = NULL; private $MaxQueryRetry; private $QueryDuration; public $format = 'json'; function __construct($sp394da4) { $this->gateway_url = $sp394da4['gatewayUrl']; $this->appid = $sp394da4['app_id']; $this->sign_type = $sp394da4['sign_type']; $this->private_key = $sp394da4['merchant_private_key']; $this->alipay_public_key = $sp394da4['alipay_public_key']; $this->charset = $sp394da4['charset']; $this->MaxQueryRetry = $sp394da4['MaxQueryRetry']; $this->QueryDuration = $sp394da4['QueryDuration']; $this->notify_url = $sp394da4['notify_url']; if (empty($this->appid) || trim($this->appid) == '') { throw new Exception('appid should not be NULL!'); } if (empty($this->private_key) || trim($this->private_key) == '') { throw new Exception('private_key should not be NULL!'); } if (empty($this->alipay_public_key) || trim($this->alipay_public_key) == '') { throw new Exception('alipay_public_key should not be NULL!'); } if (empty($this->charset) || trim($this->charset) == '') { throw new Exception('charset should not be NULL!'); } if (empty($this->QueryDuration) || trim($this->QueryDuration) == '') { throw new Exception('QueryDuration should not be NULL!'); } if (empty($this->gateway_url) || trim($this->gateway_url) == '') { throw new Exception('gateway_url should not be NULL!'); } if (empty($this->MaxQueryRetry) || trim($this->MaxQueryRetry) == '') { throw new Exception('MaxQueryRetry should not be NULL!'); } if (empty($this->sign_type) || trim($this->sign_type) == '') { throw new Exception('sign_type should not be NULL'); } } function AlipayWapPayService($sp394da4) { $this->__construct($sp394da4); } public function barPay($sp266ee2) { $sp58144b = $sp266ee2->getOutTradeNo(); $sp4b3179 = $sp266ee2->getBizContent(); $sp7f2a58 = $sp266ee2->getAppAuthToken(); $this->writeLog($sp4b3179); $sp2d83a6 = new AlipayTradePayRequest(); $sp2d83a6->setBizContent($sp4b3179); $spfd13d8 = $this->aopclientRequestExecute($sp2d83a6, NULL, $sp7f2a58); $spfd13d8 = $spfd13d8->alipay_trade_pay_response; $sp836ce6 = new AlipayF2FPayResult($spfd13d8); if (!empty($spfd13d8) && '10000' == $spfd13d8->code) { $sp836ce6->setTradeStatus('SUCCESS'); } elseif (!empty($spfd13d8) && '10003' == $spfd13d8->code) { $sp7317aa = new AlipayTradeQueryContentBuilder(); $sp7317aa->setOutTradeNo($sp58144b); $sp7317aa->setAppAuthToken($sp7f2a58); $sp93740e = $this->loopQueryResult($sp7317aa); return $this->checkQueryAndCancel($sp58144b, $sp7f2a58, $sp836ce6, $sp93740e); } elseif ($this->tradeError($spfd13d8)) { $sp7317aa = new AlipayTradeQueryContentBuilder(); $sp7317aa->setOutTradeNo($sp58144b); $sp7317aa->setAppAuthToken($sp7f2a58); $sp82d2f3 = $this->query($sp7317aa); return $this->checkQueryAndCancel($sp58144b, $sp7f2a58, $sp836ce6, $sp82d2f3); } else { $sp836ce6->setTradeStatus('FAILED'); } return $sp836ce6; } public function queryTradeResult($sp266ee2) { $spfd13d8 = $this->query($sp266ee2); $sp836ce6 = new AlipayF2FQueryResult($spfd13d8); if ($this->querySuccess($spfd13d8)) { $sp836ce6->setTradeStatus('SUCCESS'); } elseif ($this->tradeError($spfd13d8)) { $sp836ce6->setTradeStatus('UNKNOWN'); } else { $sp836ce6->setTradeStatus('FAILED'); } return $sp836ce6; } public function refund($sp266ee2) { $sp4b3179 = $sp266ee2->getBizContent(); $this->writeLog($sp4b3179); $sp2d83a6 = new AlipayTradeRefundRequest(); $sp2d83a6->setBizContent($sp4b3179); $spfd13d8 = $this->aopclientRequestExecute($sp2d83a6, NULL, $sp266ee2->getAppAuthToken()); $spfd13d8 = $spfd13d8->alipay_trade_refund_response; $sp836ce6 = new AlipayF2FRefundResult($spfd13d8); if (!empty($spfd13d8) && '10000' == $spfd13d8->code) { $sp836ce6->setTradeStatus('SUCCESS'); } elseif ($this->tradeError($spfd13d8)) { $sp836ce6->setTradeStatus('UNKNOWN'); } else { $sp836ce6->setTradeStatus('FAILED'); } return $sp836ce6; } public function qrPay($sp266ee2) { $sp4b3179 = $sp266ee2->getBizContent(); $this->writeLog($sp4b3179); $sp2d83a6 = new AlipayTradePrecreateRequest(); $sp2d83a6->setBizContent($sp4b3179); $sp2d83a6->setNotifyUrl($this->notify_url); $spfd13d8 = $this->aopclientRequestExecute($sp2d83a6, NULL, $sp266ee2->getAppAuthToken()); $spfd13d8 = $spfd13d8->alipay_trade_precreate_response; $sp836ce6 = new AlipayF2FPrecreateResult($spfd13d8); if (!empty($spfd13d8) && '10000' == $spfd13d8->code) { $sp836ce6->setTradeStatus('SUCCESS'); } elseif ($this->tradeError($spfd13d8)) { $sp836ce6->setTradeStatus('UNKNOWN'); } else { $sp836ce6->setTradeStatus('FAILED'); } return $sp836ce6; } public function query($sp7317aa) { $sp0b49ca = $sp7317aa->getBizContent(); $this->writeLog($sp0b49ca); $sp2d83a6 = new AlipayTradeQueryRequest(); $sp2d83a6->setBizContent($sp0b49ca); $spfd13d8 = $this->aopclientRequestExecute($sp2d83a6, NULL, $sp7317aa->getAppAuthToken()); return $spfd13d8->alipay_trade_query_response; } protected function loopQueryResult($sp7317aa) { $sp2d5af3 = NULL; for ($spcecaa9 = 1; $spcecaa9 < $this->MaxQueryRetry; $spcecaa9++) { try { sleep($this->QueryDuration); } catch (Exception $spfda1c7) { print $spfda1c7->getMessage(); die; } $sp82d2f3 = $this->query($sp7317aa); if (!empty($sp82d2f3)) { if ($this->stopQuery($sp82d2f3)) { return $sp82d2f3; } $sp2d5af3 = $sp82d2f3; } } return $sp2d5af3; } protected function stopQuery($spfd13d8) { if ('10000' == $spfd13d8->code) { if ('TRADE_FINISHED' == $spfd13d8->trade_status || 'TRADE_SUCCESS' == $spfd13d8->trade_status || 'TRADE_CLOSED' == $spfd13d8->trade_status) { return true; } } return false; } private function checkQueryAndCancel($sp58144b, $sp7f2a58, $sp836ce6, $sp82d2f3) { if ($this->querySuccess($sp82d2f3)) { $sp836ce6->setTradeStatus('SUCCESS'); $sp836ce6->setResponse($sp82d2f3); return $sp836ce6; } elseif ($this->queryClose($sp82d2f3)) { $sp836ce6->setTradeStatus('FAILED'); return $sp836ce6; } $spb2d5c4 = new AlipayTradeCancelContentBuilder(); $spb2d5c4->setAppAuthToken($sp7f2a58); $spb2d5c4->setOutTradeNo($sp58144b); $spf96d33 = $this->cancel($spb2d5c4); if ($this->tradeError($spf96d33)) { $sp836ce6->setTradeStatus('UNKNOWN'); } else { $sp836ce6->setTradeStatus('FAILED'); } return $sp836ce6; } protected function querySuccess($sp82d2f3) { return !empty($sp82d2f3) && $sp82d2f3->code == '10000' && ($sp82d2f3->trade_status == 'TRADE_SUCCESS' || $sp82d2f3->trade_status == 'TRADE_FINISHED'); } protected function queryClose($sp82d2f3) { return !empty($sp82d2f3) && $sp82d2f3->code == '10000' && $sp82d2f3->trade_status == 'TRADE_CLOSED'; } protected function tradeError($spfd13d8) { return empty($spfd13d8) || $spfd13d8->code == '20000'; } public function cancel($spb2d5c4) { $sp0b49ca = $spb2d5c4->getBizContent(); $this->writeLog($sp0b49ca); $sp2d83a6 = new AlipayTradeCancelRequest(); $sp2d83a6->setBizContent($sp0b49ca); $spfd13d8 = $this->aopclientRequestExecute($sp2d83a6, NULL, $spb2d5c4->getAppAuthToken()); return $spfd13d8->alipay_trade_cancel_response; } private function aopclientRequestExecute($sp2d83a6, $sp607905 = NULL, $sp7f2a58 = NULL) { $sp7dde8e = new AopClient(); $sp7dde8e->gatewayUrl = $this->gateway_url; $sp7dde8e->appId = $this->appid; $sp7dde8e->signType = $this->sign_type; $sp7dde8e->rsaPrivateKey = $this->private_key; $sp7dde8e->alipayrsaPublicKey = $this->alipay_public_key; $sp7dde8e->apiVersion = '1.0'; $sp7dde8e->postCharset = $this->charset; $sp7dde8e->format = $this->format; $sp7dde8e->debugInfo = true; $sp836ce6 = $sp7dde8e->execute($sp2d83a6, $sp607905, $sp7f2a58); return $sp836ce6; } function writeLog($sp6be7b9) { file_put_contents(dirname(__FILE__) . '/../log/log.txt', date('Y-m-d H:i:s') . '  ' . $sp6be7b9 . '
', FILE_APPEND); } function create_erweima($sp9811e7, $sp6b1313 = '200', $sp8726a4 = 'L', $spbb9927 = '0') { $sp9811e7 = urlencode($sp9811e7); $sp958d50 = '<img src="http://chart.apis.google.com/chart?chs=' . $sp6b1313 . 'x' . $sp6b1313 . '&amp;cht=qr&chld=' . $sp8726a4 . '|' . $spbb9927 . '&amp;chl=' . $sp9811e7 . '"  widht="' . $sp6b1313 . '" height="' . $sp6b1313 . '" />'; return $sp958d50; } function create_erweima_url($sp9811e7, $sp6b1313 = '200', $sp8726a4 = 'L', $spbb9927 = '0') { $sp9811e7 = urlencode($sp9811e7); $sp958d50 = 'http://chart.apis.google.com/chart?chs=' . $sp6b1313 . 'x' . $sp6b1313 . '&amp;cht=qr&chld=' . $sp8726a4 . '|' . $spbb9927 . '&amp;chl=' . $sp9811e7; return $sp958d50; } }