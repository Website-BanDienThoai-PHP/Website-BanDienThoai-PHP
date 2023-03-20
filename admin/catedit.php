<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include'../classes/category.php' ?>

<?php
    if (!isset($_GET['catId']) || $_GET['catId']== NULL){
        echo "<script>'window.location='catlist.php</script>";   
    }else {
        $id = $_GET['catId'];
    }
	$cat = new category();
	
?> 
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Thêm danh mục</h2>
                
               <div class="block copyblock"> 
               <?php 
                    if(isset($insertCat)){
                        echo $insertCat;
                    }
                ?>
                <?php 
                   $get_cate_name = $cat->getcatebyId($id);
                   if( $get_cate_name){
                    while($result = $get_cate_name->fetch_assoc()){
                ?>
                 <form action="catadd.php" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $result['catName'] ?>" name ="catName" placeholder="Sửa danh mục sản phẩm ở đây" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Edit" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php 
                     }
                    }?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>