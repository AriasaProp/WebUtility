<?php
// Comment these lines to hide errors
error_reporting(E_ALL);
ini_set('display_errors', 1);
//cache configs

//initialize
$paths = explode('/', parse_url($_SERVER['REQUEST_URI'])['path']);
$path_last = '/' . array_pop($paths);
$paths = array_filter($paths);
/*
print("paths ");
var_dump($paths);

print("path_last ");
var_dump($path_last);

print("path_parent ");
var_dump($path_parent);
assert(false);
*/
//core
$page_title = 'Error';
$page_content = '404.phtml';
$nav_menu = [
  '/' => ['xe800', 'Home'],
  '/content' => ['xe808', 'Content'],
  '/preferences' => ['xe803','Preferences']
];
$path_parent = '';
foreach ($paths as $p) $path_parent .= $p . 's/';
require $path_parent . 'core.php';
//done

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge"/>
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<title><?php echo $page_title; ?></title>
	<style type="text/css">
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;400;700&display=swap');
    @font-face {
      font-family: 'main-icons';
      src: url('../font/main-icons.eot?58897883');
      src: url('../font/main-icons.eot?58897883#iefix') format('embedded-opentype'),
           url('../font/main-icons.woff2?58897883') format('woff2'),
           url('../font/main-icons.woff?58897883') format('woff'),
           url('../font/main-icons.ttf?58897883') format('truetype'),
           url('../font/main-icons.svg?58897883#main-icons') format('svg');
      font-weight: normal;
      font-style: normal;
    }
    /* color library - default */
    :root {
      --fontColor: #000;
      --bodyColor: #efefef;
      --accentColor: #eee;
      --navColor: #b3b3b3;
        
      --fontColorDark: #f2f2f2;
      --bodyColoDark: #262626;
      --accentColorDark: #ccc;
      --navColorDark: #121212;
      
      /* css only colors */
      --opposite: #0006;
      --font: var(--fontColor);
      --nav: var(--navColor);
      --body: var(--bodyColor);
    }
    /* setting default */
    * {
    	box-sizing: border-box;
    	margin: 0;
    	padding: 0;
    	/*outline: 1px solid lightgreen;*/
    }
    i {
      font-family: "main-icons";
      font-style: normal;
      font-size: 1.1em;
      font-weight: 500;
      margin-left: .35em;
      margin-right: .10em;
      speak: never;
      display: inline;
      text-align: center;
      font-variant: normal;
      text-transform: none;
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;
    }
    html {
    	color: var(--font, #f2f2f2);
    }
    body {
    	font-family: 'Poppins', sans-serif;
    	background-color: var(--body, #262626);
    }
    /* global style for some element that used*/
    a {
    	color: var(--font, #f2f2f2);
    	text-decoration: none; /* Menghilangkan dekorasi tautan seperti garis bawah */
    }
    label {
    	color: inherit;
    }
    a span {
    	color: inherit;
    }
    a:visited i {
    	color: inherit;
    }
    a:visited span {
    	color: inherit;
    }
    a:visited {
    	color: inherit;
    }
    .hide {
      display: none;
    }
    .hide-on-small{ }
    
    header {
      min-height: 50px;
    }
    nav {
    	display: flex;
    	align-items: center;
    	user-select: none;
    	transition: 250ms cubic-bezier(0.77, 0.2, 0.05, 1.1);
    	position: fixed;
    	top: 0;
    	right: 0;
    	left: 0;
    	flex-direction: row;
    	padding: 8px;
    	background-color: var(--nav, #121212);
    	box-shadow: 0 3px 3px var(--nav, #121212);
    	flex-wrap: wrap;
    	font-size: 18pt;
    	z-index: 999;
      text-shadow: 0 0 1rem #0007;
    }
    #nav-head {
      display: block;
    	font-weight: 800;
      margin-left: 15px;
      flex: 1;
      font-size: 1.3rem;
    }
    #nav-menu {
    	display: inline-block;
      margin: 0;
      order: 0;
    }
    #nav-menu > a, #nav-search-switch{
    	font-size: 1.5rem;
    	overflow: hidden;
    	padding: 5px;
    	font-weight: 700;
    	border-radius: 3.5px;
    }
    #nav-menu a:hover {
    	background-color: var(--opposite, #fff3);
    }
    #nav-search-switch {
      display: inline;
      cursor: pointer;
      min-width: 2em;
    }
    #nav-search-switch:hover {
    	background-color: var(--opposite, #fff3);
    }
    #nav-search-switch:before {
      content: '\e802';
      font-family: "main-icons";
      font-style: normal;
      font-weight: normal;
      text-align: center;
      font-variant: normal;
      text-transform: none;
      speak: never;
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;
    }
    nav input:checked ~ #nav-menu #nav-search-switch:before {
      content: '\e805';
    }
    #nav-search {
      width: 100%;
      display: none;
      text-align: center;
      flex-wrap: nowrap;
    	margin: 20px 0;
    	font-size: 1.6rem;
    	overflow: hidden;
    	margin: 0;
    }
    #nav-search input {
      flex: 1 1 auto;
      background-color: #fff3;
      border-radius: 0.3em 0 0 0.3em;
      border: none;
      outline: none;
    	font-weight: 500;
    	line-height: 100%;
      padding: 10px 20px;
      color: black;
    }
    #nav-search input:placeholder {
      font-size: 25pt;
      font-style: bold;
    }
    #nav-search button {
      font-size: 1em;
      padding: 5px 20px;
      background-color: #fff3;
      border-radius: 0 0.3em 0.3em 0;
      background-color: #fafafa;
      border: none;
      cursor: pointer;
      margin: 0;
    }
    nav input:checked ~ #nav-search {
      display: flex;
    	margin-top: 20px;
    	font-size: 1.4rem;
    }
    footer {
      display: block;
      padding: 30px;
      background: #0008;
      font-size: 20pt;
    }
    footer svg {
      width: 80vmin;
      height: 40vmin;
    }
    footer .head {
      font-size: 2em;
      font-weight: 700;
      text-align: center;
    }
    footer .head .part{
      display: block;
      text-align: left;
      font-weight: normal;
      font-size: 1.2em;
      margin-left: 10px;
    }
    footer .info {
      list-style: none;
      flex-wrap: wrap;
      display: flex;
      flex-direction: column;
    }
    footer .info li {
      font-size: 1em;
    }
    footer .info li p {
      display: inline;
      font-size: 1em;
    }
    footer .account {
      display: flex;
      flex-wrap: wrap;
      text-align: center;
      align-items: center;
      justify-content: center;
    }
    footer .account a i {
      width: 2em;
      height: 2em;
      display: block;
      display: table-cell;
      text-align: center;
      vertical-align: middle;
      border-radius: 50%;
      border: 0.01em solid;
      margin: 0;
      padding: 0;
      font-size: 1.2em;
    }
    footer .last {
      display: block;
      font-size: 1em;
      text-align: center;
    }
    /* when dark mode on */
    @media screen and (prefers-color-scheme: dark) {
      :root {
        /* css only colors */
        --opposite: #fff6;
        --font: var(--fontColorDark);
        --nav: var(--navColorDark);
        --body: var(--bodyColorDark);
      }
    }
    @media screen and (max-width: 800px) {
      .hide-on-small{
    		display: none;
      }
      nav {
    	  font-size: 10pt;
    	  padding: 5px;
      }
      footer {
        font-size: 14pt;
      }
    }
	</style>
