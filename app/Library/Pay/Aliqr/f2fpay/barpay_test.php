<?php
header('Content-type: text/html; charset=utf-8'); require_once 'model/builder/AlipayTradePayContentBuilder.php'; require_once 'service/AlipayTradeService.php'; if (!empty($_POST['out_trade_no']) && trim($_POST['out_trade_no']) != '') { $sp58144b = $_POST['out_trade_no']; $spe4243d = $_POST['subject']; $sp6ed116 = $_POST['total_amount']; $sp81e09d = $_POST['auth_code']; $spccc814 = '0.01'; $spb14afd = ''; $sp1d246b = '购买商品2件共15.00元'; $sp8f1139 = 'test_operator_id'; $sp562675 = 'test_store_id'; $sp8261ed = 'test_alipay_store_id'; $spaf8aa6 = ''; $sp2684c9 = new ExtendParams(); $sp2684c9->setSysServiceProviderId($spaf8aa6); $spfe934a = $sp2684c9->getExtendParams(); $sp42245d = '5m'; $sp886ee6 = array(); $sp63b18a = new GoodsDetail(); $sp63b18a->setGoodsId('good_id001'); $sp63b18a->setGoodsName('XXX商品1'); $sp63b18a->setPrice(3000); $sp63b18a->setQuantity(1); $sp87bd35 = $sp63b18a->getGoodsDetail(); $sp342c12 = new GoodsDetail(); $sp342c12->setGoodsId('good_id002'); $sp342c12->setGoodsName('XXX商品2'); $sp342c12->setPrice(1000); $sp342c12->setQuantity(1); $sp37a83a = $sp342c12->getGoodsDetail(); $sp886ee6 = array($sp87bd35, $sp37a83a); $sp7f2a58 = ''; $spec0cc0 = new AlipayTradePayContentBuilder(); $spec0cc0->setOutTradeNo($sp58144b); $spec0cc0->setTotalAmount($sp6ed116); $spec0cc0->setAuthCode($sp81e09d); $spec0cc0->setTimeExpress($sp42245d); $spec0cc0->setSubject($spe4243d); $spec0cc0->setBody($sp1d246b); $spec0cc0->setUndiscountableAmount($spccc814); $spec0cc0->setExtendParams($spfe934a); $spec0cc0->setGoodsDetailList($sp886ee6); $spec0cc0->setStoreId($sp562675); $spec0cc0->setOperatorId($sp8f1139); $spec0cc0->setAlipayStoreId($sp8261ed); $spec0cc0->setAppAuthToken($sp7f2a58); $spc40c2a = new AlipayTradeService($spd82bcd); $sp99014e = $spc40c2a->barPay($spec0cc0); switch ($sp99014e->getTradeStatus()) { case 'SUCCESS': echo '支付宝支付成功:' . '<br>--------------------------<br>'; print_r($sp99014e->getResponse()); break; case 'FAILED': echo '支付宝支付失败!!!' . '<br>--------------------------<br>'; if (!empty($sp99014e->getResponse())) { print_r($sp99014e->getResponse()); } break; case 'UNKNOWN': echo '系统异常，订单状态未知!!!' . '<br>--------------------------<br>'; if (!empty($sp99014e->getResponse())) { print_r($sp99014e->getResponse()); } break; default: echo '不支持的交易状态，交易返回异常!!!'; break; } return; } ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <title>支付宝当面付 条码支付</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <style>
        *{
            margin:0;
            padding:0;
        }
        ul,ol{
            list-style:none;
        }
        .title{
            color: #ADADAD;
            font-size: 14px;
            font-weight: bold;
            padding: 8px 16px 5px 10px;
        }
        .hidden{
            display:none;
        }

        .new-btn-login-sp{
            border:1px solid #D74C00;
            padding:1px;
            display:inline-block;
        }

        .new-btn-login{
            background-color: transparent;
            background-image: url("../img/new-btn-fixed.png");
            border: medium none;
        }
        .new-btn-login{
            background-position: 0 -198px;
            width: 82px;
            color: #FFFFFF;
            font-weight: bold;
            height: 28px;
            line-height: 28px;
            padding: 0 10px 3px;
        }
        .new-btn-login:hover{
            background-position: 0 -167px;
            width: 82px;
            color: #FFFFFF;
            font-weight: bold;
            height: 28px;
            line-height: 28px;
            padding: 0 10px 3px;
        }
        .bank-list{
            overflow:hidden;
            margin-top:5px;
        }
        .bank-list li{
            float:left;
            width:153px;
            margin-bottom:5px;
        }

        #main{
            width:750px;
            margin:0 auto;
            font-size:14px;
            font-family:'宋体';
        }
        #logo{
            background-color: transparent;
            background-image: url("../img/new-btn-fixed.png");
            border: medium none;
            background-position:0 0;
            width:166px;
            height:35px;
            float:left;
        }
        .red-star{
            color:#f00;
            width:10px;
            display:inline-block;
        }
        .null-star{
            color:#fff;
        }
        .content{
            margin-top:5px;
        }

        .content dt{
            width:160px;
            display:inline-block;
            text-align:right;
            float:left;

        }
        .content dd{
            margin-left:100px;
            margin-bottom:5px;
        }
        #foot{
            margin-top:10px;
        }
        .foot-ul li {
            text-align:center;
        }
        .note-help {
            color: #999999;
            font-size: 12px;
            line-height: 130%;
            padding-left: 3px;
        }

        .cashier-nav {
            font-size: 14px;
            margin: 15px 0 10px;
            text-align: left;
            height:30px;
            border-bottom:solid 2px #CFD2D7;
        }
        .cashier-nav ol li {
            float: left;
        }
        .cashier-nav li.current {
            color: #AB4400;
            font-weight: bold;
        }
        .cashier-nav li.last {
            clear:right;
        }
        .alipay_link {
            text-align:right;
        }
        .alipay_link a:link{
            text-decoration:none;
            color:#8D8D8D;
        }
        .alipay_link a:visited{
            text-decoration:none;
            color:#8D8D8D;
        }
    </style>
