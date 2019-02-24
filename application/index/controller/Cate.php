<?php
namespace app\index\controller;
use think\Db;
use app\index\controller\Base;

class Cate extends Base
{
    public function index()
    {
        $article_id = input('cateid');
        $articles = Db('article')->where('cateid',$article_id)->paginate(2);
        $cateNameByID = Db('cate')->where('id',$article_id)->find();
        $this->assign('cateNames',$cateNameByID);
        $this->assign('articles',$articles);
        return $this->fetch('cate');
    }
}
