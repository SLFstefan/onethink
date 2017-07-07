<?php
/**
 * Created by PhpStorm.
 * User: stefan
 * Date: 2017/7/6
 * Time: 22:43
 */

namespace Admin\Model;


use Think\Model;

class SaleModel extends Model
{
    protected $_validate = array(
        array('name', 'require', '发布人', self::MUST_VALIDATE , 'regex', self::MODEL_BOTH),
        array('tel', 'require', '发布人电话', self::MUST_VALIDATE , 'regex', self::MODEL_BOTH),
        array('title', 'require', '标题不能为空', self::MUST_VALIDATE , 'regex', self::MODEL_BOTH),
        array('type', 'require', '类型不能为空', self::MUST_VALIDATE , 'regex', self::MODEL_BOTH),
        array('price', 'require', '价格不能为空', self::MUST_VALIDATE , 'regex', self::MODEL_BOTH),
    );

    protected $_auto = array(
        array('create_time', NOW_TIME, self::MODEL_INSERT),
        // array('end_time', NOW_TIME, self::MODEL_INSERT),
        array('status', '1', self::MODEL_INSERT),
    );
}