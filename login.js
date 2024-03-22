const content1 = document.querySelector(".content1");
const content2 = document.querySelector(".content2");

document.querySelector('#sd').addEventListener("click", () => {
  if (document.querySelector('#sd').innerHTML === "Signup") {
    document.querySelector('.content').classList.add("active1");
    setTimeout(() => {
      content1.style.display = "none";
    content2.style.display = "block";
    document.querySelector('#sd').innerHTML = "Login";
    },1900);
  } else {
    document.querySelector('.content').classList.remove("active1");
    setTimeout(() => {
    content1.style.display = "block";
    content2.style.display = "none";
    document.querySelector('#sd').innerHTML = "Signup";
    },1900);
  }
});

document.querySelector(".signup").addEventListener("click",()=>{
  document.querySelector(".back1").classList.add("active2");
  document.querySelector(".lin1").classList.add("active3");
  document.querySelector(".back").classList.remove("active2");
  document.querySelector(".lin").classList.remove("active3");
});

document.querySelector(".signup").addEventListener("click",()=>{
  if(document.querySelector(".signup").innerHTML == "Login"){
  document.querySelector(".back1").classList.remove("active2");
  document.querySelector(".lin1").classList.remove("active3");
  document.querySelector(".back").classList.add("active2");
  document.querySelector(".lin").classList.add("active3");}
});
