var form= document.querySelector('.form');
var ques = document.querySelectorAll('.question');
var done = false

form.addEventListener('keyup',function(e){
    mustWrite(e)
},false)

var mustWrite = function (e){
    let thisQuestion = e.target.parentNode
    if(e.target.className == 'must-write' && e.target.value == '' ){
        done = false
        e.target.style.borderColor = 'red'
        thisQuestion.style.backgroundColor = '#FFEBEE'
        console.log(thisQuestion)
    }else{
        thisQuestion.style.backgroundColor = '#FFF'
        e.target.style.borderColor = '#ccc'
    }
}