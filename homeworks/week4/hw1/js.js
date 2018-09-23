let screen = document.querySelector('.screen');
let calculator = document.querySelector('.calculator');
let memory = []
let res
let calculating = false
calculator.addEventListener('click',function pressNumber(e){
    if(e.target.childElementCount>1|| e.target.className == 'screen'){
        return
    }else{
        if(parseInt(e.target.innerText)|| parseInt(e.target.innerText)==0){
            let pressNember = parseInt(e.target.innerText)
            if(calculating || screen.innerText == 0 || memory == []){
                screen.innerText = ''
            }
            if(calculating){
                screen.innerText = ''
                calculating = false
            }
            screen.innerText += pressNember
        }else if(e.target.innerText=="AC"){
            screen.innerText = 0;
            memory=[]
        }else if(e.target.innerText=="+"||e.target.innerText=="-"||e.target.innerText=="÷"||e.target.innerText=="×"){
            memory[0] = screen.innerText
            memory[1] = e.target.innerText
        }else if(e.target.innerText=="="){
            memory[2] = screen.innerText
            switch(memory[1]){
                case '+':
                    screen.innerText = parseInt(memory[0]) + parseInt(memory[2]);
                    break;
                case '-':
                    screen.innerText = parseInt(memory[0]) - parseInt(memory[2])
                    break;
                case '×':
                    screen.innerText = parseInt(memory[0]) * parseInt(memory[2])
                    break;
                case '÷':
                    screen.innerText = parseInt(memory[0]) / parseInt(memory[2])
                    break;
            }
            memory = []
            calculating = true
        }
    }

},false);