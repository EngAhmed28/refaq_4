/*********** popup message *******/


$('.button').click(function () {
    $('#modal').css('display', 'block');
    $('.modal-bg').fadeIn();
});

$('#close').click(function () {
    $('.modal-bg').fadeOut();
    $('#modal').fadeOut();
    return false;
});



/*********** add popup *********/

$('.button').click(function () {
    $('#modal').css('display', 'block');
    $('.modal-bg').fadeIn();
});

$('#close1').click(function () {
    $('.modal-bg').fadeOut();
    $('#modal').fadeOut();
    return false;
});

/************** popup delet *********/


$('.button').click(function () {
    $('#modal-delet').css('display', 'block');
    $('.modal-bg-delet').fadeIn();
});

$('#close').click(function () {
    $('.modal-bg-delet').fadeOut();
    $('#modal-delet').fadeOut();
    return false;
});

/***************  add family devices  *************/


function myFunction() {
    var tbl = document.getElementById("myTable");
    var x = tbl.rows.length - 0;
    var iteration = x;
    var row = tbl.insertRow(x);
    row.className = "control-group";

    if (iteration <= 20) {

        //cell 0
        var cellLeftTepi = row.insertCell(0);
        cellLeftTepi.innerHTML = "<align='center'>" + iteration + "</align>";
        cellLeftTepi.align = 'Centre';
        //cell 1

        // create select list Field  
        var cellLeft = row.insertCell(1);
        var sel = document.createElement('select');
        sel.name = 'selName[]';
        sel.id = 'selName' + iteration;
        sel.className = 'required';
        sel.options[0] = new Option('-  اختر  -', '');
        sel.options[1] = new Option('ثلاجه');
        sel.options[2] = new Option('مكيف');
        sel.options[3] = new Option('سخان');
        sel.options[4] = new Option('براد');
        sel.options[5] = new Option('مكوة');
        cellLeft.appendChild(sel);


        //cell 2

        //create text box Field

        var cellRight = row.insertCell(2);
        var textbox = document.createElement('select');
        textbox.name = 'txtName[]';
        textbox.id = 'txtName[]' + iteration;
        textbox.classname = 'required';
        textbox.options[0] = new Option('1');
        textbox.options[1] = new Option('2');
        textbox.options[2] = new Option('3');
        textbox.options[3] = new Option('4');
        textbox.options[4] = new Option('5');
        textbox.options[5] = new Option('6');
        cellRight.appendChild(textbox);


        //cell 3

        // create select list Field  
        var cellLeft1 = row.insertCell(3);
        var sel1 = document.createElement('select');
        sel1.name = 'sel1Name[]';
        sel1.id = 'sel1Name' + iteration;
        sel1.className = 'required';
        sel1.options[0] = new Option('-  اختر  -', '');
        sel1.options[1] = new Option('جيد');
        sel1.options[2] = new Option('متوسط');
        sel1.options[3] = new Option('غر جيد');
        sel1.options[4] = new Option('يحتاج');
        cellLeft1.appendChild(sel1);


        //cell 4

        //create text box Field

        var cellRight1 = row.insertCell(4);
        var textbox1 = document.createElement('input');
        textbox1.name = 'txtName1[]';
        textbox1.id = 'txtName1[]' + iteration;
        textbox1.classname = 'required' + 'input-small';
        textbox1.type = 'text';
        textbox1.value = '   ';
        cellRight1.appendChild(textbox1);



        //cell 5
        var cellRight2 = row.insertCell(5);
        var btn = document.createElement("BUTTON");
        document.body.appendChild(btn);
        var t = document.createTextNode("حذف");
        btn.appendChild(t);
        btn.onclick = (function () {
            row.remove();
        });
        cellRight2.appendChild(btn);



    } else {

        alert('You can enter only 20 row.');

    }


}




/**************** responsive  cell *************/



