function add(a, b) {
  var num = 0
  var aArr = a.split("").reverse()
  var bArr = b.split("").reverse()
  var totalArr =[]
  a.length>=b.length ?  num = a.length : num = b.length
  for(i=0;i<=num;i++){
    if(!aArr[i]){
      aArr[i] = 0
    }
    if(!bArr[i]){
      bArr[i] = 0
    }
    totalArr[i]=parseInt(aArr[i]) + parseInt(bArr[i])
  }
  for(i=0;i<num;i++){
    if(totalArr[i]>9){
      totalArr[i+1] = totalArr[i+1] + Math.floor(totalArr[i]/10)
      totalArr[i] = totalArr[i] % 10
    }
  }
  if(totalArr[num] == 0){
    totalArr.pop()
  }
   return totalArr.reverse().join('')
}



module.exports = add;