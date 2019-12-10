var gameEnded = false;
var wordDatabase = ["abc","def","fgh","ijk","lmn","opq","rst","uvw","xyz"];
var wordsOnTheField = [];
var buff = "";
var timer;
var score;


function LoadWord(){
        
    for (var i = 0; i <5; i++) {
        addWord(i);
    }
    showScore();
}

function addWord(index){
    var div = document.createElement("div");
    div.className = "word";
    div.addEventListener("animationend",gameEnd, false);
    div.textContent = wordDatabase[index];
    div.id = wordDatabase[index];
    wordsOnTheField[index] = wordDatabase[index];
    document.getElementById("word" + index ).appendChild(div);
}

function gameEnd(){

    if(!gameEnded){
        gameEnded = true;
        clearInterval(timer);
        alert("ended is maybe "+gameEnded.toString());
        document.forms["hiddenForm"]["score"].value = score;
        document.getElementById("form").submit();
    }
}



function uniCharCode(event) {
    var char = String.fromCharCode(event.keyCode);
    buff = buff + char;
    var elements = document.getElementsByClassName("buff");
    var matchedWord = false;
    
    for(var i = 0; i < 5; i++){
        
        if(buff == wordsOnTheField[i])
        {
            var element = document.getElementById(wordsOnTheField[i]);
            element.parentNode.removeChild(element);
            addWord(i); 
        }
        else if(buff == wordsOnTheField[i].substring(0, buff.length))
        {
            var wordBuff = document.getElementById(wordsOnTheField[i]);
            wordBuff.innerHTML = buff.bold() + wordsOnTheField[i].substring(buff.length,wordsOnTheField[i].length );
            matchedWord = true;
        }
        else
        {
            
            var wordBuff = document.getElementById(wordsOnTheField[i]);
            wordBuff.innerHTML = wordsOnTheField[i];
            
        }
    }
    
    if(!matchedWord){
        buff = "";
    }
    elements[0].textContent = "" + buff;
    
}
function showScore(){

    var start = Date.now();
    var elements = document.getElementsByClassName("score");
    var delta;

    if(!gameEnded){
        timer = setInterval(function() {
            delta = Date.now() - start; // milliseconds elapsed since start
            delta = Math.floor(delta / 1000); // in seconds
            delta = 10 * delta; //bloating the score
            score = delta;
            elements[0].textContent = "\t \t Score: " + delta;
        }, 1000);
    }

}
