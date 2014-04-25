<?php

class OrderAction extends Action {

  public function forderList(){
     $Order=D('order');
      $select=$_GET['select'];
     $select=htmlentities(mysql_real_escape_string($select));
      if(!empty($select))
          $this->assign('select',$select);

     import('ORG.Util.Page');// 导入分页类
      $count      = $Order->where("state=1 and  ordertime like '%$select%'")->count();// 查询满足要求的总记录数
      $Page       = new Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数
      $show       = $Page->show();// 分页显示输出
// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
      $list = $Order->where("state=1 and  ordertime like '%$select%'")->order('confirmtime desc')->limit($Page->firstRow.','.$Page->listRows)->select();
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
      $this->assign('list',$list);// 赋值数据集
      $this->assign('page',$show);// 赋值分页输出
      $this->display(); // 输出模板
    }
    public function setAdmin(){
        $Order=D('order');
        $order=$Order->where('id='.$_GET['id'])->find();
        $time=date('Y-m-d H:i:s',time());
        if($order['admin']==0){
            $Order->where('id='.$_GET['id'])->setField('admin',1);
            $Order->where('id='.$_GET['id'])->setField('sendtime',$time);
            echo 1;
        }
        else{
            $Order->where('id='.$_GET['id'])->setField('admin',0);
            echo -1;
        }

    }
    public function uorderList(){
        $Order=D('order');
        $select=$_GET['select'];
        $select=htmlentities(mysql_real_escape_string($select));
         if(!empty($select))
            $this->assign('select',$select);
        import('ORG.Util.Page');// 导入分页类
        $count      = $Order->where("state=0 and  ordertime like '%$select%'")->count();// 查询满足要求的总记录数
        $Page       = new Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $Order->where("state=0 and  ordertime like '%$select%'")->order('confirmtime desc')->limit($Page->firstRow.','.$Page->listRows)->select();
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
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display(); // 输出模板
    }
    //删除某项
    public function del(){
        $id=$_GET['id'];
        $Order=D('order');
        $ret=$Order->where('id='.$id)->delete();
        echo $ret;
    }
    //按时间选择

}
