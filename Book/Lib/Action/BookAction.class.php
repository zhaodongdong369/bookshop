<?php
// 本类由系统自动生成，仅供测试用途
class BookAction extends CommonAction {
    //特价书
    public function specials()
    {
        $this->assign('Book_specials','selected');

        $Book=D('book');
        import('ORG.Util.Page');// 导入分页类
        $count      = $Book->where("sub='发布' and discont!=10")->count();// 查询满足要求的总记录数
        $Page       = new Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数
        $show       = $Page->show();// 分页显示输出
// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $Book->where("sub='发布' and discont!=10")->order('cnname')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('books',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->assign('menu3','active');
        $this->display();
    }
    //书籍详情页
    public function detail()
    {
        $this->assign('Book_details','selected');
        $bid=intval($_GET['bid']);
        if(!$bid) header('Location: '.__SHOP__);
        //书籍信息
        $Book=D('book');
        $book=$Book->where('id='.$bid)->find();
        $this->assign('book',$book);
        //分类信息
        $Cat=D('bookcat');
        $cat=$Cat->field('name,id')->where('id='.$book['typeid'])->find();
        $this->assign('catname',$cat['name']);
        //评论信息
        $Com=D('comment');
        $coms=$Com->where('bid='.$bid)->field('uid,comcontent,comtime')->order(' comtime desc')->limit(10)->select();
        //获取评论人姓名
        $User=D('user');
        foreach($coms as &$com){
            $user=$User->where('id='.$com['uid'])->field('username')->find();
            if($user)
             $com['name']=$user['username'];
        }
        $this->assign('coms',$coms);
        //获取相关书籍
        $cid=$cat['id'];
        $relbook=$Book->field('id,cnname,pic,price')->where("typeid=$cid and id!=$bid")->order('rand()')->limit(0,4)->select();
        $this->assign('relbook',$relbook);
        $this->display();
    }
    //ajax提交
    public function order()
    {

        $bcount=$_GET['count'];

        $bid=$_GET['bid'];
        $orders=session('bookorder');
        $Book=D('book');
        $book=$Book->field('id,cnname,price,discont')->where('id='.$bid)->find();
        if($bcount>0&&$book){
            $book['count']=$bcount;
        }else{
            $book=false;
        }

        if(!empty($orders)&&$book){

            $orders=json_decode($orders,true);
            $find=false;
            foreach($orders as &$order){
                if($order['id']==$bid)
                {
                    $find=true;
                    $order['count']= $order['count']+$bcount;
                    break;
                }

            }
            if(!$find)
                $orders[]=$book;


            session('bookorder',json_encode($orders));
        }else if($book){

            session('bookorder',json_encode(array($book)));
        }
       echo session('bookorder');
    }
    //支付
    public function pay()
    {
        $tab=$_GET['tab'];
        if($tab==2){
            $this->assign('disp1','none');
            $this->assign('disp2','block');
            $this->assign('disp3','none');
        }else{
            $this->assign('disp1','block');
            $this->assign('disp2','none');
            $this->assign('disp3','none');
        }
        $user=session('user');
        $User=D('user');
        $user=$User->where('id='.$user['id'])->find();
        $this->assign('user',$user);
        $login=session('login');
        if($login!='login')
        {

            header('Location: '.__SHOP__.'/User/login');
            die();
        }
        $books=session('bookorder');
        $books=json_decode($books,true);
        $total=0;
        foreach($books as $book){
            $total=$total+($book['count']*$book['price']*$book['discont']/10);
        }

        $this->assign('total',$total);

        $this->assign('orders',$books);
        $Order=D('order');
        $orderlist=$Order->where('state=0')->select();

        foreach($orderlist as &$order){

            $books=json_decode($order['books'],true);

            $total=0;
            $tip='';
            foreach($books as $book){
                $tip.=$book['cnname'];
                $tip.=' ';
                $tip.=$book['count'];
                $tip.='本<br/>';
                $total+=$book['count']*$book['price']*$book['discont']/10;
            }

            $order['total']=substr($total,0,strpos($total,'.')+2);
            $order['tip']=$tip;
        }
        $this->assign('orderlist',$orderlist);

        $this->assign('menu4','active');
         ;
        $this->display();

    }
    //
    public function cats()
    {
        $beg=0;
        $Cat=D('bookcat');
        $cid=$_GET['cid'];
        $cat=$Cat->field('name')->where('id='.$cid)->find();

        $Book=D('book');
        $books=$Book->where('typeid='.$cid)->limit($beg,10)->select();
        $this->assign('catname',$cat['name']);
         import('ORG.Util.Page');// 导入分页类
        $count      = $Book->where('typeid='.$cid)->count();// 查询满足要求的总记录数
        $Page       = new Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数
        $show       = $Page->show();// 分页显示输出
// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $Book->where('typeid='.$cid)->order('cnname')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('books',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出

        $this->display();

    }
    //书籍列表
    public function books()
    {

        $Book=D('book');
        import('ORG.Util.Page');// 导入分页类
        $count      = $Book->where("sub='发布'")->count();// 查询满足要求的总记录数
        $Page       = new Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数
        $show       = $Page->show();// 分页显示输出
// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $Book->where("sub='发布'")->order('cnname')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('books',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->assign('menu2','active');
        $this->display();

    }
    //ajax保存书单
    public function save()
    {
        $content=$_GET['form'];
        $content=explode('&',$content);
        $length=sizeof($content);
        for($i=0;$i<$length;$i++){
            $content[$i]=explode('=',$content[$i]);
            $content[$i][0]=substr($content[$i][0],1);
        }


        $Book=D('book');
        $books=array();
        for($i=0;$i<$length;$i++){
            $book=$Book->field('id,cnname,price,discont')->where('id='.$content[$i][0])->find();
            $book['count']=$content[$i][1];
            $books[]=$book;
        }
        session('bookorder',json_encode($books));
        //保存到数据库
        $user=session('user');
        $Order=D('order');
         $data['uid']=$user['id'];
        $data['books']=session('bookorder');
        $data['ordertime']=date('Y-m-d H:i:s',time());
        $data['state']=0;
        $Order->add($data);
        echo session('bookorder');

    }
    //删除订单
    public function delOrder(){
        $Order=D('order');
        $ret=$Order->where('id='.$_GET['id'])->delete();
        if($ret){
            echo "<font color='green'>删除成功</font>";
        }else{
            echo "<font color='#ff4500'>删除失败</font>";
        }
    }

