<?php
include '../core/db.php';

class wechat extends db
{
    public function feeds()
    {
        $data=$this->pdo->query('select * from feeds' )->fetchAll();
        echo json_encode($data);
    }
    public function insert()
    {
        $data=$this->pdo->prepare("insert into feeds(user_name,content,imgs,user_head,publisc_address)values(?,?,?,?,?)");
        $data->bindValue(1, $_GET["user_name"]);
        $data->bindValue(2, $_GET["content"]);
        $data->bindValue(3, $_GET["imgs"]);
        $data->bindValue(4, $_GET["user_head"]);
        $data->bindValue(5, '5');

        echo $data->execute();
    }
    // 给我图片我帮你存了，返回图片的资源名字
    public function  upload(){

//        print_r($_FILES);
        $src = $_FILES['file']['tmp_name'];
        $file_name = $_FILES['file']['name'];
        $dist = "./assets/wechat/".$file_name;
        move_uploaded_file($src, $dist);
        echo  'http://news.tgg.com/assets/wechat/'.$file_name;
    }
}