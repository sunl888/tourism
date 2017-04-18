<?php
namespace App\Models\Traits;
use App\Models\Classes;

/**
 * Created by PhpStorm.
 * User: Sunlong
 * Date: 2017/3/20
 * Time: 13:23
 */
trait TourismTrait
{
    /**
     * 获取栏目列表
     * @return array
     */
    public function getClasses()
    {
        $classes = Classes::orderBy('sort','desc')->get()->toArray();

        $classes = array_column($classes, null, 'id');

        foreach ($classes as $item => $val) {
            if ($val['parent_id']) {
                $classes[$val['parent_id']]['child'][] = $val;
                unset($classes[$item]);
            }
        }
        return $classes;
    }

    /**
     * 获取该类别的id以及其子类别id
     * @param int $class_id
     * @return array
     */
    public function getChildClass($class_id = 0)
    {
        $result = array();
        $classes = Classes::all()->toArray();
        foreach ($classes as $item){
            if($item['id'] ==$class_id || (string)$item['parent_id'] ==$class_id){
                $result[] = $item['id'];
            }
        }
        return $result;
    }
}