<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
* {box-sizing: border-box;}

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #e9e9e9;
}

.topnav a {
  float: left;
  display: block;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #2196F3;
  color: white;
}

.topnav .search-container {
  float: right;
}

.topnav input[type=text] {
  padding: 6px;
  margin-top: 8px;
  font-size: 17px;
  border: none;
}

.topnav .search-container button {
  float: right;
  padding: 6px 10px;
  margin-top: 8px;
  margin-right: 16px;
  background: #ddd;
  font-size: 17px;
  border: none;
  cursor: pointer;
}

.topnav .search-container button:hover {
  background: #ccc;
}

@media screen and (max-width: 600px) {
  .topnav .search-container {
    float: none;
  }
  .topnav a, .topnav input[type=text], .topnav .search-container button {
    float: none;
    display: block;
    text-align: left;
    width: 100%;
    margin: 0;
    padding: 14px;
  }
  .topnav input[type=number] {
    border: 1px solid #ccc;
  }
}
</style>


<form action="" method="post">
  <div style='
  margin: auto;
  width: 60%;
  border: 3px solid #73AD21;
  padding: 10px;


  font-size: 17px;'>
<input style='  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: none;
  border-bottom: 2px solid red;' type="number"  name="anum" placeholder="Search auction.. i.e 17873">
<input type="submit" name="submitbutton" value="Submit">
</div>
</form>

<?php

if( isset( $_POST['submitbutton'] ) ) {
$curl = curl_init(); //$curl is going to be data type curl resource
$input = $_POST['anum'];
$search_string = "17873";
$url = "https://www.thanationwide.com.au/catalogue-group.aspx?chid=$input&BID=";

curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
 curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$result = curl_exec($curl);
preg_match_all("!https://images.bidsonline.com.au/images/site/THA/READYFORSALE/[^\s]*?.jpg!", $result, $matches);

 $images = array_values(array_unique($matches[0]));

for ($i = 0; $i < count ($images); $i++) {
  echo "<div style='float: left;  max-width: 40%; height: auto; margin: 10 10 10 10; '>";
  echo "<img style='' src='$images[$i]'><br />";
  echo "</div>";
}
curl_close($curl);
}
 ?>
