var notusCookies = {
  cookieList: [],
  cookieEnabled: ("cookie" in document && (document.cookie.length > 0 ||
    (document.cookie = "test").indexOf.call(document.cookie, "test") > -1)),
  cookieRoot: Object.getOwnPropertyDescriptor(Document.prototype, 'cookie') || // Chrome Safari Opera IE
    Object.getOwnPropertyDescriptor(HTMLDocument.prototype, 'cookie'), // firefox
  cookieIsSet: document.cookie.match(new RegExp("allowCookies" + '=([^;]+)')),
  saveChanges: function () {
    // Sets cookie
    // 1. Expiration date - 1 year
    var expirationDate = new Date();
    expirationDate.setDate(expirationDate.getDate() + 356);
    // 2. Cookies value
    var cookieValue = JSON.stringify(this.getSavableFile());
    cookieValue += (expirationDate == null) ? "" : "; expires=" + expirationDate.toUTCString();
    // 3. Writes cookie
    document.cookie = "allowCookies=" + cookieValue;
    // 4. Reloads page to take effect
    document.location = document.location;
  },
  getSavableFile: function () {
    var savable = {};
    var cookieList = this.cookieList;
    var cookieCategories = Object.keys(cookieList);

    var necessaryIndex = cookieCategories.indexOf("Necessary");
    cookieCategories.splice(necessaryIndex, 1);

    cookieCategories.forEach(function(cookieCategory){
      var cookieKeys = Object.keys(cookieList[cookieCategory]);
      cookieKeys.forEach(function(cookieName){
        savable[cookieName] = cookieList[cookieCategory][cookieName]['approved'];
      });
    });
    return savable;
  },
  cookieIsAccepted: function (cookieName) {
    var keys = Object.keys(this.cookieList);
    for (var i = 0; i < keys.length; i++) {
      var cookies = this.cookieList[keys[i]];
      if (cookieName in cookies) {
        return cookies[cookieName]['approved'];
      }
    };
    return false;
  },
  toggleCookiesState: function (cookieName) {
    var keys = Object.keys(this.cookieList);
    for (var i = 0; i < keys.length; i++) {
      if (keys[i] == 'Necessary')
        continue;
      var cookies = this.cookieList[keys[i]];
      if (cookieName in cookies) {
        var state = cookies[cookieName]['approved'];
        this.cookieList[keys[i]][cookieName]['approved'] = !state;
      }
    }
  },
  setCookiesState: function (cookieName, state){
    var keys = Object.keys(this.cookieList);
    for (var i = 0; i < keys.length; i++) {
      if (keys[i] == 'Necessary')
        continue;
      var cookies = this.cookieList[keys[i]];
      if (cookieName in cookies) {
        this.cookieList[keys[i]][cookieName]['approved'] = state;
      }
    }
  },
  setAll: function (state) {
    var keys = Object.keys(this.cookieList);
    for (var i = 0; i < keys.length; i++) {
      if (keys[i] == 'Necessary')
        continue;
      var cookies = this.cookieList[keys[i]];
      var cookie_keys = Object.keys(cookies);
      for (var x = 0; x < cookie_keys.length; x++) {
        this.cookieList[keys[i]][cookie_keys[x]]['approved'] = state;
      }
    }
  }
}

populateCookieList();

function populateCookieList() {
  // Checks if cookie already set
  var rawJSON = '{\"Necessary\":{\"has_js\":{\"approved\":true,\"description\":\"Registers whether or not the user has activated JavaScript in the browser.\",\"type\":\"HTTP\",\"expiry\":\"Session\"},\"allowCookies\":{\"approved\":true,\"description\":\"Registers what cookies user has approved.\",\"type\":\"HTTP\",\"expiry\":\"1 year\"},\"__cfduid\":{\"approved\":true,\"description\":\"Used by the content network, Cloudflare, to identify trusted web traffic\",\"type\":\"HTTP\",\"expiry\":\"1 year\"},\"textsize\":{\"approved\":true,\"description\":\"Saves font size.\",\"type\":\"HTTP\",\"expiry\":\"1 year\"}},\"Statistics\":{\"_ga\":{\"approved\":false,\"description\":\"Registers a unique ID that is used to generate statistical data on how the visitor uses the website.\",\"type\":\"HTTP\",\"expiry\":\"2 years\"},\"_gat\":{\"approved\":false,\"description\":\"Used by Google Analytics to throttle request rate.\",\"type\":\"HTTP\",\"expiry\":\"Session\"},\"_gid\":{\"approved\":false,\"description\":\"Registers a unique ID that is used to generate statistical data on how the visitor uses the website.\",\"type\":\"HTTP\",\"expiry\":\"Session\"},\"counter_incremented\":{\"approved\":false,\"description\":\"New user visit.\",\"type\":\"HTTP\",\"expiry\":\"Session\"}},\"Marketing\":{\"collect\":{\"approved\":false,\"description\":\"Used to send data to Google Analytics about the visitor\'s device and behaviour. Tracks the visitor across d evices and marketing channels.\",\"type\":\"Pixel\",\"expiry\":\"Session\"},\"uvc\":{\"approved\":false,\"description\":\"Updates the counter for the web site\'s social sharing features.\",\"type\":\"HTTP\",\"expiry\":\"Session\"}}}';
  notusCookies.cookieList = JSON.parse(rawJSON);
  
  if (notusCookies.cookieIsSet) {
    // Loads JSON from cookie
    var settings = JSON.parse(notusCookies.cookieIsSet[1]);
    var cookieNames = Object.keys(settings);
    cookieNames.forEach(function(cookieName){
      var state = settings[cookieName];
      notusCookies.setCookiesState(cookieName, state);
    });
  }
}

if (!document.__defineGetter__) {
  Object.defineProperty(document, 'cookie', {
    get: function (cookieName) {
      return getCookie(cookieName);
    },
    set: function (cookieString) {
      setCookie(cookieString);
      return true
    },
  });
} else {
  document.__defineGetter__("cookie", function (cookieName) {
    return getCookie(cookieName);
  });
  document.__defineSetter__("cookie", function (cookieString) {
    setCookie(cookieString);
  });
}

function getCookie(cookieName) {
  return notusCookies.cookieRoot.get.call(document);
}
/*
function getCookie(cookieName) {
  console.log(cookieName);
  if (cookieIsAccepted(cookieName) === true) {
    return notusCookies.cookieRoot.get.call(document);
  }
  return '';
}
*/

function setCookie(cookieString) {
  //console.log(cookieString);
  var cookieName = getCookiesName(cookieString);
  if (notusCookies.cookieIsAccepted(cookieName) === true) {
    notusCookies.cookieRoot.set.call(document, cookieString);
  }
}

/*
  Cookie setting patterns:
    document.cookie = "username=John Doe"; 
    document.cookie = "username=John Doe; expires=Thu, 18 Dec 2013 12:00:00 UTC"; 
    document.cookie = "username=John Doe; expires=Thu, 18 Dec 2013 12:00:00 UTC; path=/"; 
*/
function getCookiesName(cookieString) {
  var cookieSplit = cookieString.split("=");
  if (cookieSplit.length > 0) {
    return cookieSplit[0];
  }
  return cookieString;
}