function myFunction1() {
    var tbl = document.getElementById("myTable1");
    var x = tbl.rows.length - 0;
    var iteration = x;
    var row = tbl.insertRow(x);
    row.className = "control-group";

    if (iteration <= 20) {

        //cell 0
        var cellLeftTepi = row.insertCell(0);
        cellLeftTepi.innerHTML = "<align='center'>" + iteration + "</align>";
        cellLeftTepi.align = 'Centre';
        //cell 1

        // create select list Field  
        var cellLeft = row.insertCell(1);
        var titel = document.createElement('h6');
        titel.textContent = 'نوع الجهاز :';
        var sel = document.createElement('select');
        sel.name = 'selName[]';
        sel.id = 'selName' + iteration;
        sel.className = 'required';
        sel.options[0] = new Option('-  اختر  -', '');
        sel.options[1] = new Option('ثلاجه');
        sel.options[2] = new Option('مكيف');
        sel.options[3] = new Option('سخان');
        sel.options[4] = new Option('براد');
        sel.options[5] = new Option('مكوة');
        cellLeft.appendChild(titel);
        cellLeft.appendChild(sel);

        //cell 2

        //create text box Field

        var cellRight = row.insertCell(2);
        var titel = document.createElement('h6');
        titel.textContent = ' عدد الاجهزه :';
        var textbox = document.createElement('select');
        textbox.name = 'txtName[]';
        textbox.id = 'txtName[]' + iteration;
        textbox.classname = 'required';
        textbox.options[0] = new Option('1');
        textbox.options[1] = new Option('2');
        textbox.options[2] = new Option('3');
        textbox.options[3] = new Option('4');
        textbox.options[4] = new Option('5');
        textbox.options[5] = new Option('6');
        cellRight.appendChild(titel);
        cellRight.appendChild(textbox);


        //cell 3

        // create select list Field  
        var cellLeft1 = row.insertCell(3);
        var titel = document.createElement('h6');
        titel.textContent = '  حالة الجهاز :';
        var sel1 = document.createElement('select');
        sel1.name = 'sel1Name[]';
        sel1.id = 'sel1Name' + iteration;
        sel1.className = 'required';
        sel1.options[0] = new Option('-  اختر  -', '');
        sel1.options[1] = new Option('جيد');
        sel1.options[2] = new Option('متوسط');
        sel1.options[3] = new Option('غر جيد');
        sel1.options[4] = new Option('يحتاج');
        cellLeft1.appendChild(titel);
        cellLeft1.appendChild(sel1);


        //cell 4

        //create text box Field

        var cellRight1 = row.insertCell(4);
        var titel = document.createElement('h6');
        titel.textContent = '  ملاحظات  :';
        var textbox1 = document.createElement('input');
        textbox1.name = 'txtName1[]';
        textbox1.id = 'txtName1[]' + iteration;
        textbox1.classname = 'required' + 'input-small';
        textbox1.type = 'text';
        textbox1.value = ' ';
        cellRight1.appendChild(titel);
        cellRight1.appendChild(textbox1);



        //cell 5
        var cellRight2 = row.insertCell(5);
        var btn = document.createElement("BUTTON");
        document.body.appendChild(btn);
        var t = document.createTextNode("حذف");
        btn.appendChild(t);
        btn.onclick = (function () {
            row.remove();
        });
        cellRight2.appendChild(btn);



    } else {

        alert('You can enter only 20 row.');

    }


}
/************ upload files  ************/

$(function () {
    $('.file_input_replacement').click(function () {
        var assocInput = $(this).siblings("input[type=file]");
        console.log(assocInput);
        assocInput.click();
    });
    $('.file_input_with_replacement').change(function () {

        var thisInput = $(this);
        var assocInput = thisInput.siblings("input.file_input_replacement");
        if (assocInput.length > 0) {
            var filename = (thisInput.val()).replace(/^.*[\\\/]/, '');
            assocInput.val(filename);
        }
    });
});




/***************** hide and show element ****************/

$(document).ready(function () {

    $(".r-jop-name").hide();

});

$(document).ready(function () {

    $("#r-train").click(function () {
        $(".r-jop-name").hide();
        $(".r-type").show();
        $(".r-times").show();
    });
    $("#r-jop").click(function () {
        $(".r-jop-name").show();
        $(".r-type").hide();
        $(".r-times").hide();
    });
});


