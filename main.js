'use strict';


// ナビメニュー
const open = document.getElementById('open');
const overlay = document.querySelector('.overlay');
const close = document.getElementById('close');

open.addEventListener('click',()=>{
  overlay.classList.add('show');
  open.classList.add('hide');
});

close.addEventListener('click',()=>{
  overlay.classList.remove('show');
  open.classList.remove('hide');
});



// これよりクイズ本文
const quizsLength = quizs.length;
let quizIndex = 0;
let score = 0;

const buttons = document.querySelectorAll('.box');
const buttonsLength = buttons.length;

// 問題文と選択肢ボタンのテキストを表示
const setupQuiz = () => {
  document.getElementById('q-title').textContent=`もんだい${quizIndex+1}`;
  document.getElementById('js-question').textContent=quizs[quizIndex].question;//問題文のテキストを表示

  // 選択肢の数だけボタンにテキストを表示
  buttons.forEach((item,index)=>{
    item.textContent=quizs[quizIndex].answers[index];
  });
};
setupQuiz();

// ヒント
const hintBtn = document.getElementById('hint-btn');
const hintTxt = document.getElementById('hint-txt');
hintBtn.addEventListener('click',()=>{
  hintTxt.textContent = quizs[quizIndex].hint;
});

// 1問終わると選択肢ボタンとヒントのスタイルをリセット
const btnReset=()=>{
  buttons.forEach((item)=>{
    item.classList.remove('circle','lose');
  });
  
  document.getElementById('correct-txt').textContent = ``;// ボタン下の「こたえ：」をリセット
  document.querySelector('.hint').classList.remove('hidden');//ヒントボタンを再表示
  hintTxt.textContent ='';//ヒントのテキストを消す
};

const quizFinish = () => {
  window.alert(`終了！あなたの正解数は${score}/${quizsLength}です！`);
};

// ボタンがクリックされたら選択肢ボタンのテキストとスタイルを変える
const clickHandler = (e) => {
  if(quizs[quizIndex].correct === e.target.textContent){
    e.target.classList.add('circle');
    e.target.textContent = 'せいかい！';
    score++;
  }else{
    e.target.classList.add('lose');
    e.target.textContent = 'はずれ';
  }

  // ボタン下の「こたえ：」のテキストを表示
  document.getElementById('correct-txt').textContent = `こたえ：${quizs[quizIndex].correct}`;

  // クイズを次へ
  quizIndex++;

  if(quizIndex < quizsLength){
    // 問題数がまだあればこちらを実行
    setTimeout(setupQuiz,2000); 
    setTimeout(btnReset,2000);   
  }else{
    // 問題文がもうなければこちらを実行
    setTimeout(quizFinish,2000);
  }
};


// ボタンをクリックしたら正誤判定
buttons.forEach((item)=>{
  item.addEventListener('click',(e)=>{
    clickHandler(e);
    document.querySelector('.hint').classList.add('hidden');
  });
});


