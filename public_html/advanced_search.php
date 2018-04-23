<!DOCTYPE html>
<html>
<title>advance search</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>

<form class="w3-container w3-card-4" action="/advance_action.php" method = "GET">
  <h2 class="w3-text-blue">Advanced Search</h2>
  <p>This will based on user's preference of news category:</p>
  <p>Chose any itme that would apply the need:</p>
  <p>      
  <label class="w3-text-blue"><b>Key Word</b></label>
  <input class="w3-input w3-border" name="keyword" type="text"></p>
  <p>      
  <label class="w3-text-blue"><b>Maximum number of news: (interger)</b></label>
  <input class="w3-input w3-border" name="number" type="value"></p>
  <p>      
  
  <h2 class="w3-text-blue">Choice Category</h2>
  <p>
  <input class="w3-check" type="checkbox" name = "isGeneral">
  <label>General</label></p>
  <p>
  <input class="w3-check" type="checkbox" name = "isPolitics">
  <label>Politics</label></p>
  <p>
  <input class="w3-check" type="checkbox" name = "isSport">
  <label>Sport</label></p>
  <h2 class="w3-text-blue">Choice date</h2>
  <input class="w3-radio" type="radio" name="isDate" checked>
  <label>Most Fresh New (newest)</label></p>
  
  <button class="w3-btn w3-blue"> Advance Seach </button></p>
  
  
  
</form>


</body>
</html> 
