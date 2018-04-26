counter = 0;
GlobalData = 0;
goodAns = 0;
totalAns = 0;

first = true;

// set numbers on quiz questions
function quizSetup(){

  var url_string = window.location.href;
  var url = new URL(url_string);
  var name = url.searchParams.get("name");

  $('.quizTitle').html(name);

  var quizBox;
  var quizBody = $('.quizBody');
  for (i=0; i < quizBody.length; i++){
    // set question number in sequence
    $(quizBody[i]).addClass('question' + (i+1));
  }
  quizActions();
};


// events
function quizActions(){
  var questAll = $('.quizBody');
  var questEnd = questAll.length;
  var questNow;
  var classNow;
  var questNum;
  var questNext;
  var questBack;
  var thisResult;
  var missingAnswerArray = [];
  var finalResult = [];
  
  $('#getStarted').click(function(){
    $('.intro').removeAttr('id');
    $(questAll[0]).attr('id', 'questionNow')
  });
  // select quiz answer
  $('.quizBox').click(function(){
    // ui to indicate selection
    questNow = $('#questionNow');
    $(questNow).find('.quizBox').removeClass('boxSelect');
    $(this).addClass('boxSelect');
    
    // identify selection
    thisResult = $(this).attr('id');
    // mark this question as answered
    /*$(questNow).addClass('answered');
    if ($(questNow).hasClass('unAnswered')){
      $(questNow).removeClass('unAnswered');
    }*/
    // get and return the correct question number
    getThisQuest('answer');
    // put ths result into the proper index of the array
    finalResult[questNum] = thisResult;
    // take user to nav buttons at bottom of page
    $('html,body').animate({ scrollTop: 2000 }, 'slow');
  });

  // get the current question class (called by back/next buttons)
  function getThisQuest(direction){
    questNow = $('#questionNow');
    classNow = $(questNow).attr('class');
    questNum = classNow.split('question');
    questNum = parseInt(questNum[1]);
    // split off  - track question # for results
    if (direction === 'answer'){
      return (questNum);
      }
    // split off  - track question # for pagination
    else {
      questNext = $('.quizBody.question' + (questNum + 1));
      questBack = $('.quizBody.question' + (questNum - 1));
      quizMove(direction);
      }
    };

    // next and back buttons
    $('.btnNext').click(function(){
      // change behavior in error correction state
      if ($(this).hasClass('errFix')){
        getThisQuest('cleanup');
      }
      // normal behavior
      else {

        counter ++;
        first = true;
        $(".resultQ").html("");

        getThisQuest('next');
        // change button text for first/last question
        if (questEnd === (questNum + 1)){
          $('.btnNext').html('Finish <i class="fa fa-check" aria-hidden="true"></i>')
        }
        if (questEnd != (questNum + 1)){
          $('.btnNext').html('Next <i class="fa fa-chevron-right" aria-hidden="true"></i>')
        }
        if (questNum != 2){
          $('.btnBack').removeClass('inactive')
        }
      }
    });
    $('.btnBack').click(function(){
      
      counter --;
      $(".resultQ").html("");

      getThisQuest('back');
      // change button text for first/last question
      if (questNum === 2){
        $('.btnBack').addClass('inactive')
      }
      if (questEnd != (questNum + 1)){
        $('.btnNext').html('Next <i class="fa fa-chevron-right" aria-hidden="true"></i>')
      }
    });

    function sleep(miliseconds) {
      var currentTime = new Date().getTime();
   
      while (currentTime + miliseconds >= new Date().getTime()) {
      }
   }

  // navigating between questions
  function quizMove(direction){
    $(questNow).removeAttr('id');
    if (direction === 'next'){
      if (questEnd > questNum){
        $(questNext).attr('id' , 'questionNow')
      }
      else {
        $(questNow).attr('id' , 'questionNow')
        // check to make sure every question has an answer
        checkAns();
      }
    }
    else if (direction === 'back'){
      if (questNum > 1){
        $(questBack).attr('id' , 'questionNow')
      }
      else {
        alert('You can\'t back up any more, silly!'); // user is already on first question
        $(questNow).attr('id' , 'questionNow')
      }
    }
    else if (direction === 'cleanup'){
      // highlight unanswered questions until all are answered
      var stillUnAnswered = $('.quizBody.unAnswered');
      $(stillUnAnswered[0]).attr('id' , 'questionNow');
      if (stillUnAnswered.length < 2) {
        $('.btnNext').html('Finish <i class="fa fa-check" aria-hidden="true"></i>');
      }
      if (stillUnAnswered.length < 1) {
        checkAns();
      }
    }
  };
  
  // called when all questions have answers and the finish button is selected
  function sendResult(){
    // put result into local storage for access by success page
    localStorage.setItem('totalAns', totalAns);
    localStorage.setItem('goodAns', goodAns);

    // open success page
    var url_string = window.location.href;
    var url = new URL(url_string);
    var c = url.searchParams.get("category");
    var name = url.searchParams.get("name");

     window.location.href = "success1.php?name="+name+"&category="+c;
  };
  
  //make sure every question has been answered 
  function checkAns(){
    sendResult();
    // nested function to display alert for missing answer
  }; // end checkAns
}; // end quizActions

