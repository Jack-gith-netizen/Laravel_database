const start = document.getElementById('btn-start');
const board = document.getElementById('board');

start.addEventListener('click', setGame);

function getRandomNumber() {
    return Math.floor(Math.random() * 7) + 7; // 返回 6 到 12 之间的随机数
}

function setGame(e) {
    document.querySelector('.instructions').style.display = "none";
    start.style.display = "none";
    board.style.display = "flex"; 
    const numOfDivs = getRandomNumber();
    
    // 清空当前 board 内容
    board.innerHTML = '';

    // 根据随机数生成对应数量的 div 元素
    for (let i = 0; i < numOfDivs; i++) {
        const div = document.createElement('div');  // 创建一个 div 元素
        div.id = i;  // 可以为每个 div 设置一个唯一的 id（可选）
        board.appendChild(div);  // 将新创建的 div 元素添加到 board 容器中
    }
}