window.onload = function() {
    var array_cookie = document.cookie.split(';');
    if (Array.isArray(array_cookie) && array_cookie[0] != '') {
        for (i = 0; i < array_cookie.length; i++) {
            tmp = array_cookie[i].split('=');
            addToDo(tmp[1]);
        }
    }
}

function deleteToDo() {
    if (confirm("Do you really want to delete TO DO item?")) {
       this.parentNode.removeChild(this);
    }
}

function newToDo() {
    var text = prompt("Please enter a name of new TO DO item:");
    if (text != '' && text != null) {
        addToDo(text);
    }
}

function addToDo(text) {
    if (text != '' && text != null) {
        var a = document.getElementById("ft_list");
        var li = document.createElement("DIV");
        var node = document.createTextNode(text);
        li.appendChild(node);
        li.addEventListener("click", deleteToDo);
        li.addEventListener("click", function() { delToCookies(text); });
        a.insertBefore(li, document.getElementById("ft_list").firstChild);
        addToCookies(text);
    }
}

function addToCookies(text) {
    console.log("Setting cookie: " + text);
    document.cookie = text + "=" + text + ";";
}

function delToCookies(text) {
    console.log("Delete cookie: " + text);
    document.cookie = text + "=; expires=Thu, 01 Jan 1970 00:00:01 GMT;";
}
