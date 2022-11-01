import { useState } from "react";

function TemperatureControl() {
    const [count, setTemp] = useState(10);
    const maxTemp = 30;
    const minTemp = 0;
       
const tempUp = () => {
    if (count < maxTemp)
     setTemp(count + 1);
    
}

const tempDown = () => {
    if (count > minTemp)
      setTemp(count - 1);
}

if (count >= 15)
return ( 
<div class="app-container">
  <div class="temperature-display-container">
    <div class="temperature-display hot">   
      <p>{ count }</p>
    </div>   
  </div>
     <div class="button-container">
            <button onClick={tempUp}>+</button>
            <button onClick={tempDown}>-</button>
     </div>
</div>
);
else
return ( 
    <div class="app-container">
      <div class="temperature-display-container">
        <div class="temperature-display cold">   
          <p>{ count }</p>
        </div>   
      </div>
         <div class="button-container">
                <button onClick={tempUp}>+</button>
                <button onClick={tempDown}>-</button>
         </div>
    </div>
 );
}

export default TemperatureControl;

