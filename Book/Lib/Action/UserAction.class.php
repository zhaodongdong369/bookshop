<?php
// 本类由系统自动生成，仅供测试用途
class UserAction extends CommonAction {
    public function index(){



	    $this->display('index');
	 }
    public function reg(){
        $this->assign('menu7','active');

        $this->display();
    }
    //用户登录
    public function login(){
        $this->assign('menu8','active');
        $this->display();
    }
    //处理登录
    public function dologin()
    {
        $salt='aoxne332';
        $password=md5($salt.md5($salt.$_POST['password']));
        $username=mysql_real_escape_string($_POST['username']);
        $User=D('user');
        if(!empty($username)){
            $username=mysql_real_escape_string($username);
            $user=$User->field('id,username,password,logtime,lastlogtime')->where("username='$username'")
                ->find();

            if($user){
                if($password!=$user['password']){
                    header('Location: '.__SHOP__.'/User/login');
                }else{
                    $suid=base64_encode($username.'#'.$password);
                    if(isset($_POST['terms'])){

                        cookie('suid',$suid,3600*24*7);
                        session('login','login');
                        session('user',$user);
                        header('Location: '.__SHOP__);
                    }

                    session('login','login');
                    session('user',$user);
                    $User->where('id='.$user['id'])->find();
                    $User->logtime=$user['logtime']+1;
                    $User->lastlogtime=date('Y-m-d H:i:s',time());
                    $User->save();
                   if(strpos($_SERVER["HTTP_REFERER"],'User/login')){
                       header('Location: '.__SHOP__."/Book/pay");
                       exit();
                   };
                        ;
                    header('Location: '.__SHOP__);
                }
            }
        }
        header('Location: '.__SHOP__."/User/login/");
    }
    //注销登录
    public function logout()
    {
        cookie('suid',null);
        session('user',null);
        session('login',null);
        header('Location: '.__SHOP__);
    }
    //处理注册
    public function regdo(){
        $salt='aoxne332';
        $_POST['regtime']=date('Y-m-d',time());
        $_POST['password']=md5($salt.md5($salt.$_POST['password']));
        $User=D('user');
        $_POST['username']=htmlentities(mysql_real_escape_string($_POST['username']));

        $_POST['tel']=htmlentities(mysql_real_escape_string($_POST['tel']));
        $_POST['email']=htmlentities(mysql_real_escape_string($_POST['email']));
        $_POST['addr']=htmlentities(mysql_real_escape_string($_POST['addr']));
        $_POST['ques']=htmlentities(mysql_real_escape_string($_POST['ques']));
        $_POST['answer']=htmlentities(mysql_real_escape_string($_POST['answer']));
        $User->create();
        $ret=$User->add();
        if($ret){
            header('Location: '.__SHOP__.'/User/tip');
            die();
        }else{
            echo "<script>history.go(-1);</script>";
        }
    }
    //提示用户
    public function tip()
    {
        $this->display();
    }
    //ajax检测用户名
    public function checkName()
    {
        $name=$_GET['name'];
        $User=D('user');
        $user=$User->where(array('username'=>$name))->find();
        if($user){
            echo 'err';
        }else
         echo "ok";
    }
    //用户中心
    public function center()
    {
        $user=$_SESSION['user'];
        if(!$user)
            header('Location: '.__SHOP__);
        $User=D('user');
        $user=$User->where(array('id'=>$user['id']))->find();
        if($user)
        $this->assign('user',$user);
        else header('Location: '.__SHOP__);
        if(session('tips')){
            $this->assign('tips',session('tips'));
            session('tips',null);
        }
        $this->assign('menu5','active');
        $this->display();
    }
    //处理更新
    public function update()
    {
        $user=$_SESSION['user'];
        if(!$user)
            header('Location: '.__SHOP__);
        $User=D('user');
       unset($_POST['username']);
        unset($_POST['password']);

        $_POST['truename']=htmlentities(mysql_real_escape_string( $_POST['truename']));
        $_POST['tel']=htmlentities(mysql_real_escape_string( $_POST['tel']));
        $_POST['email']=htmlentities(mysql_real_escape_string( $_POST['email']));
        $_POST['addr']=htmlentities(mysql_real_escape_string( $_POST['addr']));
        $ret=$User->where('id='.$user['id'])->save($_POST);
        if($ret)  session('tips','更新资料成功');
        else  session('tips','资料未变动');
        header('Location: '.__SHOP__.'/User/center');
    }
    //ajax确认更新
    public function confirm(){
        $user=$_SESSION['user'];
        if(!$user)
            header('Location: '.__SHOP__);
        $User=D('user');
        $user=$User->field('answer')->where('id='.$user['id'])->find();
        if($user['answer']==$_GET['answer']){
            echo "ok";
        }else{
            echo "err";
        }
    }
    //删除订单
    public function delOrder(){
        $Order=D('order');
        $ret=$Order->where('id='.$_GET['id'])->delete();
        if($ret){
            header('Location: '.__SHOP__.'/Book/paydone');
        }
    }


}