/***********************************/
$(document).ready(function () {

    $(".r-style").hide();
    $(".table-style").hide();

});

$(document).ready(function () {

    $("#r-geha").click(function () {
        $(".r-style").hide();
        $(".r-geha").show();
        $(".table-geha").show();
        $(".table-style").hide();
    });
    $("#r-style").click(function () {
        $(".r-style").show();
        $(".r-geha").hide();
        $(".table-geha").hide();
        $(".table-style").show();
    });
});


/***********************************/
$(document).ready(function () {

    $(".r-out").hide();

});

$(document).ready(function () {

    $("#r-in").click(function () {
        $(".r-in").show();
        $(".r-out").hide();
    });
    $("#r-out").click(function () {
        $(".r-in").hide();
        $(".r-out").show();
    });
});



/************** popup table *********/


$('.button').click(function () {
    $('#modal-table').css('display', 'block');
    $('.modal-bg-table').fadeIn();
});

$('#close1').click(function () {
    $('.modal-bg-table').fadeOut();
    $('#modal-table').fadeOut();
    return false;
});


/**********/



$('.button').click(function () {
    $('#modal-table1').css('display', 'block');
    $('.modal-bg-table').fadeIn();
});

$('#close2').click(function () {
    $('.modal-bg-table').fadeOut();
    $('#modal-table1').fadeOut();
    return false;
});



/**********/



$('.button1').click(function () {
    $('#modal-accept').css('display', 'block');
    $('.modal-bg-accept').fadeIn();
});

$('#close-accept').click(function () {
    $('.modal-bg-accept').fadeOut();
    $('#modal-accept').fadeOut();
    return false;
});


/**********/
$('.button2').click(function () {
    $('#modal-accept1').css('display', 'block');
    $('.modal-bg-accept1').fadeIn();
});

$('#close-accept1').click(function () {
    $('.modal-bg-accept1').fadeOut();
    $('#modal-accept1').fadeOut();
    return false;
});



/************* جزء المتبرعين  **********/


$(document).ready(function () {

    $(".r-resourse").hide();
    $(".r-resourse1").hide();

});


function rania(selc) {
    if (selc == 1) {
        $(".r-resourse").hide();
        $(".r-resourse1").hide();
    } else if (selc == 2 || selc == 3 || selc == 5) {
        $(".r-resourse").show();
        $(".r-resourse1").hide();
    } else if (selc == 4) {
        $(".r-resourse").show();
        $(".r-resourse1").show();
    } else {
        $(".r-resourse").hide();
        $(".r-resourse1").hide();
    }

}

/********************************/



$(document).ready(function () {

    $(".r-resourse-moasasa").hide();
    $(".r-resourse-moasasa1").hide();

});


function rania2(selc) {
    if (selc == 1) {
        $(".r-resourse-moasasa").hide();
        $(".r-resourse-moasasa1").hide();
    } else if (selc == 2 || selc == 3 || selc == 5) {
        $(".r-resourse-moasasa").show();
        $(".r-resourse-moasasa1").hide();
    } else if (selc == 4) {
        $(".r-resourse-moasasa").show();
        $(".r-resourse-moasasa1").show();
    } else {
        $(".r-resourse-moasasa").hide();
        $(".r-resourse-moasasa1").hide();
    }

}


/***************************/

$(document).ready(function () {

    $(".r-moasasa").hide();

});

function rania1(selc) {
    if (selc == 10) {
        $(".r-farde").show();
        $(".r-moasasa").hide();

    } else if (selc == 11) {
        $(".r-farde").hide();
        $(".r-moasasa").show();
    } else {
        $(".r-farde").show();
        $(".r-moasasa").hide();
    }
}

/************* kafalat **********/


function kafala(selc) {
    if (selc == 1)
        $(".end-kafala").show();

    else
        $(".end-kafala").hide();

}


/**********************/


$(document).ready(function () {

    $(".select-kind").hide();

});

function kafala2(selc) {
    if (selc == 1)
        $(".select-kind").hide();

    else
        $(".select-kind").show();

}


/**********************/


