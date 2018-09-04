function printFactor(n) {
    var factors="\n"
    for(i=1;i<=n;i++){
      if(n % i == 0){
        factors += i.toString() +"\n"
      }
    }
    return(factors)
}