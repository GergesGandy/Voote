var qID = '';
var form = '';
var groupId = '';
var varToUse = '';
$(document).ready(function(){
    $(".logout").click(function(){
        $.ajax({
            url: 'phpTool/logout.php',
            method: 'POST',
            success: function (response) {
                window.location.href = 'login.php';
                console.log(response);
            }
        })
    });
    $("#imgForm1").click(function(){
        document.getElementById('imgForm1').style.backgroundColor = '#6666669c';
        ajaxEditForm(qID, '1');
        editForm(1, 'textNew');
        document.getElementById('textNew').style = 'place-content: center;'
        document.getElementById('realTimeChart').style = 'justify-content: center;'
        $('#a1').val('').change();
        $('#a2').val('').change();
        $('#a3').val('').change();
        $('#a4').val('').change();
    });
    $("#imgForm2").click(function(){
        document.getElementById('imgForm2').style.backgroundColor = '#6666669c';
        ajaxEditForm(qID, '2');
        editForm(2, 'textNew');
        $('#a1').text('Best').change();
        $('#a2').text('Good').change();
        $('#a3').text('bad').change();
        $('#a4').text('Very Bad').change();
    });
    $("#imgForm3").click(function(){
        document.getElementById('imgForm3').style.backgroundColor = '#6666669c';
        ajaxEditForm(qID, '3');
        editForm(3, 'textNew');
        document.getElementById('textNew').style = 'place-content: end;'
        $('#a1').val('Like').change();
        $('#a2').val('Dislike').change();
    });
    $("#quesText").change(function(){
        var text = document.getElementById('quesText').value;
        ajaxEdit(qID, text, 'q','Question')
        getGroupQuestions();
        chechChangeIfQuestionEmpty();
    });
    $("#a1").change(function(){
        var text = document.getElementById('a1').value;
        ajaxEdit(qID, text, 'a1', 'Answer 1')
    });
    $("#a2").change(function(){
        var text = document.getElementById('a2').value;
        ajaxEdit(qID, text, 'a2', 'Answer 2')
    });
    $("#a3").change(function(){
        var text = document.getElementById('a3').value;
        ajaxEdit(qID, text, 'a3', 'Answer 3')
    });
    $("#a4").change(function(){
        var text = document.getElementById('a4').value;
        ajaxEdit(qID, text, 'a4', 'Answer 4')
    });
    $("#topCard").click(function(){
        printId = groupId.toString();
        document.getElementById('qID').innerHTML = printId[0] + printId[1] + printId[2] + ' ' +
        printId[3] + printId[4] + printId[5] + ' ' + printId[6] + printId[7] + printId[8];
        $("#linkTo").attr("href", "mobile.php?GroupId=" + printId);
        activeQuestion(qID);
        chooseChartRun();
    });

    $("#createG").click(function() {
        if ($('#createName').val().length != 0) {
            CreateGroup($('#createName').val());
        }else{
            alert('Enter group name');
        }
    });

    if(document.getElementById('newQues')){
        $("#newQues").click(function(){
            var data = ajaxNew();
        });
    }
    getGroupQuestions();
});

function succes(type) {
    toastr.success('Your change on (' + type + ') is saved.');
}

function ajaxNew() {
    if(document.getElementById('newQues')){
        $.ajax({
            url: 'phpTool/realEdit.php',
            method: 'POST',
            data: {
                work: 'NewQuestion'
            },
            success: function (response) {
                console.log(response);
                if (response.length === 9){
                    qID = response;
                    $('#data').removeClass('hidden');
                    $('#forms').removeClass('hidden');
                    document.getElementById('titleNew').textContent = 'Add';
                    $('#titleNew').removeClass('bg-danger');
                    $('#titleNew').addClass('bg-success');
                    $('#contentNew').removeClass('bg-gray');
                    $('#contentNew').addClass('contentNew');
                    document.getElementById('textNew').innerHTML = 'Choose your form <br> style.';
                    document.getElementById('newQues').id = '';
                    getGroupId();
                }else {
                    console.log('No')
                }

            }
        })
    }
}

