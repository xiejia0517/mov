<?php
namespace app\admin\controller;
use think\Db;
use app\admin\controller\Base;
use app\admin\model\Admin as AdminModel;
class Admin extends Base
{
    
    public function lst()
    {
        
       $list = AdminModel::paginate(3);
        $this -> assign('list',$list);
        //echo 'admin模块';
        return $this->fetch();
        
    }

    public function add()
    {

        //SendMail("xiejia0517@126.com","aaaaaaaaaa","Xavier_aaa_aaa_aaa_aaa_aaa");

        if(request()->ispost())
        {
            //创建数据校验规则
            // $validate = new \think\Validate(['username'=>'require|min:6|max:25','password'=>'require|max:34',]);
            $data = ['username'=>input('username'),'password'=>md5(input('password'))];

            $validate = \think\Loader::validate('Admin');
            if(!$validate->scene('add')->check($data)){
                $this->error($validate->getError());
                die;
            }
            //dump(input('post.'));
            //执行验证
            // if(!$validate->check($data)){
            //     $this->error($validate->getError());
            //     die;
            // }
            if(Db::name('admin')->insert($data))
            {
                return $this->success('添加成功','lst');
            }else
            {
                return $this->error('添加失败！');
            }
            return;
        }
        //echo 'admin模块';
        return $this->fetch('add');
    }

    public function edit()
    {
        $id = input('id');
        $admins = db('admin')->find($id);
        if(request()->ispost())
        {
            $data = [
                'id' => input('id'),
                'username' => input('username'),
            ];
            if(input('password'))
                {
                    $data['password'] = md5(input('password'));
                }
                else
                {
                    $data['password'] = $admins['password'];
                }
            // 调用验证模块
            $validate = \think\Loader::validate('Admin');
            if(!$validate->scene('edit')->check($data)){
                $this->error($validate->getError());
                die;
            }
            $save = db('admin')->update($data);
            if($save !== false)
            {
                $this->success('修改用户信息成功!','lst');
            }
            else
            {
                $this->error('修改失败!');
            }
            return;
        }
        
        $this->assign('admins',$admins);
        return $this->fetch();
    }

    public function del()
    {
        $id = input('id');
        db('admin')->delete($id);
        $list = AdminModel::paginate(5);
        $this -> assign('list',$list);
        return $this->fetch('lst');
        // $id = input('id');
        // if($id != 1)
        // {
        //     if(db('admin')->delete('$id'))
        //     {
        //         $this->success('删除管理员成功!');
        //     }
        //     else
        //     {               
        //        $this->error('删除操作失败!');
        //     }
        // }
        // else
        // {
        //     // echo "<script>alert('提示内容')</script>";
        //     $this->error('初始化管理员不可删除！');
        // }
    }
    public function logout()
    {
        session(null);
        $this->redirect('login/index');
    }
    
}
