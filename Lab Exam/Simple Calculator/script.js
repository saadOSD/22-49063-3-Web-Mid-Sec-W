console.log("connected");
function addToDisplay(val) {
  const display = document.getElementById("display");
  display.value = display.value + val;
}
function clearDisplay() {
  document.getElementById("display").value = "";
}
function backspace() {
  const display = document.getElementById("display");
  display.value = display.value.slice(0, -1);
}
function calculate() {
  const display = document.getElementById("display");
  const expression = display.value;
  try {
    if (expression) {
     
      display.value = eval(expression);
    }
  } catch (err) {
    display.value = "Error";
    setTimeout(clearDisplay, 1000); 
  }
}