<?php


public function index（）｛
	$wxconfig = wx_share_init();
	$shareImg  = C('BASE_URL').C('SHARE_IMG_PATH');
	$this->assign('wxconfig', $wxconfig);
	$this->assign('shareImg', $shareImg);
	$this->display();
｝
