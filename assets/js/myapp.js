$(window).on("resize", function () {
  var win = $(this); //this = window
  if (win.height() <= 520 || win.width() <= 1012) {
    $("body").append(
      '<div class="resizer-window" style="position:absolute; top:0;bottom:0;right:0; left:0; background-color: #555; z-index: 2000; display:flex; justify-content:center; align-items:center; flex-direction:column; -ms-flex-direction: column"><img src="' +
        baseurl +
        'assets/img/photo.jpg" style="border-radius:50%; width:200px"><h1>Stop! Jangan di resize!</h1><p>Website ini masih dalam pengembangan, karena kurangnya waktu, responsive belum dibuat</p> </div>'
    );
  } else if (win.height() > 520 || win.width() > 1012) {
    $(".resizer-window").removeAttr("style");
    $(".resizer-window").empty();
  }
});

$(function () {
  $('[data-toggle="tooltip"]').tooltip();
});

// const baseurl = "http://localhost/image_editor";
// console.log(baseurl);
// init -Masonry
var $grid = $(".my-grid").masonry({
  itemSelector: ".grid-item",
  percentPosition: true,
  horizontalOrder: true,
  // fitWidth:
  gutter: 0,
  columnWidth: ".grid-sizer",
});

// layout Masonry after each image loads
$grid.imagesLoaded().progress(function () {
  $grid.masonry("layout");
  $grid.masonry("reloadItems");
});

// Gallery Modal
$("#gallery_modal").on("show.bs.modal", function (event) {
  // console.log('huihu');
  let id = $(event.relatedTarget).data("id");
  $("#preview_link").on("click", function (event) {
    event.preventDefault();
  });

  /*  console.log(id);
    $.ajax({
      // console.log()
      url: baseurl + "gallery/preview/",
      type: "post",
      data: { id: id },
      dataType: "json",
      success: function (data) {
        let hasil = data.responseJSON;
        console.log(hasil);
      },
    }); */
});

// delete
$("#deletemodal").on("show.bs.modal", function (event) {
  var button = $(event.relatedTarget); // Button that triggered the modal
  var id = button.data("id"); // Extract info from data-* attributes
  var name = button.data("name");
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this);
  modal
    .find(".modal-body")
    .html("Are you sure you want to delete this post called '" + name + "' ?");
  modal.find(".hapus").attr("href", baseurl + "gallery/delete/" + id);
});

// File Preview set
function filePreview(input, location) {
  if (input.files && input.files[0]) {
    let reader = new FileReader();
    reader.onload = function (e) {
      $(location).empty();
      $(location).append(
        '<img src="' +
          e.target.result +
          '" style="border-radius: 50% !important; height: 100px !important" >'
      );
    };
    reader.readAsDataURL(input.files[0]);
  }
}

// File Preview implementation
// avatar
$("#avbrow").change(function () {
  var file = $(this)[0].files[0].size / Math.pow(1024, 2);

  var val2 = $(this).val();
  switch (val2.substring(val2.lastIndexOf(".") + 1).toLowerCase()) {
    case "png":
    case "svg":
    case "jpg":
    case "jpeg":
    case "gif":
      if (file > 1.5) {
        $(this).val("");
        $(".avatar--set").empty();
        $(".avatar--set").append(
          "<img src='" + baseurl + "assets/avatar/profile.svg'>"
        );
        alert(
          "Your image file size to big, the file size must smaller than 1,5 MB"
        );
      } else {
        filePreview(this, ".avatar--set");
      }
      break;
    default:
      $(this).val("");
      $(".avatar--set").empty();
      $(".avatar--set").append(
        "<img src='" + baseurl + "assets/avatar/profile.svg'>"
      );
      // error message here
      alert(
        "the extensions needed to upload avatar are only svg, gif, jpg, jpeg, and png"
      );
      break;
  }
});

// Upload
$(".tui-image-editor-load-btn").change(function () {
  var uplbutton = $(".save-server");
  uplbutton.removeAttr("disabled");
  uplbutton.removeAttr("style");
});
$(".save-server").on("click", function () {
  var dataURL = imageEditor.toDataURL();
  var filename = imageEditor.getImageName();
  $(".base64file").val(dataURL);
  $("#fn").val(filename);
});
