(function($) {

//   $('#meal_preference').parent().append('<ul class="list-item" id="newmeal_preference" name="meal_preference"></ul>');
//   $('#meal_preference option').each(function(){
//       $('#newmeal_preference').append('<li value="' + $(this).val() + '">'+$(this).text()+'</li>');
//   });
//   $('#meal_preference').remove();
//   $('#newmeal_preference').attr('id', 'meal_preference');
//   $('#meal_preference li').first().addClass('init');
//   $("#meal_preference").on("click", ".init", function() {
//       $(this).closest("#meal_preference").children('li:not(.init)').toggle();
//   });
  
//   var allOptions = $("#meal_preference").children('li:not(.init)');
//   $("#meal_preference").on("click", "li:not(.init)", function() {
//       allOptions.removeClass('selected');
//       $(this).addClass('selected');
//       $("#meal_preference").children('.init').html($(this).html());
//       allOptions.toggle();
//   });



//   $('#meal_preference2').parent().append('<ul class="list-item" id="newmeal_preference2" name="meal_preference2"></ul>');
//   $('#meal_preference2 option').each(function(){
//       $('#newmeal_preference2').append('<li value="' + $(this).val() + '">'+$(this).text()+'</li>');
//   });
//   $('#meal_preference2').remove();
//   $('#newmeal_preference2').attr('id', 'meal_preference2');
//   $('#meal_preference2 li').first().addClass('init');
//   $("#meal_preference2").on("click", ".init", function() {
//       $(this).closest("#meal_preference2").children('li:not(.init)').toggle();
//   });
  
//   var allOptions = $("#meal_preference2").children('li:not(.init)');
//   $("#meal_preference2").on("click", "li:not(.init)", function() {
//       allOptions.removeClass('selected');
//       $(this).addClass('selected');
//       $("#meal_preference2").children('.init').html($(this).html());
//       allOptions.toggle();
//   });


//   $('#meal_preference3').parent().append('<ul class="list-item" id="newmeal_preference3" name="meal_preference3"></ul>');
//   $('#meal_preference3 option').each(function(){
//       $('#newmeal_preference3').append('<li value="' + $(this).val() + '">'+$(this).text()+'</li>');
//   });
//   $('#meal_preference3').remove();
//   $('#newmeal_preference3').attr('id', 'meal_preference3');
//   $('#meal_preference3 li').first().addClass('init');
//   $("#meal_preference3").on("click", ".init", function() {
//       $(this).closest("#meal_preference3").children('li:not(.init)').toggle();
//   });
  
//   var allOptions = $("#meal_preference3").children('li:not(.init)');
//   $("#meal_preference3").on("click", "li:not(.init)", function() {
//       allOptions.removeClass('selected');
//       $(this).addClass('selected');
//       $("#meal_preference3").children('.init').html($(this).html());
//       allOptions.toggle();
//   });
var zIndexCounter = 1000; // Starting z-index value

$('select').each(function() {
    var $select = $(this);
    var firstOptionVal = $select.find('option').first().val(); // Get the value of the first option
    var firstOptionText = $select.find('option').first().text()
    var $ul = $('<ul class="list-item" id="new_' + $select.attr('id') + '" name="' + $select.attr('name') + '"></ul>');

    // Set a unique z-index for each ul
    $ul.css('z-index', zIndexCounter);
    zIndexCounter--; // Decrease z-index for the next ul

    // Append the new UL element to the select's parent
    $select.parent().append($ul);

    // Add a hidden input to store the selected value
    var hiddenInput = $('<input type="hidden" name="' + $select.attr('name') + '" id="hidden_' + $select.attr('id') + '">');
    $select.parent().append(hiddenInput);
    hiddenInput.val(firstOptionVal);

    // Transfer options from select to the new UL as list items
    $select.find('option').each(function() {
        $ul.append('<li value="' + $(this).val() + '">' + $(this).text() + '</li>');
    });

    // Remove the original select element
    $select.remove();

    // Rename the UL to the original select's ID and add the 'init' class to the first li
    $ul.attr('id', $select.attr('id')).find('li').first().addClass('init');

    // Event handler for toggling options display
    $ul.on("click", ".init", function() {
        $(this).closest("ul").children('li:not(.init)').toggle();
    });

    // Store all options except the initial one
    var allOptions = $ul.children('li:not(.init)');

    // Event handler for selecting an option
    $ul.on("click", "li:not(.init)", function() {
        allOptions.removeClass('selected');
        $(this).addClass('selected');
        $ul.children('.init').html($(this).html());
        allOptions.toggle();

        // Update the hidden input's value with the selected option's value
        $('#hidden_' + $select.attr('id') + '').val($(this).attr('value'));
        // $('#hidden_' + $select.attr('id') + '').val($(this).attr('value'));
        // $('#hidden_' + $select.attr('id') + '').val($(this).attr('value'));
    });
});



  var marginSlider = document.getElementById('slider-margin');
  if (marginSlider != undefined) {
      noUiSlider.create(marginSlider, {
            start: [500],
            step: 10,
            connect: [true, false],
            tooltips: [true],
            range: {
                'min': 0,
                'max': 1000
            },
            format: wNumb({
                decimals: 0,
                thousand: ',',
                prefix: '$ ',
            })
    });
  }


  $('#register-form').validate({
    rules : {
        first_name : {
            required: true,
        },
        last_name : {
            required: true,
        },
        company : {
            required: true
        },
        bday : {
            required: true
        },
        house_no : {
            required: true
        },
        street : {
            required: true
        },
        citizenship : {
            required: true
        },
        email : {
            required: true,
            email : true
        },
        phone_number : {
            required: true,
        },
        address : {
            required: true,
        },
        username : {
            required: true,
        },
        password : {
            required: true,
        },
    },
    onfocusout: function(element) {
        $(element).valid();
    },
});

    jQuery.extend(jQuery.validator.messages, {
        required: "",
        remote: "",
        email: "",
        url: "",
        date: "",
        dateISO: "",
        number: "",
        digits: "",
        creditcard: "",
        equalTo: ""
    });
})(jQuery);

