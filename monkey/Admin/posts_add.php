<?php
    // Kết nối Database
    require_once '../config/config.php';
    $id=$_GET['id'];
    $query=mysqli_query($link,"select * from `posts` where id='$id'");
    $rows=mysqli_fetch_all($query); 
    foreach($rows as $row){
    ?>
        <form name="edit_course" action="posts_edit.php?edit=<?php echo $row['0']; ?>" method="POST">
            <table class="table-form-edit" align="center" bgcolor="#FFFFFF">

            <tr>
                                    <td>Title</td>
                                    <td><input type="text" name="title" value="<?php echo $row['2']; ?>" size="40"></td>
                                </tr>
                                <tr>
                                    <td>Image</td>
                                    <td><input type="text" name="image" value="<?php echo $row['4']; ?>" size="40"></td>
                                </tr>
                                <tr>
                                    <td>Body</td>
                                    <td><input type="text" name="body" value="<?php echo $row['5']; ?>" size="40"></td>
                                </tr>

                                <tr>
                                    <td>Published</td>
                                    <td>
                                        <select name="published" >
                                            <option selected="selected" selected><?php echo $row['6']; ?></option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="posts_update.php"><input type="submit" value="Lưu lại" name="submit"></a>
                                </tr>
            </table>
            
        </form>
        <?php } ?>
        <div class="container-fluid fixed-bottom text-center" id="footer " style="background-color: #2d2a2a; ">
            <div class="row">
                <div class="col-12">
                    <img src="images/mailicon.png " alt=" " id="mailicon ">
                </div>
                <div class="col-12">
                    <a href=" ">mail@datamonkey.pro</a>                    
                </div>
                <div class="col-12">
                 <p class="text-light">Datamonkey &copy 2020</p>
                </div>
            </div>


        </div>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
        </script>
</body>

</html>