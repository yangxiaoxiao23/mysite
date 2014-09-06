<?php

import("ORG.Util.String");

// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    public function index(){
        $this->queryAll();
    }

    public function queryAll(){
        $Data = M('Question'); // 实例化Data数据模型

        $Question = $Data->select();

        foreach ($Question as $key => $value) {
            $content = mb_substr($value['content'], 0 , 100, 'utf-8');
            $content = strip_tags($content);
            $Question[$key]['content'] = $content.'...';
        }

        $this->data = $Question;
        $this->display();
    }
}