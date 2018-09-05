function capitalize(str) {
    var big=str.split("")
    for(var i=0; i<big.length;i++){
        big[i]=big[i].toUpperCase()
    }
    return(big.join(""))
}