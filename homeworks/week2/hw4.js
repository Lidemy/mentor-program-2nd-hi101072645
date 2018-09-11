function isPalindromes(str) {
    var strRev=''
    for(i=0;i<str.length;i++){
      strRev = strRev + str[str.length-i-1]
    }
    return str == strRev ? true :false
}

module.exports = isPalindromes