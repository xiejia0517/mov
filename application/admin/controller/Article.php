<?php
namespace app\admin\controller;
use app\admin\controller\Base;
use think\Db;
use app\admin\model\Article as ArticleModel;
class Article extends Base
{
    public function lst()
    {
        
        //$list = ArticleModel::paginate(3);
        //$list = db('article')->alias('a')->join('cate c','c.id = a.cateid')->field('a.id,a.title,a.author,a.desc,a.keywords,a.content,a.pic,a.click,a.state,a.time,a.cateid,c.catename')->paginate(5);
        $list = ArticleModel::paginate(5);
        $this -> assign('list',$list);
        //echo 'admin模块';
        return $this->fetch();
        
    }

    public function add()
    {
       
        //SendMail("xiejia0517@126.com","aaaaaaaaaa","Xavier_aaa_aaa_aaa_aaa_aaa");

        if(request()->ispost())
        {
            //dump($_POST);die;
            //创建数据校验规则
            // $validate = new \think\Validate(['username'=>'require|min:6|max:25','password'=>'require|max:34',]);
            $data = [
                'title' => input('title'),
                'author' => input('author'),
                'desc' => input('desc'),
                'keywords' => input('keywords'),
                'content' => input('content'),
                'cateid' => input('cateid'),
                'time' => time(),
            ];
            if(input('state' == 'on'))
            {
                $data['state'] = 1;
            }
            if($_FILES['pic']['tmp_name'])
            {
                $file = request()->file('pic');
                $info = $file->move(ROOT_PATH . 'public' . DS . 'static/uploads');
                $data['pic'] = '/uploads/' . $info->getSaveName();
            }
            // $validate = \think\Loader::validate('Article');
            // if(!$validate->scene('add')->check($data)){
            //     $this->error($validate->getError());
            //     die;
            

            // }
            //dump(input('post.'));
            //执行验证
            // if(!$validate->check($data)){
            //     $this->error($validate->getError());
            //     die;
            // }
            if(Db::name('Article')->insert($data))
            {
                return $this->success('添加成功','lst');
            }else
            {
                return $this->error('添加失败！');
            }
            return;
        }
        $cateres = db('cate')->select();
        $this->assign('cateres',$cateres);
        //echo 'Article模块';
        return $this->fetch('add');
    }

    public function edit()
    {
        $id = input('id');
        $articles = db('Article')->find($id);
        $cateres = db('cate')->select();
        //dump(input('title')); die;
        if(request()->ispost())
        {
            $data = [
                'id' =>input('id'),
                //'title'=>input('title'),
                'author' => input('author'),
                'desc' => input('desc'),
                'keywords' => input('keywords'),
                'content' => input('content'),
                'cateid' => input('cateid'),
                //'desc' => input('desc'),
                //'keywords' => input('keywords'),
                //'content' => input('content'),
                //'cateid' => input('cateid'),
                //'time' => time(),
            ];
            if(input('title'))
            {
                $data['title'] = input('title');
            }
            else
            {
                $data['title'] = $articles['title'];
            }
            if(input('state') == 'on')
            {
                $data['state'] = 1;
            }
            else{
                $data['date'] = 0;
            }
            if($_FILES['pic']['tmp_name'])
            {
                $file = request()->file('pic');
                $info = $file->move(ROOT_PATH . 'public' . DS . 'static/uploads');
                $data['pic'] = '/uploads/' . $info->getSaveName();
            }
            // 调用验证模块
                // $validate = \think\Loader::validate('User');
                // if(!$validate->scene('edit')->check($data)){
                //     $this->error($validate->getError());
                //     die;
                // }
            if(db('article')->update($data))
            {
                $this->success('修改用户信息成功!','lst');
            }
            else
            {
                $this->error('修改失败!');
            }
            return;
        }
        $this->assign('articles',$articles);
        $this->assign('cateres',$cateres);
        return $this->fetch();
    }

    public function del()
    {
        $id = input('id');
        // if(db('article')->delete($id))
        // {
        //     $this->success('删除成功','lst');
        // }
        db('article')->delete($id);
        $list = ArticleModel::paginate(5);
        $this -> assign('list',$list);
        return $this->fetch('lst');
    }
    
}
