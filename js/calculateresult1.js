// local storage method for user answers
var goodAns = localStorage.getItem('goodAns');
var totalAns = localStorage.getItem('totalAns');

//calculates the percent correct
function checkResult(goodAns, totalAns) {
  var score = ((goodAns * 100)/totalAns).toFixed();
  return score;
}

//display result in success page
function displayResult() {
  var url_string = window.location.href;
  var url = new URL(url_string);
  var name = url.searchParams.get("name");

  $('.quizTitle').html(name);

  $('.result').html('You scored <span class="displayPercent">' + checkResult(goodAns, totalAns) + ' percent</span> on the quiz!');
}
window.onload = displayResult;
