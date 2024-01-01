// document.addEventListener('DOMContentLoaded', ()=>{
//     let text = document.querySelector('h1');
//     let text2 = text.innerText;
//     text.innerText = "";
//     for(let i = 0; i < text2.length; i++){
//         text.innerText += text2[i];
//     }
// })

document.querySelector('#triggerDown').addEventListener("click", ()=>{
  if(document.querySelector('#down').style.display == 'flex'){
    document.querySelector('#down').style.display = 'none';
  }else{
    document.querySelector('#down').style.display = 'flex';
  }
})

let textContainer = document.querySelector("h1")
  // Pause the animation on load
  textContainer.style.animationPlayState = "paused";

  // Start the animation after a delay
  setTimeout(() => {
    textContainer.style.animationPlayState = "running";
  }, 1); // Adjust the delay as needed

  let inpt = document.querySelector('#inpt');

  document.querySelector('.addBtn').addEventListener("click", () => {
      // Convert the input value to a number
      let inputValue = parseInt(inpt.value);
  
      // Check if the parsed value is a number and greater than 0
      if (!isNaN(inputValue)) {
          // Increment the value
          inpt.value = inputValue + 1;
      }
  });
  document.querySelector('.subBtn').addEventListener("click", () => {
    // Convert the input value to a number
    let inputValue = parseInt(inpt.value);

    // Check if the parsed value is a number and greater than 0
    if (!isNaN(inputValue) && inputValue > 0) {
        // Decrement the value
        inpt.value = inputValue - 1;
    }
});
  