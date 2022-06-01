var getJSON = function(url, callback) {
  var xhr = new XMLHttpRequest();
  xhr.open('GET', url, true);
  xhr.responseType = 'json';
  xhr.onload = function() {
    var status = xhr.status;
    if (status === 200) {
      callback(null, xhr.response);
    } else {
      callback(status, xhr.response);
    }
  };
  xhr.send();
};

function insertAfter(referenceNode, newNode) {
  referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
}

window._miners_loggedIn = false;

function afterLogin(){
  var aWiki = document.createElement('a');
  var aWikiText = document.createTextNode("Wiki");
  aWiki.style.fontSize = ".7rem";
  aWiki.appendChild(aWikiText);
  aWiki.title = "Wiki";
  aWiki.href = "https://minersonline.ddns.net/wiki/";
  aWiki.classList.add("md-header__button");

  var aFor = document.createElement('a');
  var aForText = document.createTextNode("Forums");
  aFor.style.fontSize = ".7rem";
  aFor.appendChild(aForText);
  aFor.title = "Forums";
  aFor.href = "https://minersonline.ddns.net/forum/";
  aFor.classList.add("md-header__button");

  var aReg = document.createElement('a');
  var aRegText = document.createTextNode("Sign-up");
  aReg.style.fontSize = ".7rem";
  aReg.appendChild(aRegText);
  aReg.title = "Sign up";
  aReg.href = "https://minersonline.ddns.net/register/";
  aReg.classList.add("md-header__button");

  var aLog = document.createElement('a');
  var aLogText = document.createTextNode("Log-in");
  aLog.style.fontSize = ".7rem";
  aLog.appendChild(aLogText);
  aLog.title = "Log in";
  aLog.href = "https://minersonline.ddns.net/login/";
  aLog.classList.add("md-header__button");

  var aPro = document.createElement('a');
  var aProText = document.createTextNode("Profile");
  aPro.style.fontSize = ".7rem";
  aPro.appendChild(aProText);
  aPro.title = "Profile";
  aPro.href = "https://minersonline.ddns.net/profile.html";
  aPro.classList.add("md-header__button");

  var aNLog = document.createElement('a');
  var aNLogText = document.createTextNode("Logout");
  aNLog.style.fontSize = ".7rem";
  aNLog.appendChild(aNLogText);
  aNLog.title = "Logout";
  aNLog.href = "https://minersonline.ddns.net/logout/";
  aNLog.classList.add("md-header__button");

  var div = document.getElementById("before_user_btns");
  insertAfter(div, aWiki);
  insertAfter(aWiki, aFor);
  if(window._miners_loggedIn == false){
    insertAfter(aFor, aReg);
    insertAfter(aReg, aLog);
  } else {
    insertAfter(aFor, aPro);
    insertAfter(aPro, aNLog);
  }
}

getJSON('https://minersonline.ddns.net/userapi.php',
function(err, data) {
  if (err !== null) {
    console.error('Something went wrong: ' + err);
  } else {
    window._miners_user = data;
    str = JSON.stringify(data);
    if(data.id !== null){
      window._miners_loggedIn = true;
    }
  }
  afterLogin();
});