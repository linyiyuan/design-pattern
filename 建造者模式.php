<?php 
/**
 * Class Role
 * @Author YiYuan-LIn
 * @Date: 2019/8/15
 * 定义一个角色类
 */
class Role
{
    /**
     * 姓名
     * @var string
     */
    public $name;

    /**
     * 攻击力
     * @var integer
     */
    public $power;

    /**
     * 攻速
     * @var float
     */
    public $attack_speed;

    /**
     * 暴击
     * @var integer
     */
    public $crit;

    /**
     * @Author YiYuan-LIn
     * @Date: 2019/8/15
     * @description 显示信息
     */
    public function display()
    {
        echo '姓名：' . $this->name . '<br>';
        echo '攻击力：' . $this->power . '<br>';
        echo '攻击速度：' . $this->attack_speed . '<br>';
        echo '暴击几率：' . $this->crit . '<br>';
    }
}

/**
 * Class RoleBuilder
 * @Author YiYuan-LIn
 * @Date: 2019/8/15
 * 定义一个射手抽象类
 */
abstract class RoleBuilder
{
    public $_role;

    /**
     * ShooterBuilder constructor.
     * 初始化一个射手
     */
    public function __construct()
    {
        $this->_role = new Role();
    }

    /**
     * @Author YiYuan-LIn
     * @Date: 2019/8/15
     * @enumeration:
     * @return mixed
     * @description 设置名字
     */
    abstract public function setName();

    /**
     * @Author YiYuan-LIn
     * @Date: 2019/8/15
     * @enumeration:
     * @return mixed
     * @description 设置力量值
     */
    abstract public function setPower();

    /**
     * @Author YiYuan-LIn
     * @Date: 2019/8/15
     * @enumeration:
     * @return mixed
     * @description 设置攻击速度
     */
    abstract public function setAttackSpeed();

    /**
     * @Author YiYuan-LIn
     * @Date: 2019/8/15
     * @enumeration:
     * @return mixed
     * @description 设置暴击几率
     */
    abstract public function setCrit();

    /**
     * @Author YiYuan-LIn
     * @Date: 2019/8/15
     * @enumeration:
     * @return mixed
     * @description 建立角色
     */
    abstract public function builder();

}


/**
 * Class Ez
 * @Author YiYuan-LIn
 * @Date: 2019/8/15
 * 定义个伊泽瑞尔射手
 */
class Ez extends RoleBuilder
{
    public function setName()
    {
        // TODO: Implement setName() method.
        $this->_role->name = '伊泽瑞尔';
    }

    public function setPower()
    {
        // TODO: Implement setPower() method.
        $this->_role->power = 100;
    }

    public function setAttackSpeed()
    {
        // TODO: Implement setAttackSpeed() method.
        $this->_role->attack_speed = 0.75;
    }

    public function setCrit()
    {
        // TODO: Implement setCrit() method.
        $this->_role->crit = 0;
    }

    public function builder()
    {
        // TODO: Implement builder() method.
        return $this->_role;
    }
}

/**
 * Class AoBaMa
 * @Author YiYuan-LIn
 * @Date: 2019/8/15
 * 定义一个奥巴马的角色
 */
class AoBaMa extends RoleBuilder
{
    public function setName()
    {
        // TODO: Implement setName() method.
        $this->_role->name = '奥巴马';
    }

    public function setPower()
    {
        // TODO: Implement setPower() method.
        $this->_role->power = 200;
    }

    public function setAttackSpeed()
    {
        // TODO: Implement setAttackSpeed() method.
        $this->_role->attack_speed = 2.50;
    }

    public function setCrit()
    {
        // TODO: Implement setCrit() method.
        $this->_role->crit = 100;
    }

    public function builder()
    {
        // TODO: Implement builder() method.
        return $this->_role;
    }
}

class RoleDirector
{
    private $_role;
    public function __construct(RoleBuilder $role)
    {
        $this->_role = $role;
    }

    public function build()
    {
        $this->_role->setName();
        $this->_role->setPower();
        $this->_role->setAttackSpeed();
        $this->_role->setCrit();

        return $this->_role->builder();
    }
}


$anBaMaRole = new RoleDirector(new AoBaMa());
$anBaMaRole = $anBaMaRole->build();
$anBaMaRole->display();

//var_dump($anBaMaRole);
echo '<br>';

$ezRole = new RoleDirector(new Ez());
$ezRole = $ezRole->build();
$ezRole->display();

//var_dump($ezRole);

 ?>