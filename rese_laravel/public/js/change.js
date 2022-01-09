const dateInput = document.getElementById("DateInput");
const timeInput = document.getElementById("TimeInput");
const numInput = document.getElementById("NumInput");

const Date = document.getElementById("Date");
const Time = document.getElementById("Time");
const number = document.getElementById("Number");

dateInput.addEventListener("change", function () {
    Date.textContent = dateInput.value;
});
timeInput.addEventListener("change", function () {
    Time.textContent = timeInput.value;
});
numInput.addEventListener("change", function () {
    number.textContent = numInput.value + "人";
});
