<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Processing
 *
 * @author dell
 */
class Processing extends dbconn {

    public function Retview(){
        
    }
//==============default notice board information================================
    public function ntcbrd(){
        $connection=$this->dbselect();
        
        
        
?>

<dl>
    <dt>Schools: 205</dt>
    <dd>>>Kajiado County: 26</dd>
    <dd>>>Kilifi County: 80</dd>
    <dd>>>Makueni County: 37</dd>
    <dd>>>Uasin Gishu County: 62</dd>
    <dt>Total Faulty Tablets:</dt>
    <dd>**Faulty Tablets From Kajiado:</dd>
    <dd>**Faulty Tablets From Kilifi:</dd>
    <dd>**Faulty Tablets From Makueni:</dd>
    <dd>**Faulty Tablets From Uasin Gishu:</dd>
   
</dl>
<?php
    }
//=================== get categories============================================
    public function catget(){
        $connect = $this->dbselect();
        $query="select * from categories";
        //get matched data
        $result= $connect->query($query);
?>
<div class="row">
    <div class="col-lg-6 col-lg-offset-3">
    <h3>Categories</h3>
    <table class="table table-bordered table-responsive table-striped"><thead><tr><td>Category ID</td><td>Category Name</td><td></td></td></tr></thead>
<?php
while ($row = mysqli_fetch_array($result)) {
            ?><tr><td><?php echo $row['catId'].'</td><td>'.$row['category'].'</td>'
                    . ' <td><a class="btn-sm btn-info"href="index.php?page=cated&&id='.$row['catId'].'"><span class="fa fa-edit">edit</span></a></td>'
                    . '</tr>'?>
<?php
        }
?>
            </table>
    <a class="btn btn-success" href="index.php?page=addcat" ><span class="fa fa-pencil">Add Category</span></a>
    </div>
    </div>
<?php
mysqli_close($connect);
    }
//===================================Edit Category=================================
    public function editcat($id) {
        //connect to db
        $connect= $this->dbselect();
        //Get category details
        $query="SELECT * FROM `categories` WHERE `catId`= $id";
        $result =$connect->query($query);
        if (mysqli_num_rows($result)==1){
            $row=  mysqli_fetch_array($result);
            ?>
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <h3 style="text-align: center"><small>Edit Category</small></h3>
    <form action="index.php?page=savecat" method="post">
        <div class="form-group">
            <input class="form-control" type="hidden" name="catid" value="<?php echo $row['catId']  ?>"/>
        </div>
        <div class="form-group">
            <label for="CatName">Category Name</label>
            <input class="form-control" type="text" name="CatName" value="<?php echo $row['category']  ?>"/>
        </div>
         <div class="form-group">
             <button type="submit" name="updt" class="btn-sm btn-success">Update</button>
             <a   class="btn-sm btn-success" href="index.php?page=categories">View Categories</a>
        </div>
        
    </form>
    </div>
</div>

<?php
        }
    }
//==========================================Save New Category=====================
    public function savecat($catName) {
        //check if category exists
        $connect=  $this->dbselect();
        $result= $connect->query("SELECT * FROM `categories` WHERE `category` like '%$catName'");
        if(mysqli_num_rows($result)==1){
            echo 'that category already exists';
        }
        else {
        $sql= "INSERT INTO categories (category)
                VALUES ('$catName')";
        $this->dbinsert($sql);
        
        }
    }
//======================================update category==========================
    public function catupdt($catName,$catID){
        //check if category exists
        $connect=  $this->dbselect();
        //$result= $connect->query("SELECT * FROM `categories` WHERE `category` like '%$catName'");
          $sql= 'UPDATE `categories` SET `category`="'.$catName.'" WHERE `catId`='.$catID;
          $this->dbinsert($sql);
          mysqli_close($connect);
          $this->catget();
    }
}


