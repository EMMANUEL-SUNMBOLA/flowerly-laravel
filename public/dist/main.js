// document.addEventListener('DOMContentLoaded', ()=>{
//     let text = document.querySelector('h1');
//     let text2 = text.innerText;
//     text.innerText = "";
//     for(let i = 0; i < text2.length; i++){
//         text.innerText += text2[i];
//     }
// })

let textContainer = document.querySelector("h1")
  // Pause the animation on load
  textContainer.style.animationPlayState = "paused";

  // Start the animation after a delay
  setTimeout(() => {
    textContainer.style.animationPlayState = "running";
  }, 1); // Adjust the delay as needed