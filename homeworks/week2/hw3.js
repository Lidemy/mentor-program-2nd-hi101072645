function isPrime(n) {
    var factor = 0
    for(var i=1 ; i <= n;i++){
        if( n % i == 0){
          factor++
        }
    }
    return factor == 2 ? true : false
}

module.exports = isPrime