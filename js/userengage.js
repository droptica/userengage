(function ($, drupalSettings) {

  "use strict";

  var apiKey = drupalSettings.userengage.apiKey;
  var name = drupalSettings.userengage.name;
  var email = drupalSettings.userengage.email;

  if (name && email){
    var code = '<script type="text/javascript">'
      + 'window.civchat = {'
      + ' apiKey:'  + '"' + apiKey + '",'
      + 'name:' + '"' + name + '",'
      + 'email:' + '"' + email + '",'
      + '};</script>'
      + '<script data-cfasync="false" src="https://widget.userengage.io/widget.js"></script>';
  } else {
    var code = '<script type="text/javascript">'
      + 'window.civchat = {'
      + ' apiKey:'  + '"' + apiKey + '"'
      + '};</script>'
      + '<script data-cfasync="false" src="https://widget.userengage.io/widget.js"></script>';
  }

  jQuery("body").append(code);

})(jQuery, drupalSettings);