// get data after page load so there are elements to fill
function init(){
  getData();
};

window.onload = init;

// get the quiz data from the external JSON file
function getData(){
  var url_string = window.location.href;
  var url = new URL(url_string);
  var c = url.searchParams.get("category");
  var name = url.searchParams.get("name");
  $.getJSON( "http://"+$(location).attr('hostname')+"/"+ c +"/"+ name +".json", function( data ) {
    GlobalData = data;
    quizSetupv2(data);
  });
}

// build quiz
// question level - loop through each question object
function quizSetupv2(quizData){
  var qID;
  var qText;
  var qAnswers;
  var qLength;
  var qCorrectAnswers = []

  totalAns = quizData.length;

  // loop through JSON objects
  for(i=0; i < quizData.length; i++){
    qID = (quizData[i].question_id + 1);
    qText = quizData[i].question;
    //qAnswers = quizData[i].answers;
    qLength = quizData.length;
    qLength = qLength.toString();
    //qCorrectAnswers.push(quizData[i].correct);
    // send each object to build function
    buildQuiz(qID, qText, qLength);
  }
  quizSetup();
}

// answer level - this function is executed at each cycle of the above question loop 
function buildQuiz(qID, qText, qLength){
  // build HTML in parts
  var quizTop = '<section class="quizBody text-center"><h2 class="quizQuestion"><span class="questionNum">' + qID + '/' + qLength + '</span> ' + '<br/><p onclick="myFunction()" class="questionTitle clickable">'  + qText + '</p>' + '</h2><div class="row"><div class="col-lg-12 resultQ"></div>';
  var quizBottom = '</div><div class="row"><div class="col-lg-6 col-sm-offset-3 col-sm-3 col-xs-6"><button class="btn btn-lg btn-default btnBack inactive"><i class="fa fa-chevron-left" aria-hidden="true"></i> Back</button></div><div class="col-lg-6 col-sm-3 col-xs-6"><button class="btn btn-lg btn-default btnNext">Next <i class="fa fa-chevron-right" aria-hidden="true"></i></button></div></div></section>';
  // assemble HTML parts
  var quizPiece = quizTop + quizBottom;
  // inject each question/answer HTML into doc
  $(quizPiece).appendTo($('.questionContainer'));
  return;
}

function myFunction(){

      s= window.getSelection();

      var range = s.getRangeAt(0);
      var node = s.anchorNode;
      while(range.toString().indexOf(' ') != 0) {                 
        range.setStart(node,(range.startOffset -1));
      }
      range.setStart(node, range.startOffset +1);
      do{
        range.setEnd(node,range.endOffset + 1);
      }while(range.toString().indexOf(' ') == -1 && range.toString().trim() != ' ');

    var str = range.toString().trim();

    if(str.trim() == GlobalData[counter].triger.trim()){
      if(first){
        $(".resultQ").html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Good ! </strong>'+GlobalData[counter].rule.trim()+'</div>');
        goodAns ++;
        first = false;
      }
    }else{
      if(first){
        $(".resultQ").html("");
        $(".resultQ").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Not good ! </strong>'+GlobalData[counter].rule.trim()+'</div>');
        first = false;
      }
    }
}