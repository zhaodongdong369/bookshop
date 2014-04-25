<?php
// 本类由系统自动生成，仅供测试用途
class TestAction extends Action {

    public function index()
    {
        $var_array = array("color" => "blue",
            "size"  => "medium", "shape" => "sphere");
        $this->assign($var_array);
        $this->display();
    }
 }