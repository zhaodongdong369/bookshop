<?php
// 本类由系统自动生成，仅供测试用途
class PostAction extends CommonAction {
   //添加留言
    public function add()
    {
        $_POST['posttime']=date('Y-m-d H:i:s',time());
        $Post=D('post');
        $Post->create();
        $ret=$Post->add();
        header('Location: '.__ROOT__);
    }
}