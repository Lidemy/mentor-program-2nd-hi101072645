var form= document.querySelector('.form');
var ques = document.querySelectorAll('.question');
var done = false
var submitBtn = document.querySelector('.form-submit');
var emailRegxp = /\S+@\S+.\S+/
var email = ques[0].children[2]
var radio = ques[2]
// 不能不填寫



var warning = function(e,a = 'red' , b = '#FFEBEE' , c = 'must-alert'){
    e.target.style.borderColor = a
    e.target.parentNode.style.backgroundColor = b
    e.target.parentNode.lastChild.previousSibling.className = c
}
var mustWrite = function (e){
    if(e.target.className == 'must-write' && e.target.value == ''){
        warning(e)        
    }else if(e.target.className == 'must-write'){
        warning(e,'#ccc','#FFF','must-alert hide')
    }
    if(ques[2].children[2].checked || ques[2].children[5].checked){
        warning(e,'#ccc','#FFF','must-alert hide')
    }
    if(e.target.id == 'email'){
        emailCheck()
    }
}
var emailWarinng = function(warning = '請依照格式填寫 xxx@xxx.xxx',bgc='#FFEBEE',showhide='must-alert'){
    ques[0].lastChild.previousSibling.innerText = warning
    ques[0].style.backgroundColor = bgc
    ques[0].lastChild.previousSibling.className = showhide
}
var emailCheck = function(){
    if(!emailRegxp.test(email.value)){
        emailWarinng()
    }else{
        emailWarinng('這是必填問題','#FFF','must-alert hide')
    }
}
var formCheck = function (){
    for(let i=0 ; i < ques.length ; i++){
        if(ques[i].children[2].className == 'must-write' && ques[i].children[2].value == ''){
            ques[i].children[2].style.borderColor = 'red'
            ques[i].style.backgroundColor = '#FFEBEE'
            ques[i].lastChild.previousSibling.className = 'must-alert'
        }else if(ques[i].children[2].className == 'must-write' && ques[i].children[2].value != ''){
            ques[i].children[2].style.borderColor = '#ccc'
            ques[i].style.backgroundColor = '#FFF'
            ques[i].lastChild.previousSibling.className = 'must-alert  hide'
        }
        
    }
    if(ques[2].children[2].checked || ques[2].children[5].checked){
        ques[2].children[2].style.borderColor = '#ccc'
        ques[2].style.backgroundColor = '#FFF'
        ques[2].lastChild.previousSibling.className = 'must-alert  hide'
    }
    for(let i=0 ; i < ques.length ; i++){
        if(ques[i].children[2].style.borderColor == 'red'){
            done = false
            break
        }else{
            done = true
        }
    }
    if(done){
        for(let i=0 ; i < ques.length ; i++){
            if(ques[i].children[2].value){
                console.log(ques[i].children[2].value)
            }else{
                console.log(ques[i].children[2].checked,!ques[i].children[2].checked)
            }
        }
        alert('表單提交')
        location.reload() 
    }
}

form.addEventListener('keyup',function(e){
    mustWrite(e)
},false)

radio.addEventListener('click',function(e){
    mustWrite(e)
},false)

email.addEventListener('keyup',function(e){
    emailCheck(e)
},false)
submitBtn.addEventListener('click',function(e){
    formCheck(e)
},false)