function ajaxEdit(snq, text, type, succe) {
    $.ajax({
        url: 'phpTool/realEdit.php',
        method: 'POST',
        data: {
            snq: snq,
            text: text,
            type: type,
            work: 'EditQuestion'
        },
        success: function (response) {
            if (response === 'done'){
                succes(succe);
                runChart();
            }
        }
    })
}

function ajaxEditForm(snq, form) {
    $.ajax({
        url: 'phpTool/realEdit.php',
        method: 'POST',
        data: {
            snq: snq,
            form: form,
            work: 'EditForm',
        },
        success: function (response) {
            console.log(response);
            
            if (response === 'done'){
                succes('Forms')
            }
        }
    })
}

function editForm(formNUM, placeID) {
    if (placeID == 'textNew') {
        document.getElementById('topCard').innerHTML = '<button title="Full Screen" id="modalActivate" type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModalPreview" style="\n' +
        '    margin-top: 25%;\n' +
        '">\n' +
        '    <i class="fas fa-compress"></i>\n' +
        '</button>';
    }
    if (formNUM == 1){
        document.getElementById('a1').disabled = false;
        document.getElementById('a2').disabled = false;
        document.getElementById('a3').disabled = false;
        document.getElementById('a4').disabled = false;
        $('#' + placeID ).replaceWith('<div class="row" id="'+placeID+'"></div>');
        document.getElementById(placeID).innerHTML = ' <div class="col-md-12">'
        + '<div class="box box-primary">'
        + '  <div class="box-body">'
        + '    <div id="bar-chart" style="height: 300px;width:100%;"></div>'
        + '  </div>'
        + '</div>';
        form = '1';
        checkAnswersChart('form1');
        runChart();
    }else if (formNUM == 2) {
        $('#' + placeID ).replaceWith('<div class="row" id="'+placeID+'"></div>');
        document.getElementById(placeID).innerHTML = '<div class="col-6 text-center">'
      +  '<i class="far fa-laugh col-10 m-4 text-success faceAnswer" id="fa1"></i>'
      +  '<i class="far fa-frown col-10 m-4 text-warning faceAnswer" id="fa3"></i>'
      + '</div>'
      + '<div class="col-6 text-center">'
      + '<i class="far fa-smile col-10 m-4 text-primary faceAnswer" id="fa2"></i>'
      + '<i class="far fa-angry col-10 m-4 text-danger  faceAnswer" id="fa4"></i>'
      + '</div>';
        form = '2';
        checkAnswersChart('form2');
    }else if (formNUM == 3){
        document.getElementById('a1').disabled = false;
        document.getElementById('a2').disabled = false;
        document.getElementById('a3').disabled = true;
        document.getElementById('a4').disabled = true;
        $('#' + placeID ).replaceWith('<div class="row" id="'+placeID+'"></div>');
        document.getElementById(placeID).innerHTML = '<div class="col-6 text-center">\n' +
            '        <input type="text" class="knob" id="chartData1" value="0" data-width="200" data-height="200" data-fgColor="#39CCCC">\n' +
            '        <div class="knob-label">Like</div>\n' +
            '    </div>\n' +
            '    <div class="col-6 text-center">\n' +
            '        <input type="text" class="knob" id="chartData2" value="0" data-width="200" data-height="200" data-fgColor="#dc3545">' +
            '        <div class="knob-label">Dislike</div>\n' +
            '    </div>';
            form = '3';
        runChart();
        checkAnswersChart('form3');
    }
    document.getElementById('data').hidden = false;
    $('#createNewTab').removeClass('d-none');
}

