actvQustionID = '';
function onclickAnswer() {
    $(document).ready(function(){
        $("#answer1").click(function(){
            clickedOnAnswer('a1');
        });
        $("#answer2").click(function(){
            clickedOnAnswer('a2');
        });
        $("#answer3").click(function(){
            clickedOnAnswer('a3');
        });
        $("#answer4").click(function(){
            clickedOnAnswer('a4');
        });
    });
}

function hiddenAll() {
    document.getElementById('answer').hidden = true;
    document.getElementById('answer4').hidden = true;
    document.getElementById('answer4').hidden = true;
    document.getElementById('answer4').hidden = true;
}

function noData(q) {
    if (q == 'no') {
        document.getElementById('question').innerHTML = '<div class="loader"></div>  Please Wait to active question';
        document.getElementById('answers').innerHTML = '';
    }else{
        document.getElementById('question').innerHTML = '';
    }
}


function getQuestion(id) {
    if (id != 'no') {
        $.ajax({
            url: 'phpTool/mobileReal.php',
            method: 'POST',
            data: {
                id: id,
                work: 'getQuestion'
            },
            success: function (response) {
                document.getElementById('question').innerHTML = response;
            }
        })
    }    
}

function getAnswersHtml(id) {
    if (id != 'no') {
        $.ajax({
            url: 'phpTool/mobileReal.php',
            method: 'POST',
            data: {
                id: id,
                work: 'getAnswersHtml'
            },
            success: function (response) {
                document.getElementById('answers').innerHTML = response;
                getAnswers(id);
            }
        })
    }    
}

function getAnswers(id) {
    if (id != 'no') {
        $.ajax({
            url: 'phpTool/mobileReal.php',
            method: 'POST',
            data: {
                id: id,
                work: 'getAnswers'
            },
            success: function (response) {
                response = response.split("•");
                // hidden answer box if answer empty
                if (response[0] != false) {
                    $("#answer1 .info-box-content .info-box-number").text(response[0]);
                }else{
                    try {
                        document.getElementById('answer1').hidden = true;
                    } catch (error) {}
                }

                if (response[1] != false) {
                    $("#answer2 .info-box-content .info-box-number").text(response[1]);
                }else{
                    try {
                        document.getElementById('answer2').hidden = true;
                    } catch (error) {}
                }

                if (response[2] != false) {
                    $("#answer3 .info-box-content .info-box-number").text(response[2]);
                }else{
                    try {
                        document.getElementById('answer3').hidden = true;
                    } catch (error) {}
                }

                if (response[3] != false) {
                    $("#answer4 .info-box-content .info-box-number").text(response[3]);
                }else{
                    try {
                        document.getElementById('answer4').hidden = true;
                    } catch (error) {}
                }
                onclickAnswer();
            }
        })
    }    
}

function clickedOnAnswer(answer) {
    $.ajax({
        url: 'phpTool/mobileReal.php',
        method: 'POST',
        data: {
            answer: answer,
            id: actvQustionID,
            work: 'answer'
        },
        success: function (response) {
            hiddenAll();
            document.getElementById('question').innerHTML = '<div class="loader"></div>  Please Wait to active question';
        }
    })
}



/**************  Run check and get question and answers **************/
function checkQuestion() {
    $.ajax({
        url: 'phpTool/mobileReal.php',
        method: 'POST',
        data: {
            //add mac check at this function
            group: GroupID,
            work: 'checkQuestion'
        },
        success: function (response) {
            console.log(response);
            
            //clearInterval(check); // delete this 
            if (response != actvQustionID) {
                noData(response);
                getQuestion(response);
                getAnswersHtml(response);
                actvQustionID = response;
                console.clear();
            }

        }
    })
}

$(document).ready(function(){
    check = setInterval("checkQuestion()", 1200);
    //to stop use /clearInterval(check);/ check is var  
})

