<?php
/*
 * This class contains all methods for adding, viewing, updating Categories
 */

/**
 *
 * @author Joseph Mwangi
 */
class Issues extends dbconn {
    /*
     * display all categories in the database
     */

    public function catget() {
        $connect = $this->dbselect();
        $query = "select * from categories";
        //get matched data
        $result = $connect->query($query);
        ?>
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <h3 class="item_heading">Issues</h3>
                <table class="table table-bordered table-responsive table-striped"><thead><tr><td>Issue ID</td><td>Issue Name</td><td></td></td></tr></thead>
                    <?php
                            while ($row = mysqli_fetch_array($result)) {
                                ?><tr><td><?php
                                        echo $row['catId'] . '</td><td>' . $row['category'] . '</td>'
                                        . ' <td><a class="btn-sm btn-info"href="issues_view.php?page=edit&&id=' . $row['catId'] . '"><span class="fa fa-edit">edit</span></a></td>'
                                        . '</tr>'
                                        ?>
                                        <?php
                                    }
                                    ?>
                </table>
                <a class="btn btn-success" href="issues_view.php?page=add" ><span class="fa fa-plus">Add an Issue</span></a>
            </div>
        </div>
        <?php
        mysqli_close($connect);
    }

    /*
     * this function is used to edit an existing Issue
     */

    public function editcat($id) {
        //connect to db
        $connect = $this->dbselect();
        //Get issue details
        $query = "SELECT * FROM `categories` WHERE `catId`= $id";
        $result = $connect->query($query);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            ?>
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <h3 style="text-align: center"><small>Edit Issue</small></h3>
                    <form action="issues_view.php?page=save" method="post">
                        <div class="form-group">
                            <input class="form-control" type="hidden" name="catid" value="<?php echo $row['catId'] ?>"/>
                        </div>
                        <div class="form-group">
                            <label for="CatName">Issue Name</label>
                            <input class="form-control" type="text" name="CatName" value="<?php echo $row['category'] ?>"/>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="updt" class="btn-sm btn-success">Update</button>
                            <a   class="btn-sm btn-success" href="index.php?page=categories">View Issues</a>
                        </div>

                    </form>
                </div>
            </div>

            <?php
        }
    }

    /*
     * Save a new issue
     */

    public function savecat($catName) {
        //check if issue exists
        $connect = $this->dbselect();
        $result = $connect->query("SELECT * FROM `categories` WHERE `category` like '%$catName'");
        if (mysqli_num_rows($result) == 1) {
            echo '<div class="alert alert-danger alert-dismissable">that issue already exists</div>';
        } else {
            $sql = "INSERT INTO categories (category)
                VALUES ('$catName')";
            $this->dbinsert($sql);
        }
    }

    /*
     * update an edited issue
     */

    public function catupdt($catName, $catID) {
        //check if issue exists
        $connect = $this->dbselect();
        //$result= $connect->query("SELECT * FROM `categories` WHERE `category` like '%$catName'");
        $sql = 'UPDATE `categories` SET `category`="' . $catName . '" WHERE `catId`=' . $catID;
        $this->dbinsert($sql);
        mysqli_close($connect);
        $this->catget();
    }

}
