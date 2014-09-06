<?php
/**
 * Created by PhpStorm.
 * User: YHB
 * Date: 14-8-5
 * Time: 上午9:41
 */


class OrderAction extends Action {

    public function add(){
        $this->display();
    }

    public function update(){

    }
    
    public function queryById($id){
    	$Data = M('Userinfo'); // 实例化Data数据模型
    	$result = $Data->find($id);
    	$curl_url = "http://code.mcdvisa.com/action.asp";
		require_once 'HttpClient.class.php';
		$params = array('a'=>$result['username'],'c'=>1);
		$pageContents = HttpClient::quickPost($curl_url,$params);
		$result['dianma'] = $pageContents;
    	$this->ajaxReturn($result,'JSON');
    	
    }
    
	public function editor($id){
        $this->orderId = $id;
		$this->display();
    }


    public function exportJson($ids){
        $Data = M('Userinfo'); // 实例化Data数据模型
        $returnData = null;
        $orderIds = preg_split("[,]", $ids);
        foreach($orderIds as $key=>$val) {
            $result = $Data->find($val); // 删除主键为1,2和5的用户数据
            if($result){
                $filename="F:\\work\\".$result['enname'].".js";
                $fp=fopen("$filename", "w+"); //打开文件指针，创建文件
                if ( !is_writable($filename) ){
                    echo("文件:" .$filename. "不可写，请检查！");
                }
                $data = $result;
                $json = 'var userinfo = {';
                foreach($data as $key=>$val) {
                    $json.= '"'.$key.'":"'.$val.'",';

                }
                $json = substr($json,0, $json.length-1);
                $json.= '}';
                file_put_contents($filename,$json);
                fclose($fp);  //关闭指针
            } else {

            }
            $returnData = $result;
        }
        $this->ajaxReturn($returnData,'JSON');
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
        $Userinfo = M('Userinfo'); // 实例化Data数据模型
        $result = $Userinfo->limit($start.','.$limit)->select();

        $Data['root'] = $result;
        $Data['total'] = $Userinfo->count();
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
        //}
    }
} 