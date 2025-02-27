function login(email, password){
    $.ajax({
        url: "optoApi/loginUser.php",
        type: "GET",
        crossDomain: true,
        data: "Lemail="+email+"&Lpassword="+password,
        success: function(retorno){
            if(retorno == "ok"){
                retorno = 'ok';
            }else if(retorno == "erro1"){
                alert("Incorrect Password!");
                retorno = 'erro1';
            }else if(retorno == "erro2"){
                alert("This User does not Exist!");
                retorno = 'erro2';
            }
        },
        error: function(){
            alert("erro");
        }
    })

    return retorno;
}

function openSubCategory(categoryID){
    $.ajax({
        url: "optoApi/getSubCategories.php",
        type: "GET",
        crossDomain: true,
        data: "id="+categoryID,
        dataType: "json",
        success: function(retorno){
            $("#recebeBTO").empty();
            for(var i=0;retorno.length>i;i++){
                $("#recebeBTO").append('<a href="#" onClick="return createPrompt('+retorno[i].id+')"><div class="item p-2">'+retorno[i].name+'</div></a>');
            }
        }
    })
}


function loadGPT(subCategoryID, promptID){
    $.ajax({
        url: "optoApi/gptSendPrompt.php",
        type: "GET",
        crossDomain: true,
        data: "id="+subCategoryID+"&promptID="+promptID,
        dataType: "json",
        success: function(retorno){
            window.location.href="prompt.php?id="+subCategoryID;
        }
    })
}

function createPrompt(subCategoryID){
    $.ajax({
        url: "optoApi/createPrompt.php",
        type: "GET",
        crossDomain: true,
        data: "id="+subCategoryID,
        dataType: "html",
        success: function(retorno){
            getSubcategoryText(subCategoryID, retorno);
        }
    })

    window.location.href="prompt.php";
}

function getSubcategoryText(subCategoryID, promptID){
    $.ajax({
        url: "optoApi/getSubCategoryText.php",
        type: "GET",
        crossDomain: true,
        data: "id="+subCategoryID,
        dataType: "html",
        success: function(retorno){
            insertTextDB(retorno, promptID);
            loadGptResponse(subCategoryID, promptID, retorno);
        }
    })

    return 1;
}

function loadGptResponse(subCategoryID, promptID, text){
    $.ajax({
        url: "optoApi/loadGptResponse.php",
        type: "GET",
        crossDomain: true,
        data: "id="+subCategoryID+"&promptID="+promptID,
        dataType: "html",
        success: function(retorno){
            insertTextDB(retorno, promptID)
            loadFullTextPrompt(promptID)
            loadPromptPage(promptID)
        }
    })
}

function insertTextDB(text, promptID){
    $.ajax({
        url: "optoApi/insertTextDB.php",
        type: "GET",
        crossDomain: true,
        data: "text="+text+"&promptID="+promptID,
        dataType: "html",
        success: function(retorno){
            alert(retorno);
        }
    })
}

function loadPromptPage(promptID){
    localStorage.setItem("promptID", promptID);
    alert(promptID)
    window.location.href="prompt.php";
}



function loadFullTextPrompt(promptID){

    var promptID = localStorage.getItem("promptID");

    $.ajax({
        url: "optoApi/loadFullTextPrompt.php",
        type: "GET",
        crossDomain: true,
        data: "&promptID="+promptID,
        dataType: "json",
        success: function(retorno){
            $("#responseText").empty();
            for(var i=0;retorno.length>i;i++){
                $("#responseText").append('<p>'+retorno[0].text+'</p><BR><BR>');
            }
        }
    })
}