</head>
<noscript>
  <style>
    header, #container, footer {
      display: none;
    }
    h1 {
      background-color: black; color: white;
      z-index: 1000; display: block; position: fixed;
      left: 0; right: 0; top: 0; bottom: 0;
      text-align: center;
      padding-top: 100px;
    }
  </style>
  <h1>Blocked</h1>
</noscript>
<body>
	<header>
		<nav id="nav-main" role="navigation">
		  <a id="nav-head"><?php echo $page_title; ?></a>
      <input type="checkbox" id="search-switch" class="hide"></input>
			<div id="nav-menu">
			  <?php foreach ($nav_menu as $uri => $values) {
          echo '<a href="' . $uri . '"><i>&#' . $values[0] . ';</i><span class="hide-on-small">' . $values[1] . '</span></a>';
        }?>
				<label id="nav-search-switch" for="search-switch"></label></div>
			<form id="nav-search">
			  <input type="search" placeholder="Search">
			  <button type="submit"><i>&#xe802;</i></button>
			</form>
		</nav>
	</header>
	<?php require $page_content; ?>
	<footer>
    <svg id="clock" viewBox="0 0 400 200" width="350" height="175" onload="clockUp(this);">
    	<circle cx="100" cy="100" r="98" fill="var(--body)" stroke="#000" stroke-width="1" />
    	<path id="hour-tick" fill="#f00" d="M100 30 106 100Q106 108 100 108 94 108 94 100Z" />
    	<path id="minute-tick" fill="var(--font)" d="M100 10 101.5 85 101.5 115 98.5 115 98.5 85Z" />
    	<path fill="var(--font)" d="
    	  M103.5 100A3.5 3.5 90 0096.5 100 3.5 3.5 90 00103.5 100Z
    	  
    	  M107.413 24.825A8.071 8.071 0 01108.169 24.857Q109.453 24.979 109.678 25.559A.731.731 0 01109.725 25.825Q109.725 26.775 105.762 27.875 102.468 28.79 100.443 28.944A10.154 10.154 0 0199.675 28.975 1.777 1.777 0 0199.06 28.854Q98.39 28.606 97.55 27.85 96.551 26.951 96.35 26.212A1.378 1.378 0 0196.3 25.85.625.625 0 0196.422 25.547Q96.859 24.866 98.858 23.183A66.4 66.4 0 0199.5 22.65Q100.825 21.55 102.15 20.338A18.505 18.505 0 00103.655 18.798 15.319 15.319 0 00104.412 17.85 6.711 6.711 0 00104.887 17.116Q105.35 16.274 105.35 15.563A1.561 1.561 0 00105.305 15.171Q105.175 14.67 104.666 14.573A1.425 1.425 0 00104.4 14.55 1.792 1.792 0 00103.183 15.022 2.345 2.345 0 00103.112 15.088Q102.59 15.587 102.283 16.087A3.655 3.655 0 00102.238 16.163Q101.925 16.7 101.775 16.7A1.583 1.583 0 01101.312 16.623Q100.894 16.495 100.372 16.15A7.022 7.022 0 01100.137 15.988Q99.459 15.498 99.246 15.096A.743.743 0 0199.15 14.75Q99.15 13.53 100.258 12.411A6.48 6.48 0 01100.663 12.038 5.373 5.373 0 01103.982 10.758 6.863 6.863 0 01104.312 10.75 5.614 5.614 0 01105.731 10.92 3.969 3.969 0 01107.675 12.063 4.506 4.506 0 01108.857 14.666 6.089 6.089 0 01108.9 15.4 6.996 6.996 0 01108.221 18.345Q107.767 19.331 107.01 20.321A13.848 13.848 0 01106.562 20.875 20.15 20.15 0 01102.852 24.243 25.039 25.039 0 01100.625 25.65Q104.281 24.976 106.493 24.853ZM95.975 13.175Q95.975 14.75 95.525 16.713A142.757 142.757 0 0195.141 18.346Q94.9 19.342 94.675 20.2A76.974 76.974 0 0094.124 22.431 68.469 68.469 0 0093.962 23.15 210.941 210.941 0 0193.812 23.829Q93.627 24.661 93.483 25.269A65.492 65.492 0 0193.437 25.463 34.709 34.709 0 0192.967 27.217 37.868 37.868 0 0192.95 27.275 11.111 11.111 0 0192.944 27.296Q92.396 29.05 91.75 29.05A1.125 1.125 0 0191.316 28.955Q90.91 28.785 90.437 28.313A4.086 4.086 0 0190.115 27.952Q89.7 27.425 89.7 26.975A2.738 2.738 0 0189.726 26.642Q89.819 25.909 90.25 24.225A40.059 40.059 0 0090.595 22.751Q90.97 21.013 91.35 18.663A124.311 124.311 0 0091.363 18.588 44.991 44.991 0 0091.916 12.264 49.955 49.955 0 0091.925 11.325Q91.925 10.749 92.39 10.631A1.105 1.105 0 0192.663 10.6Q93.4 10.6 94.687 11.65A11.79 11.79 0 0195.125 12.024Q95.776 12.61 95.929 12.974A.527.527 0 0195.975 13.175Z
    	  M144.5 173.6122A2 2 90 00140.5 173.6122 2 2 90 00144.5 173.6122Z
    	  M175.6122 142.5A2 2 90 00171.6122 142.5 2 2 90 00175.6122 142.5Z
    	  M25.025 96.075Q25.025 96.575 24.388 98.225A84.688 84.688 0 0023.945 99.396Q23.775 99.856 23.629 100.269A41.901 41.901 0 0023.363 101.05 17.427 17.427 0 0023.164 101.698Q22.859 102.76 22.513 104.363 22.158 105.999 21.907 107.02A34.855 34.855 0 0121.763 107.588 6.165 6.165 0 0121.656 107.95Q21.487 108.461 21.305 108.612A.242.242 0 0121.15 108.675Q20.321 108.675 20.301 106.772A9.068 9.068 0 0120.3 106.675Q20.3 104.675 21.65 100.3 19.825 101.7 18.45 101.7A3.196 3.196 0 0116.235 100.817 4.294 4.294 0 0116.038 100.625 3.779 3.779 0 0115.28 99.517 3.371 3.371 0 0115 98.15 4.878 4.878 0 0115.161 96.949Q15.396 96.024 15.975 94.963 16.95 93.175 18.513 91.913 19.577 91.052 20.566 90.778A3.393 3.393 0 0121.475 90.65 3.346 3.346 0 0122.361 90.761 2.385 2.385 0 0123.625 91.588 3.87 3.87 0 0124.093 92.318 2.692 2.692 0 0124.375 93.5 8.795 8.795 0 0124.358 94.068Q24.32 94.647 24.2 95.025A1.169 1.169 0 0124.589 95.163Q24.903 95.349 24.991 95.739A1.529 1.529 0 0125.025 96.075ZM22.225 95.7 22.45 94.025A1.899 1.899 0 0022.408 93.617 1.339 1.339 0 0022.188 93.113.838.838 0 0021.579 92.757 1.137 1.137 0 0021.45 92.75Q20.316 92.75 19 94.288A11.147 11.147 0 0018.55 94.85Q17.153 96.714 16.995 98.085A2.983 2.983 0 0016.975 98.425 1.443 1.443 0 0017.047 98.892 1.202 1.202 0 0017.413 99.425 1.793 1.793 0 0017.741 99.652Q18.022 99.8 18.313 99.8A4.735 4.735 0 0018.611 99.791Q18.759 99.782 18.886 99.763A2.071 2.071 0 0019.075 99.725 2.473 2.473 0 0019.525 99.563 2.893 2.893 0 0019.675 99.488Q19.975 99.325 20.213 99.175 20.385 99.066 20.584 98.878A4.417 4.417 0 0020.738 98.725 56.102 56.102 0 0120.874 98.583Q21.008 98.444 21.112 98.339A17.408 17.408 0 0121.2 98.25Q21.346 98.105 21.569 97.821A12.17 12.17 0 0021.663 97.7Q21.927 97.355 22.054 97.2A4.67 4.67 0 0122.075 97.175Q22.55 96.525 22.8 96.15A1.358 1.358 0 0122.59 96.107Q22.225 95.999 22.225 95.7Z
    	  M59.5 173.6122A2 2 90 0055.5 173.6122 2 2 90 0059.5 173.6122Z
    	  M175.6122 57.5A2 2 90 00171.6122 57.5 2 2 90 00175.6122 57.5Z
    	  M102.925 186.588Q100.5 188.5 97.85 188.5A3.813 3.813 0 0196.559 188.289 3.312 3.312 0 0195.263 187.438 3.555 3.555 0 0194.375 185.744 5.272 5.272 0 0194.25 184.563Q94.25 182.75 95.438 180.225A25.594 25.594 0 0197.142 177.148 21.696 21.696 0 0198.15 175.725 38.348 38.348 0 0199.555 174.005Q100.239 173.218 100.9 172.56A22.677 22.677 0 01101.088 172.375Q102.209 171.283 102.764 171.058A.681.681 0 01103.013 171 2.093 2.093 0 01103.837 171.173 2.539 2.539 0 01104.025 171.263 2.112 2.112 0 01104.217 171.375Q104.401 171.498 104.475 171.621A.32.32 0 01104.525 171.788Q104.525 172.05 103.675 172.95A106.734 106.734 0 00102.111 174.641Q99.95 177.031 98.9 178.55A12.431 12.431 0 01101 178.912Q102.2 179.233 103.164 179.796A7.472 7.472 0 01103.513 180.012 6.684 6.684 0 01104.317 180.627Q105.35 181.563 105.35 182.575 105.35 184.265 103.78 185.833A9.761 9.761 0 01102.925 186.588ZM98.075 186.475A4.904 4.904 0 00100.214 185.969 6.769 6.769 0 00101.313 185.3Q102.26 184.599 102.642 183.835A2.344 2.344 0 00102.9 182.775 1.452 1.452 0 00102.616 181.931Q102.284 181.456 101.563 181.025A6.589 6.589 0 00100.329 180.462Q99.321 180.113 98 179.95A14.523 14.523 0 0097.132 181.727Q96.752 182.673 96.592 183.544A6.8 6.8 0 0096.475 184.775 2.627 2.627 0 0096.517 185.259Q96.61 185.756 96.913 186.05A1.473 1.473 0 0097.689 186.441 2.109 2.109 0 0098.075 186.475Z
    	  M144.5 26.3878A2 2 90 00140.5 26.3878 2 2 90 00144.5 26.3878Z
    	  M28.3878 142.5A2 2 90 0024.3878 142.5 2 2 90 0028.3878 142.5Z
    	  M182.384 100.544Q183.668 100.859 184.554 101.4A3.376 3.376 0 01185.266 101.968 2.291 2.291 0 01185.904 103.588 2.598 2.598 0 01185.555 104.857Q185.333 105.259 184.969 105.657A6.676 6.676 0 01184.317 106.275 10.83 10.83 0 01181.942 107.767 13.618 13.618 0 01180.467 108.35Q178.204 109.1 175.892 109.1A9.609 9.609 0 01175.165 109.075Q174.025 108.988 173.704 108.6A.533.533 0 01173.579 108.25Q173.579 108.056 174.685 107.76A17.427 17.427 0 01175.067 107.663Q176.554 107.3 178.329 106.888 180.104 106.475 181.592 105.563 182.447 105.038 182.81 104.419A1.884 1.884 0 00183.079 103.45.908.908 0 00182.81 102.81Q182.679 102.672 182.485 102.551A2.699 2.699 0 00182.179 102.388Q181.279 101.975 180.179 101.8A23.215 23.215 0 01179.268 101.65Q177.518 101.321 177.308 100.913A.244.244 0 01177.279 100.8Q177.279 100.6 177.354 100.5A.918.918 0 01177.496 100.321Q177.754 100.057 178.366 99.682A13.267 13.267 0 01178.629 99.525Q179.704 98.9 180.817 98.3A8.059 8.059 0 00182.738 96.846 9.076 9.076 0 00182.854 96.725Q183.541 96.001 183.718 95.263A2.195 2.195 0 00183.779 94.75 1.55 1.55 0 00183.711 94.271Q183.485 93.575 182.504 93.575A3.428 3.428 0 00181.753 93.667Q180.95 93.848 179.904 94.388A54.227 54.227 0 01179.532 94.578Q178.302 95.2 178.117 95.2 177.904 95.2 177.329 94.663 176.754 94.125 176.754 93.85 176.754 93.182 178.372 92.474A11.857 11.857 0 01178.792 92.3Q180.351 91.688 181.64 91.544A6.901 6.901 0 01182.404 91.5 3.804 3.804 0 01183.981 91.822 3.692 3.692 0 01185.067 92.575 3.877 3.877 0 01185.791 93.538 3.199 3.199 0 01186.154 95.038Q186.154 96.091 185.247 97.173A7.233 7.233 0 01184.579 97.863 14.336 14.336 0 01181.44 100.024 16.316 16.316 0 01180.929 100.275 13.532 13.532 0 01182.384 100.544Z
    	  M59.5 26.3878A2 2 90 0055.5 26.3878 2 2 90 0059.5 26.3878Z
    	  M28.3878 57.5A2 2 90 0024.3878 57.5 2 2 90 0028.3878 57.5Z
  	  "/>
      <rect x="210" y="10" width="180" height="180" fill="var(--body)" stroke="#000" stroke-width="1"/>
      <rect x="204" y="2" width="194" height="10" fill="var(--body1)"/>
      <rect x="203" y="0" width="194" height="10" fill="#0007"/>
      <text id="day-name" x="300" y="25" fill="var(--font)" font-size="30" font-weight="bold" text-anchor="middle" dy=".6em">Senin</text>
      <line x1="220" y1="55" x2="380" y2="55" stroke="var(--font)" stroke-width="2.8" />
      <text id="date-day" x="300" y="80" fill="var(--font)" font-size="84" font-weight="bold" text-anchor="middle" dy=".6em">12</text>
      <text id="date-my" x="300" y="155" fill="var(--font)" font-size="28" font-weight="bold" text-anchor="middle" dy=".6em">Jan 2023</text>
    </svg>
    
	  <p class="head">Informations</p>
	  <ul class="info">
	    <li><i>&#xe809;</i><?php echo file_get_contents('data/last-update.txt'); ?></li>
	    <li><a href="/updates"><i>&#xf1ea;</i>Update Lists!</a></li>
	    <li><a href="/about_me"><i>&#xe801;</i>More About Me!</a></li>
	  </ul>
	  <p class="head">My Accounts</p>
	  <div class="account">
  		<a href="mailto:ikomangwidiadaariasa12@gmail.com"><i>&#xf0e0;</i></a>
  		<a href="https://github.com/AriasaProp"><i>&#xf09b;</i></a>
	  </div>
	  <br>
  	<p class="last">Made for fun!</p>
    <p class="last">Copyright © 2023 AriasaProp</p>
	</footer>