    //处理支付
    public function payStep2(){
        $Order=D('order');
        $books=session('bookorder');
        $user=session('user');
        $oid=$_POST['oid'];
        $tmp=$Order->where('uid='.$user['id']." and books='".$books."'")->find();
        $order['uid']=$user['id'];
        $order['books']=$books;
        $order['confirmtime']=date('Y-m-d H:i:s',time());
        $order['state']=1;
        $order['location']=htmlentities(mysql_real_escape_string($_POST['location']));
        $order['tel']=htmlentities(mysql_real_escape_string($_POST['tel']));
        $order['username']=htmlentities(mysql_real_escape_string($_POST['username']));
        if($oid==0){
            $d=$Order->field('id')->where('uid='.$user['id'])->order('ordertime desc')->limit(0,1)->find();

            $ret=$Order->where('id='.$d['id'])->save($order);

        }else{
            $order=null;
            $order['confirmtime']=date('Y-m-d H:i:s',time());
            $order['state']=1;
            $order['location']=htmlentities(mysql_real_escape_string($_POST['location']));
            $order['tel']=htmlentities(mysql_real_escape_string($_POST['tel']));
            $order['username']=htmlentities(mysql_real_escape_string($_POST['username']));
            $ret=$Order->where('id='.$oid." and state=0")->save($order);

        }
        if($ret){
            header('Location: '.__SHOP__.'/Book/paydone');
        }else
            header('Location: '.__SHOP__.'/Book/pay');
    }
    //支付完成
    public function paydone(){
        $Order=D('order');
        import('ORG.Util.Page');// 导入分页类
        $count      = $Order->where('state=1')->count();// 查询满足要求的总记录数
        $Page       = new Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $Order->where('state=1')->order('confirmtime desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        foreach($list as &$order){
            $books=$order['books'];
            $books=json_decode($books,true);
            $total=0;
            $tip='';
            foreach($books as $book){
                    $tip.=$book['cnname'];
                    $tip.=' ';
                    $tip.=$book['count'];
                    $tip.='本<br/>';
                    $total+=$book['count']*$book['price']*$book['discont']/10;
                }

                $order['total']=substr($total,0,strpos($total,'.')+2);
                $order['tip']=$tip;
        }
        session('bookorder',null);
        $this->assign('menu4','active');
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        session('bookorder',null);
        $this->display(); // 输出模板

    }
    //提交评论
    public function subcom(){
        $Comment=D('comment');

        $user=session('user');
        if(!$user){
           echo "login";

        }else{
            $_GET['uid']=$user['id'];
            $_GET['comtime']=date('Y-m-d H:i:s',time());
            $_GET['comflag']=0;
            $_GET['comcontent']=htmlentities(mysql_real_escape_string($_GET['comcontent']));
            $Comment->create($_GET);
            $ret=$Comment->add();
            if($ret){
                echo "ok";
            }else{

            }
        }


    }
    public function search(){
        $this->assign('Book_specials','selected');
        $bookname=$_GET['bookname'];

        $bookname=mysql_real_escape_string($bookname);
        $Book=D('book');
        import('ORG.Util.Page');// 导入分页类
        $count      = $Book->where("sub='发布' and tag like '%$bookname%' or cnname like '%$bookname%' or author like '%$bookname%'")->count();// 查询满足要求的总记录数
        $Page       = new Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数
        $show       = $Page->show();// 分页显示输出
// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $Book->field('id,cnname,discont,summary,tag')->where("sub='发布' and tag like '%$bookname%' or cnname like '%$bookname%' or author like '%$bookname%' ")->order('cnname')->limit($Page->firstRow.','.$Page->listRows)->select();
        $bookname=htmlentities($bookname);
        session('keyword',$bookname);

       $this->assign('books',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->assign('menu3','active');
        $this->display();
    }





}