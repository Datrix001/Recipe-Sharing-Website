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



 
