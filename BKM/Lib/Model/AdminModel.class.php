<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-4-2
 * Time: 上午10:16
 */
class AdminModel extends Model
{
    protected $tableName='manager';
    protected $fields=array('AdminId','AdminName','AdminPwd','AdminFlag','_pk'=>'AdminId',
    '_autoinc'=>TRUE);
    protected $_map=array(
        'username'=>'AdminName',
        'password'=>'AdminPwd',
    );
    public function getTopUser()
    {
        echo "ddd";
    }
}