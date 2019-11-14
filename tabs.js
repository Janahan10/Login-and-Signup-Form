
function openTab(tabName){
    
    var otherTabs = document.getElementsByClassName('tabsInformation');
    for(var i = 0; i < otherTabs.length; i++){
        otherTabs[i].style.display = "none";
    }

    document.getElementById(tabName).style.display = "block";
}





    
    