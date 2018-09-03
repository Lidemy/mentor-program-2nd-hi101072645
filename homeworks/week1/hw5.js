function join(str, concatStr) {
    var joinStr=''
    for(i=0;i<str.length;i++){
        joinStr+=str[i]+concatStr
    }
    return(joinStr)
}

function repeat(str, times) {
    var repStr=''
    for(i=0;i<times;i++){
        repStr += str
    }
    return(repStr)
}