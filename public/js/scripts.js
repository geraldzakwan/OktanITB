function validateInDB(str, id, br, whattosearch) {
    if(nullValidation(str, id, br)) {
        var xmlhttp;
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }

        var obj = document.getElementById(id + "Message");
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                obj.innerHTML = this.responseText;
            }
        };

        xmlhttp.open("GET","validate?str=" + str + "&search=" + whattosearch, true);
        //xmlhttp.open('POST','validate', true);
        var sendString = "str=" + str + "&search=" + whattosearch;
        //xmlhttp.send(sendString);
        xmlhttp.send();

        if (obj.innerHTML === "<br><br>") {
            return true;
        } else {
            return false;
        }
    }
}

function checkInDB(str, id, br, whattosearch) {
    if(nullValidation(str, id, br)) {
        var xmlhttp;
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }

        var obj = document.getElementById(id + "Message");
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                obj.innerHTML = this.responseText;
            }
        };

        xmlhttp.open("GET","checkIfExist?str=" + str + "&search=" + whattosearch, true);
        //xmlhttp.open('POST','validate', true);
        var sendString = "str=" + str + "&search=" + whattosearch;
        //xmlhttp.send(sendString);
        xmlhttp.send();

        if (obj.innerHTML === "<br><br>") {
            return true;
        } else {
            return false;
        }
    }
}


function validateLogin(str, id, br, whattosearch) {
    if(nullValidation(str, id, br)) {
        var xmlhttp;
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }

        var obj = document.getElementById(id + "Message");
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                obj.innerHTML = this.responseText;
            }
        };

        xmlhttp.open("GET","validate?str=" + str + "&search=" + whattosearch, true);
        //xmlhttp.open('POST','validate', true);
        var sendString = "str=" + str + "&search=" + whattosearch;
        //xmlhttp.send(sendString);
        xmlhttp.send();

        if (obj.innerHTML === "<br><br>") {
            return true;
        } else {
            return false;
        }
    }
}

function addLikes(likesbuttonid, uid) {
    var pid = likesbuttonid.replace('likesbutton','');
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    var likes = document.getElementById("likes" + pid);
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            //likes.innerHTML = this.responseText;
        }
    };
    var likesbutton = document.getElementById(likesbuttonid);
    if (likesbutton.value == "Yes") {
        likesbutton.value = "No";
    } else {
        likesbutton.value = "Yes";
    }
    xmlhttp.open("GET","approve?id=" + uid + "&value=" + likesbutton.value, true);
    xmlhttp.send();
}

function multiplyPrice(quantity, price) {
    var totalprice = document.getElementById("totalprice");
    totalprice.innerHTML = quantity * price;
}

function nullValidation(val, id, br) {
    //Check if string is null, blank, or just a space
    var x = true;
    if (br===3) {
        if ((!val) || (val.length === 0) || (!val.trim())) {
            document.getElementById(id+"Message").innerHTML = "Don't leave this field empty <br><br>";
            x = false;
        } else {
            document.getElementById(id+"Message").innerHTML = "<br><br><br>";
        }
    } else if (br===2) {
        if ((!val) || (val.length === 0) || (!val.trim())) {
            document.getElementById(id+"Message").innerHTML = "Don't leave this field empty <br>";
            x = false;
        } else {
            document.getElementById(id+"Message").innerHTML = "<br><br>";
        }
    } else {
        if ((!val) || (val.length === 0) || (!val.trim())) {
            document.getElementById(id+"Message").innerHTML = "Don't leave this field empty <br><br>";
            x = false;
        } else {
            document.getElementById(id+"Message").innerHTML = "<br><br><br>";
        }
    }
    if (x) {
        document.getElementById("isValid").value = "valid";
    } else {
        document.getElementById("isValid").value = "invalid";
    }
    return x;
}

