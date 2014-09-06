<?php
/**
 * Created by PhpStorm.
 * User: YHB
 * Date: 14-8-2
 * Time: 下午4:35
 */

class ArticleAction extends Action {

    public function read($id=1){
        $Question   =   M('Question'); // 实例化Data数据模型
        // 读取数据
        $data =   $Question->find($id);
        if($data) {
            $this->data =   $data;// 模板变量赋值
        }else{
            $this->error('数据错误');
        }
        $this->display('content');
    }
} 