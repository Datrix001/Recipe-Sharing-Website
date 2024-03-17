console.log("Adding event listener to #sign");
document.querySelector('#sign').addEventListener("click",mover);
a = 2;
function mover(){
    if(a%2==0){
        window.location.replace("index1.php");
        document.querySelector('.content').classList.add("content.active1");
        console.log("It works");
        a++;
        }
        else {
        window.location.replace("index.php");
        console.log("It doesn't works");
        a++;
        } 
        // a++;
        // document.querySelector('.content').classList.add("active1");
    }
