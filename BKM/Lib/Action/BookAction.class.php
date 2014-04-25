<?php

class BookAction extends Action {

    //添加新书视图
    public function addBookView()
    {
        $BookCat=D('bookcat');
        $cats=$BookCat->select();
        $this->assign('cats',$cats);
        $this->display();
    }
    //获取豆瓣ISBN
    public function getBookByISBN()
    {

        $isbn=$_GET['isbn'];
        $url="http://api.douban.com/v2/book/isbn/:$isbn";
        echo file_get_contents($url);
    }
    public function test()
    {

        $isbn=$_GET['isbn'];
        $url="http://api.douban.com/v2/book/isbn/:$isbn";
        $data=json_decode(file_get_contents($url));
        dump($data);
    }

    public function publish()
    {

        foreach($_POST as $key=>$value)
        {
            $_POST[$key]=htmlentities(mysql_real_escape_string($value));
        }
        $book=D('book');

        $book->create();

        $bid=$_POST['bid'];
        if(!empty($bid))
        {
            $ret=$book->where('id='.$bid)->save($_POST);
        }else
        $ret=$book->add();
        $pic=file_get_contents($_POST['pic']);
        file_put_contents(__PUBLIC__.'/img/'.$bid.'.jpg',$pic);
        echo count($_POST);
        header('Location: '.__ADMIN__.'/Book/bookList');

    }
    //书籍列表
    public function bookList()
    {
         $Book=D('book');
         if(isset($_GET['bid'])){
             $_GET['bid']=intval( $_GET['bid']);
             $Book->where('id='.$_GET['bid'])->delete();
             header('Location: '.__ADMIN__.'/Book/booklist');
         }
        import('ORG.Util.Page');// 导入分页类
        $count      = $Book->count();// 查询满足要求的总记录数
        $Page       = new Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $Book->order('bookname')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$list);// 赋值数据集

        $this->assign('page',$show);// 赋值分页输出
        $this->display(); // 输出模板
    }
    //编辑某本书
    public function edit()
    {
        $BookCat=D('bookcat');
        $cats=$BookCat->select();
        $this->assign('cats',$cats);

        $bid=intval($_GET['bid']);
        $Book=D('book');
        $book=$Book->where('id='.$bid)->find();
        if($book)
        {
            $this->assign('book',$book);
        }
        $this->display();
    }
    //添加书籍分类视图
    public function  bookCat()
    {
        $BookCat=D('bookcat');
        if(isset($_POST['submit'])){
            $_POST['name']=htmlentities(mysql_real_escape_string($_POST['name']));
            $_POST['pid']=intval($_POST['pid']);
            $BookCat->create();
            $ret=$BookCat->add();
            if(!$ret&&__DEBUG__){
                dump($BookCat->getDbError());
            }
        }

        $cats=$BookCat->select();
        $this->assign('cats',$cats);
        $this->display();
    }
    //书籍分类列表
    public function catlist()
    {
        $Cat=D('bookcat');
        if(isset($_GET['cid'])){
            $_GET['cid']=intval( $_GET['cid']);
            $Cat->where('id='.$_GET['cid'])->delete();
            header('Location: '.__ADMIN__.'/Book/catlist');
        }
        import('ORG.Util.Page');// 导入分页类
        $count      = $Cat->count();// 查询满足要求的总记录数
        $Page       = new Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $Cat->order('name')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$list);// 赋值数据集

        $this->assign('page',$show);// 赋值分页输出
        $this->display(); // 输出模板
    }
    //编辑分类
    public function editcat()
    {
        $BookCat=D('bookcat');
        $cats=$BookCat->select();
        $this->assign('cats',$cats);

        $cid=intval($_GET['cid']);

        $cat=$BookCat->where('id='.$cid)->find();
        if($cat)
        {
            $this->assign('cat',$cat);
        }
        $this->display();
    }
    //更新分类信息
    public function subcat(){
        $BookCat=D('bookcat');

        $_POST['name']=htmlentities(mysql_real_escape_string($_POST['name']));
        $cid=$_POST['cid'];
        $cid=intval($cid);
        if(!empty($cid))
        {
         $BookCat->where('id='.$cid)->save($_POST);
        }

        header('Location: '.__ADMIN__.'/Book/catlist');
    }
}