function isConfirmPassword(val, id, br) {
    //Check if string is null, blank, or just a space
    var x = true;
    if (br===3) {
        if ((!val) || (val.length === 0) || (!val.trim())) {
            document.getElementById(id+"Message").innerHTML = "Don't leave this field empty <br><br>";
            x = false;
        } else {
            if (val!=document.getElementById("password").value) {
                document.getElementById(id+"Message").innerHTML = "Should be the same as password <br><br>";
                x = false;
            } else {
                document.getElementById(id+"Message").innerHTML = "<br><br><br>";
            }
        }
    } else if (br===2) {
        if ((!val) || (val.length === 0) || (!val.trim())) {
            document.getElementById(id+"Message").innerHTML = "Don't leave this field empty <br>";
            x = false;
        } else {
            if (val!=document.getElementById("password").value) {
                document.getElementById(id+"Message").innerHTML = "Should be the same as password <br><br>";
                x = false;
            } else {
                document.getElementById(id+"Message").innerHTML = "<br><br><br>";
            }
        }
    } else {
        if ((!val) || (val.length === 0) || (!val.trim())) {
            document.getElementById(id+"Message").innerHTML = "Don't leave this field empty <br><br>";
            x = false;
        } else {
            if (val!=document.getElementById("password").value) {
                document.getElementById(id+"Message").innerHTML = "Should be the same as password <br><br>";
                x = false;
            } else {
                document.getElementById(id+"Message").innerHTML = "<br><br><br>";
            }
        }
    }
    if (x) {
        document.getElementById("isValid").value = "valid";
    } else {
        document.getElementById("isValid").value = "invalid";
    }
    return x;
}

function changeValue1(val, idpaste) {
    alert(val);
    var s = document.getElementById(idpaste);
    s.value = val;
}

function changeValue2(idcopy) {
    //alert(idcopy);
    //this.value = document.getElementById(idcopy).value;
    return 1;
}

function forQuantity(quantity, price) {
    //alert(idpaste.toString());
    multiplyPrice(quantity, price);
    //changeValue1(val, idpaste);
}

function isPositiveInteger(str, id, br) {
    var n = ~~Number(str);
    var x = true;
    if (br===3) {
        if (String(n) === str && n > 0) {
            document.getElementById(id+"Message").innerHTML = "<br><br>";
        } else {
            document.getElementById(id+"Message").innerHTML = "Input a positive integer <br>";
            x = false;
        }
    } else if (br===2) {
        if (String(n) === str && n > 0) {
            document.getElementById(id+"Message").innerHTML = "<br><br>";
        } else {    
            document.getElementById(id+"Message").innerHTML = "Input a positive integer <br>";
            x = false;
        }
    } else {
        if (String(n) === str && n > 0) {
            document.getElementById(id+"Message").innerHTML = "<br><br>";
        } else {
            document.getElementById(id+"Message").innerHTML = "Input a positive integer <br>";
            x = false;
        }
    }    
    if (x) {
        document.getElementById("isValid").value = "valid";
    } else {
        document.getElementById("isValid").value = "invalid";
    }   
}

function isVerificationValue(str, id, br) {
    var n = str.length;
    var isnum = /^[0-9]+$/.test(str);
    var x = true;
    if (br===3) {
        if (n === 3 && isnum) {
            document.getElementById(id+"Message").innerHTML = "<br><br>";
        } else {
            document.getElementById(id+"Message").innerHTML = "Input a 3 digit positive digit : 123 <br>";
            x = false;
        }
    } else if (br===2) {
        if (n === 3 && isnum) {
            document.getElementById(id+"Message").innerHTML = "<br><br>";
        } else {    
            document.getElementById(id+"Message").innerHTML = "Input a 3 digit positive digit : 123 <br>";
            x = false;
        }
    } else {
        if (n === 3 && isnum) {
            document.getElementById(id+"Message").innerHTML = "<br><br>";
        } else {
            document.getElementById(id+"Message").innerHTML = "Input a 3 digit positive digit : 123 <br>";
            x = false;
        }
    }
    if (x) {
        document.getElementById("isValid").value = "valid";
    } else {
        document.getElementById("isValid").value = "invalid";
    }   
}

function isPostalCode(str, id, br) {
    var n = str.length;
    var f = str.charAt(0);
    var isnum = /^[0-9]+$/.test(str);
    var x = true;
    if (br===3) {
        if (n === 5 && isnum && f!='0') {
            document.getElementById(id+"Message").innerHTML = "<br><br>";
        } else {
            document.getElementById(id+"Message").innerHTML = "Input a 5 digit positive digit : 12345 <br>";
            x = false;
        }
    } else if (br===2) {
        if (n === 5 && isnum && f!='0') {
            document.getElementById(id+"Message").innerHTML = "<br><br>";
        } else {    
            document.getElementById(id+"Message").innerHTML = "Input a 5 digit positive digit : 12345 <br>";
            x = false;
        }
    } else {
        if (n === 5 && isnum && f!='0') {
            document.getElementById(id+"Message").innerHTML = "<br><br>";
        } else {
            document.getElementById(id+"Message").innerHTML = "Input a 5 digit positive digit : 12345 <br>";
            x = false;
        }
    }
    if (x) {
        document.getElementById("isValid").value = "valid";
    } else {
        document.getElementById("isValid").value = "invalid";
    }   
}

