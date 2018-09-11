function add(a, b) {
  var num = 0
  var aArr = a.split("").reverse()
  var bArr = b.split("").reverse()
  var totalArr =[]
  a.length>=b.length ?  num = a.length : num = b.length
  
  for(var i=0;i<num;i++){
    if(!aArr[i]){
      aArr[i] = 0
    }
    if(!bArr[i]){
      bArr[i] = 0
    }
    totalArr[i]=parseInt(aArr[i]) + parseInt(bArr[i])
    if(totalArr[i]>9){
      aArr[i+1] = aArr[i+1] + Math.floor(totalArr[i]/10)
      totalArr[i] = totalArr[i] % 10
    }
  }
   return totalArr.reverse().join('')
}


module.exports = add;