<?php
class AlipayUserTradeSearchRequest { private $alipayOrderNo; private $endTime; private $merchantOrderNo; private $orderFrom; private $orderStatus; private $orderType; private $pageNo; private $pageSize; private $startTime; private $apiParas = array(); private $terminalType; private $terminalInfo; private $prodCode; private $apiVersion = '1.0'; private $notifyUrl; private $returnUrl; private $needEncrypt = false; public function setAlipayOrderNo($sp4fa8aa) { $this->alipayOrderNo = $sp4fa8aa; $this->apiParas['alipay_order_no'] = $sp4fa8aa; } public function getAlipayOrderNo() { return $this->alipayOrderNo; } public function setEndTime($spbe0d91) { $this->endTime = $spbe0d91; $this->apiParas['end_time'] = $spbe0d91; } public function getEndTime() { return $this->endTime; } public function setMerchantOrderNo($sp844710) { $this->merchantOrderNo = $sp844710; $this->apiParas['merchant_order_no'] = $sp844710; } public function getMerchantOrderNo() { return $this->merchantOrderNo; } public function setOrderFrom($spec66df) { $this->orderFrom = $spec66df; $this->apiParas['order_from'] = $spec66df; } public function getOrderFrom() { return $this->orderFrom; } public function setOrderStatus($sp339b60) { $this->orderStatus = $sp339b60; $this->apiParas['order_status'] = $sp339b60; } public function getOrderStatus() { return $this->orderStatus; } public function setOrderType($sp38310f) { $this->orderType = $sp38310f; $this->apiParas['order_type'] = $sp38310f; } public function getOrderType() { return $this->orderType; } public function setPageNo($sp67368d) { $this->pageNo = $sp67368d; $this->apiParas['page_no'] = $sp67368d; } public function getPageNo() { return $this->pageNo; } public function setPageSize($spb53279) { $this->pageSize = $spb53279; $this->apiParas['page_size'] = $spb53279; } public function getPageSize() { return $this->pageSize; } public function setStartTime($sp65dd66) { $this->startTime = $sp65dd66; $this->apiParas['start_time'] = $sp65dd66; } public function getStartTime() { return $this->startTime; } public function getApiMethodName() { return 'alipay.user.trade.search'; } public function setNotifyUrl($spb15ce9) { $this->notifyUrl = $spb15ce9; } public function getNotifyUrl() { return $this->notifyUrl; } public function setReturnUrl($spcdf48b) { $this->returnUrl = $spcdf48b; } public function getReturnUrl() { return $this->returnUrl; } public function getApiParas() { return $this->apiParas; } public function getTerminalType() { return $this->terminalType; } public function setTerminalType($sp73de8d) { $this->terminalType = $sp73de8d; } public function getTerminalInfo() { return $this->terminalInfo; } public function setTerminalInfo($sp6b4bda) { $this->terminalInfo = $sp6b4bda; } public function getProdCode() { return $this->prodCode; } public function setProdCode($spa57d40) { $this->prodCode = $spa57d40; } public function setApiVersion($spa5b6f4) { $this->apiVersion = $spa5b6f4; } public function getApiVersion() { return $this->apiVersion; } public function setNeedEncrypt($sp8f9ba6) { $this->needEncrypt = $sp8f9ba6; } public function getNeedEncrypt() { return $this->needEncrypt; } }