</body>
<script type="text/javascript">
function updateStyling() {
  // json theme format :
  // light: nav, body, accent, font
  // dark: nav, body, accent, font
  var key = localStorage.getItem("theme")
  if (!key) return
  var theme = key.split("#")
  theme = theme.filter((j) => {return j !== ""})
  if (theme.length < 8) return
  for (let j = 0; j < theme.length; ++j)
    theme[j] = "#" + theme[j]
  
  document.documentElement.style.setProperty('--navColor', theme[0])
  document.documentElement.style.setProperty('--bodyColor', theme[1])
  document.documentElement.style.setProperty('--accentColor', theme[2])
  document.documentElement.style.setProperty('--fontColor', theme[3])
  
  document.documentElement.style.setProperty('--navColorDark', theme[4])
  document.documentElement.style.setProperty('--bodyColorDark', theme[5])
  document.documentElement.style.setProperty('--accentColorDark', theme[6])
  document.documentElement.style.setProperty('--fontColorDark', theme[7])
}
function clockUp(clock) {
  var clckIntrv
  var hourTick = clock.getElementById('hour-tick')
  var minuteTick = clock.getElementById('minute-tick')
  const d = new Date()
  const locale = window.navigator.language
  clock.getElementById('day-name').innerHTML = d.toLocaleDateString(locale, { weekday: 'long' })
  clock.getElementById('date-day').innerHTML = d.toLocaleDateString(locale, { day: 'numeric' })
  clock.getElementById('date-my').innerHTML = d.toLocaleDateString(locale, { month: 'short', year: 'numeric' })
  var update = function (a) { 
  	let ticks = a.getMinutes() * 6.0 + (d.getSeconds()/10.0)
  	minuteTick.setAttribute('transform', 'rotate('+ticks+' 100 100)')
  	ticks /= 360.0
  	ticks += a.getHours() * 30.0
  	hourTick.setAttribute('transform', 'rotate('+ticks+' 100 100)')
  }
  update(d)
  setTimeout(() => {
    update(new Date())
	  clckIntrv = setInterval(update(new Date()), 1000)
  }, 59 - d.getSeconds())
	clock.addEventListener('unload', () => {
    if(!clckIntrv) return
  	clearInterval(clckIntrv)
  	clckIntrv = null
	})
}
updateStyling()
</script>
</html>


