<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends CommonAction {
    public function index(){
        $Book=D('book');
        $num=$Book->where("sub='发布'")->count();
        $rand=mt_rand(0, $num-2);
        //今日随机推荐2本书籍
        $books=$Book->query("select id,cnname,summary,price,pic,author,tag from tb_book where sub='发布' order by rand() limit 0,4");
        $this->assign('books',$books);
        //显示最后添加的四本书
        $newbooks=$Book->query("select id,cnname,pic from tb_book where sub='发布' order by pubdate desc limit 0,4");
        $this->assign('newbooks',$newbooks);


        $this->assign('menu1','active');
	    $this->display('index');
	 }
    //网站介绍
    public function about()
    {
        $this->assign('Index_about','selected');
        $this->display('about');
    }
    //联系我们
    public function contact()
    {
        $this->assign('Index_contact','selected');
        $this->display('contact');
    }

}