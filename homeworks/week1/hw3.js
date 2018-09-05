function reverse(str) {
    var revStr=''
    for(i=0;i<str.length;i++){
      revStr+=str[str.length-i-1]
    }
    return revStr
}