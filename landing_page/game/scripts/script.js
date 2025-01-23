const btnStart = document.getElementById("btn-start");
const instr = document.getElementById("instructions");
const forest = document.getElementById("forest");
const bF = document.getElementById("bigfoot");

btnStart.addEventListener("click", function() {
    alert("Find Bigfoot in the forest and click on him");
    instr.style.display = "none"; 
    const forestWidth  = forest.clientWidth;
    const forestHeight = forest.clientHeight;
    const num1 = Math.random() * forestWidth - bF.clientWidth;
    const num2 = Math.random() * forestHeight - bF.clientHeight;
    bF.style.display = 'block';     
    bF.style.top = num2 + 'px';
    bF.style.left = num1 + 'px';     
});

bF.addEventListener("click", function() {
    const confirmGotme = confirm("Arghhh! You found me. Do you want to play again?");
    if (confirmGotme==true) {
        instr.style.display = "block";
        bF.style.display = "none";      
    } 
});