<?php
/*** set the content type header ***/
/*** Without this header, it wont work ***/
header("Content-type: text/css");
?>

* {
padding: 0;
margin: 0;
}

body {
background-color: white
font-style: Arial;

}


#header {
background-color: black;
padding-top:20px;
padding-bottom:20px;
padding-left: 10px;
width: 100%;
}

#banner {
padding-top: 10px;
padding-bottom: 10px;
width:100%;
display: flex;
}

#footer {
background-color: black;
color: #fff;
padding-top: 30px;
padding-bottom: 30px;
padding-left: 10px;
width:100%;

}

#footer_text {
margin: 0 auto;
}
.container {
width: 90%;
margin: 0 auto;
display:flex;
}

#site_name {
color: black;
font-size: 50px;
width: 50%;
display: flex;
justify-content: center;
align-items: center;
text-transform: uppercase;
}

#icons {
width: 25%;
justify-content: center;
align-items: center;
display: flex;

}


.menu_top {
list-style: none;
float: right;
margin-left:80%;

}


.menu_top li {
display: inline-block;
margin-left:30px;

}

.menu_top li a {
color: white;
text-decoration: none;
}

.menu_top li a:hover {
text-decoration:underline;
}

.menu_bottom {
list-style: none;
font-size: 20px;
align-items: center;
vertical-align: middle;
margin: 0 auto;
}


.menu_bottom li {
display: inline-block;
margin-left:30px;

}

.menu_bottom li a {
color: black;
text-decoration: none;
}

.menu_bottom li a:hover {
text-decoration:underline;
}



.page-content {
min-height:800px;
margin: 0px;
padding: 0px;
justify-content: center;
align-items: center;
display: flex;
flex-flow: row;
}



Table.food-table{
border: 1px transparent ;
width:600px;
border-collapse: separate;
margin-top:20px;

}

#search_container {
width: 25%;
justify-content: center;
align-items: center;
display:flex;

}


#search_container input[type=text] {
padding: 6px;
margin-top: 8px;
font-size: 17px;
border: 1px solid lightgrey;
}

#search_container button {
position: relative;
padding: 6px;
margin-top: 8px;
margin-right: 16px;
background: #ddd;
font-size: 17px;
border: none;
cursor: pointer;
}

#search_container button:hover {
background: #ccc;
}

#product {
padding-top: 20px;
width: 60%;
display: flex;
margin: 0 auto;
text-transform: uppercase;
}

#makeup {
width:25%;
justify-content: center;
align-items: center;
display:flex;
}

#skin {
width:25%;
justify-content: center;
align-items: center;
display:flex;
}

#fragrance {
width:25%;
justify-content: center;
align-items: center;
display:flex;
}

#other {
width: 25%;
justify-content: center;
align-items: center;
display:flex;
}

table {
font-family: arial, sans-serif;
border-collapse: collapse;
width: 100%;
}

td, th {
border: 1px solid #dddddd;
text-align: left;
padding: 8px;
}

tr:nth-child(even) {
background-color: #f2f2f2;
}

tr:hover {background-color: #ddd;}
