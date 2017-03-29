<?php


//初始化
function wx_share_init() {
        $wxconfig = array();
        vendor('Weixin.Jssdk');
        $jssdk = new \Jssdk(C('WEIXIN.appid'), C('WEIXIN.appsecret'));
        $wxconfig = $jssdk->GetSignPackage();
        return $wxconfig;
    }

//M 
public function index（）｛
	$wxconfig = wx_share_init();
	$shareImg  = C('BASE_URL').C('SHARE_IMG_PATH');
	$this->assign('wxconfig', $wxconfig);
	$this->assign('shareImg', $shareImg);
	$this->display();
｝
