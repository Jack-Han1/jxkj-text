<?php
namespace Admin\Controller;
use Think\Controller;

class ResponsibilityController extends CommonController
{
    function _initialize(){
        parent::_initialize();
    }
    // 社会责任->社会责任
    public function charitable(){
        $this->display();
    }

}


