<?php
// 本类由系统自动生成，仅供测试用途
class PubAction extends CommonAction {
    //特价书
    public function pubs()
    {
        $Pubs=D('pub');
        $pub=$Pubs->where('id='.$_GET['pid'].' and state=1')->find();
        $this->assign('pub',$pub);
        $this->display();
    }
 }