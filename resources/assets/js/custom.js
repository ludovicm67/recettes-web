$(document).ready(function() {
  var max_fields = 20; // nombre max d'ingrédients
  var wrapper = $('.input_fields_wrap');
  var add_button = $('.add_field_button', wrapper);
  var newzone = $('.newzone', wrapper);
  var field_to_copy = $('.field_to_copy', wrapper);
  var nb_fields = 1; // nombre de champs

  // ajouter un champ
  $(add_button).click(function(e) {
    e.preventDefault();
    if (nb_fields < max_fields) {
      nb_fields++;
      field_to_copy.clone().removeClass('field_to_copy').appendTo(newzone);
    }
  });

  // supprimer un champ
  $(wrapper).on('click', '.remove_field', function(e) {
    e.preventDefault();
    $(this).parent('div').remove();
    nb_fields--;
  })
});
