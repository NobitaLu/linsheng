<?php
namespace app\admin\controller;
use think\Controller;

class Index extends Controller
{
    public function index()
    {
    	$model = model('Ajax');
    	$data = $model->all();
        return $this->fetch('',[
        	'data' => $data,
        ]);
    }

    public function add($id){
    	$model = model('Ajax');
    	$data = $model->get(intval($id));
    	$res = $model->update(['number' => $data['number']+1],['id'=> $id]);
    	if ($res) {
    		$this->result($_SERVER['HTTP_REFERER'],1,'success');
    	}
    }

    public function edd($id){
    	$model = model('Ajax');
    	$data = $model->get(intval($id));
    	$res = $model->update(['number'=>$data['number']-1],['id'=>$id]);
    	if ($res) {
    		$this->result($_SERVER['HTTP_REFERER'],1,'error');
    	}
    }
}
