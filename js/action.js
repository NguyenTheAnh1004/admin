function passDataReset(id) {
    $('#resetPassModal input[name="id-resetPass"]').val(id);
  }

function passDataRemove(id, name) {
    $('#removeModal input[name="id-remove"]').val(id);
    $('#removeModal label').html(name);
  }

$('#addUser').on('click',function () {
    var username = $('#addModal input[name="add-username"]').val();
    var pass = $('#addModal input[name="add-password"]').val();
    var mssv = $('#addModal input[name="add-mssv"]').val();
    var email = $('#addModal input[name="add-email"]').val();
    var phone = $('#addModal input[name="add-phone"]').val();
    var address = $('#addModal input[name="add-address"]').val();
    var isAdmin = $('input[name="add-isadmin"]').is(':checked');
    var action = 'adduser';

    $.ajax({
      url: './include/User/Action.php',
      method: 'post',
      data: {
        username: username,
        pass:pass,
        mssv:mssv,
        email:email,
        phone: phone ,
        address: address,
        isAdmin: isAdmin,
        action: action,
      },
      success: function (data) {
        location.reload();
      }
    });
  });

  function passDataEditUser(id, name, mssv, email, phone, address, type) {
    $('#editModal input[name="id-edit"]').val(id);
    $('#editModal input[name="edit-username"]').val(name);
    $('#editModal input[name="edit-mssv"]').val(mssv);
    $('#editModal input[name="edit-email"]').val(email);
    $('#editModal input[name="edit-phone"]').val(phone);
    $('#editModal input[name="edit-address"]').val(address);
    type == 1 ? $('#editModal input[name="edit-isadmin"]').prop('checked', true) : $('#editModal input[name="edit-isadmin"]').prop('checked', false);
  }

  $('#editUser').on('click',function () {
    var id = $('#editModal input[name="id-edit"]').val();
    var username = $('#editModal input[name="edit-username"]').val();
    var mssv = $('#editModal input[name="edit-mssv"]').val();
    var email = $('#editModal input[name="edit-email"]').val();
    var phone = $('#editModal input[name="edit-phone"]').val();
    var address = $('#editModal input[name="edit-address"]').val();
    var isAdmin = $('input[name="edit-isadmin"]').is(':checked');
    var action = 'edituser';

    $.ajax({
      url: './include/User/Action.php',
      method: 'post',
      data: {
        id: id,
        username: username,
        mssv:mssv,
        email:email,
        phone: phone ,
        address: address,
        isAdmin: isAdmin,
        action: action,
      },
      success: function (data) {
        location.reload();
      }
    });
  });

  $('#removeuser').on('click',function () {
    var id = $('#removeModal input[name="id-remove"]').val();
    action = 'removeuser'
    $.ajax({
      url: './include/User/Action.php',
      method: 'post',
      data: {
        id: id,
        action: action,
      },
      success: function (data) {
        location.reload();
      }
    });
  });

  $('#resetPass').on('click',function () {
    var id = $('#resetPassModal input[name="id-resetPass"]').val();
    var pass = $('#resetPassModal input[name="reset-pass"]').val();
    action = 'resetpassuser'
    $.ajax({
      url: './include/User/Action.php',
      method: 'post',
      data: {
        id: id,
        pass: pass,
        action: action,
      },
      success: function (data) {
        location.reload();
      }
    });
  });


  function passDataEditCategory(id, name, displayorder) {
    $('#editModal input[name="id-edit"]').val(id);
    $('#editModal input[name="edit-cate-name"]').val(name);
    $('#editModal input[name="edit-displayorder"]').val(displayorder);

  }
  
  function passDataRemove(id, name) {
    $('#removeModal input[name="id-remove"]').val(id);
    $('#removeModal label').html(name);
  }
  
  $('#editCategory').on('click',function () {
      var id = $('#editModal input[name="id-edit"]').val();
      var cateName = $('#editModal input[name="edit-cate-name"]').val();
      var displayOrder = $('#editModal input[name="edit-displayorder').val();
   
      var action = 'editcategory';
    
      $.ajax({
        url: './include/Product/Action.php',
        method: 'post',
        data: {
          id: id,
          cateName: cateName,
          displayOrder: displayOrder,
       
          action: action,
        },
        success: function (data) {
          location.reload();
        }
      });
  });
  
  $('#addCategory').on('click',function () {
    var cateName = $('#addModal input[name="add-cateName"]').val();
    var displayOrder = $('#addModal input[name="add-displayorder').val();
    var iconName = $('#addModal input[name="add-iconname').val();
    var action = 'addcategory';
    $.ajax({
      url: './include/Product/Action.php',
      method: 'post',
      data: {
        cateName: cateName,
        displayOrder: displayOrder,
        iconName:iconName,
        action: action,
      },
      success: function (data) {
        location.reload();
      }
    });
  });
  
  $('#removeCategory').on('click',function () {
    var id = $('#removeModal input[name="id-remove"]').val();
    var action = 'removecategory';
    $.ajax({
      url: './include/Product/Action.php',
      method: 'post',
      data: {
        id: id,
        action: action,
      },
      success: function (data) {
        location.reload();
      }
    });
  });
  
    // check fill input add category
    $('.add-category-form input').keyup(function () {
      if ($(this).val() == "") {
        $('#addCategory').addClass('disabled');
      }
      else {
        $('#addCategory').removeClass('disabled');
      }
    });

    $('#addProduct').click(function () {
      var Name = $('#addModal input[name="add-productName"]').val();
      // var filename = $('#addModal input[name="add-productImage"]').val().replace(/C:\\fakepath\\/i, '');
      var filename = $('#fileID').prop('files')[0];
      var Quanity = $('#addModal input[name="add-productQuanity"]').val();
      var Price = $('#addModal input[name="add-productPrice"]').val();
      var Discount = $('#addModal input[name="add-productDiscount"]').val();
      var Description = $('#addModal input[name="add-productdescription"]').val();
      var Category = $('#addModal select[name="add-productCategory"]').val();

    
      var action = 'addproduct';
      var formData = new FormData();
      formData.append('filename', filename);
      formData.append('Name',  Name );
      formData.append('Quanity', Quanity);
      formData.append('Price', Price );
      formData.append('Discount', Discount);
      formData.append('Description', Description);
      formData.append('Category', Category);

      formData.append('action', action);
     
      $.ajax({
        url: './include/Product/Action.php',
        method: 'post',
        data: formData,
        contentType: false,
        processData: false,
        
        success: function (data) {
          location.reload();
        }
      });
    });
  
    function passDataEditProduct(id, name, image, gia, soluong, discount,chitiet, catename, catemininame) {
      $('#editModal input[name="id-edit"]').val(id);
      $('#editModal input[name="edit-productName"]').val(name);
      $('#editImage').attr('src', './uploadimg/' + image);
      $('#editModal input[name="edit-productQuanity"]').val(soluong);
      $('#editModal input[name="edit-productPrice"]').val(gia);
      $('#editModal input[name="edit-productDiscount"]').val(discount);
      $('#editModal textarea[name="edit-productdescription"]').val(chitiet);
      $('#editModal select[name="edit-productCategory"]').val(catename);

  
    }
  
    $('#editProduct').click(function () {
      var ID =  $('#editModal input[name="id-edit"]').val();
      var Name = $('#editModal input[name="edit-productName"]').val();
      var image = $('#editModal #editImage').attr('src');
      var filename = $('#editfileID').prop('files')[0];
      var Quanity = $('#editModal input[name="edit-productQuanity"]').val();
      var Price = $('#editModal input[name="edit-productPrice"]').val();
      var Discount = $('#editModal input[name="edit-productDiscount"]').val();
      var Description = $('#editModal textarea[name="edit-productdescription"]').val();
      var Category = $('#editModal select[name="edit-productCategory"]').val();

    
      var action = 'editproduct';
  
      var formData = new FormData();
      formData.append('ID', ID);
      formData.append('filename', filename);
      formData.append('image', image);
      formData.append('Name',  Name );
      formData.append('Quanity', Quanity);
      formData.append('Price', Price );
      formData.append('Discount', Discount);
      formData.append('Description', Description);
      formData.append('Category', Category);

      formData.append('action', action);
     
      $.ajax({
        url: './include/Product/Action.php',
        method: 'post',
        data: formData,
        contentType: false,
        processData: false,
        
        success: function (data) {
       
          location.reload();
        }
      });
    });
  
    $('#removeProduct').click(function () {
      var id = $('#removeModal input[name="id-remove"]').val();
      var action = 'removeproduct';
      $.ajax({
        url: './include/Product/Action.php',
        method: 'post',
        data: {
          id: id,
          action: action,
        },
        success: function (data) {
          location.reload();
        }
      });
    });
