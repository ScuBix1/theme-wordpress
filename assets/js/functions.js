"use strict"
function searchArticle(){
    if(document.getElementById('s').value == 0){
        return false;
    }
    document.search.submit();
}