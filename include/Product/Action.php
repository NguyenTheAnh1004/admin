<?php
    session_start();
	include_once('../../config/conect.php');
    
?>
<?php
if(isset($_POST["action"])){
    if($_POST["action"]=="editcategory"){
        $id = $_POST['id'];
 		$CateName= $_POST['cateName'];
        $DisplayOrder = $_POST['displayOrder'];
    
        $sql_update = mysqli_query($con,"UPDATE tbl_category SET category_name='$CateName' , category_displayorder='$DisplayOrder' WHERE category_id='$id'");
    }
    elseif($_POST["action"]=="addcategory"){
 		$CateName= $_POST['cateName'];
        $DisplayOrder = $_POST['displayOrder'];
 
        $sql_add = mysqli_query($con,"INSERT INTO tbl_category(category_name,category_displayorder) values ('$CateName','$DisplayOrder')");
    }
    elseif($_POST["action"]=="removecategory"){
        $id= $_POST['id'];
        $sql_delete = mysqli_query($con,"DELETE FROM tbl_category WHERE category_id='$id' ");
    }
    elseif($_POST["action"]=="addproduct"){
        $Name= $_POST['Name'];
        $filename= $_FILES['filename']['name'];
        $filenametmp= $_FILES['filename']['tmp_name'];
        $Quanity= $_POST['Quanity'];
        $Price= $_POST['Price'];
        $Discount= $_POST['Discount'];
        $Description= $_POST['Description'];
        $Category= $_POST['Category'];
        $sql_add = mysqli_query($con,"INSERT INTO tbl_sanpham(category_id,sanpham_name,sanpham_chitiet,sanpham_gia,sanpham_discount,sanpham_soluong,sanpham_image) values 
        ('$Category','$Name','$Description','$Price','$Discount','$Quanity','$filename')");
        $location = '../../uploadimg/';
        move_uploaded_file($filenametmp,$location.$filename);
    }
    elseif($_POST["action"]=="editproduct"){
        $id=$_POST['ID'];
        $Name= $_POST['Name'];
        $linkImage = $_POST['image'];
        $linkImage = explode('/',$linkImage);
        $filename = end($linkImage);
        if (isset($_FILES['filename']['name'])){
            $filename= $_FILES['filename']['name'];
        }
       
        $Quanity= $_POST['Quanity'];
        $Price= $_POST['Price'];
        $Discount= $_POST['Discount'];
        $Description= $_POST['Description'];
        $Category= $_POST['Category'];
        $sql_eidt = mysqli_query($con,"UPDATE tbl_sanpham 
        SET category_id='$Category', sanpham_name='$Name',sanpham_chitiet='$Description', sanpham_gia='$Price', sanpham_discount='$Discount',sanpham_soluong='$Quanity' ,sanpham_image='$filename'
        WHERE sanpham_id='$id'  "); 
        $location = '../../uploadimg/';
        move_uploaded_file($_FILES['filename']['tmp_name'],$location.$filename);
        echo $filename;
    }
    elseif($_POST["action"]=="removeproduct"){
        $id= $_POST['id'];
        $sql_delete = mysqli_query($con,"DELETE FROM tbl_sanpham WHERE sanpham_id='$id' ");
    }

}
?>