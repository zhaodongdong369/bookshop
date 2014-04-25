<?php

class UserAction extends Action {
    public function login(){
        $this->display();
	}
    //处理登录
    public function land(){
        $username=htmlspecialchars($_POST['username']);
        $password=htmlspecialchars($_POST['password']);
        $verify=htmlspecialchars($_POST['verify']);
        $Admin=D('Admin');
        $admin=$Admin->where(array('AdminName'=>$username,'AdminPwd'=>$password))->find();
        if($admin&&$verify==$_SESSION['verify'])
        {
            unset($_SESSION['verify']);
            $_SESSION['login']=TRUE;
            $_SESSION['user']=$admin;
            header('Location: '.__ADMIN__.'/Index');

             exit();
        }
        header('Location: '.__ADMIN__.'/User/login');
       }
    //注销用户
    public function logout(){
        if(isset($_SESSION['login'])){
            unset($_SESSION['login']);
        }
        if(isset($_SESSION['user'])){
            unset($_SESSION['user']);
        }

        header('Location: '.__ADMIN__.'/User/login');
    }
    //添加用户视图
    public function addUserView()
    {
        $this->display();
    }
    //注册用户列表
    public function  userList()
    {
        $User=D('user');


        import('ORG.Util.Page');// 导入分页类
        $count      = $User->count();// 查询满足要求的总记录数
        $Page       = new Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $User->order('regtime')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$list);// 赋值数据集

        $this->assign('page',$show);// 赋值分页输出
        $this->display(); // 输出模板

    }
    //编辑用户
    public function detail()
    {
        $User=D('user');
        $user=$User->find($_GET['id']);
        $this->assign('user',$user);
        $this->display();
    }
    //注册统计
    public function stats()
    {
        $User=M('user');
        $year=isset($_GET['year']);
        if($year){
            $year=intval($year);
        }else
            $year=date('Y-m',time());

        $result=$User->query("select count(id) as num,regtime from tb_user where regtime like '$year%' group by regtime order by regtime asc");
        $data='';
        for($i=0;$i<sizeof($result);$i++){
            $num=$result[$i]['num'];
            $day=$result[$i]['regtime'];
            $day=substr($day,8,2);
            $data.="['$day',   $num,       0,           0],";
        }
        $this->assign('googledata',$data);
        //parent::dump($result,$User);
        $this->display();
    }
    //添加用户
    public function add()
    {
        foreach($_POST as $key=>$val)
        {
            $_POST[$key]=htmlentities(mysql_real_escape_string($val));
        }
        $salt='aoxne332';
        $_POST['regtime']=date('Y-m-d',time());
        $_POST['password']=md5($salt.md5($salt.$_POST['password']));
        $User=D('user');
        $User->create();
        $ret=$User->add();
        if($ret){
            header('Location: '.__ADMIN__.'/User/userList');
            die();
        }else{
            $this->assign('tips','用户名冲突');
            header('Location: '.__ADMIN__.'/User/addUserView');
        }
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

    //删除用户
    public function del()
    {
        $User=D('user');
        $User->where('id='.$_GET['id'])->delete();
        header('Location: '.__ADMIN__.'/User/userList');
    }
    //更新用户资料
    public function update()
    {
        foreach($_POST as $key=>$val)
        {
            $_POST[$key]=htmlentities(mysql_real_escape_string($val));
        }
    $User=D('user');
    $ret=$User->where('id='.$_POST['id'])->save($_POST);
        header('Location: '.__ADMIN__.'/User/userList');
    }
}