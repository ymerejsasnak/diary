
$("textarea").on("keyup", function() {

  $.post("updatediary.php", {diary: $(this).val()} );

});