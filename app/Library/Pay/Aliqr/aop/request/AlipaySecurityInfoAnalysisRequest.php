<?php
class AlipaySecurityInfoAnalysisRequest { private $envClientBaseBand; private $envClientBaseStation; private $envClientCoordinates; private $envClientImei; private $envClientImsi; private $envClientIosUdid; private $envClientIp; private $envClientMac; private $envClientScreen; private $envClientUuid; private $jsTokenId; private $partnerId; private $sceneCode; private $userAccountNo; private $userBindBankcard; private $userBindBankcardType; private $userBindMobile; private $userIdentityType; private $userRealName; private $userRegDate; private $userRegEmail; private $userRegMobile; private $userrIdentityNo; private $apiParas = array(); private $terminalType; private $terminalInfo; private $prodCode; private $apiVersion = '1.0'; private $notifyUrl; private $returnUrl; private $needEncrypt = false; public function setEnvClientBaseBand($sp415946) { $this->envClientBaseBand = $sp415946; $this->apiParas['env_client_base_band'] = $sp415946; } public function getEnvClientBaseBand() { return $this->envClientBaseBand; } public function setEnvClientBaseStation($spb18465) { $this->envClientBaseStation = $spb18465; $this->apiParas['env_client_base_station'] = $spb18465; } public function getEnvClientBaseStation() { return $this->envClientBaseStation; } public function setEnvClientCoordinates($spb1f95e) { $this->envClientCoordinates = $spb1f95e; $this->apiParas['env_client_coordinates'] = $spb1f95e; } public function getEnvClientCoordinates() { return $this->envClientCoordinates; } public function setEnvClientImei($sp5d094b) { $this->envClientImei = $sp5d094b; $this->apiParas['env_client_imei'] = $sp5d094b; } public function getEnvClientImei() { return $this->envClientImei; } public function setEnvClientImsi($spb09513) { $this->envClientImsi = $spb09513; $this->apiParas['env_client_imsi'] = $spb09513; } public function getEnvClientImsi() { return $this->envClientImsi; } public function setEnvClientIosUdid($sp6a945e) { $this->envClientIosUdid = $sp6a945e; $this->apiParas['env_client_ios_udid'] = $sp6a945e; } public function getEnvClientIosUdid() { return $this->envClientIosUdid; } public function setEnvClientIp($spc2729d) { $this->envClientIp = $spc2729d; $this->apiParas['env_client_ip'] = $spc2729d; } public function getEnvClientIp() { return $this->envClientIp; } public function setEnvClientMac($spd1755e) { $this->envClientMac = $spd1755e; $this->apiParas['env_client_mac'] = $spd1755e; } public function getEnvClientMac() { return $this->envClientMac; } public function setEnvClientScreen($spf6bb34) { $this->envClientScreen = $spf6bb34; $this->apiParas['env_client_screen'] = $spf6bb34; } public function getEnvClientScreen() { return $this->envClientScreen; } public function setEnvClientUuid($sp413efe) { $this->envClientUuid = $sp413efe; $this->apiParas['env_client_uuid'] = $sp413efe; } public function getEnvClientUuid() { return $this->envClientUuid; } public function setJsTokenId($sp19143f) { $this->jsTokenId = $sp19143f; $this->apiParas['js_token_id'] = $sp19143f; } public function getJsTokenId() { return $this->jsTokenId; } public function setPartnerId($sp1f223a) { $this->partnerId = $sp1f223a; $this->apiParas['partner_id'] = $sp1f223a; } public function getPartnerId() { return $this->partnerId; } public function setSceneCode($sp5b88fc) { $this->sceneCode = $sp5b88fc; $this->apiParas['scene_code'] = $sp5b88fc; } public function getSceneCode() { return $this->sceneCode; } public function setUserAccountNo($sp75a6e3) { $this->userAccountNo = $sp75a6e3; $this->apiParas['user_account_no'] = $sp75a6e3; } public function getUserAccountNo() { return $this->userAccountNo; } public function setUserBindBankcard($sp84403b) { $this->userBindBankcard = $sp84403b; $this->apiParas['user_bind_bankcard'] = $sp84403b; } public function getUserBindBankcard() { return $this->userBindBankcard; } public function setUserBindBankcardType($sp61c49d) { $this->userBindBankcardType = $sp61c49d; $this->apiParas['user_bind_bankcard_type'] = $sp61c49d; } public function getUserBindBankcardType() { return $this->userBindBankcardType; } public function setUserBindMobile($sp2643c4) { $this->userBindMobile = $sp2643c4; $this->apiParas['user_bind_mobile'] = $sp2643c4; } public function getUserBindMobile() { return $this->userBindMobile; } public function setUserIdentityType($sp79bc23) { $this->userIdentityType = $sp79bc23; $this->apiParas['user_identity_type'] = $sp79bc23; } public function getUserIdentityType() { return $this->userIdentityType; } public function setUserRealName($sp3eb715) { $this->userRealName = $sp3eb715; $this->apiParas['user_real_name'] = $sp3eb715; } public function getUserRealName() { return $this->userRealName; } public function setUserRegDate($spdfc811) { $this->userRegDate = $spdfc811; $this->apiParas['user_reg_date'] = $spdfc811; } public function getUserRegDate() { return $this->userRegDate; } public function setUserRegEmail($sp454b6b) { $this->userRegEmail = $sp454b6b; $this->apiParas['user_reg_email'] = $sp454b6b; } public function getUserRegEmail() { return $this->userRegEmail; } public function setUserRegMobile($spaf6599) { $this->userRegMobile = $spaf6599; $this->apiParas['user_reg_mobile'] = $spaf6599; } public function getUserRegMobile() { return $this->userRegMobile; } public function setUserrIdentityNo($sp0a5986) { $this->userrIdentityNo = $sp0a5986; $this->apiParas['userr_identity_no'] = $sp0a5986; } public function getUserrIdentityNo() { return $this->userrIdentityNo; } public function getApiMethodName() { return 'alipay.security.info.analysis'; } public function setNotifyUrl($spb15ce9) { $this->notifyUrl = $spb15ce9; } public function getNotifyUrl() { return $this->notifyUrl; } public function setReturnUrl($spcdf48b) { $this->returnUrl = $spcdf48b; } public function getReturnUrl() { return $this->returnUrl; } public function getApiParas() { return $this->apiParas; } public function getTerminalType() { return $this->terminalType; } public function setTerminalType($sp73de8d) { $this->terminalType = $sp73de8d; } public function getTerminalInfo() { return $this->terminalInfo; } public function setTerminalInfo($sp6b4bda) { $this->terminalInfo = $sp6b4bda; } public function getProdCode() { return $this->prodCode; } public function setProdCode($spa57d40) { $this->prodCode = $spa57d40; } public function setApiVersion($spa5b6f4) { $this->apiVersion = $spa5b6f4; } public function getApiVersion() { return $this->apiVersion; } public function setNeedEncrypt($sp8f9ba6) { $this->needEncrypt = $sp8f9ba6; } public function getNeedEncrypt() { return $this->needEncrypt; } }