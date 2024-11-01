(function() {
  var Cookie, WP_Retina;

  WP_Retina = (function() {
    var debug_mode, simulate_retina;

    simulate_retina = false;

    debug_mode = false;

    function WP_Retina() {
      if (window.devicePixelRatio > 1 || simulate_retina === true) {
        new Cookie("IsRetina", "1", "365");
        if (debug_mode === true) console.log("retina");
      } else {
        new Cookie("IsRetina", "0", "365");
        if (debug_mode === true) console.log("no retina");
      }
    }

    return WP_Retina;

  })();

  Cookie = (function() {

    function Cookie(name, value, days) {
      var cookieString, date, expires;
      if (days) {
        date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "expires=" + date.toGMTString();
      } else {
        expires = "";
      }
      cookieString = "" + name + "=" + value;
      document.cookie = cookieString;
    }

    return Cookie;

  })();

  new WP_Retina();

}).call(this);