</head>
<body text=#000000 bgColor="#ffffff" leftMargin=0 topMargin=4>
<div id="main">
    <div id="head">
        <dl class="alipay_link">
            <a target="_blank" href="http://www.alipay.com/"><span>支付宝首页</span></a>|
            <a target="_blank" href="https://b.alipay.com/home.htm"><span>商家服务</span></a>|
            <a target="_blank" href="http://help.alipay.com/support/index_sh.htm"><span>帮助中心</span></a>
        </dl>
        <span class="title">支付宝 当面付2.0 条码支付接口</span>
    </div>
    <div class="cashier-nav">
        <ol>
            <li class="current">1、确认信息 →</li>
            <li>2、点击确认 →</li>
            <li class="last">3、确认完成</li>
        </ol>
    </div>
    <form name=alipayment action="" method=post target="_blank">
        <div id="body" style="clear:left">
            <dl class="content">
                <dt>商户订单号：</dt>
                <dd>
                    <span class="null-star">*</span>
                    <input size="30" name="out_trade_no" />
						<span>商户网站订单系统中唯一订单号，必填
</span>
                </dd>
                <dt>订单名称：</dt>
                <dd>
                    <span class="null-star">*</span>
                    <input size="30" name="subject" />
						<span>必填
</span>
                </dd>

                <dt>付款金额：</dt>
                <dd>
                    <span class="null-star">*</span>
                    <input size="30" name="total_amount" />
						<span>必填
</span>
                </dd>

                <dt>付款条码：</dt>
                <dd>
                    <span class="null-star">*</span>
                    <input size="30" name="auth_code" />
						<span>必填
</span>
                </dd>


                <dt></dt>
                <dd>
                        <span class="new-btn-login-sp">
                            <button class="new-btn-login" type="submit" style="text-align:center;">确 认</button>
                        </span>
                </dd>
            </dl>
        </div>
    </form>
    <div id="foot">
        <ul class="foot-ul">
            <li><font class="note-help">如果您点击“确认”按钮，即表示您同意该次的执行操作。 </font></li>
            <li>
                支付宝版权所有 2011-2015 ALIPAY.COM
            </li>
        </ul>
    </div>
</div>
</body>
</html>

<?php 