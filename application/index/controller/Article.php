<?php
namespace app\index\controller;
use app\index\controller\Base;
use think\Db;

class Article extends Base
{
    public function index()
    {
        $id = input('article_id');
        $articles = Db('article')->where('id',$id)->find();
        $c_catename = Db('cate')->where('id',$articles['cateid'])->find();
        $this->assign('articles',$articles);
        $this->assign('c_catename',$c_catename);
        return $this->fetch('article');
    }
}
