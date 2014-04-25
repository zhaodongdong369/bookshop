<?php
// 本类由系统自动生成，仅供测试用途
class CommonAction extends Action {
    public function __construct()
    {
        parent::__construct();
        $User=D('user');

        if(!array_key_exists('user',$_SESSION)){
            $suid=cookie('suid');
            if(!empty($suid)){
                $suid=cookie('suid');
                $suid=base64_decode($suid);
                $user=explode('#',$suid);
                $user[0]=mysql_real_escape_string($user[0]);
                $user[1]=mysql_real_escape_string($user[1]);
                $user=$User->field('id,username,password')->where(array('username'=>$user[0],'password'=>$user[1]))->find();
                if($user){
                    session('user',$user);
                    session('login','login');

                }
            }
        }
        if(!array_key_exists('bookcats',$_SESSION)){
            $BCat=D('bookcat');
            $Book=D('book');
            $cats=$BCat->field('id,name')->where('pid=0')->select();
            foreach($cats as &$cat){
                $num=$Book->where("typeid=".$cat['id'])->count();
                $cat['num']=$num;
            }
            session('bookcats',$cats);
        }

        //合作书店
        if(!array_key_exists('shops',$_SESSION)){
            $BookShop=D('bookshop');
            $shops=$BookShop->field('id,name')->order('regtime desc')->limit(0,10)->select();
            session('shops',$shops);
        }

        //前十条最新公告
        if(!array_key_exists('pubs',$_SESSION)){
            $Pub=D('pub');
            $pubs=$Pub->field('id,title')->order('pubtime desc')->limit(0,10)->select();
            session('pubs',$pubs);
        }

    }
}