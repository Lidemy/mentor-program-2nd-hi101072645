function capitalize(str) {
    var big=str.split('');
    if(big[0].toUpperCase() !== big[0].toLowerCase()){
    	big[0]=big[0].toUpperCase()
    }    
    return big.join('')
}

