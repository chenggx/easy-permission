<?php

if (!function_exists('makeTree')) {
    /**
     * 生成树形无限极分类
     * @param  array  $list
     * @param  string  $pk
     * @param  string  $pid
     * @param  string  $child
     * @param  int  $root
     * @return array
     */
    function makeTree(array $list, string $pk = 'id', string $pid = 'pid', string $child = 'children', int $root = 0)
    {
        $tree = [];
        foreach ($list as $key => $val) {
            if ($val[$pid] == $root) {
                //获取当前$pid所有子类
                unset($list[$key]);
                if (!empty($list)) {
                    $tmpChild = makeTree($list, $pk, $pid, $child, $val[$pk]);
                    if (!empty($tmpChild)) {
                        $val[$child] = $tmpChild;
                    }
                }
                $tree[] = $val;
            }
        }
        return $tree;
    }
}