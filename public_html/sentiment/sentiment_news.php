<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
    font-family: Arial;
}

* {
    box-sizing: border-box;
}

form.search_link input[type=text] {
    padding: 10px;
    font-size: 17px;
    border: 1px solid grey;
    float: left;
    width: 60%;
    background: #f1f1f1;
}

form.search_link button {
    float: left;
    width: 40%;
    padding: 10px;
    background: #2196F3;
    color: white;
    font-size: 17px;
    border: 1px solid grey;
    border-left: none;
    cursor: pointer;
}

form.search_link button:hover {
    background: #0b7dda;
}

form.search_link::after {
    content: "";
    clear: both;
    display: table;
}

#nav_botton
{
    width:100%;
    text-align: center;
}
.link
{
    margin-top:2cm;
    height:20px; 
    width:100px; 
    display: inline-block;
}

h2{
    text-align: center;
}

h5{
    text-align: center;
}
</style>
</head>
<body>

<h2>News Sentiment Analysis</h2>



<h5>original searching:</h5>
<div>
<form class="search_link" action="/../search.php" style="margin:auto;max-width:300px">
  <input type="text" name="search">
  <button type="submit"><i class="fa fa-search"></i></button>
</form>
</div>

<h5>Search keyword [sen_key search]</h5>
<div>
    
<form class="search_link" action="sen_search.php" style="margin:auto;max-width:500px">
   <input type="text" name="search" placeholder="Firstname" >
  <button type="submit"> GO  <i class="fa fa-sitemap"></i></button>
</form>
</div>


</body>
</html> 
