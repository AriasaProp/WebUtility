function updateColors() {
  // json theme format :
  // light: nav, body, accent, font
  // dark: nav, body, accent, font
  var clr = localStorage.getItem("theme-colors");
  if (clr) {
    var clrs = clr.split("#")
    clrs = clrs.filter(j => {return j !== "";});
    if (clrs.length === 8) {
      for (let j = 0; j < clrs.length; ++j)
        clrs[j] = "#" + clrs[j];
      
      document.documentElement.style.setProperty('--navColor', clrs[0]);
      document.documentElement.style.setProperty('--bodyColor', clrs[1]);
      document.documentElement.style.setProperty('--accentColor', clrs[2]);
      document.documentElement.style.setProperty('--fontColor', clrs[3]);
      
      document.documentElement.style.setProperty('--navColorDark', clrs[4]);
      document.documentElement.style.setProperty('--bodyColorDark', clrs[5]);
      document.documentElement.style.setProperty('--accentColorDark', clrs[6]);
      document.documentElement.style.setProperty('--fontColorDark', clrs[7]);
    }
  }
}
function updateFontSize() {
  var fz = localStorage.getItem("theme-fontSize");
  if (fz) {
    document.documentElement.style.setProperty('--F1', fz+'pt');
  }
}
//handle deafult theme
updateColors();
updateFontSize();

document.addEventListener('DOMContentLoaded', function () {
  // update footer
  fetch('./data/last-update.txt').then(response => response.text())
  .then(text => document.getElementById('last-update').innerHTML = text);
});
