function join(str, concatStr) {
    var joinStr=str[0]
    for(i=1;i<str.length;i++){
        joinStr+=concatStr+str[i]
    }
    return joinStr
}

function repeat(str, times) {
    var repStr=''
    for(i=0;i<times;i++){
        repStr += str
    }
    return repStr
}