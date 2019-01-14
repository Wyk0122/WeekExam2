<?php 
namespace app\index\controller;

use think\Controller;
use think\Db;
 header("content-type:text/html;charset=utf8");
class index extends controller{
	public function index(){
		return view();
	}
	//添加
	public function insert(){
		$data = input("post.");
		$name =$data['name'];
		$res = db('marathon_registration')->where("name = '$name'")->find();
		if($res){
			echo 1;
		}else{
			if($data['type']==""){
				$data['type'] = "半程";
			}
			$res = db('marathon_registration')->insert($data);
			if($res){
				echo 1;
			}else{
				echo 2;
			}
		}
		
	}
	//分页展示
	public function show(){
		$data = Db::name('marathon_registration')->paginate(3);
		$this->assign('data', $data);
		return $this->fetch();
	}
	//搜索
	public function serch(){
		$name = input("post.serch");
		$two = db('marathon_registration')->where("name = '$name'")->paginate(3);
		$this->assign('data', $two);
		return $this->fetch('show');
	}
	//修改
	public function update(){
		$id = input("get.id");
		$one = db('marathon_registration')->where("id = '$id'")->find();
		$this->assign('one',$one);
		return $this->fetch();
	}
	public function updatedo(){
		$data = input("post.");
		$res = db('marathon_registration')->update($data);
		if($res){
				echo 1;
			}else{
				echo 2;
			}
		}
}

 ?>