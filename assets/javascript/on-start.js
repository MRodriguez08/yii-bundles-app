$(document).ready(function(){
  try {
    $('.combo-suggest').combobox();
  }
  catch (err){ }

  if ($(".date").length > 0)
    $(".date").datetimepicker();

});
