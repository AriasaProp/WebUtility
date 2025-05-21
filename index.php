<?php
// Comment these lines to hide errors
error_reporting(E_ALL);
ini_set('display_errors', 1);
//cache configs

//initialize
$paths = array_values(array_filter(explode('/', parse_url($_SERVER['REQUEST_URI'])['path'])));
$paths = array_map('strtolower', $paths);
$header = 'headers_src/other.phtml';
//main
if (!$paths) {
  $paths = array('home');
  $header = 'headers_src/home.phtml';
} else if ($paths[0] === 'home' || $paths[0] == 'index' || $paths[0] == '' || $paths[0] == '/') {
  $paths[0] = 'home';
  $header = 'headers_src/home.phtml';
}
$main = 'mains_src/' . $paths[0] . '.phtml';
$title = ucfirst($paths[0]);
$error = 'No Error';
if (!file_exists($main)) {
  $main = 'mains_src/error.phtml';
  $title = 'Error';
  $error = 'Page not found!';
}
//done
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>WebUtility - <?php echo $title; ?></title>
	<!-- describe -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="AriasaProp">
  <meta name="description" content="Store some content.">
	<!-- set -->
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta http-equiv="Content-Language" content="en">
	<!-- provide source before web loaded -->
  <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link rel="preload" as="image" href="img/background.svg" />
  <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;400;700&display=swap" crossorigin/>
	<!-- set source to web -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;400;700&display=swap"/>
  <style>
