<?php
class AlipayEcapiprodCreditGetRequest { private $creditNo; private $entityCode; private $entityName; private $isvCode; private $orgCode; private $apiParas = array(); private $terminalType; private $terminalInfo; private $prodCode; private $apiVersion = '1.0'; private $notifyUrl; private $returnUrl; private $needEncrypt = false; public function setCreditNo($sp21a2c0) { $this->creditNo = $sp21a2c0; $this->apiParas['credit_no'] = $sp21a2c0; } public function getCreditNo() { return $this->creditNo; } public function setEntityCode($sp812b3c) { $this->entityCode = $sp812b3c; $this->apiParas['entity_code'] = $sp812b3c; } public function getEntityCode() { return $this->entityCode; } public function setEntityName($spb29456) { $this->entityName = $spb29456; $this->apiParas['entity_name'] = $spb29456; } public function getEntityName() { return $this->entityName; } public function setIsvCode($sp6eeb57) { $this->isvCode = $sp6eeb57; $this->apiParas['isv_code'] = $sp6eeb57; } public function getIsvCode() { return $this->isvCode; } public function setOrgCode($sp694d29) { $this->orgCode = $sp694d29; $this->apiParas['org_code'] = $sp694d29; } public function getOrgCode() { return $this->orgCode; } public function getApiMethodName() { return 'alipay.ecapiprod.credit.get'; } public function setNotifyUrl($spb15ce9) { $this->notifyUrl = $spb15ce9; } public function getNotifyUrl() { return $this->notifyUrl; } public function setReturnUrl($spcdf48b) { $this->returnUrl = $spcdf48b; } public function getReturnUrl() { return $this->returnUrl; } public function getApiParas() { return $this->apiParas; } public function getTerminalType() { return $this->terminalType; } public function setTerminalType($sp73de8d) { $this->terminalType = $sp73de8d; } public function getTerminalInfo() { return $this->terminalInfo; } public function setTerminalInfo($sp6b4bda) { $this->terminalInfo = $sp6b4bda; } public function getProdCode() { return $this->prodCode; } public function setProdCode($spa57d40) { $this->prodCode = $spa57d40; } public function setApiVersion($spa5b6f4) { $this->apiVersion = $spa5b6f4; } public function getApiVersion() { return $this->apiVersion; } public function setNeedEncrypt($sp8f9ba6) { $this->needEncrypt = $sp8f9ba6; } public function getNeedEncrypt() { return $this->needEncrypt; } }