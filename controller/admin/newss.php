<?php
include '../core/db.php';

class newss extends db{

    const PER_PAGE = 20;
    public function actiondelete()
    {
        echo $count = $this->pdo->exec("delete from news where id =".$_GET["id"]);
    }
    public function actionupdate(){
        $stmt = $this->pdo->prepare("update news set ".$_GET['k']."= ? where id=?");
        $stmt->bindValue(1, $_GET["v"]);
        $stmt->bindValue(2, $_GET["id"]);

        echo $stmt->execute();
    }
    public function actioninsert()
    {
        $stmt = $this->pdo->prepare("insert into news(cid,title,dsc,image,url,create_time)values(?,?,?,?,?,?)");
        $stmt->bindValue(1, " ");
        $stmt->bindValue(2, " ");
        $stmt->bindValue(3, " ");
        $stmt->bindValue(4, " ");
        $stmt->bindValue(5, " ");
        $stmt->bindValue(6, " ");
        echo $stmt->execute();
    }


    public function actionview()
    {
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }

        $num = $this->pdo
            ->query('select count(*) as total from news ')
            ->fetch()['total'];

        $page_total = ceil($num / $this::PER_PAGE);


        $stmt = $this->pdo->query('select * from news limit '.$this::PER_PAGE.' offset ' . ($page - 1) * $this::PER_PAGE)
            ->fetchAll();


        include ("../views/admin/jiehe.html");
    }
    public function actionabcd()
    {
        $stmt = $this->pdo->query('select * from news');
        $rows = $stmt->fetchAll();
        include ("../views/admin/bawangye-b.html");
    }
}



