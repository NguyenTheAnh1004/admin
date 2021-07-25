 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Product</h1>


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
            <span data-toggle="modal" data-target="#addModal">
                <button title="Add Product" class="btn btn-primary"><i class="fas fa-plus-circle"></i></button>
            </span>
    </div>
    
    <div class="card-body">
        <div class="table-responsive">
            <?php
				$sql_select = mysqli_query($con,"SELECT * FROM tbl_sanpham,tbl_category WHERE tbl_sanpham.category_id=tbl_category.category_id;"); 
			?>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Quanity</th>
                        <th>Discount</th>
                        <th>Description</th>
                        <th>Cate</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
					while($row_product = mysqli_fetch_array($sql_select)){ 
					?>
                    <tr>
                        <td><?php echo $row_product['sanpham_id'] ?></td>
                        <td><?php echo $row_product['sanpham_name'] ?></td>
                        <td><img style="width: 70px; height: 70px;" src="./uploadimg/<?php echo $row_product['sanpham_image'] ?>" /></td>
                        <td><?php echo $row_product['sanpham_gia'] ?></td>
                        <td><?php echo $row_product['sanpham_soluong'] ?></td>
                        <td><?php echo $row_product['sanpham_discount'] ?></td>
                        <td><?php echo $row_product['sanpham_chitiet'] ?></td>
                        <td><?php echo $row_product['category_name'] ?></td>
                     
                        <td>
                            <span
                            onclick="passDataEditProduct(
                              <?php echo $row_product['sanpham_id'] ?>,
                              '<?php echo $row_product['sanpham_name'] ?>',
                              '<?php echo $row_product['sanpham_image']; ?>',
                              <?php echo $row_product['sanpham_gia']; ?>,
                              <?php echo $row_product['sanpham_soluong'] ?>,
                              <?php echo $row_product['sanpham_discount'] ?>,
                              '<?php echo $row_product['sanpham_chitiet']; ?>',
                              '<?php echo $row_product['category_id'] ?>',
                      
                            );"
                            data-toggle="modal"
                            data-target="#editModal">
                            <button title="Edit" class="btn btn-success mb-2"><i class="fas fa-edit"></i></button>
                             </span>
                            <span data-toggle="modal" data-target="#removeModal">
                            <button title="Remove" onclick="passDataRemove(<?php echo $row_product['sanpham_id'] ?>,'<?php echo $row_product['sanpham_name'] ?>')" class="btn btn-danger mb-2"><i class="fas fa-trash-alt"></i></button>
                            </span>
                        </td>
                        
                    </tr>
                    <?php } ?>
                </tbody>
                
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

<!-- add modal -->
<div class="modal fade" id="addModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">ADD</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="add-categorymini-form" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" autocomplete="off" name="add-productName" class="form-control" placeholder="Enter categorymini name ...">
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" autocomplete="off" id="fileID" name="add-productImage" class="form-control-file">
                    </div>
                    <div class="form-group">
                        <label>Quanity</label>
                        <input type="text" autocomplete="off" name="add-productQuanity" class="form-control" placeholder="Enter categorymini name ...">
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" autocomplete="off" name="add-productPrice" class="form-control" placeholder="Enter categorymini name ...">
                    </div>
                    <div class="form-group">
                        <label>Discount</label>
                        <input type="text" autocomplete="off" name="add-productDiscount" class="form-control" placeholder="Enter categorymini name ...">
                    </div>
                    <div class="form-group">
                        <label>description</label>
                        <input type="text" autocomplete="off" name="add-productdescription" class="form-control" placeholder="Enter categorymini name ...">
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="add-productCategory">
                            <?php $sql_select = mysqli_query($con,"SELECT * FROM tbl_category ORDER BY category_id DESC");     
                            	while($row_category = mysqli_fetch_array($sql_select)){ 
                            ?>
                                <option value="<?php echo $row_category['category_id']; ?>"><?php echo $row_category['category_name']; ?></option>
                            <?php } ?>
                        </select>
                    </div> 
                    
                    <div class="modal-footer">
                        <a id="addProduct" type="button" class="btn btn-primary " data-dismiss="modal">Save</a>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end add modal -->

<!-- edit modal -->
<div class="modal fade" id="editModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">EDIT</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="edit-product-form" enctype="multipart/form-data">
                    <input type="hidden" name="id-edit" />
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" autocomplete="off" name="edit-productName" class="form-control" >
                    </div>
                    <div class="form-group">
                        <div>
                            <label>Image</label>
                        </div>
                        <img id="editImage" src="" style="width:160px;height:150px;" />
                    </div>
                    <div class="form-group">
                        <input type="file" autocomplete="off" id="editfileID" name="add-productImage" class="form-control-file">
                    </div>
                    <div class="form-group">
                        <label>Quanity</label>
                        <input type="text" autocomplete="off" name="edit-productQuanity" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" autocomplete="off" name="edit-productPrice" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label>Discount</label>
                        <input type="text" autocomplete="off" name="edit-productDiscount" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label>description</label>
                        <textarea type="text" autocomplete="off" name="edit-productdescription" class="form-control" ></textarea>
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="edit-productCategory">
                            <?php $sql_select = mysqli_query($con,"SELECT * FROM tbl_category ORDER BY category_id DESC");     
                            	while($row_category = mysqli_fetch_array($sql_select)){ 
                            ?>
                                <option value="<?php echo $row_category['category_id']; ?>"><?php echo $row_category['category_name']; ?></option>
                            <?php } ?>
                        </select>
                    </div> 
                 
                    <div class="modal-footer">
                        <a id="editProduct" type="button" class="btn btn-primary " data-dismiss="modal">Save</a>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end edit modal -->

<!-- remove modal -->
<div class="modal fade" id="removeModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">REMOVE</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id-remove" />
                Are you sure you wanna remove <label style="font-weight:bold;color:red;"></label> ?
            </div>
            <div class="modal-footer">
                <button id="removeProduct" type="button" class="btn btn-danger" data-dismiss="modal">Remove</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end remove modal -->