$(document).ready(function () {

    $(".r-text").hide();
    $(".r-text1").hide();
    $(".r-text2").hide();
    $(".r-text3").hide();
    $(".r-text4").hide();
    $(".r-text5").hide();
    $(".select-kind").hide();

});

function kafala1(selc) {
    if (selc == 1) {
        $(".r-text").show();
        $(".r-text1").hide();
        $(".r-text2").hide();
        $(".r-text3").hide();
        $(".r-text4").hide();
        $(".r-text5").hide();
        $(".kind").show();

    } else if (selc == 2) {
        $(".r-text").hide();
        $(".r-text1").show();
        $(".r-text2").hide();
        $(".r-text3").hide();
        $(".r-text4").hide();
        $(".r-text5").hide();
        $(".kind").show();

    } else if (selc == 3) {
        $(".r-text").hide();
        $(".r-text1").hide();
        $(".r-text2").show();
        $(".r-text3").hide();
        $(".r-text4").hide();
        $(".r-text5").hide();
        $(".kind").hide();
        $(".select-kind").hide();

    } else if (selc == 4) {
        $(".r-text").hide();
        $(".r-text1").hide();
        $(".r-text2").hide();
        $(".r-text3").show();
        $(".r-text4").hide();
        $(".r-text5").hide();
        $(".kind").show();

    } else if (selc == 5) {
        $(".r-text").hide();
        $(".r-text1").hide();
        $(".r-text2").hide();
        $(".r-text3").hide();
        $(".r-text4").show();
        $(".r-text5").hide();
        $(".kind").show();

    } else {
        $(".r-text").hide();
        $(".r-text1").hide();
        $(".r-text2").hide();
        $(".r-text3").hide();
        $(".r-text4").hide();
        $(".r-text5").show();
        $(".kind").show();

    }
}

/************************/

/******** جزء مجلس الادارة *******/
/******** جزء التقارير *******/


$(".r-style-manage").hide();

function manage(selc) {
    if (selc == 1)
        $(".r-style-manage").show();
    else
        $(".r-style-manage").hide();

}

/******** جزء مجلس الادارة *******/
/******** جزء المتابعة *******/

$(".r-style-manage").hide();

function manage(selc) {
    if (selc == 1)
        $(".r-style-manage").show();
    else
        $(".r-style-manage").hide();

}


/***************************/

/****** add bands ****/


/* Variables */
var p = $("#participants").val();
var row = $(".participantRow");

/* Functions */
function getP() {
    p = $("#participants").val();
}

function addRow() {
    row.clone(true, true).appendTo("#participantTable");
}



$("#participants").change(function () {
    var i = 0;
    p = $("#participants").val();
    var rowCount = $("#participantTable tr").length - 0;
    if (p > rowCount) {
        for (i = rowCount; i < p; i += 1) {
            addRow();
        }
        $("#participantTable #addButtonRow").appendTo("#participantTable");
    } else if (p < rowCount) {}
});



/************************************************/
/************************************************/


/************ sanad & 2abd parts ********/

$(document).ready(function () {

    $(".r-style-sanad").hide();
    $(".r-style-sanad1").hide();
    $(".r-style-sanad2").hide();
    $(".r-style-sanad3").hide();
    $(".r-style-sanad4").hide();
});


function sanad(selc) {
    if (selc == 1) {
        $(".r-style-sanad").show();
        $(".r-style-sanad1").hide();
        $(".r-style-sanad2").hide();
        $(".r-style-sanad3").hide();
        $(".r-style-sanad4").hide();
    } else if (selc == 2) {
        $(".r-style-sanad").hide();
        $(".r-style-sanad1").show();
        $(".r-style-sanad2").show();
        $(".r-style-sanad3").show();
        $(".r-style-sanad4").hide();
    } else if (selc == 3) {
        $(".r-style-sanad").hide();
        $(".r-style-sanad1").show();
        $(".r-style-sanad2").show();
        $(".r-style-sanad3").hide();
        $(".r-style-sanad4").show();
    } else {
        $(".r-style-sanad").hide();
        $(".r-style-sanad1").hide();
        $(".r-style-sanad2").hide();
        $(".r-style-sanad3").hide();
        $(".r-style-sanad4").hide();
    }

}