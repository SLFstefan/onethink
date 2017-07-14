<?php
/**
 * Created by PhpStorm.
 * User: stefan
 * Date: 2017/7/10
 * Time: 17:40
 */

namespace Wchat\Model;


use Think\Model;
define('SN_NUMBER', 'repair'.uniqid());

class RepairModel extends Model
{
    protected $_validate = array(
        array('name', 'require', '报修人', self::MUST_VALIDATE , 'regex', self::MODEL_BOTH),
        array('tel', 'require', '报修人电话', self::MUST_VALIDATE , 'regex', self::MODEL_BOTH),
        array('address', 'require', '地址不能为空', self::MUST_VALIDATE , 'regex', self::MODEL_BOTH),
        array('title', 'require', '标题不能为空', self::MUST_VALIDATE , 'regex', self::MODEL_BOTH),
        array('problem', 'require', '内容不能为空', self::MUST_VALIDATE , 'regex', self::MODEL_BOTH),
    );

    protected $_auto = array(
        array('create_time', NOW_TIME, self::MODEL_INSERT),
        array('sn',SN_NUMBER, self::MODEL_INSERT),
        array('status', '0', self::MODEL_INSERT),
    );
}