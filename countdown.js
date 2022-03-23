'use strict';

{

  function recalc(){
    const future=new Date(2021,11,5,23,15);//未来時間をセット
    const now=new Date();//現在時間
  
    const restMilli=future.getTime()-now.getTime();//未来時間－現在時刻のミリ秒  （getTimeメソッドは1970/1/1からのミリ秒を取得するメソッド）
    const rest=Math.floor(restMilli/1000);//ミリ秒を秒に直す
  
    const day=Math.floor(rest/86400);//残り日数（一日は86400秒）
    const hour=Math.floor(rest%86400/3600);//残り時間
    const minutes=Math.floor(rest%86400%3600/60);//残り分
    const seconds=Math.floor(rest%86400%3600%60);//残り秒
  
    const time=`放送まであと${day}日${hour}時間${minutes}分${seconds}秒`;
  
    document.getElementById('timer').textContent=time;

    refresh();
  }

  function refresh(){
    setTimeout(recalc,1000);
  }

  // 最後にこれ解除↓
  recalc();


}