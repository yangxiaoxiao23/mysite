<?php
/**
 * Created by PhpStorm.
 * User: YHB
 * Date: 14-8-5
 * Time: 上午9:41
 */

class QuestionAction extends Action {


    public function add(){
        $this->display();
    }

    public function update(){

    }

    public function delete($id){
        $Data = M('Question'); // 实例化Data数据模型
        $result = $Data->delete($id); // 删除主键为1,2和5的用户数据
        if($result){
            $data['status'] = true;
            $data['record'] = $result;
        } else {
            $data['status'] = false;
            $data['record'] = 0;
        }
        $this->ajaxReturn($data,'JSON');
    }

    public function read($start, $limit){
        $Question = M('Question'); // 实例化Data数据模型
        $result = $Question->limit($start.','.$limit)->select();

        $Data['root'] = $result;
        $Data['total'] = $Question->count();
        if ($Data){
            // 成功后返回客户端新增的用户ID，并返回提示信息和操作状态
            $this->ajaxReturn($Data,'JSON');
        }else{
            // 错误后返回错误的操作状态和提示信息
            $data['status'] = false;
            $this->ajaxReturn($data,'JSON');
        }
    }

    public function insert(){
        //for($i=0;$i<356;$i++){
            $Question = D('Question');
            if($Question->create()) {
                $result =   $Question->add();
                if($result) {
                    $this->success('操作成功！');
                }else{
                    $this->error('写入错误！');
                }
            }else{
                $this->error($Question->getError());
            }
        //}
    }
} 