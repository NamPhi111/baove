<?php
    class Addmin extends BaseModel{ 
        public function check($data){
            $sql= 'select * FROM addmin WHERE addminname = :addminname and password=:password';
            $stmt=$this->pdo->prepare($sql);
            $stmt->execute($data);
            $addmin=$stmt->fetch();
            return $addmin;
        }

    }
?>