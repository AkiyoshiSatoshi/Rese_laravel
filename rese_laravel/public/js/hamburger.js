const target = document.getElementById('menu');
target.addEventListener("click", function () {
  target.classList.toggle("open");
  const nav = document.getElementById("nav");
  nav.classList.toggle("in");
})
