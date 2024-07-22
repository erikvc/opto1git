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
                $("#recebeBTO").append('<a href="prompt.php?id='+retorno[i].id+'" onClick="return createPrompt('+retorno[i].id+')"><div class="item p-2">'+retorno[i].name+'</div></a>');
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
}

function getSubcategoryText(subCategoryID, promptID){
    $.ajax({
        url: "optoApi/getSubCategoryText.php",
        type: "GET",
        crossDomain: true,
        data: "id="+subCategoryID,
        dataType: "html",
        success: function(retorno){
            insertTextDB(retorno, promptID)
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