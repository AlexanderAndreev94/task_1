<?php

/**
 * Created by PhpStorm.
 * User: alexander.andreev
 * Date: 03.08.2017
 * Time: 10:39
 */
class CategoryTree extends CWidget
{
    public $offset;

    public function run()
    {
        $model = Category::model()->findAll('status=1');

        $menu = [];

        foreach ($model as $item)
        {
            $menu[$item->id]['label'] = $item->title;
            $menu[$item->id]['url'] = 'index.php?r=site/index&catId='.$item->id.'&offset='.$this->offset;
        }


        $this->render('tree', ['menu' => $menu]);
    }
}