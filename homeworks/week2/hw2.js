function alphaSwap(str) {
    var swap = ''
    for(i=0;i<str.length;i++){
        if(str[i] == str[i].toUpperCase()){
            swap = swap + str[i].toLowerCase()
        }else{
            swap = swap + str[i].toUpperCase()
        }
    }
    return swap
}  

module.exports = alphaSwap