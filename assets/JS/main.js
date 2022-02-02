var navs = document.querySelectorAll('.nav-link');
navs.forEach(item => {
  item.addEventListener('click', event => {
    RemoveActive();
    item.classList.add("active");
    LoadHeader(item.getAttribute('value'));
    LoadMain('table', item.getAttribute('value'));
  });
});

function RemoveActive() {
  navs.forEach(function (item, index) {
    item.classList.remove("active");
  });
}


$(document).on("submit", "form", function (e) {
  e.preventDefault();
  var formdata = new FormData(e.originalEvent.srcElement);
  formdata.append(e.originalEvent.submitter.name, true);
  $.ajax({
    url: base_url + "App/Request",
    type: 'POST',
    data:formdata,
    processData: false,
    contentType: false,
    success: function(response){
      $( "#alert" ).empty().append( response );
    }
  });
});
$(document).on("change", "#category", function (event) {
  $.ajax({
    url: base_url + "App/DropdownSubCategory/",
    data:{selected:$('#category').val()},
    type: 'POST',
    success: function (response) {
      $('#subcategory').html(response);
    }
  });
});
// Inventory
$(document).on("click", "#AddItem", function (event) {
  LoadHeader('inventory_back');
  LoadMain('form', 'inventory');
});

$(document).on("click", "#BackItem", function (event) {
  LoadHeader('inventory');
  LoadMain('table', 'inventory');
});

$(document).on("click", "#EditItem", function (event) {
  LoadHeader('inventory_back');
  LoadMain('form', 'inventory_edit', this.getAttribute('value'));
});

$(document).on("click", "#DeleteItem", function (event) {
  Delete('tbl_inventory', this.getAttribute('value'), 'DeleteItem', 'inventory');
});
// Inventory End

// Category
$(document).on("click", "#AddCategory", function (event) {
  LoadHeader('category_back');
  LoadMain('form', 'category');
});

$(document).on("click", "#BackCategory", function (event) {
  LoadHeader('category');
  LoadMain('table', 'category');
});

$(document).on("click", "#EditCategory", function (event) {
  LoadHeader('category_back');
  LoadMain('form', 'category_edit', this.getAttribute('value'));
});

$(document).on("click", "#DeleteCategory", function (event) {
  Delete('tbl_category', this.getAttribute('value'), 'DeleteCategory', 'category');
});
// Category End

// SubCategory
$(document).on("click", "#AddSubCategory", function (event) {
  LoadHeader('subcategory_back');
  LoadMain('form', 'subcategory');
});

$(document).on("click", "#BackSubCategory", function (event) {
  LoadHeader('subcategory');
  LoadMain('table', 'subcategory');
});

$(document).on("click", "#EditSubCategory", function (event) {
  LoadHeader('subcategory_back');
  LoadMain('form', 'subcategory_edit', this.getAttribute('value'));
});

$(document).on("click", "#DeleteSubCategory", function (event) {
  Delete('tbl_subcategory', this.getAttribute('value'), 'DeleteSubCategory', 'subcategory');
});
// SubCategory End

function LoadHeader(header) {
  $("#header").load(base_url + "App/Header/" + header);
}
function LoadMain(type, name, id = "") {
  $.ajax({
    url: base_url + "App/Body/" + type + "/" + name,
    data: {id:id},
    type: 'POST',
    success: function (response) {
      $('#main').html(response);
    }
  });
}
function Delete(table, id, button, type){
  var formdata = new FormData();
  formdata.append("table", table);
  formdata.append(button, true);
  formdata.append("id", id);
  $.ajax({
    url: base_url + "App/Request",
    type: 'POST',
    data:formdata,
    processData: false,
    contentType: false,
    success: function(response){
      $( "#alert" ).empty().append( response );
      LoadMain('table', type);
  }
});

}