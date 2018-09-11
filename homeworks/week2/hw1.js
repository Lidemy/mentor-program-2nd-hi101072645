function stars(n) {
    var stars = []
    var star = '*'
    for(var i=0;i<n;i++){
        stars[i] = star
        star = star + '*'
    }
    return stars
}
module.exports = stars;