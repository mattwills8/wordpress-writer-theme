!function(a){"use strict";redux.field_objects=redux.field_objects||{},redux.field_objects.options_object=redux.field_objects.options_object||{},redux.field_objects.options_object.init=function(b){b||(b=a(document).find(".redux-container-options_object"));var c=b;b.hasClass("redux-field-container")||(c=b.parents(".redux-field-container:first")),c.hasClass("redux-field-init")&&(c.removeClass("redux-field-init"),a("#consolePrintObject").on("click",function(b){b.preventDefault(),console.log(a.parseJSON(a("#redux-object-json").html()))}),"function"==typeof jsonView&&jsonView("#redux-object-json","#redux-object-browser"))}}(jQuery);