@font-face {
  font-family: 'ic';
  src: url('font/ic.eot?54040502');
  src: url('font/ic.eot?54040502#iefix') format('embedded-opentype'),
       url('font/ic.woff2?54040502') format('woff2'),
       url('font/ic.woff?54040502') format('woff'),
       url('font/ic.ttf?54040502') format('truetype'),
       url('font/ic.svg?54040502#ic') format('svg');
  font-weight: normal;
  font-style: normal;
}
/* color library - default */
:root {
  /* css only colors */
  --opposite: #0003;
  --accent: var(--accentColor, #eee)
  --font: var(--fontColor, #000);
  --nav: var(--navColor, #b3b3b3);
  --body: var(--bodyColor, #efefef);
}
/* setting default */
* {
	box-sizing: border-box;
	margin: 0;
	padding: 0;
	/*outline: 1px solid lightgreen;*/
}
i {
  display: inline-block;
  font-family: 'ic';
  font-style: normal;
  font-size: 1em;
  speak: never;
  aspect-ratio: 1 / 1;
  text-align: center;
  font-variant: normal;
  text-transform: none;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}

/* global style for some element that used*/
html {
	color: var(--font);
}
body {
  display: flex;
  flex-direction: column;
	font-family: 'Poppins', sans-serif;
	font-size: var(--F1, 16pt);
	background-repeat: repeat;
	background-color: var(--body);
  background-image: url(img/background.png);
}
a {
  color: inherit;
	text-decoration: none; /* Menghilangkan dekorasi tautan seperti garis bawah */
}
button {
  font-size: 1.2em;
  background-color: transparent;
  border: none;
  outline: none;
  cursor: pointer;
}
input {
  font-size: 1em;
  background-color: transparent;
  border: none;
  outline: none;
  cursor: pointer;
}
h1 {
  font-weight: 700;
  font-size: 2.5em;
}
h2 {
  font-weight: 700;
  font-size: 1.4em;
}
h3 {
  font-weight: 700;
  font-size: 1.2em;
}
h4 {
  font-weight: 400;
  font-size: 1.2em;
}
h5 {
  font-weight: 400;
  font-size: 1.0em;
}
h6 {
  font-weight: 200;
  font-size: 0.9em;
}
p {
  font-size: 0.8em;
}
.hide {
  display: none;
}
.hide-on-small{ }
header {
  display: block;
  min-height: 100px;
}
header nav {
	display: flex;
	align-items: center;
	justify-content: center;
	user-select: none;
	position: fixed;
	top: 0;
	right: 0;
	left: 0;
	flex-direction: row;
	padding: 8px;
	background-color: var(--nav);
	box-shadow: 0 3px 3px var(--nav);
	flex-wrap: wrap;
	z-index: 999;
  text-shadow: 0 0 1em #0007;
}
header nav a {
  display: inline-block;
  margin-left: 15px;
}
header nav span {
  flex: 1 1 0px;
}
header nav #nav-menu {
	display: inline-block;
  font-size: 1.2em;
}
header nav #nav-menu a {
	display: inline-block;
	padding: 5px 15px;
	border-radius: 3.5px;
}
header nav #nav-menu a:hover {
	background-color: var(--opposite);
}
header nav #nav-menu #nav-search-switch {
	padding: 5px 15px;
	border-radius: 3.5px;
  display: inline-block;
  cursor: pointer;
}
header nav #nav-menu #nav-search-switch:hover {
	background-color: var(--opposite);
}
header nav #nav-menu #nav-search-switch i:after {
  content: '\e800';
}
header nav input:checked ~ #nav-menu #nav-search-switch i:after {
  content: '\e803';
}
header nav form {
  display: none;
  text-align: center;
  flex-wrap: nowrap;
	margin: 10px;
  background-color: var(--opposite);
  overflow: hidden;
  border-radius: 20px;
}
header nav form input {
  padding-left: 15px;
  color: black;
  width: 650px;
}
header nav form button {
  padding: 4px 8px;
}
header nav form button:hover {
  background-color: var(--accent);
}
header nav input:checked ~ form {
  display: flex;
}
main {
  align-items: center;
  text-align: center;
}
footer {
	display: block;
	color: white;
	background-color: #0008;
	padding: 20px 5px;
  text-align: center;
  justify-content: center;
}
footer div {
	display: inline-block;
}
footer div h4 {
	display: block;
	text-align: center;
}
footer div a {
	padding: 12px;
  display: inline-block;
	border-radius: 10px;
}
footer div a:hover {
	background-color: #0008;
}
footer div a i {
  display: inline-block;
	aspect-ratio: 1 / 1;
}
footer p {
  display: block;
}
/* when dark mode on */
@media screen and (prefers-color-scheme: dark) {
  :root {
    /* css only colors */
    --opposite: #fff3;
    --accent: var(--accentColorDark, #ccc);
    --font: var(--fontColorDark, #f2f2f2);
    --nav: var(--navColorDark, #121212);
    --body: var(--bodyColorDark, #262626);
  }
}
/* while screen short */
@media screen and (max-width: 800px) {
  .hide-on-small {
		display: none;
  }
  header nav {
	  padding: 5px;
  }
  header nav form input {
    padding-left: 15px;
    color: black;
    width: 250px;
  }
  footer div {
  	display: block;
  }
}
/* while screen wide */
@media screen and (min-width: 800px) {
  .hide-on-big {
		display: none;
  }
}
/* support smooth image */
@media screen and (-webkit-min-device-pixel-ratio:0) {
  @font-face {
    font-family: 'ic';
    src: url('font/ic.svg?54040502#ic') format('svg');
  }
  body {
    background-image: url(img/background.svg);
  }
}

/* used when no script */
#block {
  background-color: black; color: white;
  z-index: 1000; display: block; position: fixed;
  left: 0; right: 0; top: 0; bottom: 0;
  font-style: bold; font-size: 50pt;
  text-align: center;
}
  </style>
  <script>
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
  </script>
</head>
<body>
  <noscript><span id="block">Blocked</span></noscript>
	<?php require __DIR__ . '/' . $header; ?>
	<?php require __DIR__ . '/' . $main; ?>
	<footer>
	  <div>
	    <h4>Other</h4>
	    <?php if ($paths[0] !== "aboutme") echo '<a href="/aboutme"><p>About Me</p></a>'; ?>
	    <?php if ($paths[0] !== "updates") echo '<a href="/updates"><p>Update Lists</p></a>'; ?>
  	</div>
	  <div>
  		<h4>Author</h4>
  		<a href="mailto:ikomangwidiadaariasa12@gmail.com"><i>&#xe802;</i><p class="hide-on-small">Gmail</p></a>
  		<a href="https://github.com/AriasaProp"><i>&#xe80a;</i><p class="hide-on-small">Github</p></a>
	  </div>
  	<p id="last-update">Update Now</p>
  	<p>Made for fun!</p>
	</footer>
</body>
</html>

