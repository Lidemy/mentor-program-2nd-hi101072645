function reverse(str) {
    var revStr=''
    var splStr=str.split('')
    for(i=0;i<str.length;i++){
      revStr+=splStr[str.length-i-1]
    }
    return(revStr)
}