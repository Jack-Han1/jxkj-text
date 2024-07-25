<?php
namespace Admin\Controller;
use Think\Controller;

class SearchController extends CommonController
{
    function _initialize(){
        parent::_initialize();
    }

    public function index(){
	    $txt=I("get.txt");
	    $this->assign('txt',$txt);
    	if(!empty(I("get."))){
	    	$txt=preg_replace("/(\s+)/"," ",$txt);
	    	$txt=trim($txt," ");
	    	$search_arr=explode(" ",$txt);
	    	// var_dump($search_arr);
	    	foreach($search_arr as $key =>$value){
	    		$search_arr2[$key]="%".$value."%";
	    	}
	    	$where['name']  = array('like',$search_arr2,"AND");
			$where['abstract']  = array('like',$search_arr2,"AND");
			$where['content']  = array('like',$search_arr2,"AND");
			$where['_logic'] = 'or';
			$map['_complex'] = $where;
			$map['status']  = array('eq',2);
	    	$article=M("article")->field("id,article_time,name,abstract")->where($map)->select();
	    	// var_dump(mb_strlen($article[0]['abstract']));
	    	// var_dump(M("article")->getLastSql());
	    	// var_dump($article);
	    	$articleCount=count($article);
	    	foreach($article as $key => $val){
	    		foreach($search_arr as $key2 => $val2){
	    			$article[$key]['name']=str_replace($val2,"<span style='color:red;'>".$val2."</span>",$article[$key]['name']);
	    			$article[$key]['abstract']=str_replace($val2,"<span style='color:red;'>".$val2."</span>",$article[$key]['abstract']);
	    		}
	    		// $article[$key]['name']=str_replace($txt,"<span style='color:red;'>".$txt."</span>",$val['name']);
	    		$date=explode(" ",$val['article_time']);
	    		$article[$key]['Ymd']=explode("-",$date[0]);
	    	}
	    	// var_dump($article);
	    	$product=M("product")->where(array('name'=>$txt,'status'=>2))->select();
	    	$productCount=count($product);
	    	$this->assign('product',$product);
	    	$count=$articleCount+$productCount;
	    	// var_dump(M("article")->getLastSql());
	    	$this->assign("count",$count);
	    	$this->assign("article",$article);
	    	if(!empty($article) || !empty($product)){
	    		$this->display('search');
	    	}else{
	    		$this->display();	
	    	}
    	}else{
        	$this->display();
    	}
    }

}


