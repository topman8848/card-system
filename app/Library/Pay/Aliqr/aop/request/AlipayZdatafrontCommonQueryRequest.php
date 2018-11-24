<?php
class AlipayZdatafrontCommonQueryRequest { private $cacheInterval; private $queryConditions; private $serviceName; private $visitBiz; private $visitBizLine; private $visitDomain; private $apiParas = array(); private $terminalType; private $terminalInfo; private $prodCode; private $apiVersion = '1.0'; private $notifyUrl; private $returnUrl; private $needEncrypt = false; public function setCacheInterval($sp0e283e) { $this->cacheInterval = $sp0e283e; $this->apiParas['cache_interval'] = $sp0e283e; } public function getCacheInterval() { return $this->cacheInterval; } public function setQueryConditions($spe3e638) { $this->queryConditions = $spe3e638; $this->apiParas['query_conditions'] = $spe3e638; } public function getQueryConditions() { return $this->queryConditions; } public function setServiceName($sp10e5e2) { $this->serviceName = $sp10e5e2; $this->apiParas['service_name'] = $sp10e5e2; } public function getServiceName() { return $this->serviceName; } public function setVisitBiz($sp32c63a) { $this->visitBiz = $sp32c63a; $this->apiParas['visit_biz'] = $sp32c63a; } public function getVisitBiz() { return $this->visitBiz; } public function setVisitBizLine($sp098290) { $this->visitBizLine = $sp098290; $this->apiParas['visit_biz_line'] = $sp098290; } public function getVisitBizLine() { return $this->visitBizLine; } public function setVisitDomain($spcd75b0) { $this->visitDomain = $spcd75b0; $this->apiParas['visit_domain'] = $spcd75b0; } public function getVisitDomain() { return $this->visitDomain; } public function getApiMethodName() { return 'alipay.zdatafront.common.query'; } public function setNotifyUrl($spb15ce9) { $this->notifyUrl = $spb15ce9; } public function getNotifyUrl() { return $this->notifyUrl; } public function setReturnUrl($spcdf48b) { $this->returnUrl = $spcdf48b; } public function getReturnUrl() { return $this->returnUrl; } public function getApiParas() { return $this->apiParas; } public function getTerminalType() { return $this->terminalType; } public function setTerminalType($sp73de8d) { $this->terminalType = $sp73de8d; } public function getTerminalInfo() { return $this->terminalInfo; } public function setTerminalInfo($sp6b4bda) { $this->terminalInfo = $sp6b4bda; } public function getProdCode() { return $this->prodCode; } public function setProdCode($spa57d40) { $this->prodCode = $spa57d40; } public function setApiVersion($spa5b6f4) { $this->apiVersion = $spa5b6f4; } public function getApiVersion() { return $this->apiVersion; } public function setNeedEncrypt($sp8f9ba6) { $this->needEncrypt = $sp8f9ba6; } public function getNeedEncrypt() { return $this->needEncrypt; } }