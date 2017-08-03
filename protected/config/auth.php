<?php
/**
 * Created by PhpStorm.
 * User: alexander.andreev
 * Date: 03.08.2017
 * Time: 13:06
 */
return array(
    'guest' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Guest',
        'bizRule' => null,
        'data' => null
    ),
    'user' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'User',
        'children' => array(
            'guest', // унаследуемся от гостя
        ),
        'bizRule' => null,
        'data' => null
    ),
    'administrator' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Administrator',
        'children' => array(
            'user',         // позволим админу всё, что позволено юзеру
        ),
        'bizRule' => null,
        'data' => null
    ),
);