/* to edit in chart realtime use $('#inputID').val('40').change();*/
function runChart() {
    setTimeout(function(){
        $(function () {
            if (form == 1) {
                var answerCount = $('#hiddenVal').val().split(",");
                an1 = []; 
                an2 = []; 
                an3 = []; 
                an4 = []; 

                if ($('#a1').val() != '') {
                    an1 = [1,answerCount[1]];
                } 
                if ($('#a2').val() != '') {
                    an2 = [2,answerCount[2]];
                } 
                if ($('#a3').val() != '') {
                    an3 = [3,answerCount[3]];
                } 
                if ($('#a4').val() != '') {
                    an4 = [4,answerCount[4]];
                } 
                var bar_data = {
                    data : [an1, an2, an3, an4],
                    bars: { show: true }
                }
                $.plot('#Real-time-bar-chart', [bar_data], {
                    grid  : {
                    borderWidth: 1,
                    borderColor: '#f3f3f3',
                    tickColor  : '#f3f3f3'
                    },
                    series: {
                        bars: {
                        show: true, barWidth: 0.5, align: 'center',
                    },
                    },
                    colors: ['#3c8dbc'],
                    xaxis : {
                    ticks: [[1, $('#a1').val()], [2, $('#a2').val()], [3, $('#a3').val()], [4, $('#a4').val()]]
                    }
                })

                $.plot('#bar-chart', [bar_data], {
                    grid  : {
                    borderWidth: 1,
                    borderColor: '#f3f3f3',
                    tickColor  : '#f3f3f3'
                    },
                    series: {
                        bars: {
                        show: true, barWidth: 0.5, align: 'center',
                    },
                    },
                    colors: ['#3c8dbc'],
                    xaxis : {
                    ticks: [[1, $('#a1').val()], [2, $('#a2').val()], [3, $('#a3').val()], [4, $('#a4').val()]]
                    }
                })
            } else if (form == 3) {
                $('.knob').knob({
                    /*change : function (value) {
                     //console.log("change : " + value);
                     },
                     release : function (value) {
                     console.log("release : " + value);
                     },
                     cancel : function () {
                     console.log("cancel : " + this.value);
                     },*/
                    draw: function () {
        
                        // "tron" case
                        if (this.$.data('skin') == 'tron') {
        
                            var a   = this.angle(this.cv)  // Angle
                                ,
                                sa  = this.startAngle          // Previous start angle
                                ,
                                sat = this.startAngle         // Start angle
                                ,
                                ea                            // Previous end angle
                                ,
                                eat = sat + a                 // End angle
                                ,
                                r   = true
        
                            this.g.lineWidth = this.lineWidth
        
                            this.o.cursor
                            && (sat = eat - 0.3)
                            && (eat = eat + 0.3)
        
                            if (this.o.displayPrevious) {
                                ea = this.startAngle + this.angle(this.value)
                                this.o.cursor
                                && (sa = ea - 0.3)
                                && (ea = ea + 0.3)
                                this.g.beginPath()
                                this.g.strokeStyle = this.previousColor
                                this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false)
                                this.g.stroke()
                            }
        
                            this.g.beginPath()
                            this.g.strokeStyle = r ? this.o.fgColor : this.fgColor
                            this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false)
                            this.g.stroke()
        
                            this.g.lineWidth = 2
                            this.g.beginPath()
                            this.g.strokeStyle = this.o.fgColor
                            this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false)
                            this.g.stroke()
        
                            return false
                        }
                    }
                })
            }
        })
    }, 300);
}

function activeQuestion(){
    $.ajax({
        url: 'phpTool/realEdit.php',
        method: 'POST',
        data: {
            snq: qID,
            form: form,
            work: 'ChangeActive',
        },
        success: function (response) {
            if (form == 1) {
                checkQuery = setInterval("checkAnswersChart('form1')", 500);
            }else if (form == 2) {
                checkQuery = setInterval("checkAnswersChart('form2')", 500);
            }else{
                checkQuery = setInterval("checkAnswersChart()", 500);
            }
            //to stop use /clearInterval(checkQuery);/ checkQuery is var           
        }
    })
}

