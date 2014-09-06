<?php
/**
 * Created by PhpStorm.
 * User: YHB
 * Date: 14-8-8
 * Time: 上午10:26
 */

class ServiceAction extends  Action {
	public function ask(){
		$this->display();
	}

	public function insert(){
		$Userinfo = D('Userinfo');
		if($Userinfo->create()) {
			$result =   $Userinfo->add();
			if($result) {
				$this->success('操作成功！');
			}else{
				$this->error('写入错误！');
			}
		}else{
			$this->error($Userinfo->getError());
        }
    }
} 