function isCreditCard(str, id, br) {
    var n = str.length;
    var isnum = /^[0-9]+$/.test(str);
    var x = true;
    if (br===3) {
        if (n === 12 && isnum) {
            document.getElementById(id+"Message").innerHTML = "<br><br><br>";
        } else {
            document.getElementById(id+"Message").innerHTML = "Input a 12 digit positive digit : 123456789012 <br>";
            x = false;
        }
    } else if (br===2) {
        if (n === 12 && isnum) {
            document.getElementById(id+"Message").innerHTML = "<br><br>";
        } else {    
            document.getElementById(id+"Message").innerHTML = "Input a 12 digit positive digit : 123456789012 <br>";
            x = false;
        }
    } else {
        if (n === 12 && isnum) {
            document.getElementById(id+"Message").innerHTML = "<br><br>";
        } else {
            document.getElementById(id+"Message").innerHTML = "Input a 12 digit positive digit : 123456789012 <br>";
            x = false;
        }
    }
    if (x) {
        document.getElementById("isValid").value = "valid";
    } else {
        document.getElementById("isValid").value = "invalid";
    }   
}

function isDescription(str, id, br) {
    var n = str.length;
    var x = true;
    if (br===3) {
        if (n>0 && n <= 200) {
            document.getElementById(id+"Message").innerHTML = "<br><br>";
        } else {
            document.getElementById(id+"Message").innerHTML = "Input 200 character at maximum <br>";
            x = false;
        }
    } else if (br===2) {
        if (n>0 && n <= 200) {
            document.getElementById(id+"Message").innerHTML = "<br><br>";
        } else {    
            document.getElementById(id+"Message").innerHTML = "Input 200 character at maximum <br>";
            x = false;
        }
    } else {
        if (n>0 && n <= 200) {
            document.getElementById(id+"Message").innerHTML = "<br><br>";
        } else {
            document.getElementById(id+"Message").innerHTML = "Input 200 character at maximum <br>";
            x = false;
        }
    }
    if (x) {
        document.getElementById("isValid").value = "valid";
    } else {
        document.getElementById("isValid").value = "invalid";
    }   
}

function isEmailValid(str, id, br) {
    if(nullValidation(str, id, br)) {
        var isEmailValid = false;
        var re = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
        if (re.test(str)) {
            document.getElementById(id+"Message").innerHTML = "<br>";
            isEmailValid = true;
        } else {
            document.getElementById(id+"Message").innerHTML = "Email format is invalid";
            isEmailValid = false;
        }
        for(var i = 1; i <= br-1; i++) {
            document.getElementById(id+"Message").innerHTML += "<br>";
        }
        return isEmailValid;
    }
}

function confirmAction(){
    //Iterasi semua input
    if (document.getElementById("isValid").value==="invalid") {
        alert("There is still invalid data");
        return false;
    }
    var r = confirm("Apakah data yang Anda masukkan benar?");
    if (r == true) {
        //check for every input
        return true;
    } else {
        //redirect back, cancel
        return false;
    }   
}

function confirmJumlah(idform, jumlahbtn) {
    var length = document.getElementById(idform).elements.length;
    for (i = 0; i < length-jumlahbtn; i++) {
        if (!(document.getElementById(idform).elements.item(i).value)) {
            alert("There is still an empty field");
            return false;
        }
    }
    return true;
}

function redirect(str) {
    alert("KADUT");
    window.location(str);
}

function checkExtension(id, value) {
    var last = value.length;
        
    if(value.substring(last-3,last) === "jpg") {
        document.getElementById(id+"Message").innerHTML = "<br><br>";
        x = true;
    } else {
        document.getElementById(id+"Message").innerHTML = "Uploadlah file berekstensi .jpg <br><br>";
        x = false;
    }

    if (x) {
        document.getElementById("isValid").value = "valid";
    } else {
        document.getElementById("isValid").value = "invalid";
    }   
}