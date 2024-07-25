<?php

namespace Admin\Controller;

use Think\Controller;

class RecruitController extends CommonController
{
    function _initialize()
    {
        parent::_initialize();
    }

    //     public function index(){
    //         $count = M('article')->where('menu_id=13 and status=2')->count();
    //         $Page  = new \Think\Page($count, 20);
    //         $Page->setConfig('prev', '上一页');
    //         $Page->setConfig('next', '下一页');
    //         $Page->setConfig('last', '末页');
    //         $Page->setConfig('first', '首页');
    //         $Page->setConfig('theme', '%UP_PAGE% %LINK_PAGE% %DOWN_PAGE%');
    //         $page  = $Page->show();
    //         $list =  M('article')->where('menu_id=13 and status=2')->order('sort asc')->limit($Page->firstRow.','.$Page->listRows)->select();
    //         for($i=0;$i<count($list);$i++){
    // //            if( mb_strlen($list[$i]['abstract'],'utf-8')>120){
    // //                $list[$i]['abstract'] = mb_substr($list[$i]['abstract'],0,120,'utf-8').". . .";
    // //            }
    // //            $list[$i]['year'] = date('Y',strtotime($list[$i]['create_time']));
    // //            $list[$i]['data'] = date('m.d',strtotime($list[$i]['create_time']));
    //         }
    //         $this->assign("page", $page);
    //         $this->assign('list',$list);
    //         $this->display();
    //     }

    //     public function idea(){
    //         $this->display();
    //     }

    //     public function training(){
    //         $this->display();
    //     }
    // -----------------------------------------------------------------------------------------------------------
    // 人力资源->人才理念
    public function concept()
    {
        $this->display();
    }
    // 人力资源->人才培养
    public function promotion()
    {
        $this->display();
    }
    // 人力资源->员工风采
    public function staff()
    {
        $staff = M('staff');
        $count = M('pic_dir')->where("status=1")->count();
        $Page  = new \Think\Page($count, 24);
        $Page->setConfig('prev', '上一页');
        $Page->setConfig('next', '下一页');
        $Page->setConfig('last', '末页');
        $Page->setConfig('first', '首页');
        // $Page->setConfig('theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
        $page  = $Page->show();
        $list = M('pic_dir')->limit($Page->firstRow . ',' . $Page->listRows)->where(array('status' => 1))->order('sort asc,id asc,update_time desc')->select();
        foreach ($list as $key => $val) {
            $list[$key]['url'] = $staff->where(array('pid' => $val['id'], 'is_cover' => 1))->getField('url');
        }
        $this->assign('page', $page);
        $this->assign('list', $list);
        $this->display();
    }
    // 人力自营->员工风采->员工相册
    public function staff_album()
    {
        $url = $_GET['url'];
        $pid = I("get.id");
        $list = M('staff')->where(array('status' => 1, 'pid' => $pid))->order('sort asc')->select();
        $this->assign('list', $list);
        $this->display();
    }
    // 人力资源->招贤纳士
    public function recruit()
    {
        $this->display();
    }
    // 人力资源->薪酬福利
    public function salary()
    {
        $this->display();
    }
}
