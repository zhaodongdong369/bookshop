<?php

class PostAction extends Action {


    //留言列表
    public function postlist()
    {
         $Post=D('post');
         if(isset($_GET['pid'])){
             $_GET['pid']=intval( $_GET['pid']);
             $Post->where('id='.$_GET['pid'])->delete();
             header('Location: '.__ADMIN__.'/Post/postlist');
         }
        import('ORG.Util.Page');// 导入分页类
        $count      = $Post->count();// 查询满足要求的总记录数
        $Page       = new Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $Post->order('posttime desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$list);// 赋值数据集

        $this->assign('page',$show);// 赋值分页输出
        $this->display(); // 输出模板
    }
    //快速发布某本书
    public function fabu(){
        $Pub=D('pub');
        $pub=$Pub->where('id='.$_GET['pid'])->find();
        if($pub['state']==0){
            $Pub->where('id='.$_GET['pid'])->setField('state',1);
            echo "1";
        }else{
            $Pub->where('id='.$_GET['pid'])->setField('state',0);
            echo "2";
        }
    }
    //删除
    public function del(){
        $Post=D('post');
        $ret=$Post->where('id='.$_GET['pid'])->delete();
        echo $ret;
    }
    //添加公告
    public function addpub(){

        $this->display();
    }
    //处理发布公告
    public function publish(){
        $Pub=D('pub');
        $_POST['pubtime']=date('Y-m-d H:i:s',time());
        $Pub->create();
        $Pub->add();
        header('Location: '.__ADMIN__.'/Pub/publist');
    }
    //修改
    public function modify(){
        $pid=$_GET['pid'];
        $Pub=D('pub');
        $pub=$Pub->where('id='.$pid)->find();
        $this->assign('pub',$pub);
        $this->display();
    }
    //更新公告
    public function edit(){
        $Pub=D('pub');
        $ret=$Pub->where('id='.$_POST['id'])->save($_POST);

        header('Location: '.__ADMIN__.'/Pub/publist');
    }
}