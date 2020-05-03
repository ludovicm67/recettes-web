$(document).ready(function() {
  var max_fields = 20; // nombre max d'ingrédients
  var wrapper = $('.input_fields_wrap');
  var add_button = $('.add_field_button', wrapper);
  var newzone; //zone à remplir
  var field_to_copy;
  var nb_fields;

  // ajouter un champ
  $(add_button).click(function(e) {
    e.preventDefault();

    //s'adapte au bouton cliqué
    newzone = $(this).siblings('.newzone');
    field_to_copy = $(this).siblings('.field_to_copy');
    nb_fields = $(this).siblings('.newzone').children().length;

    if (nb_fields < max_fields) {
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
