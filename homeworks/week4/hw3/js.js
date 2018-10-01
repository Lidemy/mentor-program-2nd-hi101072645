
var request = new XMLHttpRequest();
request.open( 'GET', 'https://api.twitch.tv/kraken/streams/?game=League%20of%20Legends&limit=20',true)
request.setRequestHeader('Client-ID', 'uyrkz75zni006wujqnh8l5yoytm924')
request.setRequestHeader('Accept', 'application/vnd.twitchtv.v5+json')
request.send()



request.onload = function() {
    if (request.status === 200) {
        var nowLiving = JSON.parse(request.responseText);
    }
    console.log(nowLiving.streams)
    var liveBoxList =[]
    for (var i = 0; i < nowLiving.streams.length; i++) {
        var previewImg = nowLiving.streams[i].preview.medium 
        var liveMaster = nowLiving.streams[i].channel.logo
        var liveTitle = nowLiving.streams[i].channel.status.slice(0,10)
        var liveMasterName = nowLiving.streams[i].channel.display_name
        var liveBoxTemplate = `<div class='live-box'>
        <div class='live-preview'><img src='${previewImg}' alt=''/></div>
        <div class='live-info'>
          <div class='live-master-photo'><img src='${liveMaster}' alt=''/></div>
          <div class='live-text'>
            <div class='live-theme'>${liveTitle}</div>
            <div class='live-master'>${liveMasterName}</div>
          </div>
        </div>
      </div>`
        
        
    	console.log(nowLiving.streams[i])
        
        liveBoxList += liveBoxTemplate
    	document.querySelector('.content').innerHTML = liveBoxList
    }
}

