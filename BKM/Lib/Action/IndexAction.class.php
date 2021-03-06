<?php

class IndexAction extends Action {
    /**
     * 检查 php 的版本信息
     *
     * @return array
     */
    public function checkPhpVersion()
    {
        $value  = phpversion();
        $isPass = version_compare($value, BZF_PHP_VERSION_REQUIRE, '>=');
        return array('value' => $value, 'isPass' => $isPass);
    }

    /**
     * 检查 php 扩展是否存在
     *
     * @param $extName
     * @param $extFunc
     * @param $shouldCall
     *
     * @return array
     */
    public function checkExtensionLoad($extName)
    {
        $isPass = extension_loaded($extName);
        $value  = $isPass ? $extName : '';

        return array('value' => $value, 'isPass' => $isPass);
    }

    /**
     * 检查文件或者目录是否可写
     *
     * @param $isWrite
     * @param $isRead
     */
    public function checkFilePermission($path)
    {
        global $f3;
        $isPass     = false;
        $valueArray = array();



        if (!file_exists($path)) {
            return array('value' => implode(',', $valueArray), 'isPass' => $isPass);
        }

        $isWritable   = is_writable($path);
        $valueArray[] = $isWritable ? '可写' : '不可写';

        $isReadable   = is_readable($path);
        $valueArray[] = $isReadable ? '可读' : '不可读';

        $isPass = $isWritable && $isReadable;


        return array('value' => implode(',', $valueArray), 'isPass' => $isPass);
    }
    public function index(){
        if($_SESSION['login']!=TRUE)
        {

           $this->error('请先登录',__ADMIN__.'/User/login');
        }
        $admin=$_SESSION['user'];
        $this->assign('user',$admin);
        $bookpath = realpath(__ADMIN__);

        $envCheckConfigArray = array(
            array(
                'name'   => 'PHP版本',
                'isMust' => true,
                'desc'   => 'PHP版本最低要求 5.3.4',
                'call'   => array('checkPhpVersion', array())
            ),
            array(
                'name'   => 'PHP模块',
                'isMust' => true,
                'desc'   => 'PDO 用于数据库访问',
                'call'   => array('checkExtensionLoad', array('PDO'))
            ),
            array(
                'name'   => 'PHP模块',
                'isMust' => true,
                'desc'   => 'pdo_mysql 用于连接 mysql 数据库',
                'call'   => array('checkExtensionLoad', array('pdo_mysql'))
            ),
            array(
                'name'   => 'PHP模块',
                'isMust' => true,
                'desc'   => 'bcmath 用于金额计算',
                'call'   => array('checkExtensionLoad', array('bcmath'))
            ),
            array(
                'name'   => 'PHP模块',
                'isMust' => true,
                'desc'   => 'mbstring 模块用于文本编码转换（UTF-8 -> GBK）',
                'call'   => array('checkExtensionLoad', array('mbstring'))
            ),
            array(
                'name'   => 'PHP模块',
                'isMust' => true,
                'desc'   => 'json 用于解析 json 数据',
                'call'   => array('checkExtensionLoad', array('json'))
            ),
            array(
                'name'   => 'PHP模块',
                'isMust' => true,
                'desc'   => 'curl 用于网络连接',
                'call'   => array('checkExtensionLoad', array('curl'))
            ),
            array(
                'name'   => 'PHP模块',
                'isMust' => true,
                'desc'   => 'ctype 基本数据类型判断',
                'call'   => array('checkExtensionLoad', array('ctype'))
            ),
            array(
                'name'   => 'PHP模块',
                'isMust' => true,
                'desc'   => 'gd 模块用于基本图形处理，包括验证码的生成、图片缩放',
                'call'   => array('checkExtensionLoad', array('gd'))
            ),
            array(
                'name'   => 'PHP模块',
                'isMust' => false,
                'desc'   => 'imagick 模块用于图片缩放处理（Linux 系统建议启用，图片处理效果比 gd 要好很多）',
                'call'   => array('checkExtensionLoad', array('imagick'))
            ),
            array(
                'name'   => 'PHP模块',
                'isMust' => false,
                'desc'   => 'apc 代码缓存（Linux 系统建议启用，能极大的提升系统性能）',
                'call'   => array('checkExtensionLoad', array('apc'))
            ),
            array(
                'name'   => 'PHP模块',
                'isMust' => false,
                'desc'   => 'memcache 数据缓存（Linux 系统建议启用，能极大的提升系统性能）',
                'call'   => array('checkExtensionLoad', array('memcache'))
            ),
           array(
                'name'   => '目录权限',
                'isMust' => true,
                'desc'   => $bookpath . '/BKM/Runtime',
                'call'   => array('checkFilePermission', array($bookpath . '/BKM/Runtime'))
            ),
            array(
                'name'   => '目录权限',
                'isMust' => true,
                'desc'   => $bookpath . '/Book/Runtime',
                'call'   => array('checkFilePermission', array( $bookpath . '/Book/Runtime'))
            ),
            array(
                'name'   => '目录权限',
                'isMust' => true,
                'desc'   =>  $bookpath . '/public',
                'call'   => array('checkFilePermission', array($bookpath . '/public'))
            ),

        );

        $envCheckResultArray = array();

        // 挨个调用环境检查

        foreach ($envCheckConfigArray as $envCheckItem) {
            $checkResult           =
                call_user_func_array(array($this, $envCheckItem['call'][0]), $envCheckItem['call'][1]);
            $envCheckResultArray[] = array(
                'name'   => $envCheckItem['name'],
                'isMust' => $envCheckItem['isMust'],
                'desc'   => $envCheckItem['desc'],
                'value'  => $checkResult['value'],
                'isPass' => intval($checkResult['isPass']),
            );
        }

        $this->assign('checklist', $envCheckResultArray);
        $this->display();
	    }
}