function closeActive(){
    $.ajax({
        url: 'phpTool/realEdit.php',
        method: 'POST',
        data: {
            snq: qID,
            work: 'closeActive',
        },
        success: function (response) {
            clearInterval(checkQuery);
            document.getElementById('realTimeChart').innerHTML = '';
            checkAnswersChart('form3');
        }
    })
}
//get chart to real-time screen full screen (projector)
function chooseChartRun() {
    $.ajax({
        url: 'phpTool/realEdit.php',
        method: 'POST',
        data: {
            snq: qID,
            work: 'getStyle'
        },
        success: function (response) {
            document.getElementById('chartRealContent').innerHTML = response;
            runChart();
        }
    })
    
}

window.onload = function() {
    document.addEventListener("contextmenu", function(e){
      e.preventDefault();
    }, false);
    document.addEventListener("keydown", function() {
      if (event.keyCode == 27 || event.keyCode == 116) {
        closeActive();
      }
    }, false);
  };


function CreateGroup(groupName) {
    $.ajax({
        url: 'phpTool/realEdit.php',
        method: 'POST',
        data: {
            groupName: groupName,
            work: 'CreateGroup',
        },
        success: function (response) {
            console.log(response);
            if (response.length == 9) {
                window.location.href = 'DashboardQ.php';
            }
        }
    })
}

function getGroupId() {
    $.ajax({
        url: 'phpTool/realEdit.php',
        method: 'POST',
        data: {
            snq: qID,
            work: 'getGroupId',
        },
        success: function (response) {
            if (response.length == 9) {
                groupId = response;
            }
        }
    })
}

function getGroupQuestions() {
    $.ajax({
        url: 'phpTool/realEdit.php',
        method: 'POST',
        data: {
            work: 'getGroupQuestions',
        },
        success: function (response) {
            document.getElementById('GroupQuestions').innerHTML = response;
        }
    })
}

function changeQuestionId(id, formload, group) {
    qID = id;
    form = formload;
    groupId = group;
    loadDataChangeQues();
    $('#data').removeClass('hidden');
    $('#forms').removeClass('hidden');
    try {
        document.getElementById('titleNew').textContent = 'Add';
      } catch {
        console.log('change from question is done');
      }
    $('#titleNew').removeClass('bg-danger');
    $('#titleNew').addClass('bg-success');
    $('#contentNew').removeClass('bg-gray');
    $('#contentNew').addClass('contentNew');
    editForm(formload, 'textNew');
    if (formload == 0) {
        document.getElementById('textNew').innerText = 'Please choose form'
    }
    try {
        document.getElementById('newQues').id = '';
    } catch{}
    console.clear();
}

function loadDataChangeQues(dataTo) {
    $.ajax({
        url: 'phpTool/realEdit.php',
        method: 'POST',
        data: {
            snq: qID,
            work: 'loadDataChangeQues',
        },
        success: function (response) {
            if (dataTo === undefined ) {
                response = response.split("•");
                $("#quesText").text(response[0]);
                $("#a1").text(response[1]);
                $("#a2").text(response[2]);
                $("#a3").text(response[3]);
                $("#a4").text(response[4]);
                chechChangeIfQuestionEmpty();
            }else{
                return response.toString();               
            }
        }
    })
}

