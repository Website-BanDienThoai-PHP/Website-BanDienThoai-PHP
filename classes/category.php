<?php
    include '../lib/database.php';
    include '../helpers/format.php';

?>
<?php 
    class category {
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        
        public function insert_category($catName){
            $catName = $this->fm->validation($catName);
          

            $catName = mysqli_real_escape_string($this->db->link, $catName);
           

            if (empty($catName) ){
                $aleart = "<span class ='error' >Category must be not empty</span>";
                return $aleart;
            }else {
                $query = "INSERT INTO tbl_category(catName) value('$catName')";
                $result = $this->db->insert($query);
                if ($result ){
                    $aleart = "<span class ='success'>Insert Category Successfully</span>";
                    return $aleart;
                }else{
                    $aleart = "<span class ='error'>Insert Category Not Successfully</span>";
                    return $aleart;
                }
            }

        }
        public function show_category(){
            $query = "SELECT * FROM tbl_category order by catId desc ";
            $result = $this->db->select($query);
            return $result;
        }
        public function getcatebyId($id){
            $query = "SELECT * FROM tbl_category where catId = '$id'  ";
            $result = $this->db->select($query);
            return $result;
        }
        public function del_category($id){
            $query = "DELETE * FROM tbl_category where catId = '$id'  ";
            $result = $this->db->delete($query);
            if ($result ){
                $aleart = "<span class ='success'> Category Delete Successfully</span>";
                return $aleart;
            }else{
                $aleart = "<span class ='error'> Category Delete Not Successfully</span>";
                return $aleart;
            }
        }
    }

    

?>