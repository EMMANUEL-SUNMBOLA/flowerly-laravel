document.querySelector('#triggerDown')
.addEventListener("click", ()=>{
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
  }, 1); // Adjust the nsoledelay as needed

  console.log("hello wrld")