function checkAnswersChart(dataTo) {
    $.ajax({
        url: 'phpTool/realEdit.php',
        method: 'POST',
        data: {
            snq: qID,
            work: 'checkAnswersChart',
        },
        success: function (response) {
            response = response.split("•");
            document.getElementById('countAnswers').innerHTML = response[0];
            if (dataTo === undefined) {
                $('#ansCha1').val(response[1]).change();
                $('#ansCha2').val(response[2]).change();
                $('#ansCha3').val(response[3]).change();
                $('#ansCha4').val(response[4]).change();
            }else if (dataTo == 'form1') {
                $('#hiddenVal').val(response).change();
                runChart();
            }else if (dataTo == 'form2') {

                $('#fa1').css({'transform': 'scale(' + ((response[1]/100)+ .5) + ')'}).prop('title', Math.ceil(response[1]) + '%');
                $('#fa2').css({'transform': 'scale(' + ((response[2]/100)+ .5) + ')'}).prop('title', Math.ceil(response[2]) + '%');
                $('#fa3').css({'transform': 'scale(' + ((response[3]/100)+ .5) + ')'}).prop('title', Math.ceil(response[3]) + '%');
                $('#fa4').css({'transform': 'scale(' + ((response[4]/100)+ .5) + ')'}).prop('title', Math.ceil(response[4]) + '%');

                $('#faP1').css({'transform': 'scale(' + ((response[1]/100)+ .5) + ')'}).prop('title', Math.ceil(response[1]) + '%');
                $('#faP2').css({'transform': 'scale(' + ((response[2]/100)+ .5) + ')'}).prop('title', Math.ceil(response[2]) + '%');
                $('#faP3').css({'transform': 'scale(' + ((response[3]/100)+ .5) + ')'}).prop('title', Math.ceil(response[3]) + '%');
                $('#faP4').css({'transform': 'scale(' + ((response[4]/100)+ .5) + ')'}).prop('title', Math.ceil(response[4]) + '%');

            }else if (dataTo == 'form3') {
                $('#hiddenVal').val(response).change();
                $('#chartData1').val(response[1]).change();
                $('#chartData2').val(response[2]).change();
            }
        }
    })
}


function chechChangeIfQuestionEmpty() {
    if ($('#quesText').val() == '') {
        document.getElementById('mainTitle').style.display = 'block';
        document.getElementById('secTitle').style.display = 'none';
    }else{
        document.getElementById('secTitle').innerText = $('#quesText').val() + ' ' + '';
        document.getElementById('secTitle').style.display = 'block';
        document.getElementById('mainTitle').style.display = 'none';
        document.getElementById('textOnProjector').innerText = $('#quesText').val();
    }   
}

/***************************** profile page ******************************/

$(document).ready(function(){
    $("#proimag").click(function(){
        $('#proimag').on('shown.bs.modal', function () {
            $('#proimag').trigger('focus')
            })
        console.log(55);
        
    });
    $("#changePass").click(function(){  
        if ($("#newPass").val().length > 8){
            $.ajax({
                url: 'phpTool/realEdit.php',
                method: 'POST',
                data: {
                    oldPass: $("#oldPass").val(),
                    newPass: $("#newPass").val(),
                    work: 'changePassword',
                },
                success: function (response) {
                    if (response == 'right') {
                        $('#wrongMS').addClass('d-none');
                        $('#rightMS').removeClass('d-none');
                    }else if (response == 'wrong') {
                        $('#rightMS').addClass('d-none');
                        $('#wrongMS').removeClass('d-none');
                    }
                }
            })
        }else{
            alert("Please password length it should be bigger of 8 character");
        }
    });
    $("#userName").click(function(){
        $('#userName').addClass('none-d');
        $('#changeName').removeClass('none-d');
        document.getElementById("changeName").focus();
    });
    $("#nameInput").change(function(){
        $('#changeName').addClass('none-d');
        $('#userName').removeClass('none-d');
        $.ajax({
            url: 'phpTool/realEdit.php',
            method: 'POST',
            data: {
                newName: $('#nameInput').val(),
                work: 'EditUserName'
            },
            success: function (response) {
                if (response === 'done'){
                    succes('name')
                    $('#userName').text($("#nameInput").val());
                    $('#nameMainSlidebar').text($("#nameInput").val());
                }
            }
        })
    });
    $("#newPass").keyup(function(){
        if ($("#newPass").val().length < 8){
            $("#newPass").addClass('is-invalid');
            $("#newPass").removeClass('is-valid');
        }else {
            $("#newPass").removeClass('is-invalid');
            $("#newPass").addClass('is-valid');
        }
        